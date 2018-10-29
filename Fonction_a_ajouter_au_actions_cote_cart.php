<!--Fonction de suppression du panier-->
<?php
$bdd = new PDO('mysql:host=localhost;dbname=projetecommerce','root','');

function Suppr_Cart($user_id,$id_product)
{
	$suppression=$bdd->query("DELETE FROM order_products op
		INNER JOIN orders o on o.id=op.order_id
		WHERE op.product_id=".$id_product "AND o.user_id=".$user_id);
}