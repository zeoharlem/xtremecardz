<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/18/2019
 * Time: 11:49 AM
 */
namespace Multiple\Frontend\Controllers;

class IndexController extends BaseController {

    public function initialize(){
        parent::initialize();
        $this->tag->appendTitle("Get Cardz");
    }

    public function indexAction(){
        $stackRowFlow   = [];
//        $getLatestWork  = $this->modelsManager->createBuilder()
//            ->from("Multiple\\Frontend\\Models\\Images")
//            ->limit(3)->orderBy("image_id ASC")->getQuery()->execute();
//        foreach($getLatestWork as $keyWorks => $valueWorks){
//            $stackRowFlow[] = $valueWorks->toArray();
//        }
        $getLatestWork  = $this->modelsManager->createBuilder()
            ->from(['r' => "Multiple\\Frontend\\Models\\AlbumImages"])
            ->limit(3)->orderBy("r.album_images_id ASC")
            ->getQuery()->execute();
        foreach($getLatestWork as $keyWorks => $valueWorks){
            $getImages      = $valueWorks->getImages()->toArray();
            $portfolioItem  = $valueWorks->getAlbums()->getPortfolioItems()->toArray();
            $albumRow       = $valueWorks->getImages()->getImagesAlbumsRow()->toArray();
            //$stackRowFlow[$albumRow[0]['title']][] = $valueWorks->getImages()->toArray();
            $stackRowFlow[][$albumRow[0]['title']] = $getImages + $albumRow[0] + $portfolioItem;
        }
        //var_dump($stackRowFlow); exit;
        $this->view->setVar("stackImageRow", $stackRowFlow);
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
    }
}