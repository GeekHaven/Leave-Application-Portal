<?php
$dsn = 'mysql:host=localhost;dbname=leaveapp';
$username = 'root';
$pass = '';


try{
	$connection = new PDO($dsn , $username ,$pass) ;

	
}catch(PDOException $e){

}

?>