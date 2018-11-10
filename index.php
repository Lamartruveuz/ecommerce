<!--start session-->
<?php session_start();?>


<!--include of database file-->
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
	include "view/Enteteprojet.php";
	echo "<br><br>";
	if (file_exists('view/'.$page.'.php')===true){		
		include 'view/'.$page.'.php';
	}
	else {
		include 'view/news.php';
	}
	?>
</body>
<?php include 'view/footer.php'; ?>
</html>