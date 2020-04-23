<?php

namespace \Router::class;


class Router
{
    public static function run()
    {
        $uri_data = explode('?', $_SERVER['REQUEST_URI']);
        session_start();
        if ($uri_data[1] == 'login') {
            $lc = new \LoginController();
            $lc->render();
        } elseif ($uri_data[1] == 'register') {
            $rc = new \RegisterController();
            $rc->render();
        } elseif ($uri_data[1] == 'weather') {
            $wc = new \WeatherController();
            $wc->render();
        } elseif ($uri_data[1] == 'create_comment') {
            $cc = new \CreateCommentController();
            $cc->render();
        } elseif ($uri_data[1] == 'comments') {
            $cc = new \CommentsController();
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
