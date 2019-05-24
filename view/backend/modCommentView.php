<?php $title = 'Commentaires signalés'; ?>

<?php ob_start(); ?>

<h1>Modification du commentaire :</h1>

<form  method="post">
    
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea class="form-control" id="comment" name="comment" ><?php echo $comment['comment']; ?></textarea>
    </div>
    <div>
        <input type="submit" value="modérer" class=" btn btn-primary" formaction="index.php?action=modComment&id=<?= $comment['id']; ?>" />
        <input type="submit" value="Supprimer" class=" btn btn-danger" formaction="index.php?action=supCom&id=<?= $comment['id']; ?>" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>