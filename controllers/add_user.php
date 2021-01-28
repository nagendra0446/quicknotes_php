<?php
require_once "../meta_info/config.php";

session_start();
// Checking for the existing session if not found, making it invalid.
if(!isset($POST["uname"]))
{
    header("location: index.php");
}

try 
{
    // Opening Connection
    $pdo = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparing
    $stmt = $pdo->prepare("insert into members2(first_name, last_name, email, mobile, uname, pass) values(:first_name, :last_name, :email, :mobile, :uname, :pass)");
    
    $first_name = getParameter("first_name");
    $last_name = getParameter("last_name");
    $email = getParameter("email");
    $mobile = getParameter("mobile");
    $uname = getParameter("uname");
    $pass = getParameter("pass");

    // Executing
    $stmt->execute(array(':first_name' => $first_name,
                        ':last_name' => $last_name,
                        ':email' => $email,
                        ':mobile' => $mobile,
                        ':uname' => $uname,
                        ':pass' => $pass));


    //$stmt->debugDumpParams();

    // Closing Connection
    unset($stmt);
    unset($pdo);

    header("location: ..");


}catch(PDOException $e){
    return $e;
}

// Function to reduce code.
function getParameter($param)
{
    if(isset($_POST[$param]))
    {
        return $_POST[$param];
    }
    else
        return "";
}
?>
