<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 5:31 AM
 */

namespace Multiple\Frontend\Controllers;


use Multiple\Frontend\Models\Albums;
use Multiple\Frontend\Models\PortfolioItems;
use Phalcon\Mvc\View;

class PortfolioController extends BaseController {

    public function initialize(){
        parent::initialize();
        $this->tag->appendTitle("Portfolio");
        $this->view->setVar("tActive", $this);
        //var_dump($this->session->get('portfolio_items')); exit;
    }

    public function indexAction(){
        $params = $this->request->getQuery();
        $this->view->setVar("pager", PortfolioItems::getPagingProjectRow($params));
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function getAction(){
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function detailAction(){
        if($this->request->hasQuery("item_id") && $this->request->hasQuery('f')) {
            $file   = $this->request->getQuery("f", "string");
            $itemId = $this->request->getQuery("item_id", "int");
            $firstLayer = PortfolioItems::findFirstByItem_id($itemId);
            //$getAlbums      = Albums::findFirstByItem_id($itemId);
            //var_dump($firstLayer->getAlbums()->toArray()); exit;
            if ($firstLayer != false && is_file("../public/assets/portfolio/".$file)) {
                $this->view->setVars(
                    [
                        "mainImg"   => $file,
                        "first"     => $firstLayer,
                        "active_img" => $firstLayer->getAlbums()->getAlbumsImages()->toArray(),
                    ]
                );
            } else {
                $this->dispatcher->forward(
                    [
                        "action" => "notfound"
                    ]
                );
            }

            if ($this->request->isPost()) {
                $totalAmt   = $this->request->getPost("price","int");
                $quantity   = $this->request->getPost("quantity","int");

                $collectiveArr  = [
                    "item_id"   => $itemId,
                    "quantity"  => $this->request->getPost("quantity"),
                    "priceAmt"  => $this->request->getPost("price","int"),
                    "totalAmt"  => $quantity * $totalAmt,
                ];
                $this->session->set("cart_items", $collectiveArr);
            }
        }
        $this->assets->collection("footers")->addJs('assets/js/dropzone.js');
        $this->assets->collection("footers")->addJs('assets/js/pages/cart.js');
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function getsoftAction(){
        if($this->request->hasQuery("item_id") && $this->request->hasQuery('category_id')) {
            $itemId = $this->request->getQuery("item_id", "int");
            $firstLayer = PortfolioItems::findFirstByItem_id($itemId);
            //$getAlbums      = Albums::findFirstByItem_id($itemId);
            //var_dump($firstLayer->getAlbums()->toArray()); exit;
            if ($firstLayer != false) {
                $this->view->setVars(
                    [
                        "first"     => $firstLayer,
                        "active_img" => $firstLayer->getAlbums()->getAlbumsImages()->toArray(),
                    ]
                );
            } else {
                $this->dispatcher->forward(
                    [
                        "action" => "notfound"
                    ]
                );
            }

            if ($this->request->isPost()) {
                $totalAmt   = $this->request->getPost("price","int");
                $quantity   = $this->request->getPost("quantity","int");

                $collectiveArr  = [
                    "item_id"   => $itemId,
                    "quantity"  => $this->request->getPost("quantity"),
                    "priceAmt"  => $this->request->getPost("price","int"),
                    "totalAmt"  => $quantity * $totalAmt,
                ];
                $this->session->set("cart_items", $collectiveArr);
            }
        }
        $this->assets->collection("footers")->addJs('assets/js/pages/cart.js');

        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function notfoundAction(){
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function getActiveAlbumsAct($id){
        $albums     = Albums::findFirstByItem_id($id);
        $getImage   = $albums->getAlbumsImages();
        return $getImage->toArray();
    }
}