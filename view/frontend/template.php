
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Découvrez le nouveau roman en ligne de Jean Forteroche: 'Billet simple pour l'Alaska'">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Lato" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="public/css/style.css" rel="stylesheet" />
        <link rel="icon" href="public/images/plume.jpg" /> 
    </head>
        
    <body>

        <!-- HEADER -->
        <header id="header">
        
            <!-- Menu de navigation -->
            <nav class="navbar shadow-lg fixed-top navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> Billet simple pour l'Alaska</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">  
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <?php if(isset($_SESSION['utilisateur']))
                            { ?>
                            <a class="nav-item nav-link" href="index.php?action=deconnexion"><i class="fas fa-user"></i> Se déconnecter</a></li>
                            <?php }
                            else {?>
                            <a class="nav-item nav-link" href="index.php?action=btnSeConnecter"><i class="fas fa-user"></i> Se connecter</a></li>
                            <?php }?>
                            <a class="nav-item nav-link" href="index.php?action=listAllPosts"><i class="fas fa-book-open"></i> Les chapitres</a></li>
                            <?php if(isset($_SESSION['utilisateur']))
                            {
                                if($_SESSION['grpUtilisateur']==1)
                                    {?>
                                        <a class="nav-item nav-link" href="index.php?action=ecriture"><i class="fas fa-feather-alt"></i> Ecriture</a></li>
                                        <a class="nav-item nav-link" href="index.php?action=listAllPostsTemp"><i class="fas fa-highlighter"></i> Brouillons</a></li>
                                        <a class="nav-item nav-link" href="index.php?action=moderation"><i class="fas fa-exclamation"></i> Modération</a></li>
                                    
                                    <?php }
                            }?>
                        </div>
                    </div>               
            </nav>        
        </header>


    <!-- SECTION PRINCIPALE -->
    <div class="bloc_page">
        <?= $content ?>
    </div>
        
    <footer class="footer">
        <div class="container-dark bg-dark">
            <div class="row" id="foot">
                    <div class="text-center col-lg-4">
                        <img src="public/images/bjorn.jpg" class="rounded" alt="img profil" width="200px" height="240px">
                    </div>
                    <div class="text-center col-lg-4">
                        <h4>A propos de l'auteur :</h4>
                        <p>Jean Forteroche est né a Metz en 1975, Après avoir gagné au Loto, il décide de se consacrer au voyage et à l'écriture.  Les chiens ne font pas des chats est son premier roman, il obtient le Prix Goncourt en 2006. 
                            Depuis il a publié Un dernier pour la route et Pas de fumée sans feu qui ont obtenu plusieurs prix littéraires en Europe.  Ses thèmes de prédilection sont le voyage, l'écologie et le paranormal.</p>
                    </div>
                    
                    <div class="text-center col-lg-4">
                    <?php
                    if(isset($_SESSION['utilisateur']))
                    {?>
                        <a href="index.php?action=meContacter" class="text-uppercase"><button class="btn btn-default">Me contacter</button></a>
                    <?php
                    }?>    
                        <div id="socialNetworks">
                            <a href="http://twitter.com"><i class="fab fa-twitter fa-3x"></i></a>
                            <a href="http://facebook.com"><i class="fab fa-facebook-square fa-3x"></i></a>
                        </div>
                    </div>
                </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="public/js/main.js"></script>
    </body>
</html>