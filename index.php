<?php

require_once('controller/frontend.php');
require_once('controller/backend.php');


$action ="";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
try {
        switch ($action) {

                case 'btnSeConnecter': formLogin();
                break;

                case 'connexion': login();
                break;

                case 'inscription': addNewUser();
                break;


                case 'post': post();
                break; 
                
                case 'listAllPosts': listAllPosts();
                break;

                case 'addComment': addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                break;

                default: listPosts();    
            }
        
    }
    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}