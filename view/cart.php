<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
</head>

<body>
<main>
	<?php
	display_cart($_SESSION["id"]);
	//Curse of all lines that fit the conditions and display in form
	foreach($product_info as $row) 
		{

			?>
			<aside class='asidecart'>	
				<div>
					<br> <?php echo $row["unit_price"]?>€
				<form method="post">
					<input class="boutonsuppressionpanier" type="submit" value="X"/>
					<input type="hidden" value=<?php echo $row["product_id"];?> name="suppr"/>	
				</form>
				</div>
			</aside>
			<section class='sectioncart'>
				
				<img id="productImageresult" src="images/<?php echo $row["product_id"]?>.jpg" border="1"/>
				<div>	
					<h1>
						<span class="fn titre_court"><a href="index.php?page=product&id=<?php echo $row["product_id"]?>" style="text-decoration: none; color: #FFFFFF"><?php echo $row["name_short"]?> </a></span>
						<br/>
						<p class="titrelong">
							<span class="titre_long"><?php echo $row["name_long"]?></span>
						</p>
					</h1>
					<p>
						<form method="post">
							Quantity :
							<input type="number" min="1" max="100"value="<?php echo $row["quantity"];?>" name="quantityModif"/>
							<input type="submit"/>
							<input type="hidden" value=<?php echo $row["product_id"];?> name="id_product"/>
						</form>
					</p>
				</div>
			</section>
						
			<?php 
			//Take back amount value
			$amount=$row["amount"]; 
		}?>
		<!--Display amount value-->
		<?php if (isset($_POST["suppr"]))
				{
					Suppr_Cart($_SESSION["id"],$_POST["suppr"]);
				}
			if (isset($_POST["id_product"]))
			{
				Modify_cart_Quantity($_SESSION["id"],$_POST["id_product"],$_POST["quantityModif"]);
			}
		?>

		<br/>
		<aside class='montantTotalFinal'>
			Montant total : <?php echo round($amount,2)?>€
		</aside>
		<br/>
		<br/>
		<form method="post">
			<input class="boutonValiderCommande" type="submit" value="Passer Commande"/>
		</form>
	</main>
	</body>
</html>