<!--Page corrigée : OK-->
<!DOCTYPE html>	
<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />

</head>

<body>
	
	<br/>
	<main>
		
			<section class="asideproduct">
				<?php echo $product["unit_price"]."€";
				if(isset($_SESSION["id"])) 
					{?>
					<form method='post' id='order'>
						Quantité:
						<input value="1" type="number" form="order" min="1" max="100" name="quantity" form='order'>	
						<input class="boutonpanierproduit" type='submit' value='Add to cart' />
					</form>
				<?php }
				else {?>
					Quantité:<br><input value="1" type="number" min="1" max="100">	
					<a class="boutonpanierproduit" href="index.php?page=connexion">
					Add to cart
					</a>
				<?php }?>
		</section>		
		<section class="sectionproduct">
			<img src="images/<?php echo $product["id"]?>.jpg" id="productImage"/>
			<p class="titre_court"><?php echo $product["name_short"] ?></p>
			<p class="titre_long"><?php echo $product["name_long"] ?></p>
			<p class="description"><?php echo $product["description"];?></p>
			
		</section>
		
		
	</main>
    
</body>
</html>

