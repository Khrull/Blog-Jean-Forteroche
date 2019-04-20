<?php
namespace Forteroche\Blog\Controller;

// Chargement des classes
require_once('model/UserManager.php');
require_once('model/AlertManager.php');

class UserController
{
    function formLogin()
    {
        $session = new \Forteroche\Blog\Model\AlertManager();
        require('view/frontend/connexionView.php');
    }


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
                
                $session->setflash('identifiant ou mot de passe erroné.','danger');
                header('Location: index.php?action=btnSeConnecter');
                
            }
            else
            {
                if (password_verify($pass, $user['pass']))
                {
                    $_SESSION['utilisateur'] = $user['prenom'];
                    $session->setflash('bonjour', 'success');
                    header('Location: index.php');
                    
                }
                else
                {
                    $session->setflash('identifiant ou mot de passe erroné.','danger');
                    header('Location: index.php?action=btnSeConnecter');
                
                }
            }
        }    
    }

    function logout()
    {
        session_unset ();
        session_destroy();
        header('location: index.php?action=btnSeConnecter');
    }

    function addNewUser()
    {
        $session = new \Forteroche\Blog\Model\AlertManager();
        if(isset($_POST["email"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["password"]) && isset($_POST["conf_password"]))
        {
            if($_POST["password"] == $_POST["conf_password"])
            {
                
                $userManager = new \Forteroche\Blog\Model\UserManager();
                $newUser = $userManager->newUser();
                header('Location: index.php?action=btnSeConnecter');
                $session->setflash('Inscription réussie, veuillez vous connecter.','success');
            }
            else 
            {
                header('Location: index.php?action=btnSeConnecter');
            }
        }       
    }
}    