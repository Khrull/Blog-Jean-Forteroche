<?php
namespace Controller;

// Chargement des classes
use Model\AlertManager;


class MailController
{
    function formContact()
        {
            $session = new AlertManager();
            require('view/frontend/contactView.php');
        }

        function mailTo()
        {
            $session = new AlertManager();
            if($_POST['message'])
            {
                $to = 'fcollignon57@gmail.com';
                $subject = $_POST['prenom'] . ' ' . $_POST['nom'] . ' vous envoie :';
                $message = $_POST['message'];
                $headers = array(
                    'From' => 'BSPAlaska',
                    'Reply-To' => $_POST['mail'],
                    
                );
                mail($to, $subject, $message, $headers);
                $session->setflash('Votre message a bien été envoyé', 'success');
                header('Location: index.php');
            }
            else
            {
                header('Location: index.php?action=meContacter');
                $session->setFlash('Votre message est vide', 'danger');
            }    
        }
}        