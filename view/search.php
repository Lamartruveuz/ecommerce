<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<main>
	<center>
		<form action="index.php" method="GET">
			<input type="hidden" name="page" value="results" />
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