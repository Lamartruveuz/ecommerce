<!--Page corrigée : OK-->
<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<link rel="stylesheet" href="../Couleurs/Couleurs.css" />
</head>
<?php include '../Max/Enteteprojet.php'?>
<body>
<?php
	$bdd = new
	PDO('mysql:host=localhost;dbname=projetecommerce', 'root', '') ;

	$response = $bdd->query("select * from products order by id desc limit 5");
	//$results = $response->fetch() ;?>

	
<main>
	<?php
	foreach($response as $row){
		?>
		<section class='asideresults'>	
			Prix: <br> <?php echo $row["unit_price"]?>€
		</section>
		<section class='sectionresults'>
			<img id="productImageresult" src="../images/<?php echo $row["id"]?>.jpg" border="1"/>
			<div>
				<a href="product.php?id=<?php echo $row["id"]?>" class="fn titre_court"><?php echo $row["name_short"]?> 
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