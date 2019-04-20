<?php

require_once('controller/backend.php');
require_once('controller/postController.php');
require_once('controller/userController.php');


$action ="";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
try {
        switch ($action) {

                case 'btnSeConnecter': $form = new Forteroche\Blog\Controller\UserController();
                                       $formConnexion = $form -> formLogin();
                break;

                case 'connexion': $connexion = new Forteroche\Blog\Controller\UserController();
                                  $seConnecter= $connexion -> login();
                break;

                case 'deconnexion': $deconnexion = new Forteroche\Blog\Controller\UserController();
                                    $seDeconnecter = $deconnexion -> logout();
                break;

                case 'inscription': $inscription = new Forteroche\Blog\Controller\UserController();
                                    $newInscription = $inscription -> addNewUser();
                break;


                case 'post': $post = new Forteroche\Blog\Controller\PostController();
                             $chapitre = $post -> post();
                break; 
                
                case 'listAllPosts': $chapitres = new Forteroche\Blog\Controller\PostController();
                                     $listChapitres = $chapitres -> listAllPosts();
                break;

                case 'addComment':  $addComment = new Forteroche\Blog\Controller\PostController();
                                    $newComment = $addcomment -> addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                break;

                default: $listPosts = new Forteroche\Blog\Controller\PostController();
                         $accueil = $listPosts -> listPosts();    
            }
        
    }
    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}