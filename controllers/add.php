<?php
require_once "../meta_info/config.php";

session_start();
// Checking for the existing session if not found, making it invalid.
if(!isset($_SESSION["username"]))
{
    $_SESSION["invalid_session"] = true;
    header("location: index.php");
}

try 
{
    // Opening Connection
    $pdo = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparing
    $stmt = $pdo->prepare("insert into notes_tab2(title,notes,status,userid) values(:title, :notes, :status, :username)");
    
    $title = $_POST["title"];
    $notes = $_POST["notes"];
    $status = $_POST["status"];
    $username = $_SESSION["username"];

    // Executing
    $stmt->execute(array(':title' => $title,
                        ':notes' => $notes,
                        ':status' => $status,
                        ':username' => $username));

    //$stmt->debugDumpParams();
    
    // Closing Connection
    unset($stmt);
    unset($pdo);

    header("location: ../notes_home.php");

}catch(PDOException $e) {
    return $e;
}
?>
