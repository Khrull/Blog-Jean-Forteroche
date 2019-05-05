<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Les chapitres en attente:</h1>


<?php
foreach ($allPosts as $data)
{
?>
    <div class="news">
        <h3>
            <?= ($data['title']) ?>
            
        </h3>
        
        <p>
            <?= nl2br($data['preview']) ?><em> ...</em>
            <br />
            <em><a href="index.php?action=postTemp&amp;id=<?= $data['id'] ?>">Lire la suite</a></em>
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>