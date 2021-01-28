<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Notes Home</title>
<link rel="stylesheet" href="css/notes_home_style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900
&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1 align=center> <b style="color: #2d7d9a">Quick Notes</b></h1>

<?php
session_start();

// Checking for the existing session if not found, making it invalid.
if(!isset($_SESSION["username"]))
{
    $_SESSION["invalid_session"] = true;
    header("location: index.php");
}

    // Mobile view adjustments for user_info area.
    require_once "libs/mobile_detect.php";
    require_once "libs/color_codes.php";
    $detect = new Mobile_Detect;
	if ($detect->isMobile())
		echo "<div class=user_info_mobile>";
	else
		echo "<div class=user_info_pc>";
?>
    
	<img src="images/user_icon.png" alt="" width=45px>
	<br>
	<?php echo $_SESSION["username"]; ?>
    <form action="profile.php"  method=post>
		<input class="profile_button" style=" font-family: inter;" type=submit value="View Profile">
    </form>
    <form action="index.php" method=post>
    	<input type="hidden" name="loggedout" value="true">
       	<input class="logout_button" onclick= "return confirm('Are you sure you want to Log Out?');" style= "font-family: inter;" type=submit value="Log Out">
	</form>
	
	<table align=center class="about_main" onclick="location.href='about.php';">
	<tr>
	    <th class="about">
    	<img src="images/info_symbol.png" width="30px" >
            
        </th>
        <th class="about_text">
        About
        </th>
    </tr>
</table>
</div>

<?php
    // Mobile view adjustments
    require_once "libs/mobile_detect.php";
    $detect = new Mobile_Detect;
	if ($detect->isMobile())
		echo "<hr width=90% class=line noshade>";
?>

<table class="add_area">
	<tr>
		<td class="add_area">
			<form action="add_notes_form.php">
				<input style="display: inline-block;" type=image src="images/add.png" width=65px height=65px>
			</form>
		</td>
	<td class="add_area">
		<a href="add_notes_form.php" style="text-decoration: none;color:black;">
			ADD NOTES
		</a>
	</td>
	</tr>
</table>

<br>

<?php

    // If there is no data in session, going to the controllers.
    if(!isset($_SESSION["table_result"]))
	{   
		header("location: controllers/read_all.php");
    }	
    // If the data is present, displaying it
    else
	{
		$table_result = $_SESSION["table_result"];
        $color_code = 0;
        
		foreach($table_result as $row)
		{	
            if($color_code >= 4) 
                $color_code = 0;

		    echo("<table class=note_model style=\"background-color: ".getColor($color_code++).";\"");
			echo("<tr>");
				echo("<td class=title>".$row['title']."</td>");
				echo("<td class=status>".$row['status']."</td>");

				echo("<td rowspan=2 valign=middle class=edit_opt>");
					echo("<form action=update_notes_form.php method=post>");
					echo("<input type=hidden name=s_no value=\"".$row['s_no']."\">");
					echo("<input type=hidden name=title value=\"".$row['title']."\">");
					echo("<input type=hidden name=notes value=\"".$row['notes']."\">");
		            echo("<input type=hidden name=status value=\"".$row['status']."\">");
					echo("<input class=edit type=image src=\"images/edit.png\" width=40px height=40px style=\"margin:0px;\"> </form>");

		        echo("<form action=controllers/delete.php method=post>");
					echo("<input type=hidden name=s_no value=".$row['s_no'].">");
					echo("<input class=delete type=image src=\"images/delete.png\" width=40px height=40px style=\"margin:0px;\" onclick=\"return confirm('Do you want to delete the notes: ".$row['title']." ?');\"> </form>");
				echo("</td>");
			echo("</tr>");
			echo("<tr>");
                echo("<td colspan=2 class=notes valign=top>");
                echo($row['notes']);
                echo("</td>");
			echo("</tr>");
		    echo("</table>");
        }
		unset($_SESSION["table_result"]);
    }	
?>
</body>
</html>