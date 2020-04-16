<?php
class RegisterController extends Controller{
    function render()
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                $this->view->generate('register_view');
                break;
            case 'POST':
                var_dump($_POST);
        }

    }


}