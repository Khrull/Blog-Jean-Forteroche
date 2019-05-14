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
        $session = new \Forteroche\Blog\Model\AlertManager();
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $allPosts = $postManager->getAllPosts();

        require('view/frontend/listPostsView.php');
    }

    function listAllPostsTemp()
    {
        $session = new \Forteroche\Blog\Model\AlertManager();
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
            $session = new \Forteroche\Blog\Model\AlertManager();
            $session->setflash('Le chapitre a bien été publier','success');
            header('Location: index.php?action=listAllPosts');
        }
        else
        {
            $session = new \Forteroche\Blog\Model\AlertManager();
            $session->setflash('l\'un des champs est vide','danger');
            header('Location: index.php?action=ecriture'); 
        }
            
    }

    function depublier()
    {   
        if (isset($_GET['id'])) 
        {

            $unpublish = new \Forteroche\Blog\Model\postManager();
            $depuPost = $unpublish->unpublish($_GET['id']);
            
        }

        else 
        {
        throw new Exception('Aucun identifiant de chapitre envoyé');
        }
        $session = new \Forteroche\Blog\Model\AlertManager();
        $session->setflash('le chapitre a bien été dépublié','success');
        header('Location: index.php?action=listAllPostsTemp');        
    }

    function addChapterTemp()
    {
        if (!empty($_POST['titre']) && !empty($_POST['chapter']))
        {
            $postManager = new \Forteroche\Blog\Model\PostManager();
            $nouveauChapitre = $postManager->addPostTemp();
            $session = new \Forteroche\Blog\Model\AlertManager();
            $session->setflash('Le chapitre a bien été ajouter a la liste temporaire','success');
            header('Location: index.php?action=listAllPostsTemp');
        
        }
        else
        {
            $session = new \Forteroche\Blog\Model\AlertManager();
            $session->setflash('l\'un des champs est vide','danger');
            header('Location: index.php?action=ecriture'); 
        }
        

    }

    function republier()
    {
        if (isset($_GET['id']))
        {
            $modBrouillon = new \Forteroche\Blog\Model\PostManager();
            $modifBrouillon = $modBrouillon->rePublier($_GET['id'], $_POST['titre'], $_POST['chapter']);
        }
        else
        {
            throw new Exception('Aucun identifiant de chapitre envoyé');    
        }
        $session = new \Forteroche\Blog\Model\AlertManager();
        $session->setflash('le chapitre a bien été modifié et publier','success');
        header('location: index.php?action=listAllPosts');
          
    }

    function modBrouillon()
    {
        if (isset($_GET['id']))
        {
            $modBrouillon = new \Forteroche\Blog\Model\PostManager();
            $modifBrouillon = $modBrouillon->modifBrouillon($_GET['id'], $_POST['titre'], $_POST['chapter']);
        }
        else
        {
            throw new Exception('Aucun identifiant de chapitre envoyé');    
        }
        $session = new \Forteroche\Blog\Model\AlertManager();
        $session->setflash('le brouillon a bien été modifié','success');
        header('location: index.php?action=listAllPostsTemp');
          
    }

    function suppression()
    {
        if (isset ($_GET['id']))
        {
            $postManager = new \Forteroche\Blog\Model\PostManager();
            $deletePost = $postManager->deletePost($_GET['id']);
        }
        else 
        {
        throw new Exception('Aucun identifiant de chapitre envoyé');
        }    
        $session = new \Forteroche\Blog\Model\AlertManager();
        $session->setflash('Le chapitre a bien été supprimé','success');
        header('Location: index.php?action=listAllPostsTemp');
    }

    function modificationPost()
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
        if (isset($_GET['id'])) 
        {

            $signalement = new \Forteroche\Blog\Model\commentManager();
            $signalComment = $signalement->setSignal($_GET['id']);
            
        }

        else 
        {
        throw new Exception('Aucun identifiant de chapitre envoyé');
        }
        $session = new \Forteroche\Blog\Model\AlertManager();
        $session->setflash('le commentaire a bien été signalé','success');
        header('Location: index.php?action=post&id=' . $_GET['post_id']);
    }

    function delCom()
    {
        if (isset($_GET['id'])) 
        {

            $suppCom = new \Forteroche\Blog\Model\commentManager();
            $supprimer = $suppCom->delComment($_GET['id']);
            
        }

        else 
        {
        throw new Exception('Aucun identifiant de chapitre envoyé');
        }
        $session = new \Forteroche\Blog\Model\AlertManager();
        $session->setflash('le commentaire a bien été supprimé','success');
        header('location: index.php?action=moderation');
    }

    function modifComment()
    {
        if (isset($_GET['id'])) 
        {

            $modComment = new \Forteroche\Blog\Model\commentManager();
            $modifComment = $modComment->modComment($_GET['id'], $_POST['comment']);
            
        }

        else 
        {
        throw new Exception('Aucun identifiant de chapitre envoyé');
        }
        $session = new \Forteroche\Blog\Model\AlertManager();
        $session->setflash('le commentaire a bien été modéré','success');
        header('location: index.php?action=moderation');
    }

    function moderation()
    {
        $moderation = new \Forteroche\Blog\Model\commentManager();
        $session = new \Forteroche\Blog\Model\AlertManager();
        $comments = $moderation->getSignalComments();
        

        require('view/backend/moderationView.php');
    }

    function modifier()
    {
        if (isset($_GET['id'])) 
        
        {
            $commentId = $_GET['id'];
            $modComment =new \Forteroche\Blog\Model\commentManager();
            $comment = $modComment->getComment($commentId);
            
            require('view/backend/modCommentView.php');
        }
    }
}    