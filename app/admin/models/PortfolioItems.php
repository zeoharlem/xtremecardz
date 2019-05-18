<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:11 PM
 */

namespace Multiple\Admin\Models;


use Phalcon\Db\RawValue;

class PortfolioItems extends BaseModel{

    public $date_posted, $date_created, $category_id, $item_id;

    public function initialize(){
        $this->setSource("portfolio_items");
        $this->belongsTo(
            "category_id",
            "Multiple\\Admin\\Models\\Categories",
            "category_id",
            [
                "reusable"  => true,
                "alias"     => "Categories"
            ]
        );
    }

    public function getCategories(){
        return $this->getRelated("Categories");
    }

    public function beforeValidationOnCreate(){
        $this->date_posted  = new RawValue("NOW()");
        $this->date_created = new RawValue("NOW()");
    }

}