<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:03 PM
 */

namespace Multiple\Admin\Models;


class AlbumImages extends BaseModel{

    public function initialize(){
        $this->setSource("album_images");
    }
}