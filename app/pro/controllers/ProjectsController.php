<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 4:52 PM
 */

namespace Multiple\Pro\Controllers;


use DataTables\DataTable;
use Multiple\Pro\Models\Cardtype;
use Multiple\Pro\Models\Extractedimages;
use Multiple\Pro\Models\Projects;
use Multiple\Pro\Models\Setprojects;
use Multiple\Pro\Models\Staffupload;
use Multiple\Pro\Models\Zipimages;
use Phalcon\Mvc\Model\Transaction\Failed;
use Phalcon\Mvc\Model\Transaction\Manager;
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
            $registerId = $this->session->get('auth')['register_id'];
            $taskRow    = $this->request->getPost() + ["user_id" => $registerId];
            if($projects->create($taskRow)){
                $this->response->redirect("pro/projects/empty?task=xXxLM");
            }
            else{
                $this->flash->error(implode(', ', $projects->getMessages()));
                $this->response->redirect("pro/projects/setproject?task=error&tok=".uniqid('xLR'));
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
        if($this->request->hasQuery("project_id")){
            $stackRowFlow       = [];
            $getQueryProject    = $this->modelsManager->createBuilder()
                ->from(['r' => "Multiple\\Pro\\Models\\Setprojects"])
                ->where('r.project_id="'.$this->request->getQuery('project_id','int').'"')
                ->getQuery()->execute();
            foreach($getQueryProject as $keyRowQuery => $valueRowQuery){
                $stackRowFlow[] = [
                    "project_id"    => $valueRowQuery->project_id,
                    "project_title" => $valueRowQuery->getProjectsRow()->project_title,
                    "date_created"  => date('F d, Y h:s:a', strtotime($valueRowQuery->date_created)),
                    "status"        => $valueRowQuery->status == 'completed' ? 'assets/extra/img/illustrations/corner-1.png'
                        : 'assets/extra/img/illustrations/corner-2.png',

                    "setproject_id" => $valueRowQuery->setproject_id,
                    "zip_images_id" => @$valueRowQuery->getZipImagesRow()->zipimage_id,
                    "zip_image_url" => @$valueRowQuery->getZipImagesRow()->zipimage_url,
                    "sign_image_id" => @$valueRowQuery->getSignImagesRow()->signimage_id,
                    "sign_image_url"=> @$valueRowQuery->getSignImagesRow()->signimage_url,
                    "project_title" => $valueRowQuery->getProjectsRow()->project_title,
                    "card_csv_file" => $valueRowQuery->card_csv_file,
                    "user_id"       => $valueRowQuery->user_id,
                ];
            }
            $this->view->setVar("stackRowQuery", $stackRowFlow);
            return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        }
        else{
            $this->response->redirect("pro/projects/list?task=xLw");
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

                    try{
                        $manager        = new Manager();
                        $transaction    = $manager->get();
                        $zipImagesRow   = new Zipimages();
                        $zipImagesRow->setTransaction($transaction);
                        if($zipImagesRow->create($postQuery) == false){
                            $transaction->rollback("ZipImages".implode(",", $zipImagesRow->getMessages()));
                        }
                        //var_dump($zipImagesRow->zipimage_id);
                        $zipfile_id = $zipImagesRow->zipimage_id;
                        $exCopyZip  = $this->extractedRowAction($zipfile_id);

                        foreach($exCopyZip['zipImageDirs'] as $keyExCopyZip => $valueExCopyZip){
                            $nameZipImg = $exCopyZip['csvDirValues'][$keyExCopyZip];
                            $copyExtract  = [
                                "staff_id"          => $nameZipImg[2],
                                'user_id'           => $this->session->get('auth')['register_id'],
                                "image_extracted"   => $valueExCopyZip,
                            ];
                            $postExtracted  = new Extractedimages();
                            $postExtracted->setTransaction($transaction);
                            if($postExtracted->create($copyExtract) == false){
                                $transaction->rollback("Extracted Images: ".implode(",", $postExtracted->getMessages()));
                            }
                        }
                        $transaction->commit();
                        $this->response->setJsonContent([
                            "status"    => "OK",
                            "data"      => $this->request->getPost(),
                            "message"   => "Uploaded Succesfully"
                        ])->send();
                    }
                    catch(Failed $exception){
                        $this->response->setJsonContent([
                            "status"    => "ERROR",
                            "data"      => $this->request->getPost(),
                            "message"   => $exception->getMessage()
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
                ->from(['r' => 'Multiple\Pro\Models\Setprojects'])
                ->where('r.user_id = "'.$this->session->get('auth')['register_id'].'"')
                ->getQuery()->execute();

            foreach($createBuilder as $keyRow => $valueRow){
                //$setProject = $valueRow->getProjectSetAlias()[0];
                $stackRowFlow[] = [
                    "project_id"    => $valueRow->project_id,
                    "setproject_id" => $valueRow->setproject_id,
                    "check_zip_fl"  => $valueRow->getZipImagesRow() ? true : false,
                    "zip_images_id" => @$valueRow->getZipImagesRow()->zipimage_id,
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

    public function exposedAction() {
        $zipAchive  = new \ZipArchive();
        $pathRow    = "../public/uploads/zips/";
        $csvPathRow = "../public/uploads/csvs/";
        if($this->request->isGet() && $this->request->hasQuery('project_id')){
            $params = @$this->request->getQuery() + ['user_id' => $this->session->get('auth')['register_id']];
            $this->view->setVars([
                "pager" => Setprojects::getPagingSetProjectRow($params)
            ]);
        }
        $getTitle   = Projects::findFirstByProject_id($this->request->getQuery('project_id'));
        $this->view->setVar("project_title", ucwords($getTitle->project_title));
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    private function extractedRowAction($zipRowId){
        $zipAchive  = new \ZipArchive();
        $pathRow    = "../public/uploads/zips/";
        $csvPathRow = "../public/uploads/csvs/";

        $zipFileRow     = $zipRowId;
        $getZipAchive   = Zipimages::findFirstByZipimage_id($zipFileRow);

        $filePathRow    = substr($getZipAchive->zipimage_url,0, strrpos($getZipAchive->zipimage_url,'.'));
        if(is_dir($pathRow.$filePathRow)){
            //Start the Directory Check
            $csvs   = $this->csvTaskLoad($csvPathRow.$getZipAchive->getSetProjectZipImages()->card_csv_file);
            $getRow = $this->checkCsvZipArchive($csvs, $pathRow.$filePathRow);
        }
        else {
            $openZipAchive = $zipAchive->open($pathRow.$getZipAchive->zipimage_url);
            if ($openZipAchive === true) {
                $zipAchive->extractTo($pathRow.$filePathRow);
                $zipAchive->close();

                //Start the Directory Check
                if($getZipAchive->getSetProjectZipImages()) {
                    $csvs   = $this->csvTaskLoad($csvPathRow.$getZipAchive->getSetProjectZipImages()->card_csv_file);
                    $getRow = $this->checkCsvZipArchive($csvs, $pathRow.$filePathRow);
                }
            }
        }
        return [
            "csvDirValues"  => $getRow['csvDir'],
            "zipImageDirs"  => $getRow['zipDir'],
            "headerKeyRow"  => $getRow['keysRow']
        ];

    }

    //Extract ZipArchives
    private function checkCsvZipArchive($csv, $zipDir){
        $stackRow   = [];
        $getKeysRow = array_shift($csv);
        foreach($csv as $keyRowCsv => $valueRowCsv){
            $stackRow[] = $valueRowCsv;
        }
        return [
            "csvDir"    => $stackRow,
            "keysRow"   => $getKeysRow,
            "zipDir"    => $this->getDirContents($zipDir),
        ];
    }

    //Convert CSV to array values
    private function csvTaskLoad($csv){
        $multiCsvArr    = [];
        if(($handle = fopen("{$csv}", "r")) !== false){
            while(($dataRow = fgetcsv($handle, 1000, ",")) !== false){
                $multiCsvArr[]  = $dataRow;
            }
        }
        fclose($handle);
        return $multiCsvArr;
    }

    private function getDirContents($dir, &$results = []){
        $files  = scandir($dir);
        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            }
            elseif($value != "." && $value != ".."){
                $this->getDirContents($path, $results);
                $results[] = $path;
            }
        }
        return $results;
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
                return $this->response->redirect("pro/projects/list?task=".uniqid('xLmR'));
            }
            elseif(!in_array($mimeTypeCsv, $csv_mimetypes)){
                $this->flash->output("File Uploaded not an extension of CSV");
                return $this->response->redirect("pro/projects/list?task=".uniqid('cSv'));
            }
            else{
                $timeChecked    = time();
                $uploadPathRow  = "../public/uploads/csvs/";
                return [
                    $timeChecked."_".$csvFileName,
                    $getUploadFile->moveTo($uploadPathRow.$timeChecked."_".$csvFileName)
                ];
            }
        }
    }
}