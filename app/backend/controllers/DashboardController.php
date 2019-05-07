<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/18/2019
 * Time: 3:34 PM
 */

namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Order;
use Multiple\Backend\Models\Products;
use Multiple\Backend\Models\Projects;
use Multiple\Backend\Models\Sales;
use Multiple\Backend\Models\Zipimages;

class DashboardController extends BaseController {

    public function initialize(){
        parent::initialize();
        \Phalcon\Tag::appendTitle("Dashboard");
    }

    public function indexAction(){
        $this->view->setVars([
            'email'     => $this->session->get('auth')['email'],
            "company"   => ucwords($this->session->get('auth')['fullname']),
            "projects"  => Projects::count(['user_id' => $this->session->get('auth')['register_id']]),
            "download"  => Zipimages::count(['user_id' => $this->session->get('auth')['register_id']])
        ]);
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
    }

    public function taskAction(){
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
    }

}