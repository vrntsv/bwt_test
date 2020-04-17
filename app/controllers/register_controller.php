<?php
class RegisterController extends Controller{
    function __construct()
    {
        //inherit the parent constructor
        parent::__construct();
    }
    function render()
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                $this->view->generate('register_view');
                break;
            case 'POST':
                include_once 'app/models/auth_model.php';
                $auth = new AuthModel();
                $auth->register_user(
                    $_POST['first_name'],
                    $_POST['second_name'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['gender'] ?? null,
                    $_POST['birth_date'] ?? null,
                );
                $this->view->generate('weather_view');
                break;

        }

    }


}