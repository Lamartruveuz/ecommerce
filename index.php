<!--start session-->
<?php session_start();?>


<!--include of database file-->
<?php $database = new PDO('mysql:host=localhost;dbname=projetecommerce','root','')?>
<?php include "database_projet.php"; ?>

<!-- include of checkuser file-->
<?php //include "checkUser.php"; ?>


<?php $page= "news" ;?>
<?php if (isset($_GET['page'])) {

	$page = $_GET['page'];
}

if (file_exists('action/'.$page.'.php')===true){
	include 'action/'.$page.'.php';
}
?>

<!DOCTYPE html>
<html>
<head>
	<!--TODO using $page decide to include header.php-->
</head>
<body>
	<?php 
	if (file_exists('view/'.$page.'.php')===true){		
		include "view/Enteteprojet.php";
		include 'view/'.$page.'.php';
	}
	else {
		include "view/Enteteprojet.php";
		include 'view/news.php';
	}
	?>
</body>
</html>