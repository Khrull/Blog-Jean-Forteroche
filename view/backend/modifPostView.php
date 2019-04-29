<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>


<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=mto6yw9yfls0843ateaj0jo8adkbk9rthhrzk4gdixnrw4zi"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<form  method="post">
    <div>
        <label for="titre">Titre du chapitre</label><br />
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($post['title']) ?>"/>
    </div>
    <div>
        <label for="chapter">Chapitre</label><br />
        <textarea id="chapter" name="chapter" value="<?= nl2br(htmlspecialchars($post['content'])) ?>"></textarea>
    </div>
    <div>
        <input type="submit" value="Publier" class=" btn btn-primary" formaction="index.php?action=publier" />
        <input type="submit" value="Brouillon" class=" btn btn-warning" formaction="index.php?action=brouillon" />
    </div>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>