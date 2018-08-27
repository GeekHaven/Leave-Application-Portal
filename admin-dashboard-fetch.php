<?php 
     
    session_start();

    //testing purpose
    $_SESSION['branch'] = 'ece';
    //testing

    require 'db.php' ;

    //logic for checking admin
    if(isset($_POST['method']) === true && empty($_POST['method']) === false) {
    	$method = htmlentities($_POST['method']);
    	if($method === 'getApps') {
			if(/*!admin*/false) {//testing
				
			} else {
				try {
		        	
		        
		        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		        	$stmt = $connection->prepare('SELECT * FROM applications WHERE branch = :branch');
		    		$stmt->execute(['branch' => $_SESSION['branch']]);
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
		                /**Jquery to use in fronthend**/
		                /*
							$(document).ready(function(){
							    $.ajax({
							        url: 'admin-dashboard-fetch.php',
							        type: 'post',
							        data: {method: 'getApps'},
							        success: function(data) {
							        	// check for no application
							        	// if data == 'No applications currently' else //logic ends
							            // showdirectly
							        }
						    	})
							});
		                */
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