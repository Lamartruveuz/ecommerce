<!DOCTYPE>
<html>
	<?php
		$bdd = new PDO('mysql:host=localhost;dbname=projetecommerce','root','');
	?>
	
	
<!--REQUETES COMMANDES DATABASE-->

<!--CART DISPLAY-->

<?php
	
	
	/*This function take in parameter the user id  and display the contain of the cart*/
	
	function display_cart($id_user_acount)
	{		
		//Import BDD
		$bdd = new PDO('mysql:host=localhost;dbname=projetecommerce','root','');
		
		//Initialisation of variables
		$amount='0';
		
		//SQL requests for needed values through all the targetted tables 
		$product_info=$bdd->query('SELECT op.quantity, op.unit_price, op.product_id, p.name, o.amount
								FROM order_products op 
								INNER JOIN orders o ON o.id=op.order_id
								INNER JOIN products p ON p.id=op.product_id
								WHERE o.user_id='.$id_user_acount.' AND o.type="CART"');
		
		//Curse of all lines that fit the conditions and display in form
		foreach($product_info as $row) 
		{
						?>
				<section class='sectioncart'>
					<aside class='asideresults'>	
						<div>
							<br>Prix: <br> <?php echo $row["unit_price"]?>€
						</div>
					</aside>
					<img id="productImageresult" src="images/<?php echo $row["id"]?>.jpg" border="1"/>
					<div>	
						<h1>
							<span class="fn titre_court"><?php echo $row["name"]?></span>
							<br/>
							<p class="titrelong">
								<span class="titre_long"><?php echo $row["name"]?></span>
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
			Montant total: <?php echo $amount?>€   <br><img id="OrderImage" src="commande.jpg" /><br><br>
		</aside>					
		<?php	$product_info->closeCursor();
	}
	

	 display_cart('10')?>


</html>