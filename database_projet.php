<html>
	
	
	
<!--REQUETES COMMANDES DATABASE-->

<!--CART DISPLAY-->

<?php
	
	
	function ConnectionDataBase()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projetecommerce','root','');
		return $bdd;
	}

	function SearchIdUser($id){
		$bdd = ConnectionDataBase();
		$user = $bdd->query("SELECT * FROM users WHERE users.id=".$id)->fetch();
		return $user;
	}
	/*This function take in parameter the user id  and display the contain of the cart*/
	
	function display_cart($id_user_acount)
	{		
		//Import BDD
		$bdd = ConnectionDataBase();
		
		//Initialisation of variables
		global $amount;
		global $product_info;
		$amount=0;
		//SQL requests for needed values through all the targetted tables 
		$product_info=$bdd->query("SELECT op.quantity, op.unit_price, op.product_id, p.name_short,p.name_long, o.amount
								FROM order_products op 
								INNER JOIN orders o ON o.id=op.order_id
								INNER JOIN products p ON p.id=op.product_id
								WHERE o.user_id=".$id_user_acount." AND o.type='CART'");
		?>				
		<?php	
	}
	

function connexion($mail,$mdp){
	if (empty($mail) | empty($mdp)) 
	{
	    echo 'mauvaise saisie de la connexion';
	}
	else {
	        //connexion avec la base de données
	    $pdo = ConnectionDataBase();
	    $users=$pdo->query("SELECT * FROM users WHERE email='$mail' AND password='$mdp'");
	    if (!$users) 
	    {
			echo "Identifiant ou mot de passe incorrect";
			
	    }
	    else {
			$user=$users->fetch();
			$_SESSION["id"]=$user["id"];
			$_SESSION["username"]=$user["username"];
			header('Location: index.php?page=account');
	    	//lance la fonction sseion qui permettra d'avoir un session utilisateur ouverte
			
			
	    } 
	}
}

function inscription($mail,$conf_mail,$mdp,$conf_mdp,$villeL,$paysL,$code_postalL,$adresseL,$adresseL_special,$villeF,$paysF,$code_postalF,$adresseF,$adresseF_special,$nom){
	if (empty($mail) | empty($conf_mail) | empty($mdp) | empty($conf_mdp) | empty($paysF) | empty($paysL) | empty($code_postalF) | empty($code_postalL) | empty($villeF) | empty($villeL) | empty($adresseF) |empty($adresseL) | empty($nom)){
	    echo 'mauvaise saisie de la connexion';
	}
	else{
		$pdo = ConnectionDataBase();
		//verif si adresse est bien un mail
		if (filter_var($mail, FILTER_VALIDATE_EMAIL)){

			//verif si les adresses mails sont bien les même
			if ($mail === $conf_mail){
				$verif =  $pdo->query("SELECT * FROM users WHERE email ='$mail'")->fetch();
				//verif si l'adresse mail n'existe pas déja dans la base de donnée
	    		if (!$verif){
	    			//verif si le mot de passe est bien saisi 2 fois à l'identique
	    			if ($mdp ===$conf_mdp){
	    				//faire la requete sql qui remplie la base de donnée
	    				$users1=$pdo->query("SELECT max(id) as max FROM users")->fetch();
	    				enregistrement_order_adresse($villeL,$paysL,$code_postalL,$adresseL,$adresseL_special,$nom,$pdo);
	    				enregistrement_user_adresse($villeF,$paysF,$code_postalF,$adresseF,$adresseF_special,$nom,$pdo);
	    				enregistrment_user($nom,$mail,$mdp,$pdo);
						$users2=$pdo->query("SELECT max(id) as max FROM users")->fetch();
						if ($users2 > $users1)
	    					echo "Vous êtes bien enregistré";
	    			}
	    			else{
	    				echo "mot de passe différent";
	    			}
	    		}
	    		else{
	    			echo "utilisateur déjà existant";
	    		}
			}
			else{
				echo "adresse mail différent";
			}
		}
		else{
			echo "l'adresse mail n'est pas valide";
		}
	}
}

function enregistrement_order_adresse($ville,$pays,$code_postal,$adresse,$adresse_special,$nom,$pdo){
	$enregistrement_order_adresse = $pdo->exec("INSERT INTO `order_addresses` (human_name,address_one,address_two,postal_code,city,country) VALUES ('$nom','$adresse','$adresse_special','$code_postal','$ville','$pays')");
}

function enregistrement_user_adresse($ville,$pays,$code_postal,$adresse,$adresse_special,$nom,$pdo){
	$pdo->exec("INSERT INTO `user_addresses` (human_name,address_one,address_two,postal_code,city,country) VALUES ('$nom','$adresse','$adresse_special','$code_postal','$ville','$pays')");
}

function enregistrment_user($nom,$mail,$mdp,$pdo){
	$id_order=$pdo->query("SELECT max(id) as max FROM order_addresses")->fetch();
	$id_user=$pdo->query("SELECT max(id) as max FROM user_addresses")->fetch();
	$id_user_adress=$id_user["max"];
	$id_order_adress=$id_order["max"];
	$pdo->exec("INSERT INTO `users` (username,email,password,billing_adress_id,delivery_adress_id) VALUES ('$nom','$mail','$mdp','$id_order_adress','$id_user_adress')");
}
	
	function research($search,$range) {
		$bdd = ConnectionDataBase();
		if($range!=null) {
			$research =$bdd->query("select p.*,r.parent_id from products p inner join ranges r on p.range_id=r.id 
			where p.name_short like '%".$search."%' AND p.range_id=".$range." OR r.parent_id=".$range);
		}
		else {$research =$bdd->query("select * from products where name_short like '%".$search."%'");}
		return $research;
	}
	
	function product_from_id($id) {
		$bdd = ConnectionDataBase();
		$product =$bdd->query('select * from products where id='.$id)->fetch();
		return $product;
	}
	
	function all_ranges() {
		$bdd = ConnectionDataBase();
		$product =$bdd->query('select id, name from ranges');
		return $product;
	}
		
	function add_to_cart($product_id,$quantity,$user_id) {		
		$bdd = ConnectionDataBase();
		$get_price=$bdd->query('SELECT unit_price from products where id='.$product_id)->fetch(); //get price of the product
		$price=$get_price["unit_price"];
		
		$user_cart_id=$bdd->query("SELECT op.order_id,count(*) as count_cart from order_products op
		INNER JOIN orders o ON o.id = op.order_id
		WHERE o.user_id =".$user_id." AND o.type='CART'")->fetch();
		
		if($user_cart_id["count_cart"]!=0) { //if user have a cart
		
			$order_id=$user_cart_id["order_id"];
			$product_in_cart=$bdd->query("SELECT op.quantity, op.order_id, count(*) as count_product from order_products op
				INNER JOIN orders o ON o.id = op.order_id
				WHERE o.user_id =".$user_id." AND o.type='CART' AND op.product_id=".$product_id)->fetch();

			if($product_in_cart["count_product"]!=0) { //if product is already in cart
			
				$new_quantity=$product_in_cart["quantity"]+$quantity;
				$increment_quantity=$bdd->query('UPDATE order_products
					SET quantity='.$new_quantity.' WHERE order_id='.$order_id.' and product_id='.$product_id); //increment quantity of the product
			}
			else {
				$add_product_to_cart= $bdd->exec('INSERT INTO order_products (order_id, product_id, quantity, unit_price) 
					VALUES ('.$order_id.','.$product_id.','.$quantity.','.$price.')'); //add the product to the cart
			}
		}
		
		
		else {
		
		$add_order=$bdd->exec("INSERT INTO `orders` (`user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`)
				VALUES (".$user_id.",'CART','CART',0, 1, 2)");
		$get_order_id=$bdd->query("SELECT id from orders WHERE user_id =".$user_id." AND type='CART'")->fetch(); // get the order id of user's cart
		$order_id=$get_order_id["id"];
		$add_product=$bdd->exec('INSERT INTO `order_products` (order_id, product_id, quantity, unit_price)
				VALUES ('.$order_id.','.$product_id.','.$quantity.','.$price.')');
		
		
		}
		$get_amount=$bdd->query("select sum(unit_price*quantity) as amount from order_products where order_id=".$order_id)->fetch(); //Get total amount of cart
		$update_amount=$bdd->exec('UPDATE orders SET amount='.$get_amount["amount"]." where id=".$order_id);	//	Update total amount of order
	}
	
	
?>

</html>