<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
	<?php include 'Enteteprojet.php' ?>
	<?php include 'database.php' ?>
</head>

<body>
<main>
	<?php
	$bdd = new
	PDO('mysql:host=localhost;dbname=projet', 'root', '') ;

	$cart = $bdd->query("select * from products");
	$total=0;
	
	display_cart();
	?>
	
	</main>
	</body>
	
	<?php include 'footer.php' ?>
</html>