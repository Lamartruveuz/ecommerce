<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
	<?php include 'Enteteprojet.php' ?>
</head>

<body>
<main>
	<?php
	$bdd = new
	PDO('mysql:host=localhost;dbname=e-commerce', 'root', '') ;

	$cart = $bdd->query("select * from product");
	$total=0;
	
	foreach($cart as $row) {
		$total=$total+$row["price"];
	?>	
	
    <section class='sectioncart'>
		<aside class='asideresults'>	
			<div>
    		<br>Prix: <br> <?php echo $row["price"]?>€
    	    	

			</div>

		</aside>
		
		
    	
			<img id="productImageresult" src="images/<?php echo $row["id"]?>.jpg" border="1"/>
			<div>
    		
				<h1>
			<span class="fn titre_court"><?php echo $row["short_title"]?></span>

			<span class="titre_long"><?php echo $row["long_title"]?></span>
			
		</h1>
				
    		
			</div>

	</section>	
	<?php }?>
	<aside class='asidecart'>
	Montant total: <?php echo $total?>€   <br><img id="OrderImage" src="commande.jpg" /><br><br>
	</aside>
	<div class="divorder">
	Montant total: <?php echo $total?>€   <br><img id="OrderImage" src="commande.jpg" /><br><br>
	</div> 
	</main>
	<aside class='asidecart'>
	Montant total: <?php echo $total?>€   <br><img id="OrderImage" src="commande.jpg" /><br><br>
	</aside>
	</body>
	<?php include 'footer.php' ?>
</html>