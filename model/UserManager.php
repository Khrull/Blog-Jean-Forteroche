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

    public function newUser()
    {
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $newUser = $db->prepare('INSERT INTO users (mail, nom, prenom, pass, date_inscription, id_groupe) VALUES($_POST[email], $_POST[nom], $_POST[prenom], $_POST[password], NOW(), 2)');
        $user = $newUser->execute(array());
        return $user;
        
		exit();
    }
}