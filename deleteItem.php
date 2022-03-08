<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sigma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$itemName = $_POST['itemName'];
$id = $_POST['id'];

$itemID = $itemName;
$itemID .= "ID";

$sql="DELETE FROM $itemName WHERE $itemID=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php");
    exit();
}

?>