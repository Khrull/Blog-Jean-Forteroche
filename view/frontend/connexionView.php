<?php $title = "Connexion"; ?>


<?php ob_start(); ?>
<div class="container">
    	<h1 class="jumbotron">    Connexion ou Inscription</h1>

	
	<div class="row">
		<!-- Formulaire de connexion-->
<form action="index.php?action=connexion&amp;identification=connexionpost" method="post" class="col-md-6" id="connexion">
	<h2>Connexion</h2>
	<div class="form-group">
		<input type="text" placeholder="Adresse Email" id="email" name="email" class="form-control email" required>
	</div>
	<div class="form-group">
		<input type="password" placeholder="Mot de passe" id="password" name="password" class="form-control" required>
	</div>
	<div class="form-group right">
		<input type="submit" value="Connexion" class="btn btn-default"/>
	</div>
</form>


<!-- Formulaire d'inscription-->
<form action="index.php?action=inscription&amp;identification=inscription" method="post" class="col-md-6" id="inscription">
	<h2>Inscription</h2>
	<div class="form-group">
		<input type="text" placeholder="Nom" id="nom" name="nom" class="form-control" required>
	</div>
    <div class="form-group">
        <input type="text" placeholder="Prénom" id="prenom" name="prenom" class="form-control" required minlength="2">
    </div>
	<div class="form-group">
		<input type="text" placeholder="Adresse Email" id="email" name="email" class="form-control email" required>
	</div>
	<div class="form-group">
		<input type="password" placeholder="Mot de passe" id="password" name="password" class="form-control" required minlength="8">
	</div>
	<div class="form-group">
		<input type="password" placeholder="Confirmez votre mot de passe" id="conf_password" name="conf_password" class="form-control" required minlength="8">
	</div>
	<div class="form-group right">
		<input type="submit" value="Inscription" class="btn btn-default"/>
	</div>
</form>
	</div>

   

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
