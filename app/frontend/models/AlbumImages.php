<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:03 PM
 */

namespace Multiple\Frontend\Models;


class AlbumImages extends BaseModel{

    public function initialize(){
        $this->setSource("album_images");
        $this->belongsTo(
            "album_id",
            "Multiple\\Frontend\\Models\\Albums",
            "album_id",
            [
                "reusable"  => true,
                "alias"     => "Albums"
            ]
        );

        $this->belongsTo(
            "image_id",
            "Multiple\\Frontend\\Models\\Images",
            "image_id",
            [
                "reusable"  => true,
                "alias"     => "Images"
            ]
        );
    }

    public function getAlbums(){
        return $this->getRelated("Albums");
    }

    public function getImages(){
        return $this->getRelated("Images");
    }
}