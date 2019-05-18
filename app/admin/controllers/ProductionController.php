<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/19/2019
 * Time: 4:57 AM
 */
namespace Multiple\Admin\Controllers;

use DataTables\DataTable;
use Multiple\Admin\Models\Category;
use Multiple\Admin\Models\Products;
use Multiple\Admin\Models\Projects;
use Multiple\Admin\Models\Setprojects;
use Multiple\Admin\Models\Subcategory;
use Phalcon\Mvc\View;

class ProductionController extends BaseController {

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

    public function fixstatusAction(){
        if($this->request->isAjax() && $this->request->isPost()){
            $getSetProject  = Setprojects::findFirstBySetproject_id($this->request->getPost("id","int"));
            if($getSetProject != false){
                if($getSetProject->update(['status' => "completed"])){
                    $this->response->setJsonContent([
                        "status"    => "OK",
                        "data"      => [],
                        "message"   => "Updated Status"
                    ])->send();
                }
            }
        }
        $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    }

    public function downloadsAction(){
        if($this->request->hasQuery('type') && $this->request->hasQuery('file')){

            $fileTypeQuery  = $this->request->getQuery('type');
            switch ($fileTypeQuery){
                case 'csv':
                    $fullFilePath   = "../public/uploads/csvs/".$this->request->getQuery('file');
                    $this->getTypeFilePath($fullFilePath);
                    break;
                case 'zipimages':
                    $fullFilePath   = "../public/uploads/zips/".$this->request->getQuery('file');
                    $this->getTypeFilePath($fullFilePath);
                    break;
                case 'signatures':
                    $fullFilePath   = "../public/uploads/signs/".$this->request->getQuery('file');
                    $this->getTypeFilePath($fullFilePath);
                    break;
            }

        }
        return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    }

    private function getTypeFilePath($pathRow){
        if(file_exists($pathRow)){
//            $this->response->setHeader('Content-Description','File Transfer');
//            $this->response->setHeader('Content-Type','application/octet-stream');
//            $this->response->setHeader('Content-Disposition','attachment; filename="'.basename($pathRow).'"');
//            $this->response->setHeader('Expires','0');
//            $this->response->setHeader('Cache-Control','must-revalidate');
//            $this->response->setHeader('Pragma','public');
//            $this->response->setHeader('Content-Length',filesize($pathRow));
//            $this->response->sendHeaders();
//            flush();
//            readfile($pathRow);
//            exit();
            $this->response->setHeader('Cache-Control','must-revalidate, post-check=0, pre-check=0');
            $this->response->setContentLength(filesize($pathRow));
            $this->response->setContentType('application/octet-stream');
            $this->response->setFileToSend($pathRow);
            $this->response->send();
            exit();
        }
    }

}