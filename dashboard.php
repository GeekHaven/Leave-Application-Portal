<?php
	
		session_start();
		if(!isset($_SESSION['user'])){  
	     echo '<script language="javascript">alert("Please Login")</script>';      
      	 header("Refresh: 1; url=index.php"); 
      	 exit();
		}
		else{
			$email = $_SESSION['user'];
      		$id = $_SESSION['id'];
		}
?>




<body>
<h1>Hey ! Welcome to Dashboard .</h1>
</body>
