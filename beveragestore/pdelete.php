<?php
	include("config.php");
	
	$id = $_GET['id'];	
	$delete="delete from products where id='$id'";
	$result= $connect->query($delete);
	header("location:pdetail.php");


?>