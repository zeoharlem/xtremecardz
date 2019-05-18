<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/4/2019
 * Time: 12:08 AM
 */

namespace Multiple\Admin\Controllers;


use Phalcon\Mvc\View;
use Phalcon\Tag;

class InvoiceController extends BaseController {

    public function initialize() {
        parent::initialize();
        Tag::appendTitle("Invoice Receipt");
    }

    public function indexAction() {
        return $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function showAction() {
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

}