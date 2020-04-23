<?php

namespace \RegisterController::class;
use app\core\Controller as Controller;


class RegisterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        session_start();
        if (!$_SESSION['logged_in']) {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->view->generate('register_view');
                    break;
                case 'POST':
                    $auth = new \AuthModel();
                    $auth->registerUser(
                        $_POST['first_name'],
                        $_POST['second_name'],
                        $_POST['email'],
                        $_POST['password'],
                        $_POST['gender'] ?? null,
                        $_POST['birth_date'] ?? null,
                    );
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_data'] = $auth->getUser($_POST['email'], $_POST['password']);
                    header('Location: /bwt_test/index.php?weather');
                    exit();
                    break;

            }
        } else {
            header('Location: /bwt_test/index.php?weather');
        }
    }
}
