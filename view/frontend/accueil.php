<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Jean FORTEROCHE</h1>
<p>Auteur à succés, <strong>Les chiens ne font pas des chats, Un dernier pour la route, Pas de fumée sans feu</strong>..., passionné d'écologie et grand défenseur des arbres, vous présente ici son dernier roman:<br/>
Billet simple pour l'Alaska, basé sur un nouveau concept de publication entièrement en ligne. Comme il le dit lui même, plus de papier, plus d'arbres coupés.
<h1>Derniers chapitres:</h1>


<?php
foreach ($resumPosts as $data)
{
?>
<div class="container">
    <div class="column">
        <div class="news">
            <div class="col-xs-12">
                <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['creation_date_fr'] ?></em>
                </h3>
            </div>    
            <div class="col-xs-12">       
                <p>
                    <?= nl2br(htmlspecialchars($data['preview'])) ?><em> ...</em>
                    <br />
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></em>
                </p>
            </div>
        </div>    
    </div> 
</div>       
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>