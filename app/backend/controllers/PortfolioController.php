<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 4:55 PM
 */

namespace Multiple\Backend\Controllers;


class PortfolioController extends BaseController {

    public function initialize() {
        parent::initialize();
        $this->tag->appendTitle("Portfolio");
    }

    public function indexAction() {
        $this->view->setTemplateAfter('dashboard');
    }
}