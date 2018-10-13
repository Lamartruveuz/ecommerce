<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
	<?php include 'database.php' ?>
	<?php include 'Enteteprojet.php' ?>
</head>

<body>
<?php
	if(!isset($_GET['category'])) {
		$_GET['category']=null;
	}
	$research=research($_GET['search'],$_GET['category']);
 ?>
	<br>
	<main> <?php
	if ($research->rowCount() === 0) { 
    
	echo "No result found." ?>
	
<?php
} 	
	foreach($research as $row){
		?>
		<section class='sectionresults'>
		<aside class='asideresults'>	
			<div>
    		<br>Prix: <br> <?php echo $row["unit_price"]?>€
    	    	

			</div>

		</aside>
		
		
    	
			<img id="productImageresult" src="images/<?php echo $row["id"]?>.jpg" border="1"/>
			<div>
    		
				<h1>
			<span class="fn titre_court">			
				<a href="product.php?id=<?php echo $row["id"]?>" style="text-decoration: none; color: #000000"><?php echo $row["name_short"]?> </a>			
			</span>

			<span class="titre_long"><?php echo $row["name_long"]?></span>
			
		</h1>
				
    		
			</div>

		</section>
	<?php
	}
	
	?>
	<br>
	</main>
    
	</body>
	<?php include 'footer.php' ?>
</html>