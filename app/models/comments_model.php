<?php

namespace app\models\CommentsModel;
use app\core\Model as Model;

class CommentsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addComment($id_user, $inputed_name, $inputed_email, $full_comment)
    {
        $sql = 'INSERT INTO comments(inputed_name, inputed_email, full_comment) 
                VALUES (:inputed_name, :inputed_email, :full_comment)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':inputed_name', $inputed_name);
        $statement->bindParam(':inputed_email', $inputed_email);
        $statement->bindParam(':full_comment', $full_comment);
        $statement->execute();
        $sql = 'SELECT id FROM comments ORDER BY id DESC LIMIT 1';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $id_comment = $statement->fetchAll();
        $sql = 'INSERT INTO users_comments(id_user, id_comment) 
                VALUES (:id_user, :id_comment)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id_user', $id_user);
        $statement->bindParam(':id_comment', $id_comment[0]['id']);
        $statement->execute();
    }

    public function getComments()
    {
        $sql = 'SELECT * FROM users_comments 
            LEFT JOIN comments on users_comments.id_comment=comments.id 
            LEFT JOIN users on users_comments.id_user=users.id  ORDER BY comments.id  DESC ';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }
}
