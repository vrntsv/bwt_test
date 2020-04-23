<?php

namespace \AuthModel::class;
use app\core\Model as Model;

class AuthModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registerUser($firstName, $secondName, $email, $password, $gender = null, $birthDate = null)
    {
        $sql = 'INSERT INTO users(first_name, second_name, email, password, gender, birth_date) 
                    VALUES (:first_name, :second_name, :email, :password, :gender, :birth_date)';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':first_name', $firstName);
        $statement->bindParam(':second_name', $secondName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);

        if (strlen($gender) == 0) {
            $statement->bindValue(':gender', null, PDO::PARAM_INT);
        } else {
            $statement->bindParam(':gender', $birthDate);
        }

        if (strlen($birthDate) == 0) {
            $statement->bindValue(':birth_date', null, PDO::PARAM_INT);
        } else {
            $statement->bindParam(':birth_date', $birthDate);
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
        return $statement->fetchAll();
    }
}
