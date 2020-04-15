<?php

class Router{

    static function run(){
        #var_dump($_SERVER);
        #$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
        include_once 'app/controllers/login_controller.php';
        $lc = new LoginController();
        $lc->render();

//
//        if ($_SERVER['REQUEST_URI']){
//        }
//        else($_SERVER['REQUEST_URI']){
//
//        }
    }
}