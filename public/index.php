<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
session_name('xtremecardz');
/**
 * Creating the Boostrapping Application
 * All Boostrapping Activities Starts here
 */
require_once('../vendor/autoload.php');
require_once('../app/frontend/config/Routes.php');


use Phalcon\Mvc\Router;
use Phalcon\Mvc\Application as BaseApplication;

try{
    //Dependencies Injection
    $dependencyInjector = new \Phalcon\Di\FactoryDefault();
    $application        = new BaseApplication($dependencyInjector);
    
    //Registering a router
    $dependencyInjector->set('router', function () {
        $router = new Router();
        $router->setDefaultModule("frontend");
        $router->removeExtraSlashes(true);
        
        $router->add('/:module/:controller/:action/:params', array(
            'module'        => 1,
            'controller'    => 2,
            'action'        => 3,
            'params'        => 4
        ));
        
        $router->add("/", array(
            'module'        => 'frontend',
            'controller'    => 'index',
            'action'        => 'index'
        ));

        /**
         * Backend Region ROuter
         * Configurations
         */
        $router->add("/backend", array(
            'module'        => 'backend',
            'controller'    => 'index',
            'action'        => 'index'
        ));
        
        $router->add('/backend/:controller', array(
            'module'        => "backend",
            'controller'    => 1,
            'action'        => "index"
        ));
        
        $router->add('/backend/:controller/:action/', array(
            'module'        => "backend",
            'controller'    => 1,
            'action'        => 2));
        
        $router->add('/backend/:controller/:action/:params', array(
            'module'        => "backend",
            'controller'    => 1,
            'action'        => 2,
            'params'        => 3));

        /**
         * Admin Region
         * COnfiguration of routes for the admin
         */
        $router->add("/admin", array(
            'module'        => 'admin',
            'controller'    => 'index',
            'action'        => 'index'
        ));

        $router->add('/admin/:controller', array(
            'module'        => "admin",
            'controller'    => 1,
            'action'        => "index"
        ));

        $router->add('/admin/:controller/:action/', array(
            'module'        => "admin",
            'controller'    => 1,
            'action'        => 2));

        $router->add('/admin/:controller/:action/:params', array(
            'module'        => "admin",
            'controller'    => 1,
            'action'        => 2,
            'params'        => 3));

        /**
         * Production Region
         * COnfiguration of routes for the Production
         */
        $router->add("/pro", array(
            'module'        => 'pro',
            'controller'    => 'index',
            'action'        => 'index'
        ));

        $router->add('/pro/:controller', array(
            'module'        => "pro",
            'controller'    => 1,
            'action'        => "index"
        ));

        $router->add('/pro/:controller/:action/', array(
            'module'        => "admin",
            'controller'    => 1,
            'action'        => 2));

        $router->add('/pro/:controller/:action/:params', array(
            'module'        => "pro",
            'controller'    => 1,
            'action'        => 2,
            'params'        => 3));

        $router->mount(new Routes());
        return $router;
    });
    
    $application->registerModules(array(
        'frontend'  => array(
            'className' => 'Multiple\Frontend\Module',
            'path'      => '../app/frontend/Module.php',
        ),
        'backend'   => array(
            'className' => 'Multiple\Backend\Module',
            'path'      => '../app/backend/Module.php',
        ),
        'admin'   => array(
            'className' => 'Multiple\Admin\Module',
            'path'      => '../app/admin/Module.php',
        ),
        'pro'   => array(
            'className' => 'Multiple\Pro\Module',
            'path'      => '../app/pro/Module.php',
        )
    ));
    
    header("Access-Control-Allow-Origin: *");
    
    //Handle and display appropriate request
    $response   = $application->handle()->getContent();
    echo ($response);
    
} catch (\Phalcon\Exception $ex) {
    echo $ex->getMessage();
}
