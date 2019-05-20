<?php
namespace Controller;

// Chargement des classes
use Model\AlertManager;
use Model\UserManager;

class UserController
{
    function formLogin()
    {
        $session = new AlertManager();
        require('view/frontend/connexionView.php');
    }


    function login()
    {
        $session = new AlertManager();
        if (!empty($_POST['email']) && !empty($_POST['password'])) 
        {
            $email=trim($_POST['email']);
            $pass=trim($_POST['password']);
            $userManager = new UserManager();
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
                    $_SESSION['idUtilisateur'] = $user['id'];
                    $_SESSION['grpUtilisateur'] = $user['id_groupe'];
                    $session->setflash("bonjour, ".$user['prenom'], 'success');
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
        $session = new AlertManager();
        if(isset($_POST["email"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["password"]) && isset($_POST["conf_password"]))
        {
            if(filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL))
            {
                $email=trim($_POST['email']);
                $userManager = new UserManager();
                $user = $userManager->getUser($email);
                if(trim($_POST["email"])!=$user['mail'])
                {
                    if($_POST["password"] == $_POST["conf_password"])
                    {
                        
                        $userManager = new UserManager();
                        $newUser = $userManager->newUser();
                        header('Location: index.php?action=btnSeConnecter');
                        $session->setflash('Inscription réussie, veuillez vous connecter.','success');
                    }
                    else 
                    {
                        header('Location: index.php?action=btnSeConnecter');
                        $session->setflash('Les 2 mots de passe sont différents!','danger');
                    }
                }
                else
                {
                    header('Location: index.php?action=btnSeConnecter');
                    $session->setflash('cette adresse mail est déja utilisée!','danger');
                }    
            }
            else
            {
                header('Location: index.php?action=btnSeConnecter');
                $session->setflash('Le format de l\'adresse mail est incorrect !','danger');
            }
        }
        else
        {
            header('Location: index.php?action=btnSeConnecter');
            $session->setflash('Tous les champs doivent être remplis','danger');
        }       
    }
}    