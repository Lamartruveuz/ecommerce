<?php 
	$product_id= $_GET['id'];
	if(isset($_POST['quantity'])){
		if(empty($_POST['quantity'])) {
			$_POST['quantity']=1;
		}
	add_to_cart($product_id,$_POST['quantity'],$_SESSION["id"]); 
	unset($_POST['quantity']);
	}	
	$product = product_from_id($product_id);
	
	if(isset($page)) { //set cookie to count number of product view

		if($page=="product") {
			if(!isset($_COOKIE["count_pages"])) {
				setcookie("count_pages",1);
			}
			else {
				setcookie("count_pages",++$_COOKIE["count_pages"]);
			}
			
		}

	}
?>
