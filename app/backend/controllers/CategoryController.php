<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/21/2019
 * Time: 3:30 PM
 */

namespace Multiple\Backend\Controllers;


use Multiple\Backend\Models\Category;
use Multiple\Backend\Models\Subcategory;
use Phalcon\Mvc\View;
use Phalcon\Tag;

class CategoryController extends BaseController {

    public function initialize(){
        parent::initialize();
        Tag::appendTitle("Cateogory");
    }

    public function indexAction(){
        $messageRaw = [];
        if($this->request->isPost()){
            $category   = new Category();
            if($category->create($this->request->getPost())){
                $this->flash->success("Category Created Successfully");
                $this->response->redirect("backend/category/?task=successful");
                return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
            }
            else{
                foreach($category->getMessages() as $key => $value){
                    $messageRaw[]   = $value->getMessage();
                }
                $this->flash->error(implode(", ", $messageRaw));
                $this->response->redirect("backend/category/?task=ERROR");
                return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
            }
        }
        $this->view->setVars([
            "category"  => Category::find()
        ]);
        $this->assets->collection("footer")->addJs("assets/b/demo/default/custom/components/datatables/base/html-table.js");
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function subcategoryAction(){
        $messageRaw = [];
        if($this->request->isPost()){
            $category   = new Subcategory();
            if($category->create($this->request->getPost())){
                $this->flash->success("Category Created Successfully");
                $this->response->redirect("backend/category/subcategory?task=successful");
                return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
            }
            else{
                foreach($category->getMessages() as $key => $value){
                    $messageRaw[]   = $value->getMessage();
                }
                $this->flash->error(implode(", ", $messageRaw));
                $this->response->redirect("backend/category/subcategory?task=ERROR");
                return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
            }
        }
        $this->view->setVars([
            "category"      => Category::find(),
            "subcategory"   => Subcategory::find()
        ]);
        $this->assets->collection("footer")->addJs("assets/b/demo/default/custom/components/datatables/base/html-table.js");
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }
}