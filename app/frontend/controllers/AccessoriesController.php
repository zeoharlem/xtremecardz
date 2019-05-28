<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/26/2019
 * Time: 5:10 PM
 */

namespace Multiple\Frontend\Controllers;


use Multiple\Frontend\Models\Accessories;
use Phalcon\Mvc\View;

class AccessoriesController extends BaseController {

    public function initialize(){
        parent::initialize();
        $this->tag->appendTitle("Accessories");
        $this->assets->collection("footers")->addJs("assets/js/pages/cart.js");
    }

    public function indexAction() {
        $params = $this->request->getQuery();
        $this->view->setVars(
            [
                "pager" => Accessories::getPagingAccessories($params)
            ]
        );
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }
}