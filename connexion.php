<!DOCTYPE html>
<html>
	<head>
		<title>
			Connexion
		</title>
	</head>
	
	<?php include 'Enteteprojet.php'?>
	<body>
		<br>
		<br>
		<br>
		<main>
		<br>
		<div class="Inscri_Connex">
			<div>
				<label>IDENTIFICATION :</label>
			</div>
			<br>
				<strong>Vous êtes déjà client ?</strong>
			<div>
				<label>Entrez votre adresse email :</label>
			</div>
				<input  type="text" name="mail"/>
			<div>
				<label>Entrez votre mot de passe :</label>
			</div>
				<input type="password" name="mdp"/>
			<div>
				<input type="button" value="Connexion"/>
			</div>
			<br>
			<div>
				<strong>Vous n'êtes pas encore clients?</strong>
			</div>
			<div>
				<input type="button" value="Inscription">
			</div>
			<br>
		</div>
	</main>
	</body>
	<?php include 'footer.php'?>
</html>