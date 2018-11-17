

<main>
	<?php display_order($_SESSION["id"],$_GET["order"]); 
	foreach($product_info as $row) 
		{

			?>
			<aside class='asidecart'>	
				<div>
					<br> <?php echo $row["unit_price"]?>€

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
						Quantity :
						<?php echo $row["quantity"];?>
					</p>
				</div>
			</section>
						
			<?php 
			//Take back amount value
			$amount=$row["amount"]; 
		}?>
		<br/>
		<aside class='montantTotalFinal'>
			Montant total : <?php echo round($amount,2)?>€
		</aside>
		<br/>
		<br/>
	</main>
</main>