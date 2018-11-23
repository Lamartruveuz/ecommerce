<?php 
	
	if(isset($_SESSION["id"])) 
	{
		refresh_adresses();
	}
	else{
		header("Location: index.php?page=connexion");
	}	
	
	function refresh_adresses() {
		$bdd=ConnectionDataBase();
		global $details;
		global $billing_adress;
		global $delivery_adress;
		
		$delivery_adress =$bdd->query("select a.* from order_addresses a INNER JOIN users u 
			ON a.id=u.billing_adress_id where u.id=".$_SESSION["id"])->fetch() ; 
		$billing_adress =$bdd->query("select a.* from user_addresses a INNER JOIN users u 
			ON a.id=u.delivery_adress_id where u.id=".$_SESSION["id"])->fetch() ;
		$details =$bdd->query("SELECT * FROM users WHERE id=".$_SESSION["id"])->fetch() ;

	}
		
	function modify_profile() {
		$bdd=ConnectionDataBase();
		global $billing_adress;
		global $delivery_adress;
		
		if(isset($_POST["submit"])) {
			if(empty($_POST["mail"]) |  empty($_POST["paysF"]) | empty($_POST["paysL"]) | empty($_POST["code_postalF"]) | empty($_POST["code_postalL"]) | empty($_POST["villeF"]) | empty($_POST["villeL"]) | empty($_POST["adresseF"]) |empty($_POST["adresseL"])) {
			echo "Veuillez remplir tous les champs<br><br>";
			}
			else{
				$update_billing_address=$bdd->query("UPDATE `user_addresses`
					SET address_one='".$_POST["adresseF"]."', address_two='".$_POST['adresseF_special']."',postal_code='".$_POST['code_postalF']."',city='".$_POST['villeF']."',country='".$_POST['paysF']."' where id=".$billing_adress["id"]);
				$update_delivery_address=$bdd->query("UPDATE `order_addresses`
					SET address_one='".$_POST["adresseL"]."', address_two='".$_POST["adresseL_special"]."',postal_code='".$_POST["code_postalL"]."',city='".$_POST["villeL"]."',country='".$_POST["paysL"]."' where id=".$delivery_adress["id"]);
				
				
			}
			if(!empty($_POST["mdp"]) && !empty($_POST["conf_mdp"])) {
				if($_POST["mdp"]==$_POST["conf_mdp"]) {
					$update_password=$bdd->query("UPDATE users SET password='".$_POST["mdp"]."' where id=".$_SESSION["id"]);
				}
				else{
					echo "Les mots de passe saisis sont différents<br><br>";
				}
			}	
			if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {				

				$update_email=$bdd->query("UPDATE `users` SET email='".$_POST["mail"]."' where id=".$_SESSION['id']);
				
			}
			else{
					echo "Adresse mail invalide<br><br>";
			}
			refresh_adresses();
			header("Location: index.php?page=account"); //Ne fonctionne pas, pas de refresh quand on submit
			
		}
	}
		
		
?>