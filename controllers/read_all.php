<?php

require_once "../meta_info/config.php";

session_start();
// Checking for the existing session if not found, making it invalid.
if(!isset($_SESSION["username"]))
{
    $_SESSION["invalid_session"] = true;
    header("location: index.php");
}

// Opening connection
try 
{
    $pdo = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparing
    $stmt = $pdo->prepare("select s_no,title,notes,status,entry_dt,remarks from notes_tab2  
                            where userid = :username order by s_no desc");
    
    $username = $_SESSION["username"];
    // Executing
    $stmt->execute(array(':username' => $username));

    $table_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Closing Connection
    unset($stmt);
    unset($pdo);

    // Setting up the result into the session.
    $_SESSION["table_result"] = $table_result;

    header("location: ../notes_home.php");

}catch(PDOException $e) {
    return $e;
}
?>
