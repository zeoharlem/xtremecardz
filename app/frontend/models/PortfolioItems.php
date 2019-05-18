<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/16/2019
 * Time: 2:11 PM
 */

namespace Multiple\Frontend\Models;


class PortfolioItems extends BaseModel{

    public function initialize(){
        $this->setSource("portfolio_items");
    }
}