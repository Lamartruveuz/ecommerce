<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
</head>
<?php include 'Enteteprojet.php'?>
<body>
	
	<br>
	<br>
	<br>
	<main>
		<?php
	if(isset($_POST['mail'],$_POST['conf_mail'],$_POST['mdp'],$_POST['conf_mdp'],$_POST['paysL'],$_POST['villeL'],$_POST['code_postalL'],$_POST['adresseL'],$_POST['adresseL_special'],$_POST['paysF'],$_POST['villeF'],$_POST['code_postalF'],$_POST['adresseF'],$_POST['adresseF_special'],$_POST['nom'])){
		
	inscription($_POST['mail'],$_POST['conf_mail'],$_POST['mdp'],$_POST['conf_mdp'],$_POST['paysL'],$_POST['villeL'],$_POST['code_postalL'],$_POST['adresseL'],$_POST['adresseL_special'],$_POST['paysF'],$_POST['villeF'],$_POST['code_postalF'],$_POST['adresseF'],$_POST['adresseF_special'],$_POST['nom']);} 
	?>
	<br>
	<div class="Inscri_Connex">
		<p>
			<label>  CRÉATION DE COMPTE :</label>		
		</p>
		<div>	
			<label>  Entrez votre adresse email :</label>
			<label>  Confirmez votre email :</label><br>
			
		</div>
		<p></p>
		<form method="post">
		<div>
			
			<input type="text" name="mail"/>
			<input type="text" name="conf_mail"/>
		</div>	
		<p></p>		
		<div>
			<label>  Votre mot de passe :</label>
			<label>  Confirmation :</label><br>
		</div>
		<p></p>
		<div>
			<input type="password" name="mdp"/>
			<input type="password" name="conf_mdp"/>		
		</div>
		<p></p>
		<div>
			<label>  Adresse livraison :</label><br>
			<input type="text" name="paysL" placeholder='pays'/>
			<input type="text" name="villeL" placeholder='ville'/>
			<input type="text" name="code_postalL" placeholder='code postal'/>
			<input type="text" name="adresseL" placeholder='adresse'/>
			<input type="text" name="adresseL_special" placeholder='complément facultatif'/>
		</div>
		<p></p>
		<div>			
			<label>  Adresse facturation :</label><br>
			<input type="text" name="paysF" placeholder='pays'/>
			<input type="text" name="villeF" placeholder='ville'/>
			<input type="text" name="code_postalF" placeholder='code postal'/>
			<input type="text" name="adresseF" placeholder='adresse'/>
			<input type="text" name="adresseF_special" placeholder='complément facultatif'/>
		</div>
		<p></p>
		<div>
			<label>  Nom Prenom:</label><br>
			<input type="text" name="nom"/>
		</div>
		<p></p>
		<div>
				<input type="submit" value="Inscription">
		</div>
		</form>
		<br>
	</div>
</main>
</body>
<?php include 'footer.php'?>
</html>



<!--if(isset($_POST['username'],$_POST['password'])){
		
	connexion($_POST['username'],$_POST['password']);}-->
