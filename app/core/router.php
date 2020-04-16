<?php

class Router{

    static function run(){
        $uri_data = explode('?', $_SERVER['REQUEST_URI']);
        session_start();
        $_SESSION['is_logged_in'] = false;
        var_dump($uri_data);

        if ($uri_data[1] == 'login') {
            include_once 'app/controllers/login_controller.php';
            $lc = new LoginController();
            $lc->render();
        } elseif ($uri_data[1] == 'weather'){
            include_once 'app/controllers/weather_controller.php';
            $wc = new WeatherController();
            $wc->render();
        }
//
//        if ($_SERVER['REQUEST_URI']){
//        }
//        else($_SERVER['REQUEST_URI']){
//
//        }
    }
}