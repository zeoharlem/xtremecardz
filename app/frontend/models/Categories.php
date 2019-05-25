<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:09 PM
 */

namespace Multiple\Frontend\Models;


class Categories extends BaseModel {

    public function initialize(){
        $this->hasMany(
            "category_id",
            "Multiple\\Frontend\\Models\\PortfolioItems",
            "category_id",
            [
                "reusable"  => true,
                "alias"     => "CatPortfolio"
            ]
        );

        $this->hasManyToMany(
            "category_id",
            "Multiple\\Frontend\\Models\\PortfolioItems",
            "category_id","item_id",
            "Multiple\\Frontend\\Models\\Albums",
            "item_id",
            [
                "reusable"  => true,
                "alias"     => "PortfolioAlbumsCat"
            ]
        );
    }

    public function getCatPortfolio(){
        return $this->getRelated("CatPortfolio");
    }

    public function getPortfolioAlbumsCat(){
        return $this->getRelated("PortfolioAlbumsCat");
    }
}