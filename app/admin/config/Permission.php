<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Permission
 *
 * @author web
 */
namespace Multiple\Admin\Config;

use Phalcon\Mvc\Dispatcher,
    Phalcon\Events\Event,
    Phalcon\Acl;

class Permission extends \Phalcon\Mvc\User\Plugin{
    //put your code here
    const GUEST = 'guest';
    const USER  = 'user';
    const ADMIN = 'admin';
    
    protected $_publicResources = array(
        'index'                 => ['*'],
        'error'                 => ['*'],
        'login'                 => ['*'],
        'logout'                => ['*'],
        'register'              => ['*'],
    );

    protected $_userResources = array(
        'dashboard'             => ['*'],
        'projects'              => ['*'],
        'settings'              => ['*'],
        "production"            => ['*']
    );
    
    protected $_adminResources = array(
        'admin'     => ['*'],
        "invoice"   => ["*"],
        "portfolio" => ["*"],
    );
    
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher){
        $auth = $this->session->get('auth');
        $role = $auth['role'];
        if(!$role){
            $role = self::GUEST;
        }
        
        //Get the current controller/action from the dispatcher
        $action     = $dispatcher->getActionName();
        $controller = $dispatcher->getControllerName();
        
        // Get the ACL Rule List
        $acl = $this->_getAcl();
        
        // See if they have persmission
        $allowed = $acl->isAllowed($role, $controller, $action);
        if($allowed != Acl::ALLOW){
            $this->session->remove('auth');
            $this->flash->error('Permission not allowed | You have not Activated your Account');
            $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
            $this->response->redirect('admin/index?task=logout');
            //Stops the Dispatcher at the current operation
            return false;
        }
    }
    
    protected function _getAcl(){
        if(!isset($this->persistent->acl)){
            
            $acl = new \Phalcon\Acl\Adapter\Memory();
            $acl->setDefaultAction(Acl::DENY);
            $roles = array(
                'user'  => new Acl\Role(self::USER),
                'guest' => new Acl\Role(self::GUEST),
                'admin' => new Acl\Role(self::ADMIN),
            );
            
            foreach($roles as $role){
                $acl->addRole($role);
            }
            
            //Public Resources
            foreach($this->_publicResources as $resource => $action){
                $acl->addResource(new Acl\Resource($resource), $action);
            }
            
            //User Resources
            foreach($this->_userResources as $resource => $action){
                $acl->addResource(new Acl\Resource($resource), $action);
            }
            
            //Admin Resources
            foreach($this->_adminResources as $resource => $action){
                $acl->addResource(new Acl\Resource($resource), $action);
            }
            
            //Allow All Roles to access the Public Resources
            foreach($roles as $role){
                foreach($this->_publicResources as $resource => $actions){
                    $acl->allow($role->getName(), $resource, $actions);
                }
            }
            
            //Allow Users and Admin to access the User Resources
            foreach($this->_userResources as $resource => $actions){
                foreach($actions as $action){
                    //$acl->allow(self::USER, $resource, $action);
                    $acl->allow(self::ADMIN, $resource, $action);
                }
            }
            
            //Allow Admin to accesst the Admin Resources
            foreach($this->_adminResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow(self::ADMIN, $resource, $action);
                }
            }
            $this->persistent->acl = $acl;
        }
        return $this->persistent->acl;
    }
}
