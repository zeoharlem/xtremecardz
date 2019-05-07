<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/18/2019
 * Time: 3:39 PM
 */
namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Admin;
use Multiple\Backend\Models\Register;
use Phalcon\Mvc\Model\Resultset;

class LoginController extends BaseController {

    public function initialize(){

    }

    public function indexAction(){
        if($this->request->isPost()){
            $register   = Register::findFirstByEmail($this->request->getPost('email'));
            if($register){
                $password   = $this->request->getPost('password');
                if($this->security->checkHash($password, $register->password)) {
                    $this->setActionRow($register);
                    $this->flash->success("Welcome! " . ucwords($register->company_name));
                    $this->response->redirect("backend/dashboard?token=" . uniqid('xRLw'));
                }
                else{
                    $this->flash->error('Incorrect Login Details');
                    $this->response->redirect("backend/index?token=".uniqid('xLt'));
                }
            }
            else{
                $this->flash->error('Email does not Exist');
                $this->response->redirect("backend/index?token=".uniqid('xLt'));
            }
        }
        return $this->view->disable();
    }

    private function setActionRow($register){
        $this->session->set("auth", array(
            'register_id'           => $register->register_id,
            'fullname'              => ucwords($register->company_name),
            'email'                 => $register->email,
            'role'                  => $register->role,
        ));
    }
}