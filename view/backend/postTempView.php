<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<?php if(isset($_SESSION['utilisateur']))
            {
                if($_SESSION['grpUtilisateur']==1)
                {?>
                    <div class="col-md-2">
                        <ul class="modifChapitre">
                        <li><i class="fas fa-feather-alt"></i><a href="index.php?action=modification&id=<?php echo $post['id']; ?>">Modification</a></li>
                                                
                    </div>
                <?php }
            }?> 
<div class="news">
    <h3>
        <?= ($post['title']) ?>
        
    </h3>
    
    <p>
        
        <?= nl2br($post['content']) ?>
    </p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>