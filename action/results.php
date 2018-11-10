<?php
	if(!isset($_GET['category'])) {
		$_GET['category']=null;
	}
	$research=research($_GET['search'],$_GET['category']);
 ?>
