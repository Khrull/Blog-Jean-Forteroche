<?php
session_start();

require('controller/postController.php');
require('controller/userController.php');
require('vendor/autoload.php');


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

                case 'postTemp': $post = new Forteroche\Blog\Controller\PostController();
                $post -> postTemp();
                break;
                
                case 'listAllPosts': $chapitres = new Forteroche\Blog\Controller\PostController();
                $chapitres -> listAllPosts();
                break;

                case 'listAllPostsTemp': $chapitres = new Forteroche\Blog\Controller\PostController();
                $chapitres -> listAllPostsTemp();
                break;

                case 'addComment':  $addComment = new Forteroche\Blog\Controller\PostController();
                $addComment -> addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                break;

                case 'ecriture': $addpost = new Forteroche\Blog\Controller\PostController();
                $addpost -> formPost();
                break;

                case 'publier': $publier = new Forteroche\Blog\Controller\PostController();
                $publier -> addChapter();
                break;

                case 'depublier': $depublier = new Forteroche\Blog\Controller\PostController();
                $depublier -> depublier();
                break;

                case 'republier': $republier = new Forteroche\Blog\Controller\PostController();
                $republier -> republier();
                break;

                case 'modBrouillon': $modBrouillon = new Forteroche\Blog\Controller\PostController();
                $modBrouillon -> modBrouillon();
                break;

                case 'brouillon': $publier = new Forteroche\Blog\Controller\PostController();
                $publier -> addChapterTemp();
                break;

                case 'supprimer': $supprimer = new Forteroche\Blog\Controller\PostController();
                $supprimer -> suppression();
                break;

                case 'modification': $post = new Forteroche\Blog\Controller\PostController();
                $post -> modificationPost();
                break;

                case 'signaler': $signalement = new \Forteroche\Blog\Controller\PostController();
                $signalement -> signalComment();
                break;

                case 'modComment': $modCom = new \Forteroche\Blog\Controller\PostController();
                $modCom -> modifComment($_GET['id'], $_POST['comment']);
                break;

                case 'supCom': $signalement = new \Forteroche\Blog\Controller\PostController();
                $signalement -> delCom();
                break;

                case 'moderation': $moderation = new \Forteroche\Blog\Controller\PostController();
                $moderation -> moderation();
                break;

                case 'modifier': $modification = new \Forteroche\Blog\Controller\PostController();
                $modification -> modifier();
                break;

                default: $listPosts = new Forteroche\Blog\Controller\PostController();
                $listPosts -> listPosts();    
            }
        
    }
    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}