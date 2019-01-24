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
    //testing purpose
  //  $_SESSION['branch'] = 'ece';
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
		        	$stmt = $connection->prepare('SELECT * FROM applications WHERE branch = :branch ORDER BY status ASC');
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
		    	    }

		        } catch(PDOException $e){
	        		echo '<script language="javascript">';
	          		echo '$sql . "<br>" . $e->getMessage();';
	          		echo '</script>';   
	          		header("Refresh: 1; url=index.php");
        	}
			}
		} else if($method === 'AcApps') { #AcApps means accepted applications
				if(/*!admin*/false) {//testing
				
				} else {
					try {
				        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				        	$stmt = $connection->prepare('SELECT * FROM applications WHERE branch = :branch AND status = :status');
				    		$stmt->execute(['branch' => $_SESSION['branch'],'status' => 3]);
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
		} else if($method === 'PenApps') { #AcApps means accepted applications
				if(/*!admin*/false) {//testing
				
				} else {
					try {
				        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				        	$stmt = $connection->prepare('SELECT * FROM applications WHERE branch = :branch AND status = :status');
				    		$stmt->execute(['branch' => $_SESSION['branch'],'status' => 2]);
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
		} else if($method === 'RejApps') { #AcApps means accepted applications
				if(/*!admin*/false) {//testing
				
				} else {
					try {
				        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				        	$stmt = $connection->prepare('SELECT * FROM applications WHERE branch = :branch AND status = :status');
				    		$stmt->execute(['branch' => $_SESSION['branch'],'status' => 1]);
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
		} else if($method === 'noactionApps') { #AcApps means accepted applications
			if(/*!admin*/false) {//testing
			
			} else {
				try {
						$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						$stmt = $connection->prepare('SELECT * FROM applications WHERE branch = :branch AND status = :status');
						$stmt->execute(['branch' => $_SESSION['branch'],'status' => 0]);
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
