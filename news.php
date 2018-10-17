<html>
<head>
<link rel="stylesheet" href="css/main.css" />
</head>
<?php include 'Enteteprojet.php'?>
<body>
<?php
	$bdd = new
	PDO('mysql:host=localhost;dbname=projetecommerce', 'root', '') ;

	$response = $bdd->query("select * from products order by id desc limit 5");
	//$results = $response->fetch() ;

	


	foreach($response as $row){
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

    
	</body>
	<?php include 'footer.php' ?>
</html>