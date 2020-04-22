<?php

namespace app\controllers;
use \app\core\Controller as Controller;


class LoginController extends Controller
{
    public function render()
    {
        session_start();
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if ($_SESSION['logged_in']) {
                    header('Location: /bwt_test/index.php?weather');
                    exit();
                } else {
                    $this->view->generate('login_view');
                }
                break;
            case 'POST':
                $am = new \app\models\Auth\AuthModel();
                $user = $am->get_user($_POST['email'], $_POST['password']);
                if (empty($user)) {
                    $this->view->generate('login_view', ['invalid_data'=>true]);
                    break;
                } else {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_data'] = $user;
                    header('Location: /bwt_test/index.php?weather');
                    exit();
                    break;
                }
        }
    }
}
