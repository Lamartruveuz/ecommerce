<html>
	<head>
		<link rel="stylesheet" href="Couleurs/Couleurs.css" />
	</head>
	
	<?php
	if(isset($_SESSION["id"])) 
	{
		refresh_adresses();
	}
	else{
		header("Location: index.php?page=connexion");
	}	
		?>

	<body>
		
		<main>		
			<center>
				<form method="post">					
					<div>
						<br>
						<label>  Nom Prenom:</label> <br>
						<input type="text" name="nom" value="<?php echo $details["username"]?>" disabled >
					</div>
					<div>
						<br>
						<label>  Votre adresse email :</label><br>
						<input type="text" name="mail" value="<?php echo $details["email"]?>">
					</div>
					<br>
					<div>
						<label>  Nouveau mot de passe :</label>
						<label>  Confirmation :</label><br>
					</div>
					<br>
					<div>
						<input type="password" name="mdp"/>
						<input type="password" name="conf_mdp"/>		
					</div>
					<br>
					<div>
						<label>  Adresse livraison :</label><br>
						<input type="text" name="paysL" value="<?php echo $delivery_adress["country"]?>">
						<input type="text" name="villeL" value="<?php echo $delivery_adress["city"]?>">
						<input type="text" name="code_postalL" value="<?php echo $delivery_adress["postal_code"]?>">
						<input type="text" name="adresseL" value="<?php echo $delivery_adress["address_one"]?>">
						<input type="text" name="adresseL_special" value="<?php echo $delivery_adress["address_two"]?>">
					</div>
					<br>
					<div>			
						<label>  Adresse facturation :</label><br>
						<input type="text" name="paysF" value="<?php echo $billing_adress["country"]?>">
						<input type="text" name="villeF" value="<?php echo $billing_adress["city"]?>">
						<input type="text" name="code_postalF" value="<?php echo $billing_adress["postal_code"]?>">
						<input type="text" name="adresseF" value="<?php echo $billing_adress["address_one"]?>">
						<input type="text" name="adresseF_special" value="<?php echo $billing_adress["address_two"]?>">
					</div>
					<br>
					<div>
						<?php 
						modify_profile(); 
						?>
						<input type="submit" value="Valider" name="submit" >
					</div>
					<br>
				</form>
			</center>

		</main>
	</body>
</html>

