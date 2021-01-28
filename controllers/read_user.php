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
    $stmt = $pdo->prepare("select first_name,last_name,email,mobile,uname,pass from members2 where uname = :username");
    
    $username = $_SESSION["username"];
    
    // Executing
    $stmt->execute(array(':username' => $username));

    $member_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Setting the result in the SESSION.
    $_SESSION["member_result"] = $member_result;

    // Closing Connection
    unset($stmt);
    unset($pdo);

    header("location: ../profile.php");

}catch(PDOException $e) 
{
    return $e;
}
?>