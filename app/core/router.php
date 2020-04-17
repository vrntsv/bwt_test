<?php

class Router{

    static function run(){
        $uri_data = explode('?', $_SERVER['REQUEST_URI']);
        var_dump($uri_data);
        session_start();

        if ($uri_data[1] == 'login') {
            include_once 'app/controllers/login_controller.php';
            $lc = new LoginController();
            $lc->render();
        }elseif ($uri_data[1] == 'register') {
            include_once 'app/controllers/register_controller.php';
            $rc = new RegisterController();
            $rc->render();
        } elseif ($uri_data[1] == 'weather'){
            include_once 'app/controllers/weather_controller.php';
            $wc = new WeatherController();
            $wc->render();
        } elseif ($uri_data[1] == 'create_comment'){
            include_once 'app/controllers/create_comment_controller.php';
            $cc = new CreateComment();
            $cc->render();
        } elseif (strpos($uri_data[1], '_ijt') !== false){
            var_dump('test');
            header('Location: http://localhost:63343/bwt_test/index.php?weather');
    }
//
//        if ($_SERVER['REQUEST_URI']){
//        }
//        else($_SERVER['REQUEST_URI']){
//
//        }
    }
}