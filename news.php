
<html>
<head>
<link rel="stylesheet" href="css/main.css" />
</head>
<?php include 'Enteteprojet.php'?>
<body>
<?php
	$bdd = new
	PDO('mysql:host=localhost;dbname=e-commerce', 'root', '') ;

	$response = $bdd->query("select * from product order by id desc limit 3");
	//$results = $response->fetch() ;

	


	foreach($response as $row){
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

    
	</body>
	<?php include 'footer.php' ?>
</html>