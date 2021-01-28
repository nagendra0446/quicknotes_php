<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Quick Notes Sign In</title>
	<link rel="stylesheet" href="css/signin_style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900
    &display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        session_start();

        // Handling INVALID sessions
        if(isset($_SESSION["invalid_session"]) && $_SESSION["invalid_session"])
        {
            session_destroy();
            echo "<script>alert('Sorry, Session Expired!');</script>";
        }
        // Displaying Log out message
        elseif(isset($_POST["loggedout"]) && $_POST["loggedout"] == "true")
        {
            session_destroy();
            echo "<script>alert('Log out Successful');</script>";
        }     
    ?>

</head>
<body>

<?php
    // Some Mobile View Adjustments.
    require_once "libs/mobile_detect.php";
    $detect = new Mobile_Detect;
    if ($detect->isMobile())
    {
        echo "<h1 align=center class=intro>Welcome to <br><a class=intro_name>".
				"Quick Notes</a><br> Sign in to get started.</h1>";
    }
    else 
    {
        echo "<h1 align=center class=intro>Welcome to <a class=intro_name>".
				"Quick Notes</a><br> Sign in to get started.</h1>";
    }
?>

<br>


<div class=signin_box align=center>
	<form action = "controllers/signin_check.php" method=POST>
        <div class=signin_head align="center">Sign in</div>

        
        <?php 
        // Displaying invalid credentials message.
        if(isset($_SESSION["invalid_creds"]) && $_SESSION["invalid_creds"])
        {
            echo "<div align=center style=\"color:red;\">Invalid Username or Password</div>";
            session_destroy();
        }
        ?>

        <input class=text_inp type=text name="username" placeholder="Username" required>
		<br>
		<input class=text_inp type=password name="password" placeholder="Password" required>
		<br>
		<input class=signin_button type=Submit value="Sign in" placeholder="Password">
		<br>
		&nbsp;&nbsp;
		No Account? you can also
		 <a href="signup.php" class=signup_button>Sign Up</a>
	</form>	
</div>
</body>
</html>