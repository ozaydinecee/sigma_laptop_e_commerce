<?php
session_start();
if (!($_SESSION['email'] == 'admin@gmail.com'))
    header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigma Inc-Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("#operation").change(function () {
                var data = $("#form1").serialize();

                if (data === 'operation=add') {
                    $("#div1").load("add.html");
                } else if (data === 'operation=update') {
                    $("#div1").load("update.html");
                } else if (data === 'operation=delete') {
                    $("#div1").load("delete.html");
                }
            });
        });
    </script>
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="loggedindex.php">Sigma</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="admin.php">Admin</a>
                <a class="nav-link active" aria-current="page" href="orders.php">Orders</a>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col">

            <h3 class="text-center">CPUs</h3>


            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">cpuID</th>
                    <th scope="col">Component Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Manufacturer ID</th>
                    <th scope="col">Clock Speed</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sigma";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("connection failed: " . $conn->connect_error);
                }

                $getOrders = "SELECT * FROM `cpu` ORDER BY `cpuID`";
                $result = mysqli_query($conn, $getOrders);
                while ($row = mysqli_fetch_assoc($result)) {
                    $cpuID = $row['cpuID'];
                    $componentName = $row['component_name'];
                    $price = $row['price'];
                    $stock = $row['stock'];
                    $manufacturerID = $row['manufacturerID'];
                    $clockSpeed = $row['clock_speed'];
                    echo '
              <tr>
              <td>' . $cpuID . '</td>
              <td>' . $componentName . '</td>
              <td>' . $price . '</td>
              <td>' . $stock . '</td>
              <td>' . $manufacturerID . '</td>
              <td>' . $clockSpeed . '</td>
            </tr>
              ';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h3 class="text-center">Displays</h3>


            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">displayID</th>
                    <th scope="col">Component Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Manufacturer ID</th>
                    <th scope="col">Refresh Rate</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $getOrders = "SELECT * FROM `display` ORDER BY `displayID`  ";
                $result = mysqli_query($conn, $getOrders);
                while ($row = mysqli_fetch_assoc($result)) {
                    $displayID = $row['displayID'];
                    $componentName = $row['component_name'];
                    $price = $row['price'];
                    $stock = $row['stock'];
                    $manufacturerID = $row['manufacturerID'];
                    $refreshRate = $row['refresh_rate'];
                    echo '
              <tr>
              <td>' . $displayID . '</td>
              <td>' . $componentName . '</td>
              <td>' . $price . '</td>
              <td>' . $stock . '</td>
              <td>' . $manufacturerID . '</td>
              <td>' . $refreshRate . '</td>
            </tr>
              ';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-center">GPUs</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">gpuID</th>
                    <th scope="col">Component Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Manufacturer ID</th>
                    <th scope="col">VRAM Size</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $getOrders = "SELECT * FROM `gpu` ORDER BY `gpuID`  ";
                $result = mysqli_query($conn, $getOrders);
                while ($row = mysqli_fetch_assoc($result)) {
                    $gpuID = $row['gpuID'];
                    $componentName = $row['component_name'];
                    $price = $row['price'];
                    $stock = $row['stock'];
                    $manufacturerID = $row['manufacturerID'];
                    $vram = $row['vram_size'];
                    echo '
              <tr>
              <td>' . $gpuID . '</td>
              <td>' . $componentName . '</td>
              <td>' . $price . '</td>
              <td>' . $stock . '</td>
              <td>' . $manufacturerID . '</td>
              <td>' . $vram . '</td>
            </tr>
              ';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h3 class="text-center">OS</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">osID</th>
                    <th scope="col">Component Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Manufacturer ID</th>
                    <th scope="col">Version</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $getOrders = "SELECT * FROM `os` ORDER BY `osID`  ";
                $result = mysqli_query($conn, $getOrders);
                while ($row = mysqli_fetch_assoc($result)) {
                    $osID = $row['osID'];
                    $componentName = $row['component_name'];
                    $price = $row['price'];
                    $stock = $row['stock'];
                    $manufacturerID = $row['manufacturerID'];
                    $version = $row['version'];
                    echo '
              <tr>
              <td>' . $osID . '</td>
              <td>' . $componentName . '</td>
              <td>' . $price . '</td>
              <td>' . $stock . '</td>
              <td>' . $manufacturerID . '</td>
              <td>' . $version . '</td>
            </tr>
              ';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-center">RAMs</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ramID</th>
                    <th scope="col">Component Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Manufacturer ID</th>
                    <th scope="col">Size</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sigma";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("connection failed: " . $conn->connect_error);
                }

                $getOrders = "SELECT * FROM `ram` ORDER BY `ramID`  ";
                $result = mysqli_query($conn, $getOrders);
                while ($row = mysqli_fetch_assoc($result)) {
                    $ramID = $row['ramID'];
                    $componentName = $row['component_name'];
                    $price = $row['price'];
                    $stock = $row['stock'];
                    $manufacturerID = $row['manufacturerID'];
                    $size = $row['size'];
                    echo '
              <tr>
              <td>' . $ramID . '</td>
              <td>' . $componentName . '</td>
              <td>' . $price . '</td>
              <td>' . $stock . '</td>
              <td>' . $manufacturerID . '</td>
              <td>' . $size . '</td>
            </tr>
              ';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h3 class="text-center">Storages</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">StorageID</th>
                    <th scope="col">Component Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Manufacturer ID</th>
                    <th scope="col">Capacity</th>

                </tr>
                </thead>
                <tbody>

                <?php
                $getOrders = "SELECT * FROM `storage` ORDER BY `storageID`";
                $result = mysqli_query($conn, $getOrders);
                while ($row = mysqli_fetch_assoc($result)) {
                    $storageID = $row['storageID'];
                    $componentName = $row['component_name'];
                    $price = $row['price'];
                    $stock = $row['stock'];
                    $manufacturerID = $row['manufacturerID'];
                    $capacity = $row['capacity'];
                    echo '
              <tr>
              <td>' . $storageID . '</td>
              <td>' . $componentName . '</td>
              <td>' . $price . '</td>
              <td>' . $stock . '</td>
              <td>' . $manufacturerID . '</td>
              <td>' . $capacity . '</td>
            </tr>
              ';
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <h3 class="text-center">Manufacturers</h3>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ManufacturerID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $getManufacturers = "SELECT * FROM manufacturer ORDER BY manufacturerID";
            $result = mysqli_query($conn, $getManufacturers);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['manufacturerID'];
                $name = $row['manufacturer_name'];
                $address = $row['manufacturer_address'];
                echo '
            <tr>
            <td>' . $id . '</td>
            <td>' . $name . '</td>
            <td>' . $address . '</td>
          </tr>
            ';
            }
            ?>

            </tbody>
        </table>
    </div>
    <div class="row">
        <h3 class="text-center">Laptops</h3>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">LaptopID</th>
                <th scope="col">is_pre_made</th>
                <th scope="col">gpuID</th>
                <th scope="col">cpuID</th>
                <th scope="col">ramID</th>
                <th scope="col">storageID</th>
                <th scope="col">displayID</th>
                <th scope="col">osID</th>
                <th scope="col">name</th>

            </tr>
            </thead>
            <tbody>

            <?php
            $getOrders = "SELECT * FROM `laptop` ORDER BY `laptopID`  ";
            $result = mysqli_query($conn, $getOrders);
            while ($row = mysqli_fetch_assoc($result)) {
                $laptopID = $row['laptopID'];
                $ispre = $row['is_pre_made'];
                $gpuID = $row['gpuID'];
                $cpuID = $row['cpuID'];
                $ramID = $row['ramID'];
                $storageID = $row['storageID'];
                $displayID = $row['displayID'];
                $osID = $row['osID'];
                $name = $row['name'];
                echo '
            <tr>
            <td>' . $laptopID . '</td>
            <td>' . $ispre . '</td>
            <td>' . $gpuID . '</td>
            <td>' . $cpuID . '</td>
            <td>' . $ramID . '</td>
            <td>' . $storageID . '</td>
            <td>' . $displayID . '</td>
            <td>' . $osID . '</td>
            <td>' . $name . '</td>
          </tr>
            ';
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
<div class="container">
    <div class="row">
        <form id="form1" method="post">
            <h3 class="text-center mt-3">ADD-UPDATE-DELETE</h3>
            <select class="form-select mb-4" aria-label="select" name="operation" id="operation">
                <option selected>Select the operation</option>
                <option value="add" name="add">ADD</option>
                <option value="update" name="update">UPDATE</option>
                <option value="delete" name="delete">DELETE</option>
            </select>
        </form>

    </div>
    <div id="div1">

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>