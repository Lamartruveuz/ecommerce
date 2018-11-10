<?php
	if(isset($_SESSION["id"])) {
		header("Location: index.php?page=account");
	}
	if(isset($_POST['username'],$_POST['password'])){
		connexion($_POST['username'],$_POST['password']);
	}
	?>
		