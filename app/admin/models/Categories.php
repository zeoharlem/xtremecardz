<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:09 PM
 */

namespace Multiple\Admin\Models;

use Phalcon\Validation;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class Categories extends BaseModel {

    public $description, $name, $category_id;

    public function initialize(){
        $this->allowEmptyStringValues(["description"]);
    }

    public function beforeValidationOnCreate(){
        $this->description  = "";
    }

    public static function getPagingProjectRow($params){
        //Query default values
        $sort   = $params['sort'] ?: 'r.category_id';
        $order  = $params['order'] ?: 'DESC';
        $page   = (int) $params['page'] ?: 1;
        $limit  = $params['limit'] ?: 20;

        //Create the builder paging query
        $builder    = \Phalcon\Di::getDefault()
            ->getModelsManager()->createBuilder()
            ->from(array('r' => 'Multiple\Admin\Models\Categories'))
            ->orderBy("$sort $order");

        $paginator  = new PaginatorQueryBuilder([
            'page'      => $page,
            'limit'     => $limit,
            'builder'   => $builder,
        ]);
        return $paginator;
    }

    public function validation() {
        $validate   = new Validation();
        $validate->add("name", new Validation\Validator\Uniqueness([
            "models"    => $this,
            "message"   => "Title Already Existed"
        ]));
        return $this->validate($validate);
    }
}