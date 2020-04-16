<?php
class AuthModels extends Model{
    function register_user($first_name, $second_name, $email, $gender=null, $birth_date=null ){
        $sql = 'INSERT INTO users(first_name, second_name, email, gender, birth_date) 
                VALUES (:first_name, :second_name, :email, :gender, :birth_date)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':second_name', $second_name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':birth_date', $birth_date);
        $statement->execute();
    }
}