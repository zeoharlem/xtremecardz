<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/8/2019
 * Time: 2:12 PM
 */

namespace Multiple\Admin\Models;


class Staffupload extends BaseModel {

    public function initialize(){
        $this->belongsTo(
            "staff_id",
            "Multiple\\Admin\\Models\\Extractedimages",
            "staff_id",
            [
                "reusable"  => true,
                "alias"     => "ExtractedImgStaff"
            ]
        );

        $this->belongsTo(
            "staff_id",
            "Multiple\\Admin\\Models\\Signatures",
            "staff_id",
            [
                "reusable"  => true,
                "alias"     => "SignaturesStaff"
            ]
        );
    }

    public function getExtractedImgStaff(){
        return $this->getRelated("ExtractedImgStaff");
    }

    public function getSignaturesStaff(){
        return $this->getRelated("SignaturesStaff");
    }
}