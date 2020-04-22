<?php


namespace app\controllers;
use app\core\Controller as Controller;


class CreateCommentController extends Controller
{
    public function __construct()
    {
        //inherit the parent constructor
        parent::__construct();
    }

    public function render()
    {
        session_start();
        if ($_SESSION['logged_in']) {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    $this->view->generate('create_comment_view');
                    break;
                case 'POST':
                    $check = new \app\Captcha\CaptchaCheck($_POST);
                    if ($check->isCorrect()) {
                        include_once 'app/models/comments_model.php';
                        $auth = new \app\models\CommentsModel\CommentsModel();
                        $auth->addComment(
                            $_SESSION['user_data'][0]['id'],
                            $_POST['name'],
                            $_POST['email'],
                            $_POST['full_comment']
                        );
                        header('Location: /bwt_test/index.php?comments');
                    } else {
                        $this->view->generate('create_comment_view', ['invalid_data'=>'no_captcha']);
                    }
                    break;

            }
        } else {
            header('Location: /bwt_test/index.php?login');
            exit();
        }
    }
}
