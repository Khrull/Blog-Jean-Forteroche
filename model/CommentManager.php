<?php

namespace Forteroche\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signale, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND signale != 4 ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        $results = $comments->fetchAll();
        return $results;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function getSignalComments()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE signale = 2 ORDER BY comment_date DESC');
        $comments->execute(array());
        $results = $comments->fetchAll();
        return $results;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, signale) VALUES(?, ?, ?, NOW(), 1)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function setSignal($comId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET signale = 2 WHERE id = ?');
        $signalCom = $comments->execute(array($comId));
        return $signalCom;
        
    }

    public function modComment($comId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET comment = ?, signale = 3 WHERE id = ?');
        $modCom = $comments->execute(array($comment, $comId));
        return $modCom;
    }

    public function delComment($comId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET signale = 4 WHERE id = ?');
        $delCom = $comments->execute(array($comId));
        return $delCom;
        
    }


    public function setSignalOk()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET signale = 3 WHERE post_id = ?');

    }
}
