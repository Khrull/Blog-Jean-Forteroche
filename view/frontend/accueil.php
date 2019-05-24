<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>
<div class="container">

    <div class="row">
    <?php $session->flash();?>
        <div class="col-xl-12 presentation">
            <h1>Jean FORTEROCHE</h1>
                <p>Auteur à succés, <strong>"Les chiens ne font pas des chats", "Un dernier pour la route", "Pas de fumée sans feu"</strong>..., passionné d'écologie et grand défenseur des arbres, vous présente ici son dernier roman:<br/>
                <strong>"Billet simple pour l'Alaska"</strong>, basé sur un nouveau concept de publication entièrement en ligne. Comme il le dit lui même, plus de papier, plus d'arbres coupés.</p>
        </div>            
    </div>

    <div class="row">
        <div class="col-xl-12">
            <h1 class="display-5">Derniers chapitres:</h1>
        </div>
    </div> 
    
    <?php
    foreach ($resumPosts as $data)
    {
    ?>
    <div class="row">
        <div class="shadow p-2 col-xl-12 chaptitre">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
            </h3>
        </div>
    
         
        <div class="shadow-lg p-5 col-xl-12 chaptext">       
            <article>
                <?= nl2br($data['preview']) ?><em> ...</em>
                <br />
                <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></em>
            </article>
        </div>
    </div>   
    <?php
    }
    ?>
       
</div> 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>