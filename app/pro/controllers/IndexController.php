<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/18/2019
 * Time: 11:49 AM
 */
namespace Multiple\Pro\Controllers;

class IndexController extends BaseController {

    public function initialize(){
        parent::initialize();
    }

    public function indexAction(){
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT);
    }
}