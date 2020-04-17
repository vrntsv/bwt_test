<?php
class CommentsModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function add_comment(){
        $sql = 'INSERT INTO comments(ыshore, second_name, email, password, gender, birth_date) 
                VALUES (:first_name, :second_name, :email, :password, :gender, :birth_date)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':second_name', $second_name);
    }

    function get_comments(){

    }

}