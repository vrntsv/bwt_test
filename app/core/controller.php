<?php

namespace app\core;

class Controller
{
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render()
    {
    }
}
