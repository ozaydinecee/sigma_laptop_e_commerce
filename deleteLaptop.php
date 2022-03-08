<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sigma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$laptopID = $_POST['laptopID'];


$sql="DELETE FROM `laptop` WHERE `laptopID`=$laptopID";

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php");
    exit();
}