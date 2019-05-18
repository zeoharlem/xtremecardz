<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/14/2019
 * Time: 8:01 AM
 */

namespace Multiple\Pro\Controllers;


use DataTables\DataTable;
use Multiple\Pro\Models\Setprojects;
use Phalcon\Mvc\View;

class ProductionController extends BaseController
{
    public function initialize(){
        parent::initialize();
        $this->tag->appendTitle("Productions");
    }

    public function indexAction(){
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function statusAction(){
        $stackRow   = [];
        $params     = $this->request->getQuery();
        if($this->request->isAjax() && $this->request->isPost()){
            $tDataTables        = new DataTable();
            $builderRowQuery    = $this->modelsManager->createBuilder()
                ->from(['r' => "Multiple\\Admin\\Models\\Setprojects"])
                ->orderBy('r.setproject_id DESC')
                ->getQuery()->execute();

            foreach($builderRowQuery as $keyRow => $valueRow){
                $stackRow[] = [
                    "status"        => $valueRow->status,
                    "title"         => $valueRow->getProjectsRow()->project_title,
                    "company"       => $valueRow->getProfileSetproject()->company_name,
                    "setproject_id" => $valueRow->setproject_id
                ];
            }
            $tDataTables->fromArray($stackRow)->sendResponse();
            $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
            return;
        }
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function getAction(){
        if($this->request->isPost() && $this->request->isAjax()){
            $datatables     = new DataTable();
            $createBuilder  = $this->modelsManager->createBuilder()
                ->from(['r' => 'Multiple\Pro\Models\Setprojects'])
                ->getQuery()->execute();

            foreach($createBuilder as $keyRow => $valueRow){
                //$setProject = $valueRow->getProjectSetAlias()[0];

                $stackRowFlow[] = [
                    "project_id"    => $valueRow->project_id,
                    "setproject_id" => $valueRow->setproject_id,
                    "zip_images_id" => @$valueRow->getZipImagesRow()->zipimage_id,
                    "zip_image_url" => @$valueRow->getZipImagesRow()->zipimage_url,
                    "sign_image_id" => @$valueRow->getSignImagesRow()->signimage_id,
                    "sign_image_url"=> @$valueRow->getSignImagesRow()->signimage_url,
                    "project_title" => $valueRow->getProjectsRow()->project_title,
                    "company_name"  => $valueRow->getRegisterRow()->getProfileRow()->company_name,
                    "card_csv_file" => $valueRow->card_csv_file,
                    "date_created"  => $valueRow->date_created,
                    "type_of_card"  => $valueRow->type_of_card,
                    "order_tag"     => $valueRow->order_tag,
                    "quantity"      => $valueRow->quantity,
                    "user_id"       => $valueRow->user_id,
                    "status"        => $valueRow->status,
                ];
            }
            $datatables->fromArray($stackRowFlow)->sendResponse();
        }
        return $this->view->disable();
    }

    public function downloadsAction(){
        if($this->request->hasQuery('type') && $this->request->hasQuery('file')){
            //var_dump($this->request->getQuery()); exit;
            $fileTypeQuery  = $this->request->getQuery('type');
            switch ($fileTypeQuery){
                case 'csv':
                    $this->updateTargetRow($this->request->getQuery('setproject_id','int'));
                    $fullFilePath   = "../public/uploads/csvs/".$this->request->getQuery('file');
                    $this->getTypeFilePath($fullFilePath);
                    break;
                case 'zipimages':
                    $this->updateTargetRow($this->request->getQuery('setproject_id','int'));
                    $fullFilePath   = "../public/uploads/zips/".$this->request->getQuery('file');
                    $this->getTypeFilePath($fullFilePath);
                    break;
                case 'signatures':
                    $this->updateTargetRow($this->request->getQuery('setproject_id','int'));
                    $fullFilePath   = "../public/uploads/signs/".$this->request->getQuery('file');
                    $this->getTypeFilePath($fullFilePath);
                    break;
            }
        }
        return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    }

    private function getTypeFilePath($pathRow){
        if(file_exists($pathRow)){
            $this->response->setHeader('Cache-Control','must-revalidate, post-check=0, pre-check=0');
            $this->response->setContentLength(filesize($pathRow));
            $this->response->setContentType('application/octet-stream');
            $this->response->setFileToSend($pathRow);
            $this->response->send();
            exit();
        }
    }

    private function updateTargetRow($id){
        $taskUpdateRow  = false;
        $setProQuery    = Setprojects::findFirst("setproject_id='".$id."'");
        if($setProQuery->status !== "completed"){
            $taskUpdateRow  = $setProQuery->update(['status' => "processing"]);
        }
        return $taskUpdateRow;
    }
}