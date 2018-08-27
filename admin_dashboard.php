<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
</head>
<body>
	<h3>applications</h3>
	<div></div>
</body>
<script type="text/javascript" src="js-lib/jq.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $.ajax({
		        url: 'admin-dashboard-fetch.php',
		        type: 'post',
		        data: {method: 'getApps'},
		        success: function(data) {
		        	// check for no application
		        	// if data == 'No applications currently' else //logic ends
		            // showdirectly
		            console.log(data);
		        }
	    	})
		});
	</script>
</html>