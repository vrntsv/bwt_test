<?php

namespace \CommentsModel::class;
use app\core\Model as Model;

class CommentsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addComment($idUser, $inputedName, $inputedEmail, $fullComment)
    {
        $sql = 'INSERT INTO comments(inputed_name, inputed_email, full_comment) 
                VALUES (:inputed_name, :inputed_email, :full_comment)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':inputed_name', $inputedName);
        $statement->bindParam(':inputed_email', $inputedEmail);
        $statement->bindParam(':full_comment', $fullComment);
        $statement->execute();
        $sql = 'SELECT id FROM comments ORDER BY id DESC LIMIT 1';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $idComment = $statement->fetchAll();
        $sql = 'INSERT INTO users_comments(id_user, id_comment) 
                VALUES (:id_user, :id_comment)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id_user', $idUser);
        $statement->bindParam(':id_comment', $idComment[0]['id']);
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
