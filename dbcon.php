<?php
require_once "meta_info/config.php";
require_once "libs/color_codes.php";
try 
{
    $pdo = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) 
{
    return $e;
}

$stmt = $pdo->prepare("SELECT * FROM TEST");
    
//$stmt->execute(array(':id' => $id));
$stmt->execute();


//echo gettype($stmt->fetchAll());

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo (getColor(1));
//empty($result[3]['attr1']);

/*foreach($result as $row)
{
    foreach($row as $value)
        echo $value." ";
    echo "<br>";
}*/
/*while($result = $stmt -> fetch(PDO::FETCH_ASSOC))
{

        foreach($result as $data)
            echo $data." ";
        echo("<br>");
}*/

?>