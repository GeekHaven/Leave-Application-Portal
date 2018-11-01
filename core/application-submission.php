<?php 
     
    session_start();

    require 'db.php' ;
  

    if(!empty($_POST['submit'])) {
        echo '<script language="javascript"> alert("all fields required") </script>'; 
        header("Refresh: 1; url=../student_dashboard.php");
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
    		echo '<script language="javascript"> alert("unfilled fields") </script>'; 
        	header("Refresh: 1; url=../student_dashboard.php");
        	exit();
    	}

    	# backend check for text => only alphabets can be used in these fields
		if ( !preg_match("/^[a-zA-Z]*$/", $branch) || !preg_match("/^[a-zA-Z]*$/", $classScheduledOnLeave)) {
        	echo '<script language="javascript"> alert("invalid fields") </script>'; 
        	header("Refresh: 1; url=../student_dashboard.php");
        	exit();
		} 

		if ( strtolower($branch) == 'ece' || strtolower($branch) == 'it') {
			//Ok
		} else {
        	echo '<script language="javascript"> alert("invalid branch selection") </script>'; 
        	header("Refresh: 1; url=../student_dashboard.php");
        	exit();
		} 

		if ( strtolower($classScheduledOnLeave) == 'yes' || strtolower($classScheduledOnLeave) == 'no') {
			//Ok
		} else {
        	echo '<script language="javascript"> alert("invalid classScheduledOrNot") </script>'; 
        	header("Refresh: 1; url=../student_dashboard.php");
        	exit();
		} 

		
		#more checks

    	#######################
    	##### File Upload #####
    	#######################
    	if (!empty($_FILES['file'])) {
    		$file = $_FILES['file'];
			print_r($file);
			//die($file);
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
						$fileDestination = '../uploads/'.$fileNewName; # change location afterwards
						$urlto = '../uploads/'.$fileNewName; # change location afterwards
						move_uploaded_file($fileTmpName, $fileDestination);
						# header("Location: ./index.php?fileUpload==success");
					} else {
						echo '<script language="javascript"> alert("File is Too Big") </script>'; 
	        			header("Refresh: 1; url=student_dashboard.php");
					}	
					} 	else {
						echo '<script language="javascript"> alert("There Was An Error in Uploading File") </script>'; 
	        			header("Refresh: 1; url=student_dashboard.php");
					}
					}	else {
						echo '<script language="javascript"> alert("Format Not Supported") </script>'; 
	        			header("Refresh: 1; url=student_dashboard.php");
					}
    	} else {
    		echo '<script language="javascript"> alert("Tryf !") </script>' ; 
    	}
    	

				# add all data to database
				$sql = $connection->prepare("INSERT INTO applications (studentName,rollNumber,branch,semester,startDate,endDate,natureOfLeave,purpose,classScheduledOnLeave,address,mobile,email,uploadedImageName) VALUES (:studentName,:rollNumber,:branch,:semester,:startDate,:endDate,:natureOfLeave,:purpose,:classScheduledOnLeave,:address,:mobile,:email,:uploadedImageName)");

                $cmd = $sql->execute(["studentName" => $studentName,"rollNumber" => $_SESSION['enroll'],"branch" => $branch,"semester" => $semester,"startDate" => $startDate,"endDate"=>$endDate,"natureOfLeave" => $natureOfLeave,"purpose" => $purpose,"classScheduledOnLeave" => $classScheduledOnLeave,"address" => $address,"mobile" => $mobile,"email" => $_SESSION['user'],"uploadedImageName" => $uploadedImageName]);

                if($cmd){
                      echo '<script language="javascript"> alert("Succesfully submmited") </script>' ; 
                    header("Refresh: 1; url=../student_dashboard.php"); 
                }
                  
                else{
                    echo '<script language="javascript"> alert("Try Again !") </script>' ;     
                    header("Refresh: 1; url=../student_dashboard.php");
                }
	   	}