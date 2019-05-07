<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 4:52 PM
 */

namespace Multiple\Backend\Controllers;


use DataTables\DataTable;
use Multiple\Backend\Models\Cardtype;
use Multiple\Backend\Models\Projects;
use Multiple\Backend\Models\Setprojects;
use Multiple\Backend\Models\Zipimages;
use Phalcon\Mvc\View;

class ProjectsController extends BaseController {
    public function initialize(){
        parent::initialize();
        $this->tag->appendTitle("Projects");
        $this->assets->collection('footers')->addJs("assets/extra/js/pages/projects.js");
        $this->view->setVar("card_types", Cardtype::find()->toArray());
    }

    public function indexAction() {
        if($this->request->isPost()){
            $projects   = new Projects();
            if($projects->create($this->request->getPost())){
                $this->dispatcher->forward(
                    [
                        "action"        => "setproject",
                        "params"        => $this->request->getPost() + ["project_id" => $projects->project_id]
                    ]
                );
                return;
            }
            else{
                $this->flash->error(implode(', ', $projects->getMessages()));
                $this->response->redirect("backend/projects/setproject?task=error&tok=".uniqid('xLR'));
            }
        }
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function listAction(){
        $this->view->disableLevel(
            [
                View::LEVEL_LAYOUT      => true,
                View::LEVEL_MAIN_LAYOUT => true,
            ]
        );

        $this->view->setTemplateAfter('common');
    }

    public function setprojectAction(){
        if($this->dispatcher->wasForwarded()) {
            $parameter  = $this->dispatcher->getParams();
            $uploadCsvAction    = $this->uploadCsvAction();
            if($uploadCsvAction){
                $setProject = new Setprojects();
                $arrayPost  = [
                    "project_id"    => $parameter['project_id'],
                    "quantity"      => $this->request->getPost('quantity'),
                    "project_title" => $this->request->getQuery('project_title'),
                    "user_id"       => $this->session->get('auth')['register_id'],
                    "type_of_card"  => $this->request->getPost("type_of_card"),
                    "card_csv_file" => $uploadCsvAction[0]
                ];
                if($setProject->create($arrayPost) != false){
                    $this->response->redirect("backend/projects/list?task=success");
                }
                else{
                    $this->flash->error(implode(", ", $setProject->getMessages()));
                    $this->response->redirect("backend/projects/list?task=failed");
                }
            }
            $this->view->setVars([
                "project_id"    => $parameter['project_id'],
                "project_title" => $parameter['project_title']
            ]);
            $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        }
        elseif(!$this->dispatcher->wasForwarded() && $this->request->hasQuery("project_id")){
            $uploadCsvAction    = $this->uploadCsvAction();
            if($uploadCsvAction){
                $setProject = new Setprojects();
                $arrayPost  = [
                    "type_of_card"  => 1,
                    "quantity"      => $this->request->getPost('quantity'),
                    "project_id"    => $this->request->getQuery('project_id'),
                    "project_title" => $this->request->getQuery('project_title'),
                    "user_id"       => $this->session->get('auth')['register_id'],
                    "card_csv_file" => $uploadCsvAction[0]
                ];
                if($setProject->create($arrayPost) != false){
                    $this->response->redirect("backend/projects/list?task=success");
                }
                else{
                    $this->flash->error(implode(", ", $setProject->getMessages()));
                    $this->response->redirect("backend/projects/list?task=failed");
                }
            }
            $this->view->setVars([
                "project_id"    => $this->request->getQuery('project_id'),
                "project_title" => $this->request->getQuery('project_title')
            ]);
            return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        }
        else{
            $this->response->redirect("backend/projects/list?task=xLw");
        }
    }

    public function zipfileAction() {
        if($this->request->hasFiles() && $this->request->isAjax()){
            //var_dump($this->request->getPost()); exit;
            $mimeTypes  = [
                "application/x-rar-compressed",
                "application/octet-stream",
                "application/zip",
                "application/octet-stream",
                "application/x-zip-compressed",
                "multipart/x-zip"
            ];

            $getUploadFile  = $this->request->getUploadedFiles()[0];
            $mimeTypeZip    = $getUploadFile->getRealType();
            if(in_array($mimeTypeZip, $mimeTypes)){
                $timeRow        = time();
                $uploadPathRow  = "../public/uploads/zips/";
                $newFileName    = $timeRow."_".preg_replace('/\s+/', '_', $getUploadFile->getName());
                $movedFileRow   = $getUploadFile->moveTo($uploadPathRow.$newFileName);
                if($movedFileRow){
                    $postQuery  = [
                        "zipimage_url"  => $newFileName,
                        "project_id"    => $this->request->getPost('project_id','int'),
                        "setproject_id" => $this->request->getPost('setproject_id', 'int'),
                        "user_id"       => $this->session->get('auth')['register_id']
                    ];
                    $zipImagesRow   = new Zipimages();
                    if($zipImagesRow->create($postQuery)){
                        $this->response->setJsonContent([
                            "status"    => "OK",
                            "data"      => $this->request->getPost(),
                            "message"   => "Uploaded Succesfully"
                        ])->send();
                    }
                    else{
                        $this->response->setJsonContent([
                            "status"    => "ERROR",
                            "data"      => $this->request->getPost(),
                            "message"   => implode(',', $zipImagesRow->getMessages())
                        ])->send();
                    }
                }
                else{
                    $this->response->setJsonContent([
                        "data"      => [],
                        "status"    => "ERROR",
                        "message"   => $getUploadFile->getError()
                    ])->send();
                }
            }
            return $this->view->disable();
        }
        $this->assets->collection('headers')->addCss('assets/css/dropzone.css');;
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function emptyAction(){
        //$params = @$this->request->getQuery()+['user_id'=>$this->session->get('auth')['register_id']];
        $params = @$this->request->getQuery() + ['user_id' => $this->session->get('auth')['register_id']];
        $this->view->setVars([
            "pager" => Projects::getPagingProjectRow($params)
        ]);
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function checkoutAction() {
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function getAction(){
        $stackRowFlow   = [];
        if($this->request->isPost() && $this->request->isAjax()){
            $datatables     = new DataTable();
            $createBuilder  = $this->modelsManager->createBuilder()
                ->from(['r' => 'Multiple\Backend\Models\Setprojects'])
                ->where('r.user_id = "'.$this->session->get('auth')['register_id'].'"')
                ->getQuery()->execute();

            foreach($createBuilder as $keyRow => $valueRow){
                //$setProject = $valueRow->getProjectSetAlias()[0];
                $stackRowFlow[] = [
                    "project_id"    => $valueRow->project_id,
                    "setproject_id" => $valueRow->setproject_id,
                    "project_title" => $valueRow->getProjectsRow()->project_title,
                    "date_created"  => $valueRow->date_created,
                    "type_of_card"  => $valueRow->type_of_card,
                    "order_tag"     => $valueRow->order_tag,
                    "quantity"      => $valueRow->quantity,
                    "status"        => $valueRow->status,
                ];
            }
            $datatables->fromArray($stackRowFlow)->sendResponse();
        }
        return $this->view->disable();
    }

    //Make the formAction a post to suit this method
    private function uploadCsvAction() {
        $csv_mimetypes  = array(
            'text/csv',
            'text/plain',
            'application/csv',
            'text/comma-separated-values',
            'application/excel',
            'application/vnd.ms-excel',
            'application/vnd.msexcel',
            'text/anytext',
            'application/octet-stream',
            'application/txt',
        );

        if ($this->request->hasFiles() && $this->request->isPost()) {
            $getUploadFile  = $this->request->getUploadedFiles()[0];
            $mimeTypeCsv    = $getUploadFile->getRealType();
            $csvFileName    = preg_replace('/\s+/', '_', $getUploadFile->getName());
            if($getUploadFile->getSize() > 1048576){
                $this->flash->output("File Size is bigger than 1MB");
                return $this->response->redirect("backend/projects/list?task=".uniqid('xLmR'));
            }
            elseif(!in_array($mimeTypeCsv, $csv_mimetypes)){
                $this->flash->output("File Uploaded not an extension of CSV");
                return $this->response->redirect("backend/projects/list?task=".uniqid('cSv'));
            }
            else{
                $timeChecked    = time();
                $uploadPathRow  = "../public/uploads/csvs/";
                return [
                    $csvFileName."_".$timeChecked,
                    $getUploadFile->moveTo($uploadPathRow.$csvFileName."_".$timeChecked)
                ];
            }
        }
    }
}