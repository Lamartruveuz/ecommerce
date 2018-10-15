<!DOCTYPE html>
<html>
<head>
	<?php include("Enteteprojet.php"); ?>
	<?php include 'database_projet.php' ?>
	<title></title>
</head>
<body>
<br><br>
	<main>
	<center>
		<form action="results.php" method="GET">
		<br>Research: <input type="text" name="search" />
		<select name='category'>
		<option disabled selected>Category</option>
		<?php 
		$ranges=all_ranges();
		foreach($ranges as $range) {
			echo("<option value='".$range["id"]."'>".$range["name"]."</option>");
		} ?>
		</select>
		<input type="submit" />		
		</form>
		<br>
		</center>
	</main>
</body>
</html>