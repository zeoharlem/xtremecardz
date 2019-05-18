<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 4:52 PM
 */

namespace Multiple\Admin\Controllers;


use DataTables\DataTable;
use Multiple\Admin\Models\Cardtype;
use Multiple\Admin\Models\Extractedimages;
use Multiple\Admin\Models\Projects;
use Multiple\Admin\Models\Register;
use Multiple\Admin\Models\Setprojects;
use Multiple\Admin\Models\Signatures;
use Multiple\Admin\Models\Signimages;
use Multiple\Admin\Models\Staffupload;
use Multiple\Admin\Models\Zipimages;
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
            if($projects->create($this->request->getPost())){
                $this->response->redirect("admin/projects/empty?task=xXxLM");
            }
            else{
                $this->flash->error(implode(', ', $projects->getMessages()));
                $this->response->redirect("admin/projects/setproject?task=error&tok=".uniqid('xLR'));
            }
        }
        $companyRegister    = [];
        foreach(Register::find() as $keyRow => $valueRow){
            $companyRegister[]  = [
                "register_id"       => $valueRow->register_id,
                "company_name"      => $valueRow->getProfileRegister()->company_name
            ];
        }
        $this->view->setVar("company_name", $companyRegister);
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
            $uploadCsvAction    = $this->uploadCsvAction();
            if($uploadCsvAction){
                try{
                    $managerRow     = new Manager();
                    $transaction    = $managerRow->get();
                    $setProject     = new Setprojects();
                    $quantity       = @$this->request->getPost('quantity');
                    $quantity2      = @$this->request->getPost('quantity2');

                    $arrayPost      = [
                        "project_id"    => $this->request->getQuery('project_id'),
                        "quantity"      => !empty($quantity) ? $quantity : $quantity2,
                        "project_title" => $this->request->getQuery('project_title'),
                        "user_id"       => $this->session->get('auth')['register_id'],
                        "type_of_card"  => $this->request->getPost('type_of_card'),
                        "card_csv_file" => $uploadCsvAction[0]
                    ];

                    $setProject->setTransaction($transaction);
                    if($setProject->create($arrayPost) == false){
                        $transaction->rollback(implode(",", $setProject->getMessages()));
                    }
                    //Set the Variable for the array
                    $extraRowAction = [];

                    //Set the CSV path relative path ready
                    $csvPathRow     = "../public/uploads/csvs/";
                    $csv            = $this->csvTaskLoad($csvPathRow.$setProject->card_csv_file);
                    $shitedKeyRow   = array_shift($csv);

                    foreach($csv as $keyCsvRow => $valueKeyCsv){
                        //Set Transaction within the for loop
                        $staffUploadCsv     = new Staffupload();
                        $staffUploadCsv->setTransaction($transaction);
                        $userIdQuery    = $this->request->hasQuery("user_id")?$this->request->getQuery("user_id"):$setProject->user_id;
                        $extraRowAction[]   = [
                            "firstname"     => $valueKeyCsv[0],
                            "lastname"      => $valueKeyCsv[1],
                            "staff_id"      => $valueKeyCsv[2],
                            "setproject_id" => $setProject->setproject_id,
                            "project_id"    => $this->request->getQuery("project_id"),
                            "user_id"       => $userIdQuery
                        ];
                        //var_dump($extraRowAction[$keyCsvRow]);
                        if($staffUploadCsv->create($extraRowAction[$keyCsvRow]) == false){
                            $transaction->rollback(implode(",", $staffUploadCsv->getMessages()));
                        }
                    }
                    $transaction->commit();
                    $this->response->redirect("admin/projects/list");
                }
                catch(Failed $exception){
                    $this->flash->error($exception->getMessage());
                    $this->response->redirect('admin/projects/setproject?'.http_build_query($this->request->getQuery()));
                }
            }
            $this->view->setVars([
                "project_id"    => $this->request->getQuery('project_id'),
                "project_title" => $this->request->getQuery('project_title')
            ]);
            return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        }
        else{
            $this->response->redirect("admin/projects/list?task=xLw");
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

                    if($zipImagesRow->create($postQuery) == true){
                        $zipfile_id = $zipImagesRow->zipimage_id;
                        $exCopyZip  = $this->extractedRowAction($zipfile_id);

                        try{
                            $manager        = new Manager();
                            $transaction    = $manager->get();

                            foreach($exCopyZip['zipImageDirs'] as $keyExCopyZip => $valueExCopyZip){
                                $nameZipImg = @$exCopyZip['csvDirValues'][$keyExCopyZip];
                                if(!is_null($nameZipImg[2]) && !empty($nameZipImg[2])) {
                                    $copyExtract = [
                                        "staff_id"          => $nameZipImg[2],
                                        'user_id'           => $this->session->get('auth')['register_id'],
                                        "image_extracted"   => $this->component->helper->backToRewriteUrlString($valueExCopyZip),
                                    ];
                                }
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
                            //Remove the zip the file and directory
                            $removeExtension    = substr($newFileName, 0, strrpos($newFileName,'.'));
                            $this->removeDirRow($uploadPathRow.$removeExtension);

                            unlink($uploadPathRow.$newFileName);

                            $this->response->setJsonContent([
                                "status"    => "ERROR",
                                "data"      => $this->request->getPost(),
                                "message"   => $exception->getMessage()
                            ])->send();
                        }
                    }
                    else{
                        unlink($uploadPathRow.$newFileName);
                        $this->response->setJsonContent([
                            "status"    => "ERROR",
                            "data"      => $this->request->getPost(),
                            "message"   => "Psta: ".implode(",", $zipImagesRow->getMessages())
                        ])->send();
                    }
                }
                else{
                    unlink($uploadPathRow.$newFileName);
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
        $params = @$this->request->getQuery();
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
                ->from(['r' => 'Multiple\Admin\Models\Setprojects'])
                ->where('r.user_id = "'.$this->session->get('auth')['register_id'].'"')
                ->getQuery()->execute();

            foreach($createBuilder as $keyRow => $valueRow){
                //$setProject = $valueRow->getProjectSetAlias()[0];
                $stackRowFlow[] = [
                    "project_id"    => $valueRow->project_id,
                    "setproject_id" => $valueRow->setproject_id,
                    "check_zip_fl"  => $valueRow->getZipImagesRow() ? true : false,
                    "check_sign_fl" => $valueRow->getSignImagesRow() ? true : false,
                    "zip_images_id" => @$valueRow->getZipImagesRow()->zipimage_id,
                    "zip_image_url" => @$valueRow->getZipImagesRow()->zipimage_url,
                    "sign_image_id" => @$valueRow->getSignImagesRow()->signimage_id,
                    "sign_image_url"=> @$valueRow->getSignImagesRow()->signimage_url,
                    "project_title" => $valueRow->getProjectsRow()->project_title,
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

    public function exposedAction() {
        $zipAchive  = new \ZipArchive();
        $pathRow    = "../public/uploads/zips/";
        $csvPathRow = "../public/uploads/csvs/";
        if($this->request->isGet() && $this->request->hasQuery('project_id')){
            $params = @$this->request->getQuery();
            $this->view->setVars([
                "pager" => Setprojects::getPagingSetProjectRow($params)
            ]);
        }
        $getTitle   = Projects::findFirst('project_id="'.$this->request->getQuery('project_id').'"');
        $this->view->setVar("project_title", ucwords($getTitle->project_title));
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function signAction(){
        if($this->request->hasFiles() && $this->request->isAjax()){
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
                $uploadPathRow  = "../public/uploads/signs/";
                $newFileName    = $timeRow."_".preg_replace('/\s+/', '_', $getUploadFile->getName());
                $movedFileRow   = $getUploadFile->moveTo($uploadPathRow.$newFileName);
                if($movedFileRow){
                    $postQuery  = [
                        "signimage_url" => $newFileName,
                        "project_id"    => $this->request->getPost('project_id','int'),
                        "setproject_id" => $this->request->getPost('setproject_id', 'int'),
                        "user_id"       => $this->session->get('auth')['register_id']
                    ];

                    $zipImagesRow   = new Signimages();
                    if($zipImagesRow->create($postQuery) == true){

                        $zipfile_id = $zipImagesRow->signimage_id;
                        $exCopyZip  = $this->extractSignAction($zipfile_id);

                        try{
                            $manager        = new Manager();
                            $transaction    = $manager->get();

                            foreach($exCopyZip['zipImageDirs'] as $keyExCopyZip => $valueExCopyZip){
                                $nameSignImg    = substr($valueExCopyZip, strrpos($valueExCopyZip,"\\")+1);
                                $nameZipImg     = substr($nameSignImg, 0, strrpos($nameSignImg, "."));
                                if(!is_null($nameZipImg) && !empty($nameZipImg)) {
                                    $copyExtract = [
                                        "staff_id"          => $nameZipImg,
                                        'user_id'           => $this->session->get('auth')['register_id'],
                                        "image_extracted"   => $this->component->helper->backToRewriteUrlString($valueExCopyZip),
                                    ];
                                }
                                $postExtracted  = new Signatures();
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
                            //Remove the zip the file and directory
                            $removeExtension    = substr($newFileName, 0, strrpos($newFileName,'.'));
                            $this->removeDirRow($uploadPathRow.$removeExtension);

                            unlink($uploadPathRow.$newFileName);

                            $this->response->setJsonContent([
                                "status"    => "ERROR",
                                "data"      => $this->request->getPost(),
                                "message"   => $exception->getMessage()
                            ])->send();
                        }
                    }
                    else{
                        unlink($uploadPathRow.$newFileName);
                        $this->response->setJsonContent([
                            "status"    => "ERROR",
                            "data"      => $this->request->getPost(),
                            "message"   => "Psta: ".implode(",", $zipImagesRow->getMessages())
                        ])->send();
                    }
                }
                else{
                    unlink($uploadPathRow.$newFileName);
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

    private function extractSignAction($zipRowId){
        $zipAchive  = new \ZipArchive();
        $pathRow    = "../public/uploads/signs/";
        $csvPathRow = "../public/uploads/csvs/";

        $zipFileRow     = $zipRowId;
        $getZipAchive   = Signimages::findFirstBySignimage_id($zipFileRow);

        $filePathRow    = substr($getZipAchive->signimage_url,0, strrpos($getZipAchive->signimage_url,'.'));

        if(is_dir($pathRow.$filePathRow)){
            //Start the Directory Check
            $getRow = $this->checkCsvZipArchive(null, $pathRow.$filePathRow);
        }
        else {
            $openZipAchive = $zipAchive->open($pathRow.$getZipAchive->signimage_url);
            if ($openZipAchive === true) {
                $zipAchive->extractTo($pathRow.$filePathRow);
                $zipAchive->close();

                //Start the Directory Check
                $getRow = $this->checkCsvZipArchive(null, $pathRow.$filePathRow);
            }
        }

        return [
            "zipImageDirs"  => $getRow['signDir'],
            "headerKeyRow"  => $getRow['keysRow']
        ];
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
        $getKeysRow = [];
        if(!is_null($csv) && !empty($csv)) {
            $getKeysRow = array_shift($csv);
            foreach($csv as $keyRowCsv => $valueRowCsv){
                $stackRow[] = $valueRowCsv;
            }
            return [
                "csvDir" => $stackRow,
                "keysRow" => $getKeysRow,
                "zipDir" => $this->getDirContents($zipDir),
            ];
        }
        else{
            return [
                "keysRow" => $getKeysRow,
                "signDir" => $this->getDirContents($zipDir),
            ];
        }
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
                return $this->response->redirect("admin/projects/list?task=".uniqid('xLmR'));
            }
            elseif(!in_array($mimeTypeCsv, $csv_mimetypes)){
                $this->flash->output("File Uploaded not an extension of CSV");
                return $this->response->redirect("admin/projects/list?task=".uniqid('cSv'));
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

    private function removeDirRow($dir){
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir")
                        $this->removeDirRow($dir . "/" . $object);
                    else unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            return rmdir($dir);
        }
    }

}