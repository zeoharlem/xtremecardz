<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author web
 */
namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Profile;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Tag;

class BaseController extends Controller {
    public function initialize(){
        Tag::prependTitle('Manager');
        Tag::setTitleSeparator(" | ");
        $this->assets->collection("headers")
            ->addCss("assets/extra/lib/datatables-bs4/dataTables.bootstrap4.min.css")
            ->addCss("assets/extra/lib/datatables.net-responsive-bs4/responsive.bootstrap4.css");

        $this->assets->collection("footers")
            ->addJs("assets/extra/lib/datatables/js/jquery.dataTables.min.js")
            ->addJs("assets/extra/lib/datatables-bs4/dataTables.bootstrap4.min.js")
            ->addJs("assets/extra/lib/datatables.net-responsive/dataTables.responsive.js")
            ->addJs("assets/extra/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js");

        $this->view->setVar("setHelperAction", $this->component->helper);
    }

    public function beforeExecuteRoute(Dispatcher $dispatcher){
        $action     = $dispatcher->getActionName();
        $controller = $dispatcher->getControllerName();
        if(($controller !== "index" && $controller !== "login" && $controller !== 'logout') && $controller != 'settings'){
            $register_id    = $this->session->get('auth')['register_id'];
            $profile        = Profile::findFirstByRegister_id($register_id);

            if($profile == false){
                $dispatcher->forward([
                    "controller"    => "settings",
                    "action"        => "index",
                ]);
                return;
            }
        }
    }

    protected function __dataTableFlow($builder){
        if($this->request->isAjax()){
            $dataTables = new \DataTables\DataTable();
            return $dataTables->fromBuilder($builder)->sendResponse();
        }
    }
    
    protected function __dataTableArray($builder){
        if($this->request->isAjax()){
            $dataTables = new \DataTables\DataTable();
            return $dataTables->fromArray($builder)->sendResponse();
        }
    }
    
    //Get Array Conditions to replace post or get Query
    //Note that the index 0 returned is array and 1 is strings
    //Use like this $getWhatever = $this->__getArrayCon($array);
    protected function __getArrayCon(array $array){
        $strings = '';
        $results = array();
        foreach($array as $key => $value){
            $results[$key] = $value;
            $strings .= $key.' = :'.$key.': AND ';
        }
        return array(
            $results, substr($strings,0,-4)
        );
    }
    
    //Remove empty getPost() | getQuery() request
    protected function __getPostRemoveEmpty(){
        if($this->request->isPost()){
            foreach($this->request->getPost() as $key => $value){
                if(empty($value) || is_null($value)){
                    unset($_POST[$key]);
                }
            }
        }
        else{
            foreach($this->request->getQuery() as $key => $value){
                if(empty($value) || is_null($value)){
                    unset($_GET[$key]);
                }
            }
        }
    }
    
    //This method create a binding value based
    //Empty post remooved from the getPost() returned
    protected function __bindAfterRemoveEmpty($type='post'){
        $results = array();
        switch ($type) {
            case 'post':
                foreach($this->request->getPost() as $key => $value){
                    $results[$key] = $value;
                }
                return $results;
                break;
                
            case 'get':
                foreach($this->request->getQuery() as $key => $value){
                    if($key !== '_url'){
                        $results[$key] = $value;
                    }
                }
                return $results;
                break;
        }
    }
    
    //This method creates queries of values for binding
    protected function __conditionsRemoveEmpty($type='post'){
        $strings = '';
        switch ($type) {
            case 'post':
                foreach($this->request->getPost() as $key => $value){
                    $strings .= $key.' = :'.$key.': AND ';
                }
                return substr($strings,0,-4);
                break;
                
            case 'get':
                foreach($this->request->getQuery() as $key => $value){
                    if($key !== '_url'){
                        $strings .= $key.' = :'.$key.': AND ';
                    }
                }
                return substr($strings,0,-4);
                break;
        }
    }
    
}
