<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/5/2019
 * Time: 11:45 AM
 */

namespace Multiple\Backend\Models;


class Setprojects extends BaseModel {

    public $date_created, $project_id, $quantity;
    public $user_id, $type_of_card, $card_csv_file;
    public $status, $order_tag;

    public function initialize() {
        $this->hasOne(
            "project_id",
            "Multiple\\Backend\\Models\\Projects",
            "project_id",
            [
                "reusable"  => true,
                "alias"     => "ProjectsRow"
            ]
        );

        $this->hasOne(
            "register_id",
            "Multiple\\Backend\\Models\\Register",
            "user_id",
            [
                "reusable"  => true,
                "alias"     => "RegisterProjectRow"
            ]
        );
    }

    public function getProjectsRow() {
        return $this->getRelated("ProjectsRow");
    }

    public function getRegisterRow() {
        return $this->getRelated("RegisterProjectRow");
    }

    public function beforeValidationOnCreate(){
        $this->date_created = new \Phalcon\Db\RawValue("NOW()");
        $this->order_tag    = $this->getDI()->getComponent()->helper->makeRandomString(12);
    }

}