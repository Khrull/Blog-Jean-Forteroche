<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<?php $session->flash();?>

<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=mto6yw9yfls0843ateaj0jo8adkbk9rthhrzk4gdixnrw4zi"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<div class="container">
    <div class="row">
        <form  method="post">
            <div class="form-group">
                <label for="titre">Titre du chapitre</label><br />
                <input type="text" id="titre" name="titre"/>
            </div>
            <div class="form-group">
                <label for="chapter">Chapitre</label><br />
                <textarea id="chapter" name="chapter"></textarea>
            </div>
            <div class="form-group right">
                <input type="submit" value="Publier" class=" btn btn-primary" formaction="index.php?action=publier" />
                <input type="submit" value="Brouillon" class=" btn btn-warning" formaction="index.php?action=brouillon" />
            </div>
        </form>
    </div>
</div>    

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
