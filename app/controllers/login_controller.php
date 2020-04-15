<?php
class LoginController extends Controller{
    function render()
    {
        $this->view->generate('login_view');
    }
}