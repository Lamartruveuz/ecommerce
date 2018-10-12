<?php
	

	
	$bdd = new
	PDO('mysql:host=localhost;dbname=projet', 'root', '') ;
	$product_id=1;
	$quantity=2; 
	$user_id=1; //Known variables when user click "add to cart"
	$price_product=$bdd->query("select unit_price from products where id=".$product_id);

	foreach($price_product as $row) {
		$price=$row["unit_price"];
	}
	/*$user_cart_id=$bdd->query("select op.order_id,count(*) as count_cart from order_products 
		INNER JOIN orders o ON o.id = op.order_id
		WHERE o.user_id = :userID AND o.type='CART'"); //return id order of a specific user's cart if exists
	
	$product_in_cart=$bdd->query("select op.quantity, op.order_id, count(*) as count_product from order_products 
		INNER JOIN orders o ON o.id = op.order_id
		WHERE o.user_id = :userID AND o.type='CART' AND op.product_id= :productID"); //return quantity of a specific product in cart of user and its order id
		
	foreach($product_in_cart as $row) {
		$quantity_cart=$row["quantity"];
		$order_id=$row["order_id"];
	}
	$new_quantity=$quantity_cart+$quantity;
	$increment_quantity=$bdd->query('UPDATE order_products
		SET quantity='.$new_quantity.' WHERE order_id='.$order_id); //Increment quantity of the product in cart
	

	
	$add_product_to_cart== $bdd->exec('INSERT INTO `order_products` (order_id, product_id, quantity, unit_price) 
		VALUES ('.$order_id.','.$product_id.','.$quantity.','.$price); //Add a new product to cart
		
	*/	
	function research($search,$range) {
		$bdd = new
			PDO('mysql:host=localhost;dbname=projet', 'root', '') ;
		if($range!=null) {
			$research =$bdd->query("select * from products where name_short like '%".$search."%' AND range_id=".$range);
		}
		else {$research =$bdd->query("select * from products where name_short like '%".$search."%'");}
		return $research;
	}
	
	function product_from_id($id) {
		$bdd = new
			PDO('mysql:host=localhost;dbname=projet', 'root', '') ;
		$product =$bdd->query('select * from products where id='.$id)->fetch();
		return $product;
	}
	
	function all_ranges() {
		$bdd = new
			PDO('mysql:host=localhost;dbname=projet', 'root', '') ;
		$product =$bdd->query('select id, name from ranges');
		return $product;
	}
		
	function add_to_cart($product_id,$quantity,$user_id) {		
		$bdd = new
			PDO('mysql:host=localhost;dbname=projet', 'root', '') ;
		$get_price=$bdd->query('select unit_price from products where id='.$product_id)->fetch(); //get price of the product
		$price=$get_price["unit_price"];
		
		$user_cart_id=$bdd->query("select op.order_id,count(*) as count_cart from order_products op
		INNER JOIN orders o ON o.id = op.order_id
		WHERE o.user_id =".$user_id." AND o.type='CART'")->fetch();
		
		if($user_cart_id["count_cart"]!=0) { //if user have a cart
		
			$order_id=$user_cart_id["order_id"];
			$product_in_cart=$bdd->query("select op.quantity, op.order_id, count(*) as count_product from order_products op
				INNER JOIN orders o ON o.id = op.order_id
				WHERE o.user_id =".$user_id." AND o.type='CART' AND op.product_id=".$product_id)->fetch();

			if($product_in_cart["count_product"]!=0) { //if product is already in cart
			
				$new_quantity=$product_in_cart["quantity"]+$quantity;
				$increment_quantity=$bdd->query('UPDATE order_products
					SET quantity='.$new_quantity.' WHERE order_id='.$order_id.' and product_id='.$product_id); //increment quantity of the product
			}
			else {
				$add_product_to_cart= $bdd->exec('INSERT INTO order_products (order_id, product_id, quantity, unit_price) 
					VALUES ('.$order_id.','.$product_id.','.$quantity.','.$price.')'); //add the product to the cart
			}
		}
		
		
		else {
		
		$add_order=$bdd->exec("INSERT INTO `orders` (`user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`)
				VALUES (".$user_id.",'CART','CART',0, 1, 2)");
		$get_order_id=$bdd->query("select id from orders 
				WHERE user_id =".$user_id." AND type='CART'")->fetch(); // get the order id of user's cart
		$order_id=$get_order_id["id"];
		$add_product=$bdd->exec('INSERT INTO `order_products` (order_id, product_id, quantity, unit_price)
				VALUES ('.$order_id.','.$product_id.','.$quantity.','.$price.')');
		
		
		}
		$get_amount=$bdd->query("select sum(unit_price*quantity) as amount from order_products where order_id=".$order_id)->fetch(); //Get total amount of cart
		$update_amount=$bdd->exec('UPDATE orders SET amount='.$get_amount["amount"]." where id=".$order_id);	//	Update total amount of order
	}
	
	function display_cart()
	{
		$id_user_acount=1;
		
		$bdd = new PDO('mysql:host=localhost;dbname=projet','root','');
		
		$product_info=$bdd->query('SELECT op.quantity, op.unit_price, op.product_id, p.name_short,p.name_long, o.amount
								FROM order_products op 
								INNER JOIN orders o ON o.id=op.order_id
								INNER JOIN products p ON p.id=op.product_id
								WHERE o.user_id='.$id_user_acount.' AND o.type="CART"'); ?>
		 <?php
			if ($product_info->rowCount() === 0) { 
    
			echo "No result found.";
			}
		foreach($product_info as $row) 
		{
		?>
		<section class='sectioncart'>
			<aside class='asideresults'>	
				<div>
					<br>Prix: <br> <?php echo $row["unit_price"]?>€
	

				</div>

			</aside>

			<img id="productImageresult" src="images/<?php echo $row["product_id"]?>.jpg" border="1"/>
			<div>

				<h1>
					<span class="fn titre_court"><?php echo $row["name_short"]?></span>
					<br/>
					<p class="titrelong">
					<span class="titre_long"><?php echo $row["name_long"]?></span>
					</p>
				</h1>


			</div>

		</section>
						
					<?php 
					
			$amount=$row["amount"]; 
		}?>
	<aside class='asidecart'>
			Montant total: <?php echo $amount?>€   <br><img id="OrderImage" src="commande.jpg" /><br><br>
	</aside>	

	<?php	$product_info->closeCursor();
	}
?>