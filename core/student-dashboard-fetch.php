<?php 
     
    session_start();
    /**status**/
    /*
	0 -> newnot seen
	1 -> not accepted//rejected
	2 -> pending // for some reason
	3 -> accepted
    */
    /**********/
    //is session enroll  === row['roll'] then fetch //security
    //testing purpose
    //testing

    require 'db.php' ;

    //logic for checking admin
    if(isset($_POST['method']) === true && empty($_POST['method']) === false) {
    	$method = htmlentities($_POST['method']);
    	if($method === 'getstudentApps') {
			if(/*!student*/false) {//testing
				
			} else {
				try {
		        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        	$stmt = $connection->prepare('SELECT * FROM applications WHERE rollNumber = :roll ORDER BY status ASC');
		    		$stmt->execute(['roll' => $_SESSION['enroll']]);
		    		$applications = $stmt->fetchall(PDO::FETCH_ASSOC);

		    		if($applications == Null){
		    			echo '<script language="javascript">alert("No applications currently")</script>';  
		    	      	echo 'No applications currently';
		    		}
		    		else{		    
		                // json_endcode(data)
		                // echo(json_encode)
		                // use jquery to get response in frondhend and loop json data to show in dashboard
		                $apps = [];
		                foreach ($applications as $app) {
		                	$apps[] = $app;
		                }
		                echo json_encode($apps);
		    	    }

		        } catch(PDOException $e){
	        		echo '<script language="javascript">';
	          		echo '$sql . "<br>" . $e->getMessage();';
	          		echo '</script>';   
	          		header("Refresh: 1; url=index.php");
        	}
			}
		}
	} 