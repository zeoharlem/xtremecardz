<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/26/2019
 * Time: 5:42 PM
 */

namespace Multiple\Admin\Controllers;


use Multiple\Admin\Models\Accessories;
use Phalcon\Mvc\View;

class AccessoriesController extends BaseController {

    public function initialize() {
        parent::initialize();
        $this->tag->appendTitle("Accessories");
    }

    public function indexAction() {
        if($this->request->isPost() && $this->request->hasFiles()){
            $mimeTypes  = [
                "image/jpeg",
                "image/jpg",
                "image/png",
            ];
            $getUploadedFile    = $this->request->getUploadedFiles()[0];
            $mimeTypeZip        = $getUploadedFile->getRealType();
            if (in_array($mimeTypeZip, $mimeTypes)) {
                $timeRow        = time();
                $uploadPathRow  = "../public/assets/accessories/";
                $newFileName    = $timeRow . "_" . preg_replace('/\s+/', '_', $getUploadedFile->getName());
                $movedFileRow   = $getUploadedFile->moveTo($uploadPathRow.'/'.$newFileName);
                if ($movedFileRow) {
                    $createAccessories  = new Accessories();
                    $getPost    = $this->request->getPost()+["front_image" => $newFileName];
                    if($createAccessories->create($getPost)){
                        $this->flash->success("Accessories Created Successfully");
                        $this->response->redirect("admin/accessories?task=success&range=".uniqid("xLmR"));
                    }
                    else{
                        $this->flash->error(implode(",", $createAccessories->getMessages()));
                        $this->response->redirect("admin/accessories?task=error&range=".uniqid("xLmR"));
                    }
                }
                else{
                    $this->flash->error($getUploadedFile->getError());
                    $this->response->redirect("admin/accessories?task=error&range=".uniqid("xLmR"));
                }
            }
        }
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function listAction(){
        $params = $this->request->getQuery();
        $this->view->setVars(
            [
                "pager" => Accessories::getPagingAccessories($params)
            ]
        );
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }
}