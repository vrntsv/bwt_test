<?php

namespace \CommentsController::class;
use app\core\Controller as Controller;

class CommentsController extends Controller
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
            $cm = new \CommentsModel();
            $comments = $cm->getComments();
            $this->view->generate('comments_view', $comments);
        }else{
            header('Location: /bwt_test/index.php?login');
            exit();
        }
    }




}
