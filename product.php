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
		
		<?php if(isset($_SESSION["id"])) {?>
			<section class="asideproduct">
				<?php echo $product["unit_price"]?>€
				<form method='post' id='order'>
					Quantité:<br><input value="1" type="number" form="order" min="1" max="100" name="quantity" form='order'>	
					<input class="boutonpanierproduit" type='submit' value='Add to cart' />
				</form>
			
			</section>
		<?php }
		else {?>
			<section class="asideproduct">
				<?php echo $product["unit_price"]?>€
				
				Quantité:<br><input value="1" type="number" min="1" max="100">	
				<a class="boutonpanierproduit" href="connexion.php">
				Add to cart
				</a>
				
			
			</section>
		<?php } ?>
		<section class="sectionproduct">
			<img src="images/<?php echo $product["id"]?>.jpg" id="productImage"/>
			<p class="titre_court"><?php echo $product["name_short"] ?></p>
			<p class="titre_long"><?php echo $product["name_long"] ?></p>
			<p class="description"><?php echo $product["description"];?></p>
			<p>BLEH BLEH BLEH</p>
			
		</section>
		
		
	</main>
    
</body>
<?php include 'footer.php' ?>
</html>

