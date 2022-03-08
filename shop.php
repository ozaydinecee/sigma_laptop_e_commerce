<?php
session_start();
ob_start();
$conn = new mysqli("localhost", "root", "", "sigma");
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['email']))
    header("Location: login.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

</head>

<body class="bg-dark">
<style>
    body {
        font-family: 'Raleway', sans-serif;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top ">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="https://cdn-icons-png.flaticon.com/512/1001/1001266.png" style="width: 40px;" alt="">Sigma Inc</a>


        <br>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" aria-current="page" href="loggedindex.php">Home</a>
                <a class="nav-link" href="shop.php">Shop</a>
                <a class="nav-link" href="#AboutUs">About Us</a>
                <a href="admin.php" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" color="#646771" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                    </svg>
                </a>
                <a href="endSession.php" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" color="#646771" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top ">

     <div class="container">
        <a class="navbar-brand" href="#"> Sigma Inc </a>
        <br>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
              <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item "><a class="nav-link" href="shop.php">Shop</a></li>
           </ul>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="login.php">Login</a></li>
                      <li><a class="dropdown-item" href="register.php">Register</a></li>
                      <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                          </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="login.php">Login</a></li>
                      <li><a class="dropdown-item" href="register.php">Register</a></li>
                    </ul>
                  </div>
            </ul>
        </div>
     </div>
  </nav> -->


<div class="container rounded p-4 text-center">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $sql = "select cpu.component_name as cpuName,
            gpu.component_name as gpuName,
            display.component_name as displayName,
            os.component_name as osName,
            ram.component_name as ramName,
            storage.component_name as storageName,
            laptop.laptop_img1 as laptopImg,
            laptop.name as laptopName,
            laptop.laptopID as laptopID,
            cpu.price              as cpuPrice,
            gpu.price              as gpuPrice,
            display.price          as displayPrice,
            os.price               as osPrice,
            ram.price              as ramPrice,
            storage.price          as storagePrice
                from laptop 
                        inner join cpu on cpu.cpuID= laptop.cpuID
                        inner join gpu on gpu.gpuID=laptop.gpuID
                        inner join display on display.displayID=laptop.displayID
                        inner join os on os.osID=laptop.osID
                        inner join ram on ram.ramID=laptop.ramID
                        inner join storage on storage.storageID=laptop.storageID
                where laptop.is_pre_made=1 order by laptop.laptopID;";
        $result = mysqli_query($conn, $sql);

        foreach ($result as $laptop) {
            ?>

            <div class="col" style="flex-wrap:wrap;">
                <div class="shop-container">
                    <div class="shop-card">
                        <div class="shop-box">
                            <div class="content">
                                <img src="assets/laptop_images/<?= $laptop["laptopImg"] ?>" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h2 style="color: white;font-weight: bold;"><?= $laptop["laptopName"] ?></h2>
                                    <p style="color:white;font-weight: bold;">
                                        <?= $laptop["cpuName"] ?><br>
                                        <?= $laptop["gpuName"] ?><br>
                                        <?= $laptop["displayName"] ?><br>
                                        <?= $laptop["osName"] ?><br>
                                        <?= $laptop["ramName"] ?><br>
                                        <?= $laptop["storageName"] ?><br>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="detail.php?id=<?= $laptop["laptopID"]; ?>" class="button-30">Go
                                                buy!</a>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Fiyat: <?php echo 5000 + $laptop["cpuPrice"] + $laptop["gpuPrice"] + $laptop["displayPrice"] + $laptop["osPrice"] + $laptop["ramPrice"] + $laptop["storagePrice"];?> TL</h4>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <a href="detail.php?id=<?= $laptop["laptopID"]; ?>" class="streched-link"></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>
<!---FOOTER-->
<div class="card mx-5">
    <div class="row mb-4 ">
        <div class="col-md-4 col-sm-11 col-xs-11">
            <div class="footer-text pull-left">
                <div class="d-flex">
                    <h1 class="font-weight-bold mr-2 px-3" style="color:#16151a; background-color:#957bda"> Sigma </h1>
                    <h1 style="color: #957bda">Inc</h1>
                </div>
                <p class="card-text">Σ Sigma Inc. is a laptop company. There are laptops that have different components to appeal to different audiences. Also, laptops are customizable by the customer with a price change.</p>
                <div class="social mt-2 mb-3"> <i class="fa fa-facebook-official fa-lg"></i> <i class="fa fa-instagram fa-lg"></i> <i class="fa fa-twitter fa-lg"></i> <i class="fa fa-linkedin-square fa-lg"></i> <i class="fa fa-facebook"></i> </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-1 mb-2"></div>
        <div class="col-md-2 col-sm-4 col-xs-4">
            <h5 class="heading">Services</h5>
            <ul>
                <li>IT Consulting</li>
                <li>Development</li>
                <li>Cloud</li>
                <li>DevOps & Support</li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4">
            <h5 class="heading">Industries</h5>
            <ul class="card-text">
                <li>Finance</li>
                <li>Public Sector</li>
                <li>Smart Office</li>
                <li>Retail</li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4">
            <h5 class="heading">Company</h5>
            <ul class="card-text">
                <li>About Us</li>
                <li>Blog</li>
                <li>Contact</li>
                <li>Join Us</li>
            </ul>
        </div>
    </div>
    <div class="divider mb-4"> </div>
    <div class="row" style="font-size:10px;">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-left">
                <p><i class="fa fa-copyright"></i> 2022 @copyright by sigma inc</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-right mr-4 d-flex policy">
                <div>Terms of Use</div>
                <div>Privacy Policy</div>
                <div>Cookie Policy</div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>



