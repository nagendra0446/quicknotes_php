<?php

require_once "../meta_info/config.php";

session_start();

/*// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["username"]))
{
    header("location: notes_home.php");
}*/

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Getting user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Opening connection
    try 
    {
        $pdo = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Making Statement
        $stmt = $pdo->prepare("SELECT id, uname, pass FROM members2 WHERE uname = :username AND pass = :password");

        // Executing Statement
        if($stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]))
        {  
            // Checking for valid records, if found.
            if($stmt->rowCount() == 1)
            {           
                // Store data in session variables
                $_SESSION["username"] = $username;                        
                
                // Redirect user to welcome page
                header("location: ../notes_home.php");
            }
            // If no user exists
            else
            {
                // Display an error message if password is not valid
                $_SESSION["invalid_creds"] = true;
                header("location: ../index.php");
            }
        }
        // Closing Connection
        unset($stmt);
        unset($pdo);
    }catch(PDOException $e){
        return $e;
    }   
}
?>