<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<div class="container">
<?php $session->flash();?>
    <div class="row">
        <div class="col-xl-12">
            <h1 class="display-3 leschapitres">Les chapitres:</h1>
        </div>    
    </div>

<?php
foreach ($allPosts as $data)
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