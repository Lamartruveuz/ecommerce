<!DOCTYPE html>
<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
	<?php include 'Enteteprojet.php' ?>
	<?php include 'database_projet.php' ?>
</head>

<body>
	<?php
	$product_id=$_GET['id'];
	if(isset($_POST['quantity'])){
		if(empty($_POST['quantity'])) {
			$_POST['quantity']=1;
		}
	add_to_cart($product_id,$_POST['quantity'],1); 
	unset($_POST['quantity']);
	}	
	$product = product_from_id($product_id);
	
	?>
	<main>
		<!--<div class="asideresults">
			193.50€
			<div class="boutonpanierrecherche">
				Add to cart
			</div>
		</div>
		<section class="sectionresults">
			<img src="../images/1.jpg" id="productImageresult"/>
			<p class="titre_court">Ordinateur</p>
			<p class="titre_long">Pintium 345</p>
		</section>-->
		<section class="asideproduct">
			<?php echo $product["unit_price"]?>€
			<form method='post' id='order'>
				<input value="1" type="number" form="order" min="1" max="100" name="quantity" form='order'>	
				<input class="boutonpanierproduit" type='submit' value='Add to cart' />
			</form>
		
		</section>
		<section class="sectionproduct">
			<img src="images/<?php echo $product["id"]?>.jpg" id="productImage"/>
			<p class="titre_court"><?php echo $product["name_short"] ?></p>
			<p class="titre_long"><?php echo $product["name_long"] ?></p>
			<p class="description"><?php echo $product["description"];?></p>
			<p>BLEH BLEH BLEH</p>
			
		</section>
		<!--<section class="sectioncart">
			<img src="../images/1.jpg" id="OrderImage"/>
			<div class="titre_court">Ordi</div>
			<div class="titre_long">Pintium 345</div>
			<p>HOPLA!</p>-->
		</section>
	</main>
    
</body>
<?php include 'footer.php' ?>
</html>

