<?php
session_start();
require('controller/postController.php');
require('controller/userController.php');


$action ="";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
try {
        switch ($action) {

                case 'btnSeConnecter': $form = new Forteroche\Blog\Controller\UserController();
                $form -> formLogin();
                break;

                case 'connexion': $connexion = new Forteroche\Blog\Controller\UserController();
                $connexion -> login();
                break;

                case 'deconnexion': $deconnexion = new Forteroche\Blog\Controller\UserController();
                $deconnexion -> logout();
                break;

                case 'inscription': $inscription = new Forteroche\Blog\Controller\UserController();
                $inscription -> addNewUser();
                break;


                case 'post': $post = new Forteroche\Blog\Controller\PostController();
                $post -> post();
                break; 
                
                case 'listAllPosts': $chapitres = new Forteroche\Blog\Controller\PostController();
                $chapitres -> listAllPosts();
                break;

                case 'addComment':  $addComment = new Forteroche\Blog\Controller\PostController();
                $addComment -> addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                break;

                default: $listPosts = new Forteroche\Blog\Controller\PostController();
                $listPosts -> listPosts();    
            }
        
    }
    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}