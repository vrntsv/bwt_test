<?php

class RegisterController extends Controller
{
    public function __construct()
    {
        //inherit the parent constructor
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
                    include_once 'app/models/auth_model.php';
                    $auth = new AuthModel();
                    var_dump($_POST);
                    $auth->register_user(
                        $_POST['first_name'],
                        $_POST['second_name'],
                        $_POST['email'],
                        $_POST['password'],
                        $_POST['gender'] ?? null,
                        $_POST['birth_date'] ?? null,
                    );
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_data'] = $auth->get_user($_POST['email'], $_POST['password']);
                    header('Location: /bwt_test/index.php?weather');
                    exit();
                    break;

            }
        } else {
            header('Location: /bwt_test/index.php?weather');
        }
    }
}
