<?php

class LoginController extends Controller{
    function render()
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                $this->view->generate('login_view');
                break;
            case 'POST':
                include_once 'app/models/auth_model.php';
                $am = new AuthModel();
                var_dump($_POST);
                if (!$am->is_registered($_POST['email'], $_POST['password'])){
                    var_dump($_POST);
                    echo 'invalid data';
                    $this->view->generate('login_view', array('invalid_data'=>true));
                    break;
                }else{
                    echo 'all ok';
                    $_SESSION['logged_in'] = true;
                    var_dump($_SESSION);
                    header('Location: http://localhost:63343/bwt_test/index.php?weather');
                    break;
                }
        }
    }
}