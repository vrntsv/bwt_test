<?php

namespace app\core;


class View
{
    public function generate($view_name, $data = null)
    {
        include_once 'app/views/'.$view_name.'.php';
    }
}
