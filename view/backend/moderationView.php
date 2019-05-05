<?php $title = 'Commentaires signalés.'; ?>

<?php ob_start(); ?>

<h1>Commentaires signalés :</h1>

<?php 
foreach ($comments as $comment)
{?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h5><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr']?></h5>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <i class="fas fa-edit"></i><a href="index.php?action=modifier&id=<?php echo $comment['id']; ?>"> Modifier</a>
        </div>
    </div>    
</div>                
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('view\frontend\template.php'); ?>