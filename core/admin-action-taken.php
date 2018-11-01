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
    $_SESSION['branch'] = 'it';
    //testing

    require 'db.php' ;

    //logic for checking admin
    if(isset($_POST['method']) === true && empty($_POST['method']) === false) {
        $method = htmlentities($_POST['method']);
        $Z_ID = htmlentities($_POST['z_id']);
    	if($method === 'AcAppsUP') { #AcApps means accepted applications
				if(/*!admin*/false) {//testing
				
				} else {
					try {
                         
				        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				        	$stmt = $connection->prepare('UPDATE applications SET status = :status WHERE id = :z_id');
                            $stmt->execute(['status' => 3,'z_id' => $Z_ID]);
                            
				    		echo 'accepted';  

				        } catch(PDOException $e){
			        		echo '<script language="javascript">';
			          		echo '$sql . "<br>" . $e->getMessage();';
			          		echo '</script>';   
			          		header("Refresh: 1; url=index.php");
		        		}
				}
		} else if($method === 'PenAppsUP') { #AcApps means accepted applications
				if(/*!admin*/false) {//testing
				
				} else {
					try {
				        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				        	$stmt = $connection->prepare('UPDATE applications SET status = :status WHERE id = :z_id');
				    		$stmt->execute(['status' => 2,'z_id' => $Z_ID]);

				    		
				    		echo 'pended';  
				    		
				        } catch(PDOException $e){
			        		echo '<script language="javascript">';
			          		echo '$sql . "<br>" . $e->getMessage();';
			          		echo '</script>';   
			          		header("Refresh: 1; url=index.php");
		        		}
				}
		} else if($method === 'RejAppsUP') { #AcApps means accepted applications
				if(/*!admin*/false) {//testing
				
				} else {
					try {
				        	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				        	$stmt = $connection->prepare('UPDATE applications SET status = :status WHERE id = :z_id');
				    		$stmt->execute(['status' => 1,'z_id' => $Z_ID]);

				    			echo 'rejected';  

				        } catch(PDOException $e){
			        		echo '<script language="javascript">';
			          		echo '$sql . "<br>" . $e->getMessage();';
			          		echo '</script>';   
			          		header("Refresh: 1; url=index.php");
		        		}
				}
		}
	} 