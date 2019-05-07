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
        )
    ));
    
    header("Access-Control-Allow-Origin: *");
    
    //Handle and display appropriate request
    $response   = $application->handle()->getContent();
    echo ($response);
    
} catch (\Phalcon\Exception $ex) {
    echo $ex->getMessage();
}
