<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
	<?php include 'Enteteprojet.php' ?>
</head>

<body>
<main>
	<?php
	display_cart($_SESSION["id"]);
	?>
	</main>
	</body>
	
	<?php include 'footer.php' ?>
</html>