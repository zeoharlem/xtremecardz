<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 11:10 PM
 */

namespace Multiple\Backend\Controllers;


use Multiple\Backend\Models\Profile;
use Multiple\Backend\Models\Register;
use Phalcon\Mvc\View;
use Phalcon\Tag;

class SettingsController extends BaseController {

    public function initialize(){
        parent::initialize();
        Tag::appendTitle("Settings");
        $this->assets->collection('footers')->addJs("assets/extra/js/pages/settings.js");
    }

    public function indexAction() {
        if($this->request->isPost()){
            $profile        = new Profile();
            $company_name   = $this->session->get('auth')['fullname'];
            $register_id    = $this->session->get('auth')['register_id'];
            $query          = ["register_id" => $register_id, 'company_name' => $company_name];
            $argsRow        = $this->request->getPost() + $query;

            if($this->request->hasPost("createBtn")) {
                if ($profile->create($argsRow)) {
                    $this->flash->success("Your Profile Created Successfully");
                    return $this->response->redirect("backend/dashboard?task=success");
                }
                else {
                    $this->flash->error(implode(", ", $profile->getMessages()));
                    return $this->response->redirect("backend/settings?task=failed");
                }
            }
            elseif($this->request->hasPost("updateBtn")){
                $profileRegist  = Profile::findFirstByRegister_id($register_id);
                if($profileRegist) {
                    if ($profileRegist->update($argsRow)) {
                        $this->flash->success("Your Profile Updated Successfully");
                        return $this->response->redirect("backend/settings?task=success");
                    }
                    else {
                        $this->flash->error(implode(", ", $profileRegist->getMessages()));
                        return $this->response->redirect("backend/settings?task=failed");
                    }
                }
            }
        }
        $settings   = Profile::findFirstByRegister_id($this->session->get('auth')['register_id']);
        $taskRow    = $settings ? true : false;
        $this->view->setVars([
            "updateBtn" => $taskRow,
            "profile"   => $settings
        ]);
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function passwordAction() {
        if($this->request->isPost()){
            $email      = $this->session->get("auth")['email'];
            $resetPwsd  = $this->request->getPost('password');
            $register   = Register::findFirstByEmail($email);
            if($register != false){
                //$password   = $this->security->hash($resetPwsd);
                if($register->update(['password' => $resetPwsd])){
                    $this->flash->success("Password Update Successfully");
                    $this->response->redirect("backend/settings/password?task=successful");
                }
                else{
                    $this->flash->success("Unable to update password");
                    $this->response->redirect("backend/settings/password?task=failure");
                }
            }
        }
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function contactAction() {
        return $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
}