<?php
namespace app\core;


class Model
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=bwt_test', 'admin', 'admin');
    }

    public function get_data()
    {
        // todo
    }
}
