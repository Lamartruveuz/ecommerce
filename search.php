<!DOCTYPE html>
<html>
<head>
	<?php include("Enteteprojet.php"); ?>
	<?php include 'database.php' ?>
	<title></title>
</head>
<body>
<br><br>
	<main>
		<form action="results.php" method="GET">
		Research: <input type="text" name="search" />
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
	</main>
</body>
</html>