<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:28 PM
 */

namespace Multiple\Admin\Models;


use Phalcon\Db\RawValue;

class Images extends BaseModel{

    public $date_uploaded;

    public function beforeValidationOnCreate(){
        $this->date_uploaded    = new RawValue("NOW()");
    }
}