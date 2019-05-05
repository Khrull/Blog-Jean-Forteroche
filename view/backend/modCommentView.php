<?php $title = 'Commentaires signalés.'; ?>

<?php ob_start(); ?>

<h1>Modification du commentaire :</h1>

<form action="index.php?action=modComment&amp;id=<?= $post['id'] ?>" method="post">
    
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" value="<?php echo $comment['comment']?>"></textarea>
    </div>
    <div>
        <input type="submit" value="envoyer" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view\frontend\template.php'); ?>