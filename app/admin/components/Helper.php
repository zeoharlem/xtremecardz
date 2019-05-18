<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author web
 */
namespace Multiple\Admin\Component;

class Helper extends \Phalcon\Mvc\User\Component{
    //put your code here
    public function csrf($redirect = false){
        if($this->security->checkToken() == false){
            $this->flash->error('Invalid <strong>Form Submission</strong>');
            if($redirect){
                $this->response->redirect($redirect);
            }
            return;
        }
    }
    
    //USing Adapter Method to get the getMessages();
    public function getErrorMsgs($classVar, $rd){
        $outputs = [];
        foreach($classVar->getMessages() as $messages){
            $outputs[] = $messages;
        }
        $errorMsgs = implode(',', $outputs);
        $this->flash->error($errorMsgs);
        $this->response->redirect($rd);
        return;
    }

    public function setActiveHyperLink($activeUrl){
        //$activeUrl      = $this->router->getRewriteUri();
        $controller     = $this->dispatcher->getControllerName();
        $checkUrlActive = strpos($activeUrl, $controller) == true ? "true" : "false";
        //var_dump($checkUrlActive); exit;
        return $checkUrlActive;
    }

    public function backToRewriteUrlString($imageUrl){
        $newImageUrl    = substr($imageUrl, strrpos($imageUrl, "uploads"));
        return str_replace("\\", "/", $newImageUrl);
    }

    //Used for the json helpper errors;
    public function getMsgReturn($classVar){
        $outputs = [];
        foreach($classVar->getMessages() as $messages){
            $outputs[] = $messages;
        }
        return $outputs;
    }
    
    public function hashPassword($password){
        return $this->security->hash($password);
    }
    
    public function makeRandomString($length = 8){
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        for($i=0, $_makePass = '', $_newLength = strlen($characters); $i < $length; $i++){
            $_makePass .= $characters[mt_rand(0, strlen($characters)-1)];
        }
        return $_makePass;
    }
    
    public function makeRandomInts($length = 8){
        $characters = '0123456789';
        for($i=0, $_ints = '', $_intLenght = strlen($characters); $i < $length; $i++){
            $_ints .= $characters[mt_rand(0, strlen($characters)-1)];
        }
        return $_ints;
    }
    
    public function makePassword($syllables = 3){
        $vowels = array ('a', 'o', 'e', 'i', 'y', 'u', 'ou', 'oo');
        $consonants = array ('w', 'r', 't', 'p', 's', 'd', 'f', 'g','h', 'j', 'k', 'l', 'z', 'x', 'c', 'v','b', 'n', 'm', 'q');
        for($i=0, $password=''; $i < $syllables; $i++){
            $password .= $this->makeSyllable($vowels, $consonants, $i);
        }
        return $password.$this->makeSuffix($vowels, $consonants);
    }
    
    public function wordLimit($message, $limit){
        return (strlen($message) > $limit) ? $this->short($message, $limit) : $message;
    }
    
    private function makeSuffix($vowels, $consonants){
        $_suffix = array('dom', 'ity', 'ment', 'sion', 'ness', 'ence','er', 'ist', 'tion', 'or');
        $_reSuffixed = $_suffix[array_rand($_suffix)];
        return (in_array($_reSuffixed[0], $vowels)) ? $consonants[array_rand($consonants)].$_reSuffixed :
            $_reSuffixed;
    }
    
    private function makeSyllable($vowels, $consonants, $double = false){
        $doubles = array('n','m','t','s');
        $_newconc = $consonants[array_rand($consonants)];
        if($double && in_array($_newconc, $doubles) && 1 == mt_rand(0,2)){
                $_newconc .= $_newconc;
        }
        return $_newconc.$vowels[array_rand($vowels)];
    }
    
    private function short($words, $limit){
        return substr($words, 0, strrpos(substr($words, 0, $limit), ' ')).' ..';
    }
}
