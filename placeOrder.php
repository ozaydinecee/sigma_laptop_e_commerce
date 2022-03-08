<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sigma");


if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
$laptopID = $_SESSION['laptopID'];
$storage = $_POST['storage'];
$ram = $_POST['ram'];
$gpu = $_POST['gpu'];
$cpu = $_POST['cpu'];
$display = $_POST['display'];
$os = $_POST['os'];


$sql = "select * from (select cpu.component_name     as cpuName,
gpu.component_name     as gpuName,
display.component_name as displayName,
os.component_name      as osName,
ram.component_name     as ramName,
storage.component_name as storageName,
laptop.laptop_img1     as laptopImg,
laptop.name            as laptopName,
laptop.laptopID        as laptopID,
gpu.gpuID,
cpu.cpuID,
ram.ramID,
storage.storageID,
os.osID,
display.displayID,
cpu.price              as cpuPrice,
gpu.price              as gpuPrice,
display.price          as displayPrice,
os.price               as osPrice,
ram.price              as ramPrice,
storage.price          as storagePrice
from laptop
  inner join cpu on cpu.cpuID = laptop.cpuID
  inner join gpu on gpu.gpuID = laptop.gpuID
  inner join display on display.displayID = laptop.displayID
  inner join os on os.osID = laptop.osID
  inner join ram on ram.ramID = laptop.ramID
  inner join storage on storage.storageID = laptop.storageID) as laptops
where laptops.cpuID = $cpu and laptops.gpuID = $gpu and laptops.ramID = $ram and laptops.storageID = $storage and laptops.displayID = $display and laptops.osID = $os;";

$result = mysqli_query($conn, $sql);
$ids = mysqli_fetch_assoc($result);



if (mysqli_num_rows($result) == 0) {
    $insertLaptop = "INSERT INTO laptop (is_pre_made, gpuID, cpuID, ramID, storageID, displayID, osID) VALUES (0, '$gpu', '$cpu', '$ram', '$storage', '$display', '$os')";
    mysqli_query($conn, $insertLaptop);
    $result2 = mysqli_query($conn, $sql);
    $ids = mysqli_fetch_assoc($result2);
    $gpuID = $ids['gpuID'];
    $cpuID = $ids['cpuID'];
    $ramID = $ids['ramID'];
    $storageID = $ids['storageID'];
    $osID = $ids['osID'];
    $displayID = $ids['displayID'];
    mysqli_query($conn, "UPDATE storage SET stock = stock - 1 WHERE storageID = '$storageID'");
    mysqli_query($conn, "UPDATE gpu SET stock = stock - 1 WHERE gpuID = '$gpuID'");
    mysqli_query($conn, "UPDATE cpu SET stock = stock - 1 WHERE cpuID = '$cpuID'");
    mysqli_query($conn, "UPDATE ram SET stock = stock - 1 WHERE ramID = '$ramID'");
    mysqli_query($conn, "UPDATE display SET stock = stock - 1 WHERE displayID = '$displayID'");
    mysqli_query($conn, "UPDATE os SET stock = stock - 1 WHERE osID = '$osID'");
}
$gpuID = $ids['gpuID'];
$cpuID = $ids['cpuID'];
$ramID = $ids['ramID'];
$storageID = $ids['storageID'];
$osID = $ids['osID'];
$displayID = $ids['displayID'];

$laptopID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT laptopID FROM `laptop` WHERE gpuID=$gpuID AND cpuID=$cpuID AND ramID=$ramID AND storageID=$storageID AND displayID=$displayID AND osID=$osID"))['laptopID'];
$gpu_p = $ids['gpuPrice'];
//echo $gpu_p;
$cpu_p = $ids['cpuPrice'];
$ram_p = $ids['ramPrice'];
$storage_p = $ids['storagePrice'];
$os_p = $ids['osPrice'];
$display_p = $ids['displayPrice'];
$total_price = $gpu_p + $cpu_p + $ram_p + $storage_p + $os_p + $display_p + 5000;
$userID = $_SESSION['userID'];
$date = date("Y-m-d h:i:s");
$insert = "INSERT INTO `invoice` (`insurance_period`, `date` ,`total_price`, `laptopID`, `userID`, `cpu_price`, `gpu_price`, `ram_price`, `storage_price`, `display_price`, `os_price`) VALUES ('1 year','$date' ,'$total_price', '$laptopID', '$userID', '$cpu_p', '$gpu_p', '$ram_p', '$storage_p', '$display_p', '$os_p')";
$bisey = mysqli_query($conn, $insert);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sigma Inc </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body class="bg" style="background-image: url('assets/carousel_img/complete.jpg'); background-size: cover; background-repeat: repeat-y">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top ">
        <div class="container">
            <a class="navbar-brand" href="loggedindex.php">
                <img src="https://cdn-icons-png.flaticon.com/512/1001/1001266.png" style="width: 40px;" alt="">Sigma Inc</a>
            <br>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="loggedindex.php">Home</a>
                    <a class="nav-link" href="shop.php">Shop</a>
                    <a href="admin.php" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" color="#646771" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                        </svg>
                    </a>
                    <a href="endSession.php" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" color="#646771" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="margin-top: 150px; background-color: rgb(255, 255, 255, 0.65)">
        <div class="container justify-content-center align-items-center" style="padding-top: 50px">
            <div class="row col-12 container justify-content-center text-centeir">
                <img class="" src="assets/carousel_img/checkmark.png" style="max-height: 200px; max-width: 200px" alt="">
                <h2 class="my-4 d-inline-block text-center">Your order is received.<br>Thank you for choosing us!</h2>
            </div>
            <div class="row container text-center">
                <?php
                $order_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM invoice ORDER BY orderID DESC LIMIT 1"))['orderID'];
                echo '<h2 class="mb-5">Your order number is: ' . $order_id . '</h2>';
                ?>
            </div>
        </div>
    </div>

</body>

</html>