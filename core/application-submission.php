<?php 
    
    session_start();

    require 'db.php' ;
  

    if(!empty($_POST['submit'])) {
		$_SESSION['error'] ="all fields required";
                   
		header("location: ../form.php"); 
		exit();
      //  echo '<script language="javascript"> alert("all fields required") </script>'; 
       // header("Refresh: 1; url=../student_dashboard.php");
    }

    else if(isset($_SESSION['id'])){

    	$studentName = htmlentities($_POST['studentName']);
    	//$rollNumber = htmlentities($_POST['rollNumber']);
    	$branch = htmlentities($_POST['branch']);
    	$semester = htmlentities($_POST['semester']);
		$startDate = htmlentities($_POST['startDate']);
    	$endDate = htmlentities($_POST['endDate']);
    	$natureOfLeave = htmlentities($_POST['natureOfLeave']);
    	$purpose = htmlentities($_POST['purpose']);
    	$classScheduledOnLeave = htmlentities($_POST['classScheduledOnLeave']);
    	$address = 	htmlentities($_POST['address']);
    	$mobile = htmlentities($_POST['mobile']);
    	//$email = htmlentities($_POST['email']);
    	$uploadedImageName =   "";

    	# backend check for empty fields
    	if(empty(trim($studentName)) || empty(trim($branch)) || empty(trim($semester)) || empty(trim($startDate)) || empty(trim($endDate)) || empty(trim($natureOfLeave)) || empty(trim($purpose)) || empty(trim($classScheduledOnLeave)) || empty(trim($address)) || empty(trim($mobile)) ) {
			$_SESSION['error'] ="Please fill all the fields";
                   
		header("location: ../form.php"); 
		exit();
			
			//echo '<script language="javascript"> alert("unfilled fields") </script>'; 
        	///header("Refresh: 1; url=../student_dashboard.php");
        //	exit();
    	}

    	# backend check for text => only alphabets can be used in these fields
		if ( !preg_match("/^[a-zA-Z]*$/", $branch) || !preg_match("/^[a-zA-Z]*$/", $classScheduledOnLeave)) {
			$_SESSION['error'] ="invalid fields";
                   
		header("location: ../form.php"); 
		exit();
			
			
		
		} 

		if ( strtolower($branch) == 'ece' || strtolower($branch) == 'it') {
			//Ok
		} else {

			$_SESSION['error'] ="invalid branch selection";
                   
			header("location: ../form.php"); 
			exit();
				
        
		} 

		if ( strtolower($classScheduledOnLeave) == 'yes' || strtolower($classScheduledOnLeave) == 'no') {
			//Ok
		} else {
        	$_SESSION['error'] ="invalid class schedule";
                   
			header("location: ../form.php"); 
			exit();
		} 

		
		#more checks

    	#######################
    	##### File Upload #####
		#######################
		
		
		if (count($_FILES['file']['name'])) {
			$j = 0; 
			
		
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
						echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
						
						$uploadedImageName.='_'. $newname;
					
					} else {
						echo $j. ').<span id="error">please try again!.</span><br/><br/>';
					}
				} else {
					echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
				}
		}    }
		  
    	 else {
    		echo '<script language="javascript"> alert("Tryf !") </script>' ; 
    	}
    	

				# add all data to database
				$sql = $connection->prepare("INSERT INTO applications (studentName,rollNumber,branch,semester,startDate,endDate,natureOfLeave,purpose,classScheduledOnLeave,address,mobile,email,uploadedImageName) VALUES (:studentName,:rollNumber,:branch,:semester,:startDate,:endDate,:natureOfLeave,:purpose,:classScheduledOnLeave,:address,:mobile,:email,:uploadedImageName)");

                $cmd = $sql->execute(["studentName" => $studentName,"rollNumber" => $_SESSION['enroll'],"branch" => $branch,"semester" => $semester,"startDate" => $startDate,"endDate"=>$endDate,"natureOfLeave" => $natureOfLeave,"purpose" => $purpose,"classScheduledOnLeave" => $classScheduledOnLeave,"address" => $address,"mobile" => $mobile,"email" => $_SESSION['user'],"uploadedImageName" => $uploadedImageName]);

                if($cmd){
					$_SESSION['success'] ="Form has been submitted ";
                   
					header("location: ../form.php"); 
				    exit(); 
                }
                  
                else{
                    $_SESSION['error'] ="Try again";
                   
						header("location: ../form.php"); 
						exit();
                }
	   	}
