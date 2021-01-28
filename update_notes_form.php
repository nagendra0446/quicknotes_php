<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Update Notes</title>
<link rel="stylesheet" href="css/add_update_form.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&
display=swap" rel="stylesheet">
</head>

<body>

<?php
session_start();
// Checking for the existing session if not found, making it invalid.
if(!isset($_SESSION["username"]))
{
    $_SESSION["invalid_session"] = true;
    header("location: index.php");
}

// Update form when accessed directly without update button.
if(!isset($_POST['notes']))
{
    header("location: notes_home.php");
}
?>

<h1 align="center">Update Your Notes</h1>

<div class="input_area">

<form action="controllers/update.php" method=POST>

<input type=hidden name="s_no" value="<?php echo getParameter("s_no") ?>">

<input class="title" type=text name="title" placeholder="Title" value="<?php echo getParameter("title") ?>"  autofocus required>
<br>

<textarea name="notes" rows="11" placeholder="Add Your Notes Here" 
	required style="resize: vertical;"><?php echo getParameter("notes") ?></textarea>
<br>

<select name="status">    
	<?php generateOptions() ?>
</select>
<br>


<input class="update_notes" type=submit value="UPDATE NOTES">

</form>
</div>

<br>
<br>

</table>
</body>
</html>


<?php
// Some functions to reduce code.

    function getParameter($param_name)
    {
        if(isset($_POST[$param_name]))
            return $_POST[$param_name];
        else
            return "";
    }

    function generateOptions()
    {

        if(getParameter("status") == "PENDING")
        {
            echo "<option value=\"PENDING\" selected>PENDING</option>".
                    "<option value=\"COMPLETED\">COMPLETED</option>".
                    "<option value=\"IN-PROGRESS\">IN-PROGRESS</option>".
                    "<option value=\"SKIPPED\">SKIPPED</option>";
        }
        else if(getParameter("status") == "COMPLETED")
        {
            echo "<option value=\"PENDING\">PENDING</option>".
                    "<option value=\"COMPLETED\" selected>COMPLETED</option>".
                    "<option value=\"IN-PROGRESS\">IN-PROGRESS</option>".
                    "<option value=\"SKIPPED\">SKIPPED</option>";
        }
        else if(getParameter("status").strcmp("IN-PROGRESS"))
        {
            echo "<option value=\"PENDING\">PENDING</option>".
                    "<option value=\"COMPLETED\">COMPLETED</option>".
                    "<option value=\"IN-PROGRESS\" selected>IN-PROGRESS</option>".
                    "<option value=\"SKIPPED\">SKIPPED</option>";
        }
        else if(getParameter("status").strcmp("SKIPPED"))
        {
            echo "<option value=\"PENDING\">PENDING</option>".
                    "<option value=\"COMPLETED\">COMPLETED</option>".
                    "<option value=\"IN-PROGRESS\">IN-PROGRESS</option>".
                    "<option value=\"SKIPPED\" selected>SKIPPED</option>";
        }
        else
        {
            echo "<option value=\"PENDING\">PENDING</option>".
                    "<option value=\"COMPLETED\">COMPLETED</option>".
                    "<option value=\"IN-PROGRESS\">IN-PROGRESS</option>".
                    "<option value=\"SKIPPED\">SKIPPED</option>";
        }
	}
?>