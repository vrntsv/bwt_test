<?php

class CreateComment extends Controller
{
    function __construct()
    {
        //inherit the parent constructor
        parent::__construct();
    }


    function render()
    {
        session_start();
        if($_SESSION['logged_in']) {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->view->generate('create_comment_view');
                    break;
                case 'POST':
                    include_once 'app/CaptchaCheck.php';
                    $check = new CaptchaCheck($_POST);
                    if ($check->is_correct()){
                        include_once 'app/models/comments_model.php';
                        $auth = new CommentsModel();
                        #echo $_SESSION['user_data'][0]['id'];
                        $auth->add_comment(
                            $_SESSION['user_data'][0]['id'],
                            $_POST['name'],
                            $_POST['email'],
                            $_POST['full_comment']
                        );
                        header('Location: /bwt_test/index.php?comments');
                    }else{
                        $this->view->generate('create_comment_view', array('invalid_data'=>'no_captcha'));

                    }
                    break;

            }
        }else{
            header('Location: /bwt_test/index.php?login');
            exit();
        }

    }


}
