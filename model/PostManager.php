<?php

namespace Forteroche\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $resumPosts = $db->query('SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE statut = 1 ORDER BY creation_date DESC LIMIT 0, 3');

        $resumPosts->execute(array());
        $results = $resumPosts->fetchAll();
        return $results;
    }

    public function getAllPosts()
    {
        $db = $this->dbConnect();
        $allPosts = $db->query('SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE statut = 1 ORDER BY creation_date');
        
        $allPosts->execute(array());
        $results = $allPosts->fetchAll();
        return $results;
    }

    public function getAllPostsTemp()
    {
        $db = $this->dbConnect();
        $allPosts = $db->query('SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE statut = 2 ORDER BY creation_date');
        
        $allPosts->execute(array());
        $results = $allPosts->fetchAll();
        return $results;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addPost()
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date, statut) VALUES(?, ?, NOW(), 1)');
        $nouveauChapitre = $newPost->execute(array($_POST['titre'], $_POST['chapter']));
        return $nouveauChapitre;
    }

    public function addPostTemp()
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date, statut) VALUES(?, ?, NOW(), 2)');
        $nouveauChapitre = $newPost->execute(array($_POST['titre'], $_POST['chapter']));
        return $nouveauChapitre;
    }
    
}