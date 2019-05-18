<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/5/2019
 * Time: 11:45 AM
 */

namespace Multiple\Pro\Models;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class Setprojects extends BaseModel {

    public $date_created, $project_id, $quantity;
    public $user_id, $type_of_card, $card_csv_file;
    public $status, $order_tag, $setproject_id;

    public function initialize() {
        $this->hasOne(
            "project_id",
            "Multiple\\Pro\\Models\\Projects",
            "project_id",
            [
                "reusable"  => true,
                "alias"     => "ProjectsRow"
            ]
        );

        $this->hasOne(
            "user_id",
            "Multiple\\Pro\\Models\\Register",
            "register_id",
            [
                "reusable"  => true,
                "alias"     => "RegisterProjectRow"
            ]
        );

        $this->hasOne(
            "setproject_id",
            "Multiple\\Pro\\Models\\Zipimages",
            "setproject_id",
            [
                "reusable"  => true,
                "alias"     => "ZipImages"
            ]
        );


        $this->hasOne(
            "setproject_id",
            "Multiple\\Pro\\Models\\Signimages",
            "setproject_id",
            [
                "reusable"  => true,
                "alias"     => "SignImages"
            ]
        );

    }

    public function getProjectsRow() {
        return $this->getRelated("ProjectsRow");
    }

    public function getRegisterRow() {
        return $this->getRelated("RegisterProjectRow");
    }

    public function getZipImagesRow() {
        return $this->getRelated('ZipImages');
    }

    public function getSignImagesRow(){
        return $this->getRelated('SignImages');
    }

    public function beforeValidationOnCreate(){
        $this->date_created = new \Phalcon\Db\RawValue("NOW()");
        $this->order_tag    = $this->getDI()->getComponent()->helper->makeRandomString(12);
    }

    public static function getPagingSetProjectRow($params){
        //Query default values
        $sort   = @$params['sort'] ?: 'r.staff_id';
        $order  = @$params['order'] ?: 'DESC';
        $page   = @(int) $params['page'] ?: 1;
        $limit  = @$params['limit'] ?: 20;

        //var_dump($params);exit;

        //Create the builder paging query
        $builder    = \Phalcon\Di::getDefault()
            ->getModelsManager()->createBuilder()
            ->from(array('r' => 'Multiple\Pro\Models\Staffupload'))
            ->where('r.user_id = "'.$params['user_id'].'"')
            ->andWhere('r.setproject_id = "'.$params['setproject_id'].'"')
            ->orderBy("$sort $order");

        $paginator  = new PaginatorQueryBuilder([
            'page'      => $page,
            'limit'     => $limit,
            'builder'   => $builder,
        ]);
        return $paginator;
    }

}