<?php
namespace Forteroche\Blog\Controller;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/AlertManager.php');

class PostController
{
    function formPost()
    {
        $session = new \Forteroche\Blog\Model\AlertManager();
        require('view/backend/adminPostView.php');
    }

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

    function listAllPostsTemp()
    {
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $allPosts = $postManager->getAllPostsTemp();

        require('view/backend/listPostsTempView.php');
    }



    function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $session = new \Forteroche\Blog\Model\AlertManager();
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

    function postTemp()
    {
        if (isset($_GET['id']) > 0) 
        {

            $postManager = new \Forteroche\Blog\Model\PostManager();
            $post = $postManager->getPost($_GET['id']);
            
        }

        else 
        {
        throw new Exception('Aucun identifiant de chapitre envoyé');
        }

        require('view/backend/postTempView.php');
    }

    function addChapter()
    {
        if (!empty($_POST['titre']) && !empty($_POST['chapter']))
        {
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $nouveauChapitre = $postManager->addPost();
        header('Location: index.php?action=listAllPosts');
        }

    }

    function depublier()
    {   if (isset($_GET['id']) > 0)
        {
            $depublier = new \Forteroche\Blog\Model\PostManager();
            $depubication = $depublier->unpublish();
        }
        
    }

    function addChapterTemp()
    {
        if (!empty($_POST['titre']) && !empty($_POST['chapter']))
        {
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $nouveauChapitre = $postManager->addPostTemp();
        header('Location: index.php?action=listAllPostsTemp');
        }

    }

    function suppression($deletePost)
    {
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $postManager->deletePost($deletePost);
        require('view/frontend/listPostsView.php');
    }

    function modification()
    {
        if (isset($_GET['id']) > 0)
        {
            $postManager = new \Forteroche\Blog\Model\PostManager();
            $post = $postManager->getPost($_GET['id']);
        }
       
        require('view/backend/modifPostView.php');
    }

    function addComment($postId, $author, $comment)
    {
        $session = new \Forteroche\Blog\Model\AlertManager();
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            if (!empty($_POST['comment'])) 
            { 

                $commentManager = new \Forteroche\Blog\Model\CommentManager();
                $affectedLines = $commentManager->postComment($postId, $author, $comment);
                
                header('Location: index.php?action=post&id=' . $postId);
                                      
            }
           else
           {
            $session->setflash('le champ de commentaire est vide','danger');
            header('Location: index.php?action=post&id=' . $postId);
           }
        }                               

    }

    function signalComment()
    {
        if (isset($_GET['id']) > 0) 
        {

            $signalement = new \Forteroche\Blog\Model\commentManager();
            $signalComment = $signalement->setSignal($_GET['id']);
            
        }

        else 
        {
        throw new Exception('Aucun identifiant de chapitre envoyé');
        }

        require('view/frontend/postView.php');
    }

    function moderation()
    {
        $moderation = new \Forteroche\Blog\Model\commentManager();
        $comments = $moderation->getSignalComments();
         

        require('view/backend/moderationView.php');
    }

    function modifier()
    {
        $modComment =new \Forteroche\Blog\Model\commentManager();
        $comment = $modComment->getComment();
        require('view/backend/modCommentView.php');
    }
}    