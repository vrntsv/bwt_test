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

        }
    }
}