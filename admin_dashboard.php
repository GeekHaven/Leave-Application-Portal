<?php session_start();

if(!isset($_SESSION['loggedin'])){
  
     header("location: ./adminLogin.php");

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>

		@import url('https://fonts.googleapis.com/css?family=Roboto');

		body {font-family: 'Roboto', sans-serif;}
		
		.sidenav {
			height: 100%;
			width: 250px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			padding-top: 20px;
			background: #42275a;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #734b6d, #42275a);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #734b6d, #42275a); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			background-size: cover;
			box-shadow: 0 0 10px #7b7777;
		}

		.sidenav li {
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 18px;
			color: #796ed4;
			display: block;
		}

		.sidenav li:hover {
			color: #f1f1f1;
		}

		.main {
			margin-left: 160px; /* Same as the width of the sidenav */
			font-size: 28px; /* Increased text to enable scrolling */
			padding: 0px 10px;
		}

		@media screen and (max-height: 450px) {
			.sidenav {padding-top: 15px;}
			.sidenav a {font-size: 18px;}
		}

		input {
			border-radius: 0px!important;
		}	

		.form-control {
			border: 1px solid #000!important;
			border-radius: 0px!important;
			color: #000!important;
		}

		.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
			background-color: #f6f6f6!important;
		}

		table {
			background:#474787;
			border-radius: 10px;
			overflow: hidden;
			width: 100%;
			margin: 0 auto;
			position:relative;
		}

		table thead tr {
   			height: 60px;
			}

	table thead tr th{
		font-size: 18px;
		color: #fff;
		line-height: 1.2;
		font-weight: unset;
		width: 260px;
		padding-left: 40px;
		text-align: left;

	}
		tbody{
			background:#fff;
		}
		tbody tr{
			height: 50px;
			font-size: 15px;
			line-height: 1.2;
			font-weight: unset;
		}

		td, th {
			line-height: 1.2;
			font-weight: unset;
			width: 260px;
			padding:5px;
			color:#7a7a7a;
			text-align: left;
		}



		tbody tr:nth-child(2n) {
    		background-color: #f5f5f5;
		}

		tbody tr:hover {
			background-color: #c2bfda;
			cursor: pointer
		}

		button{
			
			-webkit-transition-duration: 0.4s; /* Safari */
			 transition-duration: 0.4s;
			 background-color:white;
                        color: black;
						border: 0;
			 box-shadow: 0 0 12px black;
			 text-decoration-color: #796ed4;
			
            
                          text-align: center;
                          text-decoration: none;
                          display: inline-block;
			  width: 225px;
		 }
	
		   button:hover {
			 background-color: #796ed4; /* Green */
			 color: #796ed4;
		   }
	  
	  .button-fix button{
		margin:5px 0px;

	  }

	  @keyframes spinner-spin {
			0% {
				transform: rotate(0deg);
			}
			100% {
				transform: rotate(360deg);
			}
		}

		.spinner {
			display: flex;
			justify-content:center;
			align-items:center;
			width: 80px;
			height: 80px;
			position: absolute;
			left: 50%;
			top: 50%;
			border: 4px solid rgba(0, 0, 0, 0.1);
			border-left-color: #474787;
			border-radius: 50%;
			animation: spinner-spin 1.2s linear infinite;
			margin-top: 10%;
			display:block;
		}

		.tr-none{
			display:none;
		}
		
	</style>
</head>
<body>
	<div class="sidenav">
	<div style="height: 220px;width: 100%;padding: 10px;">
	<div style="background: url('peoM.jpg');height: inherit;width: inherit;background-size: cover;border-radius: 100% ">
	</div>
	</div>
	<ul style="padding: 10px; margin-top: 20px">
		<br>
		
	<div class="button-fix">
		<button><li class="btn all_apps" >ALL</li></button>
		
		<button><li class="btn pen_apps">PENDING</li></button>
		
	
		<button><li class="btn new_apps" >NEW!</li></button>
		
		
		<button><li class="btn acc_apps" >ACCEPTED</li></button>
	
		
		<button><li class="btn rej_apps" >REJECTED</li></button>
		
		<br>
		<br>
		<a href="core/adminlogout.php"><li  class="btn btn-danger" style="background:#FF1744; color:white; border:none; padding:0px; margin:0px;" >Log-out</li></a>
		</div>
	</div>
	
	</ul>
 
 
     
	<div>
		<h3 id="navdars" style="text-align: center;float: right;margin-right: 40px;margin-bottom: 50px;border-bottom: 2px solid cornflowerblue;background: #00ffaf;padding: 5px;border-radius: 5px;">ALL APPLICATIONS</h3>
 
		<div style="padding-left: 20px;width: 83%;margin-left: 250px;padding-right: 20px">
		
			<table id="records_table" class="table-responsive" style="box-shadow: box-shadow: 0 -3px 50px 0 rgba(0, 0, 0, 0.19), 0px 2px 16px 0 rgba(0, 0, 0, 0.24);">
				<thead>
				<tr>
					<th style="padding: 10px">Name</th>
					<th style="padding: 10px">Enrollment Number</th>
					<th style="padding: 10px">Branch</th>
					<th style="padding: 10px">Semester</th>
					<th style="padding: 10px">Nature of Leave</th>
					<th style="padding: 10px">Purpose</th>
					<th style="padding: 10px">Classes Scheduled</th>
					<th style="padding: 10px">Address</th>
					<th style="padding: 10px">Mobile</th>
					<th style="padding: 10px">Email</th>
					<th style="padding: 10px">Uploads</th>
					<th style="padding: 10px">Status</th>
				</tr>
				</thead>
				
				<tbody>
				<tr id="loader" class="spinner"></tr>
					<!-- tr -->	  
				</tbody>
			</table>
			<div id="noapp" class="alert alert-danger" style="text-align:center; margin:10px 10px; display:none;" role="alert">
         <strong>No </strong> applications here
</div>
		</div>
	
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content" style="border-radius: 0px!important">
				<div class="modal-header">
					<h4 class="modal-title">Leave Application (Cannot be edited)</h4>
				</div>
				<div class="modal-body">
				<div class="container">
				
					<div class="form-horizontal">
						<!--<div class="form-group">
						<label class="control-label col-sm-2" for="email">NAME</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_name"></p>
						</div>
						</div>
	-->
						<div class="form-group">
						<label class="control-label col-sm-2" for="email">ENROLLMENT NUMBER</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_enroll"></p>
						</div>
						</div>
<!--
						<div class="form-group">
						<label class="control-label col-sm-2" for="email">BRANCH</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_branch"></p>
						</div>
						</div>
	-->
						<div class="form-group">
						<label class="control-label col-sm-2" for="email">SEMESTER</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_semester" ></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">NATURE OF LEAVE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_nature"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">PURPOSE</label>
						<div class="col-sm-4">
							<textarea type="email" class="form-control" id="ans_purpose"></textarea>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">CLASS SCHEDULED ON LEAVE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_classScheduledOnLeave"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">START DATE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_startdate"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">END DATE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_enddate"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">ADDRESS</label>
						<div class="col-sm-4">
							<textarea type="email" class="form-control" id="ans_addr" disabled></textarea>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">MOBILE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_mobile"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">EMAIL</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_email"></p>
						</div>
						</div>
						<input id="Application_id" type="hidden" value=""/>
						<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button class="btn btn-default Acpt" style="background: #4caf50;border-radius: 0px!important;color: #fff;outline: none;border-color: #444;border-width: 2px; max-width:80px;">Accept</button>
							<button class="btn btn-default rjct" style="background: #ff1744;border-radius: 0px!important;color: #fff;outline: none;border-color: #444;border-width: 2px; max-width:80px;">Reject</button>
							<button class="btn btn-default pndg" style="background: #ffc400;border-radius: 0px!important;color: #000;outline: none;border-color: #444;border-width: 2px; max-width:80px;">Pending</button>
							<button type="button" class="btn btn-default" data-dismiss="modal" style="background: #fff;border-radius: 0px!important;color: #000;outline: none;border-color: #000;border-width: 2px; max-width:80px;">&nbsp&nbsp Close &nbsp&nbsp</button>
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>

			</div>
			
		</div>
		</div>
	
</body>

		
	
<script type="text/javascript" src="js-lib/jq.min.js"></script>
	<script type="text/javascript">

		$(document).on('click','.all_apps',function() {
			location.reload();
		});

		$(document).on('click','.pen_apps',function() {
			$.ajax({
		        url: './core/admin-dashboard-fetch.php',
		        type: 'post',
		        data: {method: 'PenApps'},
		        success: function(data) {
		        	// check for no application
		        	// if data == 'No applications currently' else //logic ends
		            // showdirectly
					setTimeout(() => {
						$('tr').removeClass('tr-none')
      					$('#loader').removeClass('spinner');
						$('#loader').css({
							"display":"none"
						});
    					}, 4000);

		            console.log(data);
					$('#noapp').hide();
					$('#navdars').html("PENDING APPLICATIONS");
					$('#navdars').css("background","#ffc400");
					$("#records_table").find("tr:gt(0)").remove();
					try { 
							response = $.parseJSON(data);
	                   }
                 catch(err) {
				     $('#noapp').show();
					 return;
				     }
					 
				$(function() {
					$.each(response, function(i, item) {
						var color = "#222";
						var tity = "no action";
						if(item.status == 0) {
          
						} else if(item.status == 1) {
							color = "#ff1744";
							tity = "REJECTED";
						} else if(item.status == 2) {
							color = "#ffc400";
							tity = "PENDING";
						} else if(item.status == 3) {
							color = "#4caf50";
							tity = "ACCEPTED";
						}
						uplo = item.uploadedImageName;
						str= uplo.split("_");
						uplo="";

						for(var i=1;i<str.length;i++){
                                uplo+="<a href='./uploads/"+str[i]+"'>"+i+" "+"</a>"
						}
						
						if (!uplo.replace(/\s/g, '').length) {
                                uplo="<p>No uploads</p>";
                        }
						var address = item.address.substring(0,30);
						address = address.length>=30?address.concat("..."):address;
						var purpose = item.purpose.substring(0,30);
						purpose = purpose.length>=30?purpose.concat("..."):purpose;
						var $tr = $('<tr id="row-data" onclick="ShowDet('+item.id+')" class="row-data tr-none" data-toggle="modal" data-target="#myModal">').append(
							$('<td id="stname'+item.id+'">').text(item.studentName),
							$('<td id="stroll'+item.id+'">').text(item.rollNumber.toUpperCase()),
							$('<td id="stbrnch'+item.id+'">').text(item.branch.toUpperCase()),
							$('<td id="stsem'+item.id+'">').text(item.semester),
							$('<td id="stnatleave'+item.id+'">').text(item.natureOfLeave),
							$('<td id="stpurpose'+item.id+'">').text(purpose),
							$('<td id="stpurposeCopy'+item.id+'" style="display:none">').text(item.purpose),
							$('<td id="stshedornt'+item.id+'">').text(item.classScheduledOnLeave.toUpperCase()),
							$('<td style="display: none" id="ststrtdat'+item.id+'">').text(item.startDate.toUpperCase()),
							$('<td style="display: none" id="stenddat'+item.id+'">').text(item.endDate.toUpperCase()),
							$('<td id="addr'+item.id+'">').text(address),
							$('<td id="addrCopy'+item.id+'" style="display:none">').text(item.address),
							$('<td id="stmbno'+item.id+'">').text(item.mobile),
							$('<td id="stemai'+item.id+'">').text(item.email),
							$('<td>').append($(uplo)),
							$('<td id="status_app">').append($('<div title="'+tity+'" style="border:4px solid #222;background:'+color+';width: 25px;height: 25px;border-radius: 0%;margin: auto">'))
						).appendTo('#records_table');
						//console.log($tr.wrap('<p>').html());
					});
				});
		        }
	    	})
		});
		
		$(document).on('click','.new_apps',function() {
			$.ajax({
		        url: './core/admin-dashboard-fetch.php',
		        type: 'post',
		        data: {method: 'noactionApps'},
		        success: function(data) {
		        	// check for no application
		        	// if data == 'No applications currently' else //logic ends
		            // showdirectly

					setTimeout(() => {
						$('tr').removeClass('tr-none')
      					$('#loader').removeClass('spinner');
						$('#loader').css({
							"display":"none"
						});
    					}, 4000);
		            console.log(data);
					$('#noapp').hide();
					$('#navdars').html("NEW APPLICATIONS");
					$('#navdars').css("background","#7cbeee");
					$("#records_table").find("tr:gt(0)").remove();
					try { 
							response = $.parseJSON(data);
	                   }
                 catch(err) {
				     $('#noapp').show();
					 return;
				     }
					 
				$(function() {
					$.each(response, function(i, item) {
						var color = "#222";
						var tity = "no action";
						if(item.status == 0) {

						} else if(item.status == 1) {
							color = "#ff1744";
							tity = "REJECTED";
						} else if(item.status == 2) {
							color = "#ffc400";
							tity = "PENDING";
						} else if(item.status == 3) {
							color = "#4caf50";
							tity = "ACCEPTED";
						}
						uplo = item.uploadedImageName;
						str= uplo.split("_");
						uplo="";

						for(var i=1;i<str.length;i++){
                                uplo+="<a href='./uploads/"+str[i]+"'>"+i+" "+"</a>"
						}
						
						if (!uplo.replace(/\s/g, '').length) {
                                uplo="<p>No uploads</p>";
                        }
						var address = item.address.substring(0,30);
						address = address.length>=30?address.concat("..."):address;
						var purpose = item.purpose.substring(0,30);
						purpose = purpose.length>=30?purpose.concat("..."):purpose;
						var $tr = $('<tr id="row-data" onclick="ShowDet('+item.id+')" class="row-data tr-none" data-toggle="modal" data-target="#myModal">').append(
							$('<td id="stname'+item.id+'">').text(item.studentName),
							$('<td id="stroll'+item.id+'">').text(item.rollNumber.toUpperCase()),
							$('<td id="stbrnch'+item.id+'">').text(item.branch.toUpperCase()),
							$('<td id="stsem'+item.id+'">').text(item.semester),
							$('<td id="stnatleave'+item.id+'">').text(item.natureOfLeave),
							$('<td id="stpurpose'+item.id+'">').text(purpose),
							$('<td id="stpurposeCopy'+item.id+'" style="display:none">').text(item.purpose),
							$('<td id="stshedornt'+item.id+'">').text(item.classScheduledOnLeave.toUpperCase()),
							$('<td style="display: none" id="ststrtdat'+item.id+'">').text(item.startDate.toUpperCase()),
							$('<td style="display: none" id="stenddat'+item.id+'">').text(item.endDate.toUpperCase()),
							$('<td id="addr'+item.id+'">').text(address),
							$('<td id="addrCopy'+item.id+'" style="display:none">').text(item.address),
							$('<td id="stmbno'+item.id+'">').text(item.mobile),
							$('<td id="stemai'+item.id+'">').text(item.email),
							$('<td>').append($(uplo)),
							$('<td id="status_app">').append($('<div title="'+tity+'" style="border:4px solid #222;background:'+color+';width: 25px;height: 25px;border-radius: 0%;margin: auto">'))
						).appendTo('#records_table');
						//console.log($tr.wrap('<p>').html());
					});
				});
		        }
	    	})
		});

		$(document).on('click','.acc_apps',function() {
			$.ajax({
		        url: './core/admin-dashboard-fetch.php',
		        type: 'post',
		        data: {method: 'AcApps'},
		        success: function(data) {
		        	// check for no application
		        	// if data == 'No applications currently' else //logic ends
		            // showdirectly

					setTimeout(() => {
						$('tr').removeClass('tr-none')
      					$('#loader').removeClass('spinner');
						$('#loader').css({
							"display":"none"
						});
    					}, 4000);
		            console.log(data);

                          
					$('#noapp').hide();
					$('#navdars').html("ACCEPTED APPLICATIONS");
					$('#navdars').css("background","#4caf50");
					$("#records_table").find("tr:gt(0)").remove();
					
					try { 
							response = $.parseJSON(data);
	                   }
                 catch(err) {
				     $('#noapp').show();
					
					 return;
				     }

				$(function() {
					$.each(response, function(i, item) {
						var color = "#222";
						var tity = "no action";
						if(item.status == 0) {

						} else if(item.status == 1) {
							color = "#ff1744";
							tity = "REJECTED";
						} else if(item.status == 2) {
							color = "#ffc400";
							tity = "PENDING";
						} else if(item.status == 3) {
							color = "#4caf50";
							tity = "ACCEPTED";
						}
						uplo = item.uploadedImageName;
						str= uplo.split("_");
						uplo="";

						for(var i=1;i<str.length;i++){
                                uplo+="<a href='./uploads/"+str[i]+"'>"+i+" "+"</a>"
						}
						
						if (!uplo.replace(/\s/g, '').length) {
                                uplo="<p>No uploads</p>";
                        }
						var address = item.address.substring(0,30);
						address = address.length>=30?address.concat("..."):address;
						var purpose = item.purpose.substring(0,30);
						purpose = purpose.length>=30?purpose.concat("..."):purpose;
						var $tr = $('<tr id="row-data" onclick="ShowDet('+item.id+')" class="row-data tr-none" data-toggle="modal" data-target="#myModal">').append(
							$('<td id="stname'+item.id+'">').text(item.studentName),
							$('<td id="stroll'+item.id+'">').text(item.rollNumber.toUpperCase()),
							$('<td id="stbrnch'+item.id+'">').text(item.branch.toUpperCase()),
							$('<td id="stsem'+item.id+'">').text(item.semester),
							$('<td id="stnatleave'+item.id+'">').text(item.natureOfLeave),
							$('<td id="stpurpose'+item.id+'">').text(purpose),
							$('<td id="stpurposeCopy'+item.id+'" style="display:none">').text(item.purpose),
							$('<td id="stshedornt'+item.id+'">').text(item.classScheduledOnLeave.toUpperCase()),
							$('<td style="display: none" id="ststrtdat'+item.id+'">').text(item.startDate.toUpperCase()),
							$('<td style="display: none" id="stenddat'+item.id+'">').text(item.endDate.toUpperCase()),
							$('<td id="addr'+item.id+'">').text(address),
							$('<td id="addrCopy'+item.id+'" style="display:none">').text(item.address),
							$('<td id="stmbno'+item.id+'">').text(item.mobile),
							$('<td id="stemai'+item.id+'">').text(item.email),
							$('<td>').append($(uplo)),
							$('<td id="status_app">').append($('<div title="'+tity+'" style="border:4px solid #222;background:'+color+';width: 25px;height: 25px;border-radius: 0%;margin: auto">'))
						).appendTo('#records_table');
						//console.log($tr.wrap('<p>').html());
					});
				});
		        }
	    	})
		});

		$(document).on('click','.rej_apps',function() {
			$.ajax({
		        url: './core/admin-dashboard-fetch.php',
		        type: 'post',
		        data: {method: 'RejApps'},
		        success: function(data) {
		        	// check for no application
		        	// if data == 'No applications currently' else //logic ends
		            // showdirectly

					setTimeout(() => {
						$('tr').removeClass('tr-none')
      					$('#loader').removeClass('spinner');
						$('#loader').css({
							"display":"none"
						});
    					}, 4000);
		            console.log(data);
					$('#noapp').hide();
					
					$('#navdars').html("REJECTED APPLICATIONS");
					$('#navdars').css("background","#FF1744");
					$("#records_table").find("tr:gt(0)").remove();
					try { 
							response = $.parseJSON(data);
	                   }
                 catch(err) {
				     $('#noapp').show();
					 return;

				     }
					 
				$(function() {
					$.each(response, function(i, item) {
						var color = "#222";
						var tity = "no action";
						if(item.status == 0) {

						} else if(item.status == 1) {
							color = "#ff1744";
							tity = "REJECTED";
						} else if(item.status == 2) {
							color = "#ffc400";
							tity = "PENDING";
						} else if(item.status == 3) {
							color = "#4caf50";
							tity = "ACCEPTED";
						}
						uplo = item.uploadedImageName;
						str= uplo.split("_");
						uplo="";

						for(var i=1;i<str.length;i++){
                                uplo+="<a href='./uploads/"+str[i]+"'>"+i+" "+"</a>"
						}
						
						if (!uplo.replace(/\s/g, '').length) {
                                uplo="<p>No uploads</p>";
                        }
					
						var address = item.address.substring(0,30);
						address = address.length>=30?address.concat("..."):address;
						var purpose = item.purpose.substring(0,30);
						purpose = purpose.length>=30?purpose.concat("..."):purpose;
						var $tr = $('<tr id="row-data" onclick="ShowDet('+item.id+')" class="row-data tr-none" data-toggle="modal" data-target="#myModal">').append(
							$('<td id="stname'+item.id+'">').text(item.studentName),
							$('<td id="stroll'+item.id+'">').text(item.rollNumber.toUpperCase()),
							$('<td id="stbrnch'+item.id+'">').text(item.branch.toUpperCase()),
							$('<td id="stsem'+item.id+'">').text(item.semester),
							$('<td id="stnatleave'+item.id+'">').text(item.natureOfLeave),
							$('<td id="stpurpose'+item.id+'">').text(purpose),
							$('<td id="stpurposeCopy'+item.id+'" style="display:none">').text(item.purpose),
							$('<td id="stshedornt'+item.id+'">').text(item.classScheduledOnLeave.toUpperCase()),
							$('<td style="display: none" id="ststrtdat'+item.id+'">').text(item.startDate.toUpperCase()),
							$('<td style="display: none" id="stenddat'+item.id+'">').text(item.endDate.toUpperCase()),
							$('<td id="addr'+item.id+'">').text(address),
							$('<td id="addrCopy'+item.id+'" style="display:none">').text(item.address),
							$('<td id="stmbno'+item.id+'">').text(item.mobile),
							$('<td id="stemai'+item.id+'">').text(item.email),
							$('<td>').append($(uplo)),
							$('<td id="status_app">').append($('<div title="'+tity+'" style="border:4px solid #222;background:'+color+';width: 25px;height: 25px;border-radius: 0%;margin: auto">'))
						).appendTo('#records_table');
						//console.log($tr.wrap('<p>').html());
					});
				});
		        }
	    	})
		});
		//on accept ajax 
		//on pending ajax
		//on reject ajax
		$(document).on('click','.Acpt',function() {
			var z_id = ($('#Application_id').attr('value'));
			$.ajax({
		        url: './core/admin-action-taken.php',
		        type: 'post',
		        data: {method: 'AcAppsUP',z_id},
		        success: function(data) {
		            console.log(data);
		        }
	    	});
			location.reload();
		});

		$(document).on('click','.rjct',function() {
			var z_id = ($('#Application_id').attr('value'));
			$.ajax({
		        url: './core/admin-action-taken.php',
		        type: 'post',
		        data: {method: 'RejAppsUP',z_id},
		        success: function(data) {
		           console.log(data);
		        }
	    	});
			location.reload();
		});

		$(document).on('click','.pndg',function() {
			var z_id = ($('#Application_id').attr('value'));
			$.ajax({
		        url: './core/admin-action-taken.php',
		        type: 'post',
		        data: {method: 'PenAppsUP',z_id},
		        success: function(data) {
		            console.log(data);
		        }
	    	});
			location.reload();
		});

		text_truncate = function(str,size) {
			if (str.length > size) {
			return str.substring(0, size)+'...';
			} else {
			return str;
			}
		};

		ShowDet = function(id) {
			//var stname = document.getElementById("stname"+id).textContent;
			var stroll = document.getElementById("stroll"+id).textContent;
			//var stbrnch = document.getElementById("stbrnch"+id).textContent;
			var stsem = document.getElementById("stsem"+id).textContent;
			var stnatleave = document.getElementById("stnatleave"+id).textContent;
			var stpurpose = document.getElementById("stpurposeCopy"+id).textContent;
			var stshedornt = document.getElementById("stshedornt"+id).textContent;
			var addr = document.getElementById("addrCopy"+id).textContent;
			var stmbno = document.getElementById("stmbno"+id).textContent;
			var stemai = document.getElementById("stemai"+id).textContent;
			var ststrtdat = document.getElementById("ststrtdat"+id).textContent;
			var stenddat = document.getElementById("stenddat"+id).textContent;
			console.log("error");
			//document.getElementById("ans_name").textContent = stname;
			document.getElementById("ans_enroll").textContent = stroll;
			//document.getElementById("ans_branch").textContent = stbrnch;
			document.getElementById("ans_semester").textContent = stsem;
			document.getElementById("ans_nature").textContent = stnatleave;
			document.getElementById("ans_purpose").textContent = stpurpose;
			document.getElementById("ans_classScheduledOnLeave").textContent = stshedornt;
			document.getElementById("ans_startdate").textContent = ststrtdat;
			document.getElementById("ans_enddate").textContent = stenddat;
			document.getElementById("ans_addr").textContent = addr;
			document.getElementById("ans_mobile").textContent = stmbno;
			document.getElementById("ans_email").textContent = stemai;
			document.getElementById("Application_id").setAttribute("value",id);

		}

		$(document).ready(function(){
		    $.ajax({
		        url: './core/admin-dashboard-fetch.php',
		        type: 'post',
		        data: {method: 'getApps'},
		        success: function(data) {
		        	// check for no application
		        	// if data == 'No applications currently' else //logic ends
		            // showdirectly

					setTimeout(() => {
						$('tr').removeClass('tr-none')
      					$('#loader').removeClass('spinner');
						$('#loader').css({
							"display":"none"
						});
    					}, 4000);
		            console.log(data);
					response = $.parseJSON(data);

				$(function() {
					$.each(response, function(i, item) {
						var color = "#222";
						var opacit = 1;
						var tity = "no action";
						if(item.status == 0) {

						} else if(item.status == 1) {
							color = "#ff1744";
							tity = "REJECTED";
						} else if(item.status == 2) {
							color = "#ffc400";
							tity = "PENDING";
						} else if(item.status == 3) {
							color = "#4caf50";
							opacit = .6;
							tity = "ACCEPTED";
						}
						uplo = item.uploadedImageName;
						str= uplo.split("_");
						uplo="";
						for(var i=1;i<str.length;i++){
                                uplo+="<a href='./uploads/"+str[i]+"'>"+i+" "+"</a>"
						}
						
						if (!uplo.replace(/\s/g, '').length) {
                                uplo="<p>No uploads</p>";
                        }
						
						var address = item.address.substring(0,30);
						address = address.length>=30?address.concat("..."):address;
						var purpose = item.purpose.substring(0,30);
						purpose = purpose.length>=30?purpose.concat("..."):purpose;
						var $tr = $('<tr id="row-data" onclick="ShowDet('+item.id+')" style="opacity:'+opacit+'" class="row-data tr-none" data-toggle="modal" data-target="#myModal">').append(
							$('<td style="padding-left: 10px;padding-right: 10px" id="stname'+item.id+'">').text(item.studentName),
							$('<td id="stroll'+item.id+'">').text(item.rollNumber.toUpperCase()),
							$('<td id="stbrnch'+item.id+'">').text(item.branch.toUpperCase()),
							$('<td id="stsem'+item.id+'">').text(item.semester),
							$('<td id="stnatleave'+item.id+'">').text(item.natureOfLeave),
							$('<td id="stpurpose'+item.id+'">').text(purpose),
							$('<td id="stpurposeCopy'+item.id+'" style="display:none">').text(item.purpose),
							$('<td id="stshedornt'+item.id+'">').text(item.classScheduledOnLeave.toUpperCase()),
							$('<td style="display: none" id="ststrtdat'+item.id+'">').text(item.startDate.toUpperCase()),
							$('<td style="display: none" id="stenddat'+item.id+'">').text(item.endDate.toUpperCase()),
							$('<td id="addr'+item.id+'">').text(address),
							$('<td id="addrCopy'+item.id+'" style="display:none">').text(item.address),
							$('<td id="stmbno'+item.id+'">').text(item.mobile),
							$('<td id="stemai'+item.id+'">').text(item.email),
							$('<td>').append($(uplo)),
							$('<td id="status_app">').append($('<div title="'+tity+'" style="border:4px solid #222;background:'+color+';width: 25px;height: 25px;border-radius: 0%;margin: auto">'))
						).appendTo('#records_table');
						//console.log($tr.wrap('<p>').html());
					});
				});
		        }
	    	})
		});
	</script>
</html>
