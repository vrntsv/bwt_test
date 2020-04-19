<?php
include_once 'app/core/model.php';

class AuthModel extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function register_user($first_name, $second_name, $email, $password, $gender=null, $birth_date=null ){
        $sql = 'INSERT INTO users(first_name, second_name, email, password, gender, birth_date) 
                VALUES (:first_name, :second_name, :email, :password, :gender, :birth_date)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':second_name', $second_name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':birth_date', $birth_date);
        $statement->execute();
    }

    function get_user($email, $password){
        $sql ="SELECT * FROM users WHERE email=:email AND password=:password";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->execute();
        $user = $statement->fetchAll();


        return $user;
    }
}