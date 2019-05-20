<?php

session_start();


require('vendor/autoload.php');
use Controller\PostController;
use Controller\UserController;



$action ="";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

try {
        switch ($action) {

                case 'btnSeConnecter': $form = new UserController();
                $form -> formLogin();
                break;

                case 'connexion': $connexion = new UserController();
                $connexion -> login();
                break;

                case 'deconnexion': $deconnexion = new UserController();
                $deconnexion -> logout();
                break;

                case 'inscription': $inscription = new UserController();
                $inscription -> addNewUser();
                break;

                case 'post': $post = new PostController();
                $post -> post();
                break; 

                case 'postTemp': $post = new PostController();
                $post -> postTemp();
                break;
                
                case 'listAllPosts': $chapitres = new PostController();
                $chapitres -> listAllPosts();
                break;

                case 'listAllPostsTemp': $chapitres = new PostController();
                $chapitres -> listAllPostsTemp();
                break;

                case 'addComment':  $addComment = new PostController();
                $addComment -> addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                break;

                case 'ecriture': $addpost = new PostController();
                $addpost -> formPost();
                break;

                case 'publier': $publier = new PostController();
                $publier -> addChapter();
                break;

                case 'depublier': $depublier = new PostController();
                $depublier -> depublier();
                break;

                case 'republier': $republier = new PostController();
                $republier -> republier();
                break;

                case 'modBrouillon': $modBrouillon = new PostController();
                $modBrouillon -> modBrouillon();
                break;

                case 'brouillon': $publier = new PostController();
                $publier -> addChapterTemp();
                break;

                case 'supprimer': $supprimer = new PostController();
                $supprimer -> suppression();
                break;

                case 'modification': $post = new PostController();
                $post -> modificationPost();
                break;

                case 'signaler': $signalement = new PostController();
                $signalement -> signalComment();
                break;

                case 'modComment': $modCom = new PostController();
                $modCom -> modifComment($_GET['id'], $_POST['comment']);
                break;

                case 'supCom': $signalement = new PostController();
                $signalement -> delCom();
                break;

                case 'moderation': $moderation = new PostController();
                $moderation -> moderation();
                break;

                case 'modifier': $modification = new PostController();
                $modification -> modifier();
                break;

                default: $listPosts = new PostController();
                $listPosts -> listPosts();
                    
            }
        
    }
    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
