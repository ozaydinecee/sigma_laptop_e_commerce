<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sigma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$stock = $_POST['stock'];
$price = $_POST['price'];
$itemName = $_POST['itemName'];
$id = $_POST['id'];

$itemID = $itemName;
$itemID .= "ID";

if ($stock != "default" && $price == "default") {
    $sql = "UPDATE $itemName SET `stock`='$stock' WHERE $itemID='$id'";
    $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    }
} elseif ($stock == "default" && $price != "default") {
    $sql = "UPDATE $itemName SET `price`='$price' WHERE $itemID='$id'";
    $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    }
} elseif ($stock != "default" && $price != "default") {
    $sql1 = "UPDATE $itemName SET `price`='$price' WHERE $itemID='$id'";
    $sql2 = "UPDATE $itemName SET `stock`='$stock' WHERE $itemID='$id'";
    $conn->query($sql1);
    $conn->query($sql2);

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        header("Location: admin.php");
        exit();
    }
} else {
    echo 'an error has been occured';
    exit();
}