<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/18/2019
 * Time: 3:39 PM
 */
namespace Multiple\Admin\Controllers;

use Multiple\Admin\Models\Admin;
use Multiple\Admin\Models\Register;
use Phalcon\Mvc\Model\Resultset;

class LoginController extends BaseController {

    public function initialize(){

    }

    public function indexAction(){
        if($this->request->isPost()){
            $register   = Admin::findFirstByEmail($this->request->getPost('email'));
            if($register){
                $password   = $this->request->getPost('password');
                if($this->security->checkHash($password, $register->password)) {
                    $this->setActionRow($register);
                    $this->flash->success("Welcome! " . ucwords($register->email));
                    $this->response->redirect("admin/dashboard?token=" . uniqid('xRLw'));
                }
                else{
                    $this->flash->error('Incorrect Login Details');
                    $this->response->redirect("admin/index?token=".uniqid('xLt'));
                }
            }
            else{
                $this->flash->error('Email does not Exist');
                $this->response->redirect("admin/index?token=".uniqid('xLt'));
            }
        }
        return $this->view->disable();
    }

    private function setActionRow($register){
        $this->session->set("auth", array(
            'register_id'           => $register->admin_id,
            'email'                 => $register->email,
            'role'                  => $register->role,
        ));
    }
}