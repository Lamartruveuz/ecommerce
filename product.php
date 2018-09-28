<!DOCTYPE html>
<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
	<?php include 'Enteteprojet.php' ?>
	<?php include 'database.php' ?>
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
	
    <section class='sectionproduct'>
		<aside class='asideproduct'>	
			<div>
    		<br>Prix: <br><?php echo $product["unit_price"]?>€
    	    	<hr><br>Quantité:<br>
				<form method='post' id='order'>
					<input value="1" type="number" min="1" max="100" name="quantity">
				</form>
				<br>
				<hr>
				<br><br>
				<input form='order' value='' type='submit' style="background-image: url(images/panier.png);background-size: 250px; width: 250px; height: 35px"/>
				
			</div>

		</aside>
		<h1>
			<span class="fn titre_court"><?php echo $product["name_short"] ?></span>

			<span class="titre_long"><?php echo $product["name_long"] ?></span>
			
		</h1>
		
    	
			<img id="productImage" src="images/<?php echo $product["id"]?>.jpg" border="1"/>
			<div>
    		
				<h1>Presentation</h1>
				<p>
				<?php echo $product["description"];?>
				</p>
    		
			</div>

	</section>	
		
		<div class="description">
			<?php echo $product["description"]; ?>
			</div>



</body>
<?php include 'footer.php' ?>
</html>

