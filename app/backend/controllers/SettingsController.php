<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 11:10 PM
 */

namespace Multiple\Backend\Controllers;


use Phalcon\Mvc\View;
use Phalcon\Tag;

class SettingsController extends BaseController {

    public function initialize(){
        parent::initialize();
        Tag::appendTitle("Settings");
        $this->assets->collection('footers')->addJs("assets/extra/js/pages/settings.js");
    }

    public function indexAction() {
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function passwordAction() {
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function contactAction() {
        return $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
}