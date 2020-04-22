<?php

namespace app\core;


class Router
{
    public static function run()
    {
        $uri_data = explode('?', $_SERVER['REQUEST_URI']);
        session_start();
        if ($uri_data[1] == 'login') {
            $lc = new \app\controllers\LoginController();
            $lc->render();
        } elseif ($uri_data[1] == 'register') {
            include_once 'app/controllers/register_controller.php';
            $rc = new \app\controllers\RegisterController();
            $rc->render();
        } elseif ($uri_data[1] == 'weather') {
            include_once 'app/controllers/weather_controller.php';

            $wc = new \app\controllers\WeatherController();
            $wc->render();
        } elseif ($uri_data[1] == 'create_comment') {
            include_once 'app/controllers/create_comment_controller.php';
            $cc = new \app\controllers\CreateComment();
            $cc->render();
        } elseif ($uri_data[1] == 'comments') {
            #include_once 'app/controllers/comments_controller.php';
            $cc = new \app\controllers\CommentsController();
            $cc->render();
        } elseif ($uri_data[1] == 'exit') {
            $_SESSION = [];
            session_destroy();
            header('Location: /bwt_test/index.php?login');
            exit();
        } elseif (strpos($uri_data[1], '_ijt') !== false) {
            header('Location: /bwt_test/index.php?login');
        }
    }
}
