<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/9/2019
 * Time: 12:03 AM
 */

namespace Multiple\Pro\Models;


use Phalcon\Validation;

class Profile extends BaseModel{
    public function intialize(){
        $this->belongsTo(
            "register_id",
            "Multiple\\Pro\\Models\\Register",
            "register_id",
            [
                "reusable"  => true,
                "alias"     => "RegisterProfile"
            ]
        );
    }

    public function getRegisterProfile(){
        return $this->getRelated("RegisterProfile");
    }

    public function validation(){
        $validators = new Validation();
        $validators->add("register_id", new Validation\Validator\Uniqueness([
            "model"     => $this,
            "message"   => 'Already created Profile'
        ]));
        return $this->validate($validators);
    }
}