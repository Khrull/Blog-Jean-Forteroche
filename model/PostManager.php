<?php

namespace Forteroche\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    //Renvoie les 3 derniers posts
    public function getPosts()
    {
        $db = $this->dbConnect();
        $resumPosts = $db->query('SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE statut = 1 ORDER BY creation_date DESC LIMIT 0, 3');

        $resumPosts->execute(array());
        $results = $resumPosts->fetchAll();
        return $results;
    }

    //Renvoie tous les posts
    public function getAllPosts()
    {
        $db = $this->dbConnect();
        $allPosts = $db->query('SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE statut = 1 ORDER BY creation_date');
        
        $allPosts->execute(array());
        $results = $allPosts->fetchAll();
        return $results;
    }

    //Renvoie tous posts non publiers
    public function getAllPostsTemp()
    {
        $db = $this->dbConnect();
        $allPosts = $db->query('SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE statut = 2 ORDER BY creation_date');
        
        $allPosts->execute(array());
        $results = $allPosts->fetchAll();
        return $results;
    }

    //Renvoie le post selectionné
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    //Ajoute un post publier a la base de donnée
    public function addPost()
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date, statut) VALUES(?, ?, NOW(), 1)');
        $nouveauChapitre = $newPost->execute(array($_POST['titre'], $_POST['chapter']));
        return $nouveauChapitre;
    }

    //modifie et publie un chapitre
    public function rePublier($postId, $postTitle, $postContent)
    {
        $db = $this->dbConnect();
        $modPost = $db->prepare('UPDATE posts SET title = ?, content = ?, statut = 1, creation_date = NOW() WHERE id = ?');
        $modifPost = $modPost->execute(array($postTitle, $postContent, $postId));
    return $modifPost;
    }

    //Passe un chapitre de publier a brouillon
    public function unpublish($postId)
    {
        $db = $this->dbConnect();
        $unpublishPost = $db->prepare('UPDATE posts SET statut = 2 WHERE id =?');
        $depublie = $unpublishPost->execute(array($postId));
        return $depublie;
            
    }

    //Ajoute un post non publier a la base de donné
    public function addPostTemp()
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date, statut) VALUES(?, ?, NOW(), 2)');
        $nouveauChapitre = $newPost->execute(array($_POST['titre'], $_POST['chapter']));
        return $nouveauChapitre;
    }

    //modifie un chapitre brouillon
    public function modifBrouillon($postId, $postTitle, $postContent)
    {
        $db = $this->dbConnect();
        $modPost = $db->prepare('UPDATE posts SET title = ?, content = ?, statut = 2 WHERE id = ?');
        $modifPost = $modPost->execute(array($postTitle, $postContent, $postId));
        return $modifPost;
    }

    // Efface un article
    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $deletePost = $db->prepare('DELETE FROM posts WHERE id = ?');
        $deletePost->execute(array($postId));
      
    }
    
}