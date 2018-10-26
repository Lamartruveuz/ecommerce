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
			<aside class='asideresults'>	
				<div>
					<br> <?php echo $row["unit_price"]?>€
				</div>
			</aside>
			<section class='sectionresults'>
				
				<img id="productImageresult" src="images/<?php echo $row["product_id"]?>.jpg" border="1"/>
				<div>	
					<h1>
						<span class="fn titre_court"><a href="index.php?page=product&id=<?php echo $row["product_id"]?>" style="text-decoration: none; color: #FFFFFF"><?php echo $row["name_short"]?> </a></span>
						<br/>
						<p class="titrelong">
							<span class="titre_long"><?php echo $row["name_long"]?></span>
						</p>
					</h1>
				</div>
			</section>
						
			<?php 
			//Take back amount value
			$amount=$row["amount"]; 
		}?>
		<!--Display amount value-->
		<aside class='asidecart'>
			Montant total: <?php echo $amount?>€   <br><img id="OrderImage" src="images/commande.jpg" /><br><br>
		</aside>	
	</main>
	</body>
	
	<?php include 'footer.php' ?>
</html>