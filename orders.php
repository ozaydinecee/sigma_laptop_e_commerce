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
    <title>Sigma Inc-Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Sigma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">orderID</th>
                <th scope="col">Insurance Period</th>
                <th scope="col">Date</th>
                <th scope="col">LaptopID</th>
                <th scope="col">User Details</th>
                <th scope="col">Component</th>
                <th scope="col">Price</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli("localhost", "root", "", "sigma");

            if ($conn->connect_error) {
                die("connection failed: " . $conn->connect_error);
            }

            $getOrders = "SELECT * FROM `invoice` ORDER BY `orderID` DESC";
            $result = mysqli_query($conn, $getOrders);
            while ($row = mysqli_fetch_assoc($result)) {
                $orderID = $row['orderID'];
                $insurance = $row['insurance_period'];
                $date = $row['date'];
                $laptopID = $row['laptopID'];
                $userID = $row['userID'];
                $cpu = $row['cpu_price'];
                $gpu = $row['gpu_price'];
                $ram = $row['ram_price'];
                $storage = $row['storage_price'];
                $display = $row['display_price'];
                $os = $row['os_price'];
                $total = $row['total_price'];

                $sql1 = "select cpu.component_name as cpuName,
            gpu.component_name as gpuName,
            display.component_name as displayName,
            os.component_name as osName,
            ram.component_name as ramName,
            storage.component_name as storageName,
            laptop.laptop_img1 as laptopImg,
            laptop.name as laptopName,
            laptop.laptopID as laptopID
                from laptop 
                        inner join cpu on cpu.cpuID= laptop.cpuID
                        inner join gpu on gpu.gpuID=laptop.gpuID
                        inner join display on display.displayID=laptop.displayID
                        inner join os on os.osID=laptop.osID
                        inner join ram on ram.ramID=laptop.ramID
                        inner join storage on storage.storageID=laptop.storageID
                where laptopID=$laptopID;";
                $sqlqu = mysqli_query($conn, $sql1);
                $names = mysqli_fetch_assoc($sqlqu);

                $getName = "SELECT name, surname, email, street_address FROM `user` WHERE `userID`=$userID;";
                $sqlName = mysqli_query($conn, $getName);
                $userDetails = mysqli_fetch_assoc($sqlName);



                echo '
              <tr>
              <td rowspan="8">' . $orderID . '</td>
              <td rowspan="8">' . $insurance . '</td>
              <td rowspan="8">' . $date . '</td>
              <td rowspan="8">' . $laptopID . '</td>
              
              

              
              <tr><td>UserID: '. $userID . '</td><td>CPU: ' . $names['cpuName'] . '</td><td>' . $cpu . 'TL</td></tr>
              <tr><td>Name: '. $userDetails['name'] . '</td><td>GPU: ' . $names['gpuName'] . '</td><td>' . $gpu . 'TL</td></tr>
              <tr><td>Surname: '. $userDetails['surname'] . '</td><td>RAM: ' . $names['ramName'] . '</td><td>' . $ram . 'TL</td></tr>
              <tr><td>'. $userDetails['email'] . '</td><td>Storage: ' . $names['storageName'] . '</td><td>' . $storage . 'TL</td></tr>
              <tr><td rowspan="3">'. $userDetails['street_address'] . '</td><td>Display: ' . $names['displayName'] . '</td><td>' . $display . 'TL</td></tr>
              <tr><td>OS:  ' . $names['osName'] . '</td><td>' . $os . 'TL</td></tr>
              

              <tr><td colspan="2" style="text-align: center;">Total: ' . $total . ' TL</td></tr>
            </tr>
              ';
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>