<!--Page corrigée : OK-->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Couleurs/Couleurs.css" />
</head>
<?php include 'Enteteprojet.php'?>
<body>
<?php
	$bdd = new
	PDO('mysql:host=localhost;dbname=projetecommerce', 'root', '') ;

	$response = $bdd->query("SELECT * from products order by id desc limit 5");
	//$results = $response->fetch() ;?>

	
<main>
	<?php
	foreach($response as $row){
		?>
		<section class='asideresults'>	
			Prix: <br> <?php echo $row["unit_price"]?>€
		</section>
		<section class='sectionresults'>
			<img id="productImageresult" src="images/<?php echo $row["id"]?>.jpg" border="1"/>
			<div>
				<a href="index.php?page=product&id=<?php echo $row["id"]?>" class="fn titre_court"><?php echo $row["name_short"]?> 
				</a>
				<p class="titre_long"><?php echo $row["name_long"]?>
				</p>    		
			</div>
		</section>
	<?php
	}
	?>
	<br/>
    </main>
	</body>
	<?php include 'footer.php' ?>
</html>