<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/5/2019
 * Time: 11:44 AM
 */

namespace Multiple\Backend\Models;


use Phalcon\Validation;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class Projects extends BaseModel {

    public $project_id, $project_title, $user_id;

    public function initialize() {
        $this->hasMany(
            "project_id",
            "Multiple\\Backend\\Models\\Setprojects",
            "project_id",
            [
                "reusable"  => true,
                "alias"     => "ProjectSetAlias"
            ]
        );
    }

    public function beforeValidationOnCreate(){
        $this->user_id  = 1;
    }

    public static function getPagingProjectRow($params){
        //Query default values
        $sort = $params['sort'] ?: 'r.project_title';
        $order = $params['order'] ?: 'ASC';
        $page   = (int) $params['page'] ?: 1;
        $limit  = $params['limit'] ?: 20;

        //Create the builder paging query
        $builder    = \Phalcon\Di::getDefault()
            ->getModelsManager()->createBuilder()
            ->from(array('r' => 'Multiple\Backend\Models\Projects'))
            ->where('r.user_id = "'.$params['user_id'].'"')
            ->orderBy("$sort $order");

        $paginator  = new PaginatorQueryBuilder([
            'page'      => $page,
            'limit'     => $limit,
            'builder'   => $builder,
        ]);
        return $paginator;
    }

    public function getProjectSetAlias() {
        return $this->getRelated('ProjectSetAlias');
    }

    public function validation() {
        $validate   = new Validation();
        $validate->add("project_title", new Validation\Validator\Uniqueness([
            "models"    => "Projects",
            "message"   => "Title Already Existed"
        ]));
        return $this->validate($validate);
    }
}