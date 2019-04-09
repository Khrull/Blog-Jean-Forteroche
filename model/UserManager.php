<?php

namespace Forteroche\Blog\Model;

require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUser($email)
    {
        
        $db = $this->dbConnect();
        $users = $db->prepare('SELECT * FROM users WHERE mail= ?' );
        $users->execute(array($email));
        $result = $users->fetch();
        
        return $result;
    }
}