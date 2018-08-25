<?php 
     
    session_start();

    require 'db.php' ;
  

    if(!isset($_POST['submit'])) {
        echo '<script language="javascript"> alert("all fields required") </script>'; 
        header("Refresh: 1; url=index.php");
    }

    else {

    	$studentName = htmlentities($_POST['studentName']);
    	$rollNumber = htmlentities($_POST['rollNumber']);
    	$branch = htmlentities($_POST['branch']);
    	$semester = htmlentities($_POST['semester']);
    	$startDate = htmlentities($_POST['startDate']);
    	$endDate = htmlentities($_POST['endDate']);
    	$natureOfLeave = htmlentities($_POST['natureOfLeave']);
    	$purpose = htmlentities($_POST['purpose']);
    	$classScheduledOnLeave = htmlentities($_POST['classScheduledOnLeave']);
    	$address = 	htmlentities($_POST['address']);
    	$mobile = htmlentities($_POST['mobile']);
    	$email = htmlentities($_POST['email']);
    	$uploadedImageName =   "";

    	#######################
    	##### File Upload #####
    	#######################

    	$file = $_FILES['file'];
		print_r($file);
		# die("file");
		$fileName = $file['name'];
		$fileType = $file['type'];
		$fileTmpName = $file['tmp_name'];
		$fileError = $file['error'];
		$fileSize = $file['size'];

		$fileExt = explode('.', $fileName);
		

		$fileActualExt = strtolower($fileExt[1]);
		

		$allowed = array('jpg','jpeg','png','gif','bmp','img');

		if(in_array($fileActualExt, $allowed)) {
			if($fileError === 0) {
				if($fileSize<100000000) {
					$fileNewName = uniqid('',true).'.'.$fileActualExt;
					$uploadedImageName = $fileNewName;
					$fileDestination = 'http://localhost/Leave-Application-Portal/uploads'.$fileNewName; # change location afterwards
					$urlto = 'http://localhost/Leave-Application-Portal/uploads/'.$fileNewName; # change location afterwards
					move_uploaded_file($fileTmpName, $fileDestination);
					# header("Location: ./index.php?fileUpload==success");
				} else {
					echo '<script language="javascript"> alert("File is Too Big") </script>'; 
        			header("Refresh: 1; url=index.php");
				}	
				} 	else {
					echo '<script language="javascript"> alert("There Was An Error in Uploading File") </script>'; 
        			header("Refresh: 1; url=index.php");
				}
				}	else {
					echo '<script language="javascript"> alert("Format Not Supported") </script>'; 
        			header("Refresh: 1; url=index.php");
				}

				# add all data to database
				$sql = $connection->prepare("INSERT INTO application (studentName,rollNumber,branch,semester,startDate,natureOfLeave,purpose,classScheduledOnLeave,address,mobile,email,uploadedImageName) VALUES (:studentName,:rollNumber,:email,:branch,:semester,:startDate,:natureOfLeave,:purpose,:classScheduledOnLeave,:address,:mobile,:email,:uploadedImageName)");
                $cmd = $sql->execute(["studentName" => $studentName,"rollNumber" => $rollNumber,"branch" => $branch,"semester" => $semester,"startDate" => $startDate,"natureOfLeave" => $natureOfLeave,"purpose" => $purpose,"classScheduledOnLeave" => $classScheduledOnLeave,"address" => $address,"mobile" => $mobile,"email" => $email,"uploadedImageName" => $uploadedImageName]);

                if($cmd){
                      echo '<script language="javascript"> alert("Succesfully Registered , You can login now") </script>' ; 
                    header("Refresh: 1; url=index.php"); 
                }
                  
                else{
                    echo '<script language="javascript"> alert("Try Again !") </script>' ;     
                    header("Refresh: 1; url=usersignup.php");
                }
	   	}