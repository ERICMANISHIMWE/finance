<?php  
$db= mysqli_connect("localhost","root","","finance");

if (mysqli_connect_errno()) {
	echo 'Database connection failed with the following errors' . mysqli_error();
	die();

}




?>