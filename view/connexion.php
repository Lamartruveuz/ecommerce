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
			<?php
	if(isset($_POST['username'],$_POST['password'])){
		
	connexion($_POST['username'],$_POST['password']);
	} 
	?>
		<br>
		<div class="Inscri_Connex">
		<form method="post" >
			<div>
				<label>IDENTIFICATION :</label>
			</div>
			<br>
				<strong>Vous êtes déjà client ?</strong>
			<div>
				<label>Entrez votre adresse email :</label>
			</div>
				<input  name="username" type="text" name="mail">
			<div>
				<label>Entrez votre mot de passe :</label>
			</div>
				<input name="password" type="password" name="mdp">
			<div>
				<input type="submit" value="Connexion">
			</div>
			<br>
		</form>
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