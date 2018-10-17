
<html>
	<head>
		<link rel="stylesheet" href="Couleurs/Couleurs.css" />
		<?php include 'Enteteprojet.php' ?>
		<?php include 'database_projet.php' ?>
	</head>

<?php 
		
		$bdd = new PDO("mysql:host=localhost;dbname=projetecommerce", "root", "");
		
		$delivery_adress =$bdd->query("select * from users u INNER JOIN order_addresses a 
			ON a.id=u.delivery_adress_id where u.id=3")->fetch() ; //id à modifier
		$delivery_id=$delivery_adress["id"];
		$billing_adress =$bdd->query("select * from order_addresses a INNER JOIN users u 
			ON a.id=u.billing_adress_id where u.id=3")->fetch() ;
		$billing_id=$billing_adress["id"];
		$details =$bdd->query("SELECT * FROM users WHERE id=3")->fetch() ;
		
		if(isset($_POST["submit"],$_POST["paysL"])) {
			if(empty($_POST["mail"]) |  empty($_POST["paysF"]) | empty($_POST["paysL"]) | empty($_POST["code_postalF"]) | empty($_POST["code_postalL"]) | empty($_POST["villeF"]) | empty($_POST["villeL"]) | empty($_POST["adresseF"]) |empty($_POST["adresseL"])) {
			echo "Veuillez remplir tous les champs";
			}
			else{
				echo $billing_id;
				$update_billing_address=$bdd->query("UPDATE order_addresses
					SET address_one='".$_POST["adresseF"]."', address_two='".$_POST['adresseF_special']."',postal_code='".$_POST['code_postalF']."',city='".$_POST['villeF']."',country='".$_POST['paysF']."' where id=".$billing_id);
				$update_delivery_address=$bdd->query("UPDATE order_addresses
					SET address_one='".$_POST["adresseL"]."', address_two='".$_POST["adresseL_special"]."',postal_code='".$_POST["code_postalL"]."',city='".$_POST["villeL"]."',country='".$_POST["paysL"]."' where id=".$delivery_id);
				
				
			}
			if(!empty($_POST["mdp"]) && !empty($_POST["conf_mdp"])) {
				if($_POST["mdp"]==$_POST["conf_mdp"]) {
					$update_password=$bdd->query("UPDATE users SET password='".$_POST["mdp"]."' where id=3");
				}
			}	
			if(!empty($_POST["mail"])) {
				$update_email=$bdd->query("UPDATE users SET email='".$_POST["mail"]."' where id=3");
				
			}
			
			$delivery_adress =$bdd->query("select * from users u INNER JOIN order_addresses a 
					ON a.id=u.delivery_adress_id where u.id=3")->fetch() ; //id à modifier
				$delivery_id=$delivery_adress["id"];
				$billing_adress =$bdd->query("select * from order_addresses a INNER JOIN users u 
					ON a.id=u.billing_adress_id where u.id=3")->fetch() ;
				$billing_id=$billing_adress["id"];
				$details =$bdd->query("SELECT * FROM users WHERE id=3")->fetch() ;
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
						
							<input type="submit" value="Valider" name="submit">
					</div>
					<br>
				</form>
				<a href='disconnect.php'>Déconnexion</a>
			</center>

		</main>
	</body>
		
	<?php include 'footer.php' ?>
</html>
