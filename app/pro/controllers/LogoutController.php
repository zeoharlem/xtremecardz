<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogoutController
 *
 * @author Theophilus Alamu <theophilus.alamu at gmail.com>
 */
namespace Multiple\Pro\Controllers;

class LogoutController extends BaseController{
    
    //put your code here
    public function indexAction(){
        //var_dump($this->session->get('auth')); exit;
        if($this->session->has('auth')){
            $this->__LogOutNow();
            $this->response->redirect('pro/index?task=logout');
        }
    }
    
    private function __LogOutNow($param=''){
        empty($param) ? $this->session->destroy()
                : $this->session->remove($param);
    }
}
