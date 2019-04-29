<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<?php if(isset($_SESSION['utilisateur']))
            {
                if($_SESSION['grpUtilisateur']==1)
                {?>
                    <div class="col-md-2">
                        <ul class="modifChapitre">
                        <li><i class="fas fa-feather-alt"></i><a href="index.php?action=modification">Modification</a></li>
                        <li><i class="fas fa-trash-alt"></i><a href="index.php?action=corbeille">Suppression</a></li>
                        
                    </div>
                <?php }
            }?> 
<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        
    </h3>
    
    <p>
        
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>