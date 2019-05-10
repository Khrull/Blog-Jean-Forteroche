<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<?php if(isset($_SESSION['utilisateur']))
            {
                if($_SESSION['grpUtilisateur']==1)
                {?>
                <div class="postView">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="modifChapitre">
                            <li><i class="fas fa-feather-alt"></i><a href="index.php?action=modification&id=<?php echo $post['id']; ?>">Modification</a></li>
                            <li><i class="fas fa-trash-alt"></i><a href="index.php?action=depublier&id=<?php echo $post['id']; ?>">Dépublier</a></li>
                        </div>
                         
                <?php }
            }?> 
                        <div class="col-md-10">
                            <div class="news">
                                <h3>
                                    <?= ($post['title']) ?>
                                    
                                </h3>
                                
                                <article>
                                    
                                    <?= nl2br($post['content']) ?>
                                </article>
                            </div>
                        </div> 
                            <div class="formCom">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                
                                        <h2>Commentaires</h2>
                                        <?php $session->flash();?>
                                        <?php
                                        if(isset($_SESSION['utilisateur']))
                                        {?>

                                    
                                            <div class="form-group">
                                                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                                                    <div>
                                                        <input hidden type="text" id="author" name="author" value="<?php echo $_SESSION['utilisateur']?>" />
                                                    </div>
                                                    <div>
                                                        <textarea id="comment" name="comment"></textarea>
                                                    </div>
                                                    <div>
                                                        <input type="submit" value="Envoyer" />
                                                    </div>
                                                </form>
                                            </div>    
                                        </div>    
                                    </div>        
                                </div>
                            </div>    
                        <?php
                        }   
                        foreach ($comments as $comment)
                        {
                        ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
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
                        </div>                
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div> 
                           
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
