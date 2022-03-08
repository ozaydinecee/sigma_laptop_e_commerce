<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sigma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
//echo "Connected succesfully";

$ComponentName = $_POST['ComponentName'];
$price = $_POST['price'];
$mid = $_POST['mid'];
$stock = $_POST['stock'];
$attribute = $_POST['attr'];
$itemName = $_POST['itemName'];
$attr = "null";


switch ($itemName) {
    case "cpu":
        $attr = "clock_speed";
        break;
    case "gpu":
        $attr = "vram_size";
        break;
    case "ram":
        $attr = "size";
        break;
    case "display":
        $attr = "refresh_rate";
        break;
    case "os":
        $attr = "version";
        break;
    case "storage":
        $attr = "capacity";
        break;
    default:
        echo "An error has occured";
}


$sql = "INSERT INTO $itemName (`component_name`, `price`, `stock`, `manufacturerID`, $attr) VALUES ('$ComponentName', '$price', '$stock', '$mid', '$attribute')";

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}