<!--start session-->


<!--include of database file-->

<!--TODO include of checkuser file-->

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
		include 'view/'.$page.'.php';
	}
	else {
		include 'view/news.php';
	}
	?>
</body>
</html>