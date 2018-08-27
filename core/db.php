<?php
#$host = "db4free.net:3306"; 

//$dsn = 'mysql:host=localhost;dbname=leaveapp';
$dsn = 'mysql:host=localhost;dbname=leave_portal2';
$username = 'root';
$pass = '';


try{
	$connection = new PDO($dsn , $username ,$pass) ;

	
}catch(PDOException $e){
	die("no connection");
}

?>