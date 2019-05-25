<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 4:55 PM
 */

namespace Multiple\Admin\Controllers;


use DataTables\DataTable;
use Multiple\Admin\Models\AlbumImages;
use Multiple\Admin\Models\Albums;
use Multiple\Admin\Models\Categories;
use Multiple\Admin\Models\Images;
use Multiple\Admin\Models\PortfolioItems;
use Phalcon\Db\Exception;
use Phalcon\Mvc\Model\Transaction\Failed;
use Phalcon\Mvc\Model\Transaction\Manager;
use Phalcon\Mvc\View;

class PortfolioController extends BaseController {

    public function initialize() {
        parent::initialize();
        $this->tag->appendTitle("Portfolio");
        $this->assets->collection("footers")->addJs("assets/extra/js/pages/portfolio.js");

    }

    public function indexAction() {
        $params = $this->request->getQuery();

        if($this->request->isPost()){
            $category   = new Categories();
            if($category->create($this->request->getPost())){
                $this->flash->success("Category created successfully");
            }
            else{
                $this->flash->error("Error: ".implode(",", $category->getMessages()));
            }
        }
        $this->view->setVar("pager", Categories::getPagingProjectRow($params));
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function itemsAction(){
        $stackRowFlow   = [];
        if($this->request->isPost() && $this->request->isAjax()){
            $dataTable  = new DataTable();
            $queryBuilt = $this->modelsManager->createBuilder()
                ->from(['r' => 'Multiple\Admin\Models\PortfolioItems'])
                ->getQuery()->execute();

            foreach($queryBuilt as $keyQueryBuilder => $valueQueryBuilder){
                $stackRowFlow[] = [
                    "title"         => $valueQueryBuilder->title,
                    "date"          => $valueQueryBuilder->date_created,
                    "description"   => $valueQueryBuilder->description,
                    "category"      => $valueQueryBuilder->getCategories()->name,
                    "category_id"   => $valueQueryBuilder->category_id,
                    "item_id"       => $valueQueryBuilder->item_id
                ];
            }
            $dataTable->fromArray($stackRowFlow)->sendResponse();
            return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        }
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function albumsAction(){
        $pathRow    = "../public/assets/portfolio/";
        if($this->request->isPost()){
            $title      = $this->request->getPost("tile");
            $nTitle     = preg_replace('/\s+/', '_', trim($title));
            $fileRow    = $nTitle.uniqid('pLx');
            if(mkdir($pathRow.$fileRow)){
                $albumData  = new Albums();
                $albumQuery = [
                    "description"   => $fileRow,
                    "title"         => $this->request->getPost("title"),
                    "item_id"       => $this->request->getQuery("item_id",'int'),
                ];
                if($albumData->create($albumQuery)){
                    $this->flash->success($fileRow." Folder Created");
                }
                else{
                    $this->flash->error(implode(",",$albumData->getMessages()));
                }
            }
            else{
                $this->flash->error("Unable to create folder");
            }
        }
        $this->view->setVar("albums", Albums::find());
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function createAction(){
        $taskQuery  = [];

        if($this->request->isPost()){
            $queryRow   = $this->request->getPost();
            $categoryId = $this->request->getPost("category_id");

            if(empty($categoryId)){
                return $this->response->redirect("admin/portfolio/?task=".uniqid("pLwX"));
            }

            foreach($queryRow['title'] as $keyRow => $valueRow){
                if(!empty($valueRow)) {
                    $taskQuery[] = [
                        "title"         => trim($valueRow),
                        "price"         => trim($queryRow['price'][$keyRow]),
                        "description"   => trim($queryRow['description'][$keyRow]),
                        "category_id"   => $this->request->getPost("category_id","int")
                    ];
                }
            }
            try{
                foreach($taskQuery as $keyQueryRow => $valueQueryRow){
                    $portfolioItem  = new PortfolioItems();
                    if(!$portfolioItem->save($valueQueryRow)){
                        throw new Exception(implode(",", $portfolioItem->getMessages()));
                    }
                }
                $this->flash->success("Upload Done Successfully");
            }
            catch(Exception $exception){
                $this->flash->error($exception->getMessage());
                $this->response->redirect("admin/portfolio/create?t=error");
            }
        }
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function uploadimageAction(){
        if($this->request->isAjax()){
            $mimeTypes  = [
                "image/jpeg",
                "image/jpg",
                "image/png",
            ];

            $message    = [];
            foreach($this->request->getUploadedFiles() as $keyUploadRow => $valueUploadRow) {
                $getUploadFile  = $valueUploadRow;
                $mimeTypeZip    = $getUploadFile->getRealType();
                if (in_array($mimeTypeZip, $mimeTypes)) {
                    $timeRow = time();
                    $uploadPathRow  = "../public/assets/portfolio/" . $this->request->getPost("album_folder");
                    $newFileName    = $timeRow . "_" . preg_replace('/\s+/', '_', $getUploadFile->getName());
                    $movedFileRow   = $getUploadFile->moveTo($uploadPathRow.'/'.$newFileName);
                    if ($movedFileRow) {
                        $postQuery = [
                            "album_id"      => $this->request->getPost("album_id","int"),
                            "image_id"      => $this->request->getPost('image_id', 'int'),
                        ];

                        $imageQueryRow  = [
                            "title"     => $this->request->getPost("title"),
                            "filename"  => $this->request->getPost("album_folder").'/'.$newFileName
                        ];

                        try {
                            $manager = new Manager();
                            $transaction = $manager->get();
                            $albumImages = new AlbumImages();
                            $albumImages->setTransaction($transaction);
                            if (!$albumImages->create($postQuery)) {
                                $transaction->rollback(implode(",", $albumImages->getMessages()));
                            }
                            $imagesRow = new Images();
                            $imagesRow->setTransaction($transaction);
                            if (!$imagesRow->create($imageQueryRow)) {
                                $transaction->rollback(implode(",", $imagesRow->getMessages()));
                            }
                            $transaction->commit();
                            $message[]  = [true, $newFileName." Uploaded"];

                        } catch (Failed $exception) {
                            $message[]  = [false, $exception->getMessage()];
                        }
                    }
                }
            }
            $this->response->setJsonContent([
                    "status"    => "OK",
                    "message"   => $message,
                    "data"      => []
                ])->send();
        }
        return $this->view->disable();
    }

    public function imagesAction(){
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }
}