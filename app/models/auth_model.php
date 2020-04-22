<?php

namespace app\models\Auth;
use app\core\Model as Model;

class AuthModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registerUser($first_name, $second_name, $email, $password, $gender = null, $birth_date = null)
    {
        $sql = 'INSERT INTO users(first_name, second_name, email, password, gender, birth_date) 
                VALUES (:first_name, :second_name, :email, :password, :gender, :birth_date)';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':second_name', $second_name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);

        if (strlen($gender) == 0) {
            $statement->bindValue(':gender', null, PDO::PARAM_INT);
        } else {
            $statement->bindParam(':gender', $birth_date);
        }

        if (strlen($birth_date) == 0) {
            $statement->bindValue(':birth_date', null, PDO::PARAM_INT);
        } else {
            $statement->bindParam(':birth_date', $birth_date);
        }
        $statement->execute();
    }

    public function getUser($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE email=:email AND password=:password';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->execute();
        $user = $statement->fetchAll();

        return $user;
    }
}
