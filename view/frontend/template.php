
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Découvrez le nouveau roman en ligne de Jean Forteroche: 'Billet simple pour l'Alaska'">
        <meta name="viewport" content="width=device-width">
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
        
        <div class="row">
            <div class="col-md-4">
                <ul class="menu">
                <li><i class="fas fa-home"></i><a href="index.php"> Accueil</a></li>
                <li><i class="fas fa-plug"></i><a href="index.php?action=btnSeConnecter"> Se connecter</a></li>
                <li><i class="fas fa-book-open"></i><a href="index.php?action=listAllPosts"> Les chapitres</a></li>
                </ul>
            </div> 
            <div class="col-md-4">   
                <h1>Billet simple pour l'Alaska</h1>
            </div>
        </div>    
        </header>


    <!-- SECTION PRINCIPALE -->
        <div class="bloc_page">
            <?= $content ?>
        </div>
        
    <footer class="footer">
   <div class="container">
        <div class='row'>
                <div class="col-md-4 col-xs-12">
                    <img src="public/images/bjorn.jpg" alt="img profil" width="200px" height="240px">
                </div>
                <div class="col-md-4">
                    <h4>A propos de l'auteur :</h4>
                    <p>Jean Forteroche est né a Metz en 1975, Après avoir gagné au Loto, il décide de se consacrer au voyage et à l'écriture.  Les chiens ne font pas des chats est son premier roman, il obtient le Prix Goncourt en 2006. 
                        Depuis il a publié Un dernier pour la route et Pas de fumée sans feu qui ont obtenu plusieurs prix littéraires en Europe.  Ses thèmes de prédilection sont le voyage, l'écologie et le paranormal.</p>
                </div>
                
                <div class="col-md-4">
                    <a href="#" class="text-uppercase"><button class="btn btn-default">Me contacter</button></a>
                    <div id="socialNetworks">
                        <a href="http://twitter.com"><i class="fab fa-twitter fa-3x"></i></a>
                        <a href="http://facebook.com"><i class="fab fa-facebook-square fa-3x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>