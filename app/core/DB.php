<?php

class DB
{
    private static $instance = null;
    private static $DB_HOST  = 'localhost';
    private static $DB_NAME  = 'bwt_test';
    private static $DB_USER  = 'admin';
    private static $DB_PASS  = 'admin';
    private $pdo = null;

    public static function getInstance()
    {
        if (!self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }



    private function __clone(){}


    private function __construct()
    {
        $this->pdo = new PDO(
                'mysql:host=' . self::$DB_HOST . ';dbname=' . self::$DB_NAME,
                self::$DB_USER,
                self::$DB_PASS
        );
    }

    public function getPDO()
    {
        return $this->pdo;
    }


}