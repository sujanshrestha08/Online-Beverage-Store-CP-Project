<?php
	include("config.php");
	
	$id = $_GET['id'];	
	$delete="delete from users where id='$id'";
	$result= $connect->query($delete);
	header("location:cdetail.php");


?>