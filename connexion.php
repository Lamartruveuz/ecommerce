<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<title>
			Connexion
		</title>
	</head>
	
	<?php include 'Enteteprojet.php'?>
	<?php include 'database_projet.php'?>
	<body>
	<?php
	if(isset($_POST['username'],$_POST['password'])){
		
	connexion($_POST['username'],$_POST['password']);} 
	?>
	
		<br>
		<br>
		<br>
		<main>
		<br>
		<div class="Inscri_Connex">
		<form id="connex" method="post" ></form>
			<div>
				<label>IDENTIFICATION :</label>
			</div>
			<br>
				<strong>Vous êtes déjà client ?</strong>
			<div>
				<label>Entrez votre adresse email :</label>
			</div>
				<input  name="username" type="text" name="mail" id="connex"/>
			<div>
				<label>Entrez votre mot de passe :</label>
			</div>
				<input name="password" type="password" name="mdp" id="connex"/>
			<div>
				<input type="submit" value="Connexion" id="connex"/>
			</div>
			<br>
			<div>
				<strong>Vous n'êtes pas encore clients?</strong>
			</div>
			<div>
				<form action='inscription.php'>
					<input value="Inscription" type="submit">
				</form>
			</div>
			<br>
		</div>
	</main>
	</body>
	<?php include 'footer.php'?>
</html>