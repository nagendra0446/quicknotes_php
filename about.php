<?php
session_start();
// Checking for the existing session if not found, making it invalid.
if(!isset($_SESSION["username"]))
{
    $_SESSION["invalid_session"] = true;
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900
    &display=swap" rel="stylesheet">
    <title>About</title>
</head>
<body>
    <h1 class=about_heading align=left>
        <b> About:</b>
    </h1>



    <h1 class=about_heading align=left>
        This is Nagendra Nainala. I am passionate about software development and interested in working on challenging
        projects.  
    </h1>
    <br>
    
    <h1 class=about_heading align=left>
        The application is built using <b>php</b> and <b>HTML, CSS, JS</b>.
    </h1>
    <br>

    <!--<h1 class=about_heading align=left>
        <b>Git Hub: </b> 
        <a class=info href="https://github.com/nagendra0446" target="_blank">https://github.com/nagendra0446</a>  
    </h1>-->
    
    <h1 class=about_heading align=left>
        <b>Linked In: </b> 
        <a class=info href="https://www.linkedin.com/in/nagendra0446" target="_blank">https://www.linkedin.com/in/nagendra0446</a> 
    </h1>
    
    <h1 class=about_heading align=left>
        <b>Website:</b>
        <a class=info href="http://35.209.202.37:8080/nagendra" target="_blank">http://35.209.202.37:8080/nagendra</a> 
    </h1>
	
    
    <br>
    
    <h1 class=about_heading align=left>
        <a href="notes_home.php" class="return_button">Return to Quick Notes</a> 
    </h1>
</body>
</html>