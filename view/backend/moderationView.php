<?php $title = 'Commentaires signalés'; ?>

<?php ob_start(); ?>
<?php $session->flash();?>
<h1>Commentaires signalés :</h1>

<?php 
foreach ($comments as $comment)
{?>
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <h5><strong><?= ($comment['author']) ?></strong> le <?= $comment['comment_date_fr']?></h5>
            <article class="commentaire"><?= nl2br($comment['comment']) ?></article>
            <i class="fas fa-edit"></i><a href="index.php?action=modifier&id=<?php echo $comment['id']; ?>"> Modifier</a>
        </div>
    </div>    
</div>                
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>