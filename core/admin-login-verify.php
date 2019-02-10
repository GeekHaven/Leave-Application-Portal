<?php 
     
    session_start();

    require 'db.php' ;
  

    if(!isset($_POST['submit'])){
        echo '<script language="javascript"> alert("Access Denied") </script>'; 
        header("Refresh: 1; url=index.php");
    }

    else{

        if(isset($_POST['Email']) && isset($_POST['Password'])){
        	$pass = md5(htmlentities($_POST['Password']));
			$email = htmlentities($_POST['Email']);
        }
        
        

        try {
        	
        
        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        	$stmt = $connection->prepare('SELECT * FROM users WHERE Email = :email  AND Password = :password');
    		$stmt->execute(['email' => $email, 'password' => $pass]);
    		$user = $stmt->fetch(PDO::FETCH_ASSOC);

    		if($user == Null){
    			echo '<script language="javascript">alert("Invalid credentials! Try Again")</script>';  
    	      	header("Refresh: 1; url=../index.php"); 
    		}


    		else{		    
				$name = $user['Name'];
				$_SESSION['user'] = $email;
				$_SESSION['branch']=$_POST['branch'];
				$_SESSION['Name']=$name;
				$_SESSION['loggedin'] =true;
			//	$_SESSION['admin'] =true;
                  header("location: ../admin_dashboard.php"); 
                  
    	    }

        }
    	
    	catch(PDOException $e){
        		echo '<script language="javascript">';
          		echo '$sql . "<br>" . $e->getMessage();';
          		echo '</script>';   
          		header("Refresh: 1; url=../index.php");
        	}

        $connection = null;
    }

?>
