<?php 
$user = 'root';
$password = 'root';
$db = 'inventory';
$host = 'localhost';
$port = 3306;
//creates a connection to the server
$link = mysqli_connect("$host:$port", "$user", "$password");

//confirms that there is a connection
if($link ===false){die("connection failed. " . mysqli_connect_error());}

?>