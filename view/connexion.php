<!DOCTYPE html>

<html>
	<head>
		<title>
			Connexion
		</title>
	</head>
	
	<body>

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
				<input  name="username" type="text" name="mail" value=<?php if(isset($_COOKIE['mail'])){echo $_COOKIE['mail'];}?> >
			<div>
				<label>Entrez votre mot de passe :</label>
			</div>
				<input name="password" type="password" name="mdp" value=<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?> >
			<div>
				<input type="checkbox" id="remember" name="remember" value="yes" checked> 
				<label for="remember">Se souvenir de moi</label>
				<br><br>
				<input type="submit" value="Connexion">
			</div>
			<br>
		</form>
			<div>
				<strong>Vous n'êtes pas encore clients?</strong>
			</div>
			<div>
				<form action="./index.php" method="get">
					<input type="hidden" name="page" value="inscription">
					<input value="Inscription" type="submit">
				</form>
			</div>
			<br>
		</div>
	</main>
	</body>
</html>