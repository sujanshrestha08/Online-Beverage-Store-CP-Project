<?php

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$usert = $_POST["usert"];

if($connect->query("INSERT INTO users (fname, lname, address, city, pin, email, password, type) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd', '$usert')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:cdetail.php");

?>
