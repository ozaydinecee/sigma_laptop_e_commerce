<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sigma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$storage_id = $_POST['storage'];
$ram_id = $_POST['ram'];
$cpu_id = $_POST['cpu'];
$gpu_id = $_POST['gpu'];
$display_id = $_POST['display'];
$os_id = $_POST['os'];

$result = mysqli_query($conn, "SELECT price FROM storage WHERE storage.storageID='$storage_id'");
$storage_price = mysqli_fetch_assoc($result)['price'];
$result = mysqli_query($conn, "SELECT price FROM ram WHERE ram.ramID='$ram_id'");
$ram_price = mysqli_fetch_assoc($result)['price'];
$result = mysqli_query($conn, "SELECT price FROM cpu WHERE cpu.cpuID='$cpu_id'");
$cpu_price = mysqli_fetch_assoc($result)['price'];
$result = mysqli_query($conn, "SELECT price FROM gpu WHERE gpu.gpuID='$gpu_id'");
$gpu_price = mysqli_fetch_assoc($result)['price'];
$result = mysqli_query($conn, "SELECT price FROM display WHERE display.displayID='$display_id'");
$display_price = mysqli_fetch_assoc($result)['price'];
$result = mysqli_query($conn, "SELECT price FROM os WHERE os.osID='$os_id'");
$os_price = mysqli_fetch_assoc($result)['price'];

$total_price = $storage_price + $cpu_price + $gpu_price + $ram_price + $display_price + $os_price + 5000;
echo $total_price;