<?php
function connexion($mail,$mdp){
	if (empty($mail) | empty($mdp)) 
	{
	    echo 'mauvaise saisie de la connexion';
	}
	else {
	        //connexion avec la base de données
	    $pdo = new PDO("mysql:host=localhost;dbname=projet", "root", "");
	    $connexion =  $pdo->prepare('SELECT COUNT(*) as nb FROM user WHERE mail = ? and password = ?');
	    $connexion->execute(array($mail, $mdp));
	    $row = $stmt -> fetch();

	    if ($row['nb'] == 0) 
	    {
	    	echo 'erreur identifiant et ou mot de passe incorect';
	    }
	    else {
	    	//lance la fonction sseion qui permettra d'avoir un session utilisateur ouverte
	    } 
	}
}

function inscription($mail,$conf_mail,$mdp,$conf_mdp,$villeL,$paysL,$code_postalL,$adresseL,$adresseL_special,$villeF,$paysF,$code_postalF,$adresseF,$adresseF_special,$nom){
	if (empty($mail) | empty($conf_mail) | empty($mdp) | empty($conf_mdp) | empty($paysF) | empty($paysL) | empty($code_postalF) | empty($code_postalL) | empty($villeF) | empty($villeL) | empty($adresseF) |empty($adresseL) | empty($nom) | empty($prenom)){
	    echo 'mauvaise saisie de la connexion';
	}
	else{
		$pdo = new PDO("mysql:host=localhost;dbname=projet", "root", "");
		//verif si adresse est bien un mail
		if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
			//verif si les adresses mails sont bien les même
			if ($mail === $conf_mail){
				$verif =  $pdo->prepare('SELECT COUNT(*) as nb FROM user WHERE mail = ?');
				$verif->execute(array($mail));
				$row = $stmt -> fetch();
				//verif si l'adresse mail n'existe pas déja dans la base de donnée
	    		if ($row['nb'] == 0){
	    			//verif si le mot de passe est bien saisi 2 fois à l'identique
	    			if ($mdp ===$conf_mdp){
	    				//faire la requete sql qui remplie la base de donnée
	    				enregistrement_order_adresse($villeL,$paysL,$code_postalL,$adresseL,$adresseL_special,$nom,$pdo);
	    				enregistrement_user_adresse($villeF,$paysF,$code_postalF,$adresseF,$adresseF_special,$nom,$pdo);
	    				enregistrment_user($nom,$mail,$mdp,$pdo);
	    			}
	    			else
	    				echo "mot de passe différent";
	    		}
	    		else
	    			echo "utilisateur déjà existant";
			}
			else
				echo "adresse mail différent";
		}
		else
			echo "l'adresse mail n'est pas valide";
	}
}

function enregistrement_order_adresse($ville,$pays,$code_postal,$adresse,$adresse_special,$nom,$pdo){
	$pdo->exect("INSERT INTO order_addresses ('human_name','address_one','address_two','postal_code','city','country') VALUES (".$nom.",".$adresse.",".$adresse_special.",".$code_postal.",".$ville.",".$pays.")");
}

function enregistrement_user_adresse($ville,$pays,$code_postal,$adresse,$adresse_special,$nom,$pdo){
	$pdo->exect("INSERT INTO user_addresses ('human_name','address_one','address_two','postal_code','city','country') VALUES (".$nom.",".$adresse.",".$adresse_special.",".$code_postal.",".$ville.",".$pays.")");
}

function enregistrment_user($nom,$mail,$mdp,$pdo){
	$id_order=$pdo->exect("SELECT max(id) FROM order_addresses");
	$id_user=$pdo->exect("SELECT max(id) FROM user_addresses");
	$pdo->exect("INSERT INTO user ('username','email','password','billing_adress_id','delivery_adresss_id') VALUES (".$nom.",".$mail.",".$mdp.",".$id_order.",".$id_user.")");
}
?>