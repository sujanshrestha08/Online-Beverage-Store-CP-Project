<?php
	include("config.php");
	
	$id = $_GET['id'];	
	$delete="delete from orders where id='$id'";
	$result= $connect->query($delete);
	header("location:adminorder.php");


?>