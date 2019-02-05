<?php
	
	session_start();
	if(!isset($_SESSION['user'])){  
	 echo '<script language="javascript">alert("Please Login")</script>';      
	   header("Refresh: 1; url=index.php"); 
	   exit();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="./static/css/form.css">
    <title>Dashboard</title>
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/4c124acc27.js"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
    <!--<script src="./static/js/form.js"></script>-->
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <h3><a class="nav-link" href="student_dashboard.php"><- BACK TO Dashboard</a></h3>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item float-right">
                    <h3><a class="nav-link" href="student_dashboard.php"><?php echo $_SESSION['user'] ?></a></h3>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Form -->
    <div class="container mt-5">
  

        <form action="./core/application-submission.php" method="post" enctype="multipart/form-data">
 
           
            <h2 class="text-center">Apply for Leave</h2>


            <div id="snackbar"><?php 
if (isset($_SESSION['error'])){
echo $_SESSION['error']; 

}

if (isset($_SESSION['success'])){
echo $_SESSION['success']; 


}

?></div>


 
<?php if ((isset($_SESSION['error']) || isset($_SESSION['success']))){


  echo '<script>function myFunction() {

   var x = document.getElementById("snackbar")
 
 
   x.className = "show";
 
  
   setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
 
 }
 myFunction();

 
 </script>';
 
 unset($_SESSION['error']);
 unset($_SESSION['success']);
 }
?>

         
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name of the Student</label>
                        <input type="text" class="form-control" placeholder="" name="studentName">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Branch</label>
                        <input type="text" class="form-control" placeholder="ECE/IT or ece/it" name="branch">
                    </div>


                </div>
                <!--  col-md-6   -->

                <div class="col-md-6">

                    <div class="form-group">
                        <label>Semester</label>
                        <input type="text" class="form-control" name="semester" placeholder="">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>
            <!--  row   -->


            <div class="row" style="padding-top: 10px">


                <span class="" style="padding-top: 15px; padding-left: 15px">Period of Leave</span>
                <div class="col-md-5" style="padding-right: 20px">
                    <div class="form-group">
                        <div class='input-group date' id='datepicker' data-date-format="dd-mm-yyyy">
                            <input type='date' class="form-control" placeholder="dd/mmm/yyyy" name="startDate" id="startDate" />
                            <span class="input-group-addon">
                                <span class="fa fa-calendar-alt fa-2x"></span>
                            </span>

                        </div>
                    </div>
                </div>
                <span class="" style="padding-top: 10px;padding-right: 20px">to</span>
                <div class="col-md-5">
                    <div class="form-group">
                        <div class='input-group date' id='datepicker1' data-date-format="dd-mm-yyyy">
                            <input type='date' class="form-control" placeholder="dd/mmm/yyyy" name="endDate" id="endDate" />
                            <span class="input-group-addon">
                                <i class="fa fa-calendar-alt fa-2x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--  col-md-6   -->

            <div class="row" style="padding-top: 30px">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nature of Leave</label>
                        <input type="text" class="form-control" placeholder="" name="natureOfLeave">
                    </div>


                </div>
                <!--  col-md-6   -->

                <div class="col-md-6">

                    <div class="form-group">
                        <label>Purpose of Leave</label>
                        <input type="text" class="form-control" id="phone" placeholder="" name="purpose">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>
            <!--  row   -->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Whether classes are scheduled or not during leave</label>
                        <select name = "classScheduledOnLeave" class="form-control">
                             <option value = "yes">YES</option>
                             <option value = "no">NO</option>
                        </select>
                    </div>


                </div>
                <!--  col-md-6   -->

                <div class="col-md-6">

                    <div class="form-group">
                        <label>Address during leave</label>
                        <input type="text" class="form-control" name="address" placeholder="">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>
            <!--  row   -->


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mobile No.</label>
                        <input type="text" class="form-control" placeholder="" name="mobile">
                    </div>


                </div>
                <!--  col-md-6   -->
            </div>
            <!--  row   -->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="company">Attachments (if any)</label>
                        <div class="file-field input-field">
                        
                    <hr/>
                        <div id="files">
                            <div id="filediv"><input name="file[]" type="file" id="file"/></div>
                        </div>
                        <input type="button" id="add_more" class="btn btn-success mt-4" value="Add More Files"/>
                          
                        </div>
                    </div>


                </div>
                <!--  col-md-6   -->
            </div>
            <!--  row   -->




            <div style="padding-top: 20px">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Submit</button>
            </div>
            <div></div>
        </form>
    </div>
    <!-- End Form -->

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <i class="fa fa-envelope fa-2x mr-3" aria-hidden="true"></i>
        <i class="fa fa-facebook-official fa-2x mr-3" aria-hidden="false"></i>
        <i class="fa fa-twitter fa-2x " aria-hidden="true"></i>
        <p class="mb-1 mt-2">Web Development Wing, Geekhaven</p>
    </footer>
    <script>
   var abc = 0;

$(document).ready(function() {

    $('#add_more').click(function() {
        var div_files = '<div id="filediv"><input name="file[]" type="file" id="file"></div>'
        $('#files').append(div_files).fadeIn('slow');
    });


$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                 abc += 1; 
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                
			    $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img1', src: './x.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
        });

   
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});


    </script>
    
    <script>
$("#endDate").change(function () {
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    if ((Date.parse(startDate) > Date.parse(endDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("endDate").value = "";
    }
});

</script>
</body>