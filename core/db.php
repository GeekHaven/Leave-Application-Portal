<?php
#$host = "db4free.net:3306"; 

$dsn = 'mysql:host=localhost;dbname=leaveapp';
//$dsn = 'mysql:host=171.76.189.54:3306;dbname=leave_portal2';
$username = 'root';
$pass = '';


try{
	$connection = new PDO($dsn , $username ,$pass) ;
	#$conn = new PDO('mysql:host=db4free.net;dbname=leave_portal2;port=3306','geekhaven2','Geekhaven@123');
	
}catch(Exception $e){
	echo $e;
}

?>