<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sigma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$cpuID = $_POST['cpuID'];
$gpuID = $_POST['gpuID'];
$osID = $_POST['osID'];
$ramID = $_POST['ramID'];
$storageID = $_POST['storageID'];
$displayID = $_POST['displayID'];
$ispre = 1;



$sql = "INSERT INTO `laptop` (`is_pre_made`, `gpuID`, `cpuID`, `ramID`, `storageID`, `displayID`, `osID`, `name`) VALUES ('$ispre','$gpuID', '$cpuID', '$ramID', '$storageID', '$displayID', '$osID', '$name')";
$conn->query($sql);
$result = mysqli_query($conn, "SELECT laptopID FROM `laptop` ORDER BY `laptopID` DESC LIMIT 1");
$laptopID = mysqli_fetch_assoc($result)['laptopID'];
echo $laptopID;

$target_dir = "assets/laptop_images/";
$img1 = $laptopID . '_1.png';
$target_file = $target_dir . $img1;
move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file);

$img2 = $laptopID . '_2.png';
$target_file = $target_dir . $img2;
move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file);

$img3 = $laptopID . '_3.png';
$target_file = $target_dir . $img3;
move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file);

$sql2 = "UPDATE `laptop` SET `laptop_img1`='$img1', `laptop_img2`='$img2', `laptop_img3`='$img3' WHERE laptopID='$laptopID'";

if ($conn->query($sql2) === TRUE) {
    header("Location: admin.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}