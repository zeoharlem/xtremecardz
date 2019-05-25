<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:28 PM
 */

namespace Multiple\Frontend\Models;


class Images extends BaseModel{

    public function initialize(){
        $this->hasManyToMany(
            "image_id",
            "Multiple\\Frontend\\Models\\AlbumImages",
            "image_id",
            "album_id",
            "Multiple\\Frontend\\Models\\Albums",
            "album_id",
            [
                "reusable"  => true,
                "alias"     => "ImagesAlbumsRow"
            ]
        );
    }

    public function getImagesAlbumsRow(){
        return $this->getRelated("ImagesAlbumsRow");
    }

}