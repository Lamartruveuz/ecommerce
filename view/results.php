<!--Page corrigée : OK-->
<!DOCTYPE html>
<html>
<head>
    <title>ecommerce</title>

    <link rel="stylesheet" href="Couleurs/Couleurs.css" />
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
	foreach($research as $row)
	{
		?>
		<section class='asideresults'>	
    		Prix: <br> <?php echo $row["unit_price"]?>€
		</section>
		<section class='sectionresults'>
			<img id="productImageresult" src="images/<?php echo $row["id"]?>.jpg"/>
			<div>			
				<a href="index.php?page=product&id=<?php echo $row["id"]?>" class="titre_court"><?php echo $row["name_short"]?> 
				</a>			
				<p class="titre_long">
					<?php echo $row["name_long"]?>
				</p>
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