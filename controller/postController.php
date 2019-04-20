<?php
namespace Forteroche\Blog\Controller;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/AlertManager.php');

class PostController
{

    function listPosts()
    {
        $session = new \Forteroche\Blog\Model\AlertManager();
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $resumPosts = $postManager->getPosts();

        require('view/frontend/accueil.php');
    }

    function listAllPosts()
    {
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $allPosts = $postManager->getAllPosts();

        require('view/frontend/listPostsView.php');
    }



    function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {

            $postManager = new \Forteroche\Blog\Model\PostManager();
            $commentManager = new \Forteroche\Blog\Model\CommentManager();

            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
        }

        else 
        {
        throw new Exception('Aucun identifiant de chapitre envoyé');
        }

        require('view/frontend/postView.php');
    }

    function addComment($postId, $author, $comment)
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
            { 

                $commentManager = new \Forteroche\Blog\Model\CommentManager();
                $affectedLines = $commentManager->postComment($postId, $author, $comment);
                
                if ($affectedLines === false) 
                {
                    throw new Exception('Impossible d\'ajouter le commentaire !');
                }
                else 
                {
                    header('Location: index.php?action=post&id=' . $postId);
                }                               
            }
            else 
            {
                throw new Exception('l\'un des champs est vide');
            }
        }                               
        else 
        {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
}    