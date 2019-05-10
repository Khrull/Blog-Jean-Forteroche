<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<?php $session->flash();?>
<h1>Les chapitres en attente:</h1>


<?php
foreach ($allPosts as $data)
{
?>
<div class="listPostTemp">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news">
                    <h3>
                        <?= $data['title'] ?>
                        
                    </h3>
                    
                    <article>
                        <?= nl2br($data['preview']) ?><em> ...</em>
                        <br />
                        <em><a href="index.php?action=postTemp&amp;id=<?= $data['id'] ?>">Lire la suite</a></em>
                    </article>
                </div>
            </div>    
        </div>    
    </div>
</div>       
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>