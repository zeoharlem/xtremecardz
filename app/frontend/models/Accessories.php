<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/26/2019
 * Time: 5:21 PM
 */

namespace Multiple\Frontend\Models;

use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class Accessories extends BaseModel {

    public static function getPagingAccessories($params){
        //Query default values
        $sort   = $params['sort'] ?: 'r.accessories_id';
        $order  = $params['order'] ?: 'DESC';
        $page   = (int) $params['page'] ?: 1;
        $limit  = $params['limit'] ?: 20;

        //Create the builder paging query
        $builder    = \Phalcon\Di::getDefault()
            ->getModelsManager()->createBuilder()
            ->from(array('r' => 'Multiple\Frontend\Models\Accessories'))
            //->where('r.user_id = "'.$params['user_id'].'"')
            ->orderBy("$sort $order");

        $paginator  = new PaginatorQueryBuilder([
            'page'      => $page,
            'limit'     => $limit,
            'builder'   => $builder,
        ]);
        return $paginator;
    }
}