<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:02 PM
 */

namespace Multiple\Frontend\Models;


class Albums extends BaseModel{

    public function initialize(){
        $this->hasManyToMany(
            "album_id",
            "Multiple\\Frontend\\Models\\AlbumImages",
            "album_id",
            "image_id",
            "Multiple\\Frontend\\Models\\Images",
            "image_id",
            [
                "reusable"  => true,
                "alias"     => "AlbumsImages"
            ]
        );

        $this->belongsTo(
            "item_id",
            "Multiple\\Frontend\\Models\\PortfolioItems",
            "item_id",
            [
                "reusable"  => true,
                "alias"     => "PortfolioItems"
            ]
        );

        $this->hasManyToMany(
            "item_id",
            "Multiple\\Frontend\\Models\\PortfolioItems",
            "item_id",
            "category_id",
            "Multiple\\Frontend\\Models\\Categories",
            "category_id",
            [
                "reusable"  => true,
                "alias"     => "CategoryAlbumsPort"
            ]
        );
    }

    public function getAlbumsImages(){
        return $this->getRelated("AlbumsImages");
    }

    public function getPortfolioItems(){
        return $this->getRelated("PortfolioItems");
    }

    public function getCategoryAlbumsPort(){
        return $this->getRelated("CategoryAlbumsPort");
    }
}