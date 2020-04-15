<?php
class LoginController extends Controller{
    function render()
    {
        if ($_SESSION['is_logged_in']) {
            $this->view->generate('login_view');
        }else{
            $this->view->generate('register_view');

        }
    }
}