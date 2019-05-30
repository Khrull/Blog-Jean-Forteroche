<?php $title = "Contact"; ?>


<?php ob_start(); ?>

<div class="container">
<?php $session->flash();?>	
    <h1 class="jumbotron">laisser un message à Jean FORTEROCHE</h1>

<!-- Formulaire d'inscription-->
<form action="index.php?action=sendMail" method="post" class="col-xl-12" id="contact">
	<div class="form-group">
    <input hidden class="form-control" type="text" name="nom"  value="<?php echo $_SESSION['utilisateurName']?>"/>
	</div>
    <div class="form-group">
        <input hidden class="form-control" type="text" name="prenom"  value="<?php echo $_SESSION['utilisateur']?>"/>
    </div>
	<div class="form-group">
    <input hidden class="form-control" type="text" name="mail"  value="<?php echo $_SESSION['utilisateurMail']?>"/>
	</div>
	<div class="form-group">
		<textarea  class="form-control" type="text" name="message" placeholder="Votre message" ></textarea>
	</div>
	
	</div>
	<div class="form-group right">
		<input type="submit" value="Envoyer" class="btn btn-default"/>
	</div>
</form>
	</div>

   

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>