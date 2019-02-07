<?php 
require 'db.php' ;
        if (count($_FILES['file']['name'])) {
			$j = 0; 
          
            $uploadedImageName =   "";
            $id =  htmlentities($_POST['file-id']);
           
			for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
			
				$validextensions = array("jpeg", "jpg", "png"); 
				$ext = explode('.', basename($_FILES['file']['name'][$i]));
				 $file_extension = strtolower(end($ext));
				$target_path = "../uploads/"; 
				$newname="";
				$newname= md5(uniqid()) . "." . $ext[count($ext) - 1];
				$target_path = $target_path . $newname;
			    
			  if (($_FILES["file"]["size"][$i] < 1000000) 
						&& in_array($file_extension, $validextensions)) {
					if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
						$j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                       
                        $uploadedImageName.='_'. $newname;
                        
					} else {
						echo $j. ').<span id="error">please try again!.</span><br/><br/>';
					}
				} else {
					echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
				}
        }    
        $query = "select uploadedImageName from applications where id = ".$id;
        $STH = $connection -> prepare($query);

        $STH -> execute();

        $f = $STH -> fetch();
        $result = $f['uploadedImageName'];
        $uploadedImageName  = $result.$uploadedImageName;
       
    }
		  
    	 else {
    		echo '<script language="javascript"> alert("Tryf !") </script>' ; 
    	}
        
        # add all data to database
                $query = "UPDATE `applications` SET `uploadedImageName` = :uploadedImageName WHERE id = :id";
                
                $sql = $connection->prepare($query);
                $sql->bindValue(':id', $id);
                $sql->bindValue(':uploadedImageName', $uploadedImageName);
                $cmd = $sql->execute();

                if($cmd){
					$_SESSION['success'] ="Files Added";
                   
					header("location: ../student_dashboard.php"); 
				    exit(); 
                }
                  
                else{
                    $_SESSION['error'] ="Try again";
                   
						header("location: ../student_dashboard.php"); 
						exit();
                }

?>
