<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<?php if(isset($_SESSION['utilisateur']))
            {
                if($_SESSION['grpUtilisateur']==1)
                {?>
                <div class="container edition">
                    <nav class="shadow-lg navbar navbar-expand-lg navbar-light bg-dark">
                        <a href="index.php?action=modification&id=<?php echo $post['id']; ?>"><i class="fas fa-feather-alt"></i> Modification</a>
                    </nav>                                
                </div>
                <?php }
            }?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h3 class="shadow-lg chaptitre">
                            <?= ($post['title']) ?>        
                        </h3>        
                        <article class="shadow-lg chaptext">         
                            <?= nl2br($post['content']) ?>        
                        </article>       
                    </div>
                </div>
            </div>    
                        

        
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>