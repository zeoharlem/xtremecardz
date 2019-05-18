<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/6/2019
 * Time: 10:39 AM
 */

namespace Multiple\Pro\Models;


class Zipimages extends BaseModel {

    public $setproject_id;

    public function initialize() {
        $this->hasOne(
            "setproject_id",
            "Multiple\\Pro\\Models\\Setprojects",
            "setproject_id",
            [
                "reusable"  => true,
                "alias"     => "SetprojectZipImages"
            ]
        );
    }

    public function getSetProjectZipImages(){
        return $this->getRelated("SetprojectZipImages");
    }
}