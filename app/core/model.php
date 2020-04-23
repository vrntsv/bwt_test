<?php
namespace app\core;
include_once 'app/core/DB.php';

class Model
{
    public $DB;
    public $pdo;

    public function __construct()
    {
        $this->DB = \DB::getInstance();
        $this->pdo = $this->DB->getPDO();

    }

}
