<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
	<?php include 'Enteteprojet.php' ?>
</head>

<body>
<?php
	$bdd = new
	PDO('mysql:host=localhost;dbname=e-commerce', 'root', '') ;

	$research = $bdd->query("select * from product where short_title like '%".$_GET['search']."%'");
 ?>
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
    		<br>Prix: <br> <?php echo $row["price"]?>€
    	    	

			</div>

		</aside>
		
		
    	
			<img id="productImageresult" src="images/<?php echo $row["id"]?>.jpg" border="1"/>
			<div>
    		
				<h1>
			<span class="fn titre_court">
			<form action='visu.php' method='get'>
				<?php $row["id"]?>
				<a href="product.php" style="text-decoration: none"><?php echo $row["short_title"]?> </a>
			</form>
			</span>

			<span class="titre_long"><?php echo $row["long_title"]?></span>
			
		</h1>
				
    		
			</div>

		</section>
	<?php
	}
	
	?>
	</main>
    
	</body>
	<?php include 'footer.php' ?>
</html>