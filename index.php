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

                case 'btnSeConnecter': $form = new \Controller\UserController();
                $form -> formLogin();
                break;

                case 'connexion': $connexion = new \Controller\UserController();
                $connexion -> login();
                break;

                case 'deconnexion': $deconnexion = new \Controller\UserController();
                $deconnexion -> logout();
                break;

                case 'inscription': $inscription = new \Controller\UserController();
                $inscription -> addNewUser();
                break;

                case 'post': $post = new \Controller\PostController();
                $post -> post();
                break; 

                case 'postTemp': $post = new \Controller\PostController();
                $post -> postTemp();
                break;
                
                case 'listAllPosts': $chapitres = new \Controller\PostController();
                $chapitres -> listAllPosts();
                break;

                case 'listAllPostsTemp': $chapitres = new \Controller\PostController();
                $chapitres -> listAllPostsTemp();
                break;

                case 'addComment':  $addComment = new \Controller\PostController();
                $addComment -> addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                break;

                case 'ecriture': $addpost = new \Controller\PostController();
                $addpost -> formPost();
                break;

                case 'publier': $publier = new \Controller\PostController();
                $publier -> addChapter();
                break;

                case 'depublier': $depublier = new \Controller\PostController();
                $depublier -> depublier();
                break;

                case 'republier': $republier = new \Controller\PostController();
                $republier -> republier();
                break;

                case 'modBrouillon': $modBrouillon = new \Controller\PostController();
                $modBrouillon -> modBrouillon();
                break;

                case 'brouillon': $publier = new \Controller\PostController();
                $publier -> addChapterTemp();
                break;

                case 'supprimer': $supprimer = new \Controller\PostController();
                $supprimer -> suppression();
                break;

                case 'modification': $post = new \Controller\PostController();
                $post -> modificationPost();
                break;

                case 'signaler': $signalement = new \Controller\PostController();
                $signalement -> signalComment();
                break;

                case 'modComment': $modCom = new \Controller\PostController();
                $modCom -> modifComment($_GET['id'], $_POST['comment']);
                break;

                case 'supCom': $signalement = new \Controller\PostController();
                $signalement -> delCom();
                break;

                case 'moderation': $moderation = new \Controller\PostController();
                $moderation -> moderation();
                break;

                case 'modifier': $modification = new \Controller\PostController();
                $modification -> modifier();
                break;

                default: $listPosts = new \Controller\PostController();
                $listPosts -> listPosts();    
            }
        
    }
    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}