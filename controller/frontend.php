<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/AlertManager.php');


function listPosts()
{
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

function formLogin()
{
    $session = new \Forteroche\Blog\Model\AlertManager();
    require('view/frontend/connexionView.php');
}

// Chargement des classes

function login()
{
    $session = new \Forteroche\Blog\Model\AlertManager();
    if (!empty($_POST['email']) && !empty($_POST['password'])) 
    {
        $email=trim($_POST['email']);
        $pass=trim($_POST['password']);
        $userManager = new \Forteroche\Blog\Model\UserManager();
        $user = $userManager->getUser($email);

        
        if ($user===false)
        {
            
            $session->setflash('identifiant ou mot de passe erroné.','dnager');
            header('Location: index.php?action=btnSeConnecter');
            
        }
        else
        {
            if ($pass!==$user['pass'])
            {
                
                $session->setflash('identifiant ou mot de passe erroné.','danger');
                header('Location: index.php?action=btnSeConnecter');
            }
            else
            {
                $session->setflash('bonjour','success');
                header('Location: index.php?action=btnSeConnecter');
               
            }
        }
    }    
}

function addNewUser()
{
    if(isset($_POST["email"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["password"]) && isset($_POST["conf_password"]))
    {
        if($_POST["password"] == $_POST["conf_password"])
        {
            
            $userManager = new \Forteroche\Blog\Model\UserManager();
            $newUser = $userManager->newUser();
        }
        else 
        {
            header('Location: index.php?action=btnSeConnecter');
        }
    }       
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