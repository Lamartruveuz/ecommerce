<!DOCTYPE html>
<html>
	<head>
		<title>
			Connexion
		</title>
		<link rel="stylesheet"  href="css/main.css">
	</head>
	
	<?php include 'Enteteprojet.php'?>
	<body>
		<br>
		<div class="Connexion">
			<div>
				<label>IDENTIFICATION :</label>
			</div>
				<strong>Vous êtes déjà client</strong>
			<div>
				<label>Entrez votre adresse email :</label>
			</div>
				<input  type="text"/>
			<div>
				<label>Entrez votre mot de passe :</label>
			</div>
				<input type="password"/>
			<div>
				<input type="button" value="Connexion"/>
			</div>
			<div>
				<strong>Vous n'êtes pas encore clients?</strong>
			</div>
			<div>
				<input type="button" value="Inscription">
			</div>
		</div>
	</body>
	<?php include 'footer.php'?>
</html>