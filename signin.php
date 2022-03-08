<?php
$conn = new mysqli("localhost", "root", "", "sigma");


if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


if(empty($row)) {
    echo "<script>alert('Check your credentials')</script>";
    echo "<script>location.replace('login.php')</script>";
    die();
}

if($row['email'] == $email && $row['password'] == $password) {
    echo "Welcome ".$email." you are succesfully logged in.";
    session_start();
    $_SESSION['email'] = $row['email'];
    $_SESSION['userID'] = $row['userID'];
    echo "<script>location.replace('loggedIndex.php')</script>";
}
else{
    echo "<script>alert('Check your credentials')</script>";
    echo "<script>location.replace('login.php')</script>";
}