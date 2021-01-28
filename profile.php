<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>User Profile</title>
<link rel="stylesheet" href="css/about_style.css">
<link rel="stylesheet" href="css/profile_signup_style.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900
&display=swap" rel="stylesheet">	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<h1 align=center class=intro><b style="color:#2D7D9A;">Profile</b></h1>
	
	<?php
	session_start();

		if(!isset($_SESSION["username"]))
		{
			$_SESSION["invalid_session"] = true;
			header("location: /quicknotes");
		}
		elseif(!isset($_SESSION["member_result"]))
		{   
			header("location: controllers/read_user.php");
		}	
		else
		{	
			global $member_result;
			$member_result = $_SESSION["member_result"];
		} 

		function getParameter($param)
		{
			if(isset($_SESSION["member_result"][0][$param]))
			{
				return $_SESSION["member_result"][0][$param];
			}
			else
				return "";
		}

	?>

	
	<table class="profile_table">
	<tr>
		<td><b>First Name: </b></td>
		<td>
			<?php echo getParameter('first_name'); ?>
		</td>
	</tr>

	<tr>
		<td><b>Last Name: </b></td>
		<td>
		<?php echo getParameter('last_name'); ?>
		</td>
	</tr>
	

	<tr>
		<td><b>Email: </b></td>
		<td>
		<?php echo getParameter('email'); ?>
		</td>
	</tr>

	<tr>
		<td><b>Mobile: </b></td>
		<td>
		<?php echo getParameter('mobile'); ?>
		</td>
	</tr>

	<tr>
	    <td colspan=2 style="text-align:center;"></td>
	</tr>

	<tr>
		<td><b>Username: </b></td>
		<td>
		<?php echo getParameter('uname'); ?>
		</td>
	</tr>

	<tr>
		<td><b>Password:</b> </td>
		<td>
		<input type=password id=pass style="background-color: #e0ece4;"value=
		<?php echo getParameter('pass'); ?>
		</td>
	</tr>
	
	<tr>
		<td></td>
		
		<td><input align=right type="checkbox" onclick="myFunction()" style="zoom: 1.4;" >Show Password</td>
		
	</tr>

	</table>
	
	<h1 class=about_heading align=left>
        <a href="notes_home.php" class="return_button">Return</a> 
    </h1>

</body>
<script>
	function myFunction() {
  		var x = document.getElementById("pass");
  		if (x.type == "password") {
    		x.type = "text";
  		}else {
   	 	x.type = "password";
  		}
	}
</script>
</html>