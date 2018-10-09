<!-- IT15018960 - D.U. Liyanage -->
<!-- SSD Assignment 2 - OAuth -->

<!-- sign in page -->
<?php
    require "init.php";    
?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">      
    <link rel="icon" type="image/png" href="img/icon.png" sizes="16x16">
    <title>Sign in with LinkedIn</title>
</head>
	<body style="background: #F2F6F9; color: black; font-family: Helvetica;">
		<br>
		<h3 style="text-align: center; color: #747474;">IT15018960 - D.U. Liyanage<br>View Your LinkedIn Profile Details</h3>
	  	<!-- sign in -->
	    <div class="modal-content">
	    	<div class="container">
				<div class="imgcontainer">      
	        		<img  src="img/logo.png" alt="Generic placeholder image" style="height:50px; width: 180px;">
	        	</div>
	        	<div style="text-align: center;">
		    		<button style=" background-color: #0077B5; padding: 10px 10px; margin: 15px 0; border: none; cursor: pointer; border-radius: 3px;"><a style="text-decoration:none; color: white;" href="<?php  echo "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={$client_id}&redirect_uri={$redirect_uri}&state={$csrf_token}&scope={$scopes}"; ?>">Sign In with LinkedIn</a></button>
		    	</div>		
			</div>
		</div>

	</body>
</html>


  
		
	

