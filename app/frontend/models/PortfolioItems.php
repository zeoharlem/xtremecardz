<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:11 PM
 */

namespace Multiple\Frontend\Models;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class PortfolioItems extends BaseModel{

    public function initialize(){
        $this->setSource("portfolio_items");
        $this->belongsTo(
            "category_id",
            "Multiple\\Frontend\\Models\\Categories",
            "category_id",
            [
                "reusable"  => true,
                "alias"     => "Categories"
            ]
        );

        $this->belongsTo(
            "item_id",
            "Multiple\\Frontend\\Models\\Albums",
            "item_id",
            [
                "reusable"  => true,
                "alias"     => "Albums"
            ]
        );

    }

    public function getCategories(){
        return $this->getRelated("Categories");
    }

    public function getAlbums(){
        return $this->getRelated("Albums");
    }

    public static function getPagingProjectRow($params){
        //Query default values
        $sort   = $params['sort'] ?: 'r.category_id';
        $order  = $params['order'] ?: 'DESC';
        $page   = (int) $params['page'] ?: 1;
        $limit  = $params['limit'] ?: 20;

        //Create the builder paging query
        if(key_exists("tag", $params)) {
            $builder = \Phalcon\Di::getDefault()
                ->getModelsManager()->createBuilder()
                ->from(array('r' => 'Multiple\Frontend\Models\PortfolioItems'))
                ->where("r.category_id = '".$params['tag']."'")
                ->orderBy("$sort $order");
        }
        else{
            $builder = \Phalcon\Di::getDefault()
                ->getModelsManager()->createBuilder()
                ->from(array('r' => 'Multiple\Frontend\Models\PortfolioItems'))
                ->orderBy("$sort $order");
        }
        $paginator  = new PaginatorQueryBuilder([
            'page'      => $page,
            'limit'     => $limit,
            'builder'   => $builder,
        ]);
        return $paginator;
    }
}