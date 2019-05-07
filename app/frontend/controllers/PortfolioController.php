<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 5:31 AM
 */

namespace Multiple\Frontend\Controllers;


use Phalcon\Mvc\View;

class PortfolioController extends BaseController {

    public function initialize(){
        parent::initialize();
        $this->tag->appendTitle("Portfolio");
    }

    public function indexAction(){
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function getAction(){
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }
}