<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:02 PM
 */

namespace Multiple\Admin\Models;


use Phalcon\Db\RawValue;

class Albums extends BaseModel{

    public $date_created;

    public function beforeValidationOnCreate(){
        $this->date_created = new RawValue("NOW()");
    }
}