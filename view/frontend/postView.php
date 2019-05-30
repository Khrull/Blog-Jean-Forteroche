<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>


    
        <?php if(isset($_SESSION['utilisateur']))
            {
                if($_SESSION['grpUtilisateur']==1)
                {?>
                    <div class="container edition">
                        <nav class="shadow-lg navbar navbar-expand-lg navbar-light bg-dark">
                            <a href="index.php?action=modification&id=<?php echo $post['id']; ?>"><i class="fas fa-feather-alt"></i> Modification </a>
                            <a href="index.php?action=depublier&id=<?php echo $post['id']; ?>"><i class="fas fa-trash-alt"></i> Dépublier</a>
                        </nav>
                    </div>
                <?php }
            }?>
            <?php if(isset($post['title']))
            {?>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <h3 class="shadow-lg chaptitre">
                                <?= htmlspecialchars($post['title']) ?>
                            </h3>
                                                
                            <article class="shadow-lg chaptext">
                                <?= nl2br($post['content']) ?>
                            </article>
                        </div>
                    </div>
                </div>
            <?php }
            else
            {?>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <h3 class="shadow-lg Mauvaischaptitre">CE CHAPITRE N'EXISTE PAS</h3>
                        </div>
                    </div>
                </div>            
    <?php }?>

<div class="container">   
        <div class="row">
            <div class="col-xl-12 formCom">
                <h2>Commentaires</h2>
                    
                    <?php
                    if(isset($_SESSION['utilisateur']))
                    {?>
                        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                            <div>
                                <input hidden type="text" id="author" name="author" value="<?php echo $_SESSION['utilisateur']?>" />
                            </div>
                            <div>
                                <textarea class="form-control" id="comment" name="comment"></textarea>
                            </div>
                            <div>
                                <input class=" btn btn-primary envCom" type="submit" value="Envoyer" />
                            </div>
                        </form>
                    <?php
                    }?>
            </div>
        </div>
        <?php              
                foreach ($comments as $comment)
                {?>
                    <div class="row">
                        <div class="col-xl-12">
                            <h5><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr']?></h5>
                            <article class="commentaire"><?= nl2br(htmlspecialchars($comment['comment'])) ?></article>
                    <?php
                    if(isset($_SESSION['utilisateur']))
                    {
                        if($comment['signale'] ==2)
                        { ?>
                            <span class="signale"> Signalé !</span>
                        <?php }
                        elseif($comment['signale'] ==3)
                        { ?>
                            <span class="modere"> Modéré </span>
                        <?php }
                        elseif($comment['signale'] ==1)
                        { ?>
                            <i class="fas fa-exclamation-triangle" ></i><a class="sign" href="index.php?action=signaler&id=<?= $comment['id'] ?>&post_id=<?= $post['id'] ?>"> Signaler</a>
                        <?php }
                    }?>
                        </div>
                    </div>    
                <?php
                }?>
    </div>
</div>                    
</div>              
   

                                     
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
