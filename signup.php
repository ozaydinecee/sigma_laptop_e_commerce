<?php

session_start();
if (isset($_SESSION['email']))
    header("Location: index.php");
$email = $_SESSION['email'];
$conn = new mysqli("localhost", "root", "", "sigma");

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$isadmin = 0;



$sql = "INSERT INTO `user` (`name`, `surname`, `email`, `street_address`, `is_admin`, `password`) VALUES ('$first','$last', '$email', '$address', '$isadmin', '$password')";
if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>