<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/27/2019
 * Time: 11:11 AM
 */

namespace Multiple\Frontend\Models;


use Phalcon\Db\RawValue;

class Order extends BaseModel {

    public $firstname, $lastname, $phonenumber, $order_date;

    public function initialize(){
        $this->hasOne(
            "email",
            "Multiple\\Frontend\\Models\\BillingRegister",
            "email",
            array(
                "reusable"  => true,
                "alias"     => "BillingRegister"
            )
        );
    }

    public function beforeValidationOnCreate(){
        $this->order_date   = new RawValue("NOW()");
    }

    public function getBillingRegister() {
        return $this->getRelated("BillingRegister");
    }
}