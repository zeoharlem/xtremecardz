<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/3/2019
 * Time: 11:10 PM
 */

namespace Multiple\Admin\Controllers;


use Multiple\Admin\Models\Profile;
use Multiple\Admin\Models\Register;
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
            $register_id    = $this->session->get('auth')['register_id'];
            $query = ["register_id" => $this->session->get('auth')['register_id']];
            $argsRow        = $this->request->getPost() + $query;
            if($this->request->hasPost("createBtn")) {
                if ($profile->create($argsRow)) {
                    $this->flash->success("Your Profile Created Successfully");
                    return $this->response->redirect("admin/settings?task=success");
                }
                else {
                    $this->flash->error(implode(", ", $profile->getMessages()));
                    return $this->response->redirect("admin/settings?task=failed");
                }
            }
            elseif($this->request->hasPost("updateBtn")){
                $profileRegist  = Profile::findFirstByRegister_id($register_id);
                if($profileRegist) {
                    if ($profileRegist->update($argsRow)) {
                        $this->flash->success("Your Profile Updated Successfully");
                        return $this->response->redirect("admin/settings?task=success");
                    }
                    else {
                        $this->flash->error(implode(", ", $profileRegist->getMessages()));
                        return $this->response->redirect("admin/settings?task=failed");
                    }
                }
            }
        }
        $settings   = Profile::findFirstByRegister_id($this->session->get('')['register_id']);
        $taskRow    = $settings ? true : false;
        $this->view->setVars([
            "updateBtn" => $taskRow,
            "profile"   => $settings
        ]);
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function passwordAction() {
        if($this->request->isPost()){
            $register   = Register::findFirstByEmail($this->session->get("auth")['email']);
            if($register != false){
                $password   = $this->security->hash($this->request->getPost('password'));
                if($register->update(['password' => $password])){
                    $this->flash->success("Password Update Successfully");
                    $this->response->redirect("admin/settings/password?task=successful");
                }
                else{
                    $this->flash->success("Unable to update password");
                    $this->response->redirect("admin/settings/password?task=failure");
                }
            }
        }
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function contactAction() {
        return $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
}