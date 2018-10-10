<!DOCTYPE html>
<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
	<?php include 'Enteteprojet.php' ?>
</head>

<body>
	<?php
	$bdd = new
	PDO('mysql:host=localhost;dbname=e-commerce', 'root', '') ;

	$product = $bdd->query('select * from product where id='.$_GET['id']);
	
	foreach($product as $row) {
	?>
	
    <section class='sectionproduct'>
		<aside class='asideproduct'>	
			<div>
    		Prix: <br><?php echo $row["price"]?>€
    	    	<hr>Quantité:<br><input type="number" min="1" max="100"><hr>
				<IMG class="displayed" src="panier.png"/>

			</div>

		</aside>
		<h1>
			<span class="fn titre_court"><?php echo $row["short_title"] ?></span>

			<span class="titre_long"><?php echo $row["long_title"] ?></span>
			
		</h1>
		
    	
			<img id="productImage" src="images/<?php echo $row["id"]?>.jpg" border="1"/>
			<div>
    		
				<h1>Presentation</h1>
				<p>
				<?php echo $row["presentation"] ?>
				</p>
    		
			</div>

	</section>	
		
		<div class="description">
			<?php echo $row["description"] ?>
			</div>


    <?php } ?>
</body>
<?php include 'footer.php' ?>
</html>

