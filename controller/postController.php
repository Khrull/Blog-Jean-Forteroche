<?php
namespace Controller;

// Chargement des classes
use Model\AlertManager;
use Model\PostManager;
use Model\CommentManager;


class PostController
{
    function formPost()
    {
        $session = new AlertManager();
        require('view/backend/adminPostView.php');
    }

    function listPosts()
    {
        $session = new AlertManager();
        $postManager = new PostManager();
        $resumPosts = $postManager->getPosts();

        require('view/frontend/accueil.php');
    }

    function listAllPosts()
    {
        $session = new AlertManager();
        $postManager = new PostManager();
        $allPosts = $postManager->getAllPosts();

        require('view/frontend/listPostsView.php');
    }

    function listAllPostsTemp()
    {
        $session = new AlertManager();
        $postManager = new PostManager();
        $allPosts = $postManager->getAllPostsTemp();

        require('view/backend/listPostsTempView.php');
    }



    function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $session = new AlertManager();
            $postManager = new PostManager();
            $commentManager = new CommentManager();
           
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

            $postManager = new PostManager();
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
            $postManager = new PostManager();
            $nouveauChapitre = $postManager->addPost();
            $session = new AlertManager();
            $session->setflash('Le chapitre a bien été publier','success');
            header('Location: index.php?action=listAllPosts');
        }
        else
        {
            $session = new AlertManager();
            $session->setflash('l\'un des champs est vide','danger');
            header('Location: index.php?action=ecriture'); 
        }
            
    }

    function depublier()
    {   
        if (isset($_GET['id'])) 
        {

            $unpublish = new PostManager();
            $depuPost = $unpublish->unpublish($_GET['id']);
            
        }

        else 
        {
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
        $session = new AlertManager();
        $session->setflash('le chapitre a bien été dépublié','success');
        header('Location: index.php?action=listAllPostsTemp');        
    }

    function addChapterTemp()
    {
        if (!empty($_POST['titre']) && !empty($_POST['chapter']))
        {
            $postManager = new PostManager();
            $nouveauChapitre = $postManager->addPostTemp();
            $session = new AlertManager();
            $session->setflash('Le chapitre a bien été ajouter a la liste temporaire','success');
            header('Location: index.php?action=listAllPostsTemp');
        
        }
        else
        {
            $session = new AlertManager();
            $session->setflash('l\'un des champs est vide','danger');
            header('Location: index.php?action=ecriture'); 
        }
        

    }

    function republier()
    {
        if (isset($_GET['id']))
        {
            $modBrouillon = new PostManager();
            $modifBrouillon = $modBrouillon->rePublier($_GET['id'], $_POST['titre'], $_POST['chapter']);
        }
        else
        {
            throw new Exception('Aucun identifiant de chapitre envoyé');    
        }
        $session = new AlertManager();
        $session->setflash('le chapitre a bien été modifié et publier','success');
        header('location: index.php?action=listAllPosts');
          
    }

    function modBrouillon()
    {
        if (isset($_GET['id']))
        {
            $modBrouillon = new PostManager();
            $modifBrouillon = $modBrouillon->modifBrouillon($_GET['id'], $_POST['titre'], $_POST['chapter']);
        }
        else
        {
            throw new Exception('Aucun identifiant de chapitre envoyé');    
        }
        $session = new AlertManager();
        $session->setflash('le brouillon a bien été modifié','success');
        header('location: index.php?action=listAllPostsTemp');
          
    }

    function suppression()
    {
        if (isset ($_GET['id']))
        {
            $postManager = new PostManager();
            $deletePost = $postManager->deletePost($_GET['id']);
        }
        else 
        {
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }    
        $session = new AlertManager();
        $session->setflash('Le chapitre a bien été supprimé','success');
        header('Location: index.php?action=listAllPostsTemp');
    }

    function modificationPost()
    {
        if (isset($_GET['id']) > 0)
        {
            $postManager = new PostManager();
            $post = $postManager->getPost($_GET['id']);
        }
       
        require('view/backend/modifPostView.php');
    }

    function addComment($postId, $author, $comment)
    {
        $session = new AlertManager();
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            if (!empty($_POST['comment'])) 
            { 

                $commentManager = new CommentManager();
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

            $signalement = new CommentManager();
            $signalComment = $signalement->setSignal($_GET['id']);
            
        }

        else 
        {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
        $session = new AlertManager();
        $session->setflash('le commentaire a bien été signalé','success');
        header('Location: index.php?action=post&id=' . $_GET['post_id']);
    }

    function delCom()
    {
        if (isset($_GET['id'])) 
        {

            $suppCom = new CommentManager();
            $supprimer = $suppCom->delComment($_GET['id']);
            
        }

        else 
        {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
        $session = new AlertManager();
        $session->setflash('le commentaire a bien été supprimé','success');
        header('location: index.php?action=moderation');
    }

    function modifComment()
    {
        if (isset($_GET['id'])) 
        {

            $modComment = new CommentManager();
            $modifComment = $modComment->modComment($_POST['comment'], $_GET['id']);
            
        }

        else 
        {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
        $session = new AlertManager();
        $session->setflash('le commentaire a bien été modéré','success');
        header('location: index.php?action=moderation');
    }

    function moderation()
    {
        $moderation = new CommentManager();
        $session = new AlertManager();
        $comments = $moderation->getSignalComments();
        

        require('view/backend/moderationView.php');
    }

    function modifier()
    {
        if (isset($_GET['id']))
        {
            $commentId = $_GET['id'];
            $modifierComment = new CommentManager();
            $comment = $modifierComment->getComment($commentId);
            
            require('view/backend/modCommentView.php');
        }
        else
        {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
    }
}    