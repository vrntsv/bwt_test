<?php

class Model
{
    public $pdo;

    function __construct()
    {
        $pdo = new PDO('mysql:host=local;dbname=bwt_test', 'admin', 'admin');
    }

    public function get_data()
    {
        // todo
    }
}