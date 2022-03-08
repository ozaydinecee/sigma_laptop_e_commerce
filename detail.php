<?php
session_start();
ob_start();
$conn = new mysqli("localhost", "root", "", "sigma");
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$getId = $_GET["id"];
$_SESSION['laptopID'] = $getId; 

$result = $conn->query("
   select
   cpu.component_name as cpuName,
   gpu.component_name as gpuName,
   display.component_name as displayName,
   os.component_name as osName,
   ram.component_name as ramName,
   storage.component_name as storageName,
   laptop.laptop_img1 as laptopImg,
   laptop.name as laptopName,
   laptop.laptopID,
   laptop.laptop_img1,
   laptop.laptop_img2,
   laptop.laptop_img3,
   storage.storageID,
   ram.ramID,
   gpu.gpuID,
   display.displayID,
   os.osID as osID,
   cpu.cpuID
       from laptop 
               inner join cpu on cpu.cpuID= laptop.cpuID
               inner join gpu on gpu.gpuID=laptop.gpuID
               inner join display on display.displayID=laptop.displayID
               inner join os on os.osID=laptop.osID
               inner join ram on ram.ramID=laptop.ramID
               inner join storage on storage.storageID=laptop.storageID  
               WHERE laptopID = '{$getId}'
               ");

$echo = $result->fetch_array();

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
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            var id = {};

            function updateIDs() {
                id['storage'] = $('#storage option:selected').val();
                id['ram'] = $('#ram option:selected').val();
                id['gpu'] = $('#gpu option:selected').val();
                id['cpu'] = $('#cpu option:selected').val();
                id['display'] = $('#display option:selected').val();
                id['os'] = $('#os option:selected').val();
            }

            function updatePrices() {
                $.post("updatePrice.php", id, function (data) {
                        $("[id=price]").show().html(data);
                    }
                );
            }

            updateIDs();
            updatePrices();

            $("#storage").change(function () {
                updateIDs();
                updatePrices();
            });
            $("#ram").change(function () {
                updateIDs();
                updatePrices();
            });
            $("#gpu").change(function () {
                updateIDs();
                updatePrices();
            });
            $("#cpu").change(function () {
                updateIDs();
                updatePrices();
            });
            $("#display").change(function () {
                updateIDs();
                updatePrices();
            });
            $("#os").change(function () {
                updateIDs();
                updatePrices();
            });
        });
    </script>
</head>
<body>
<section>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top ">
        <div class="container">
        <a class="navbar-brand" href="loggedindex.php">
        <img src="https://cdn-icons-png.flaticon.com/512/1001/1001266.png" style="width: 40px;" alt="">Sigma Inc</a>
            <br>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="shop.php">Shop</a>
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


</section>

<section>
    <div class="container">
        <div class="row">
            <!--laptop fotosu parçalarının seçileceği kısım-->
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/laptop_images/<?= $echo["laptop_img1"]; ?>" class="d-block w-100"
                                 alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/laptop_images/<?= $echo["laptop_img2"]; ?>" class="d-block w-100"
                                 alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/laptop_images/<?= $echo["laptop_img3"]; ?>" class="d-block w-100"
                                 alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <form action="placeOrder.php" method="post">
                <div>
                    <div class="row">
                        <div class="col-md-3 ">
                            <h1 style="color:white;">Storage:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="storage" name="storage">
                                <?php
                                $sql = "SELECT * FROM storage ORDER BY price";
                                $result = mysqli_query($conn, $sql);

                                foreach ($result as $storage) {
                                    ?>
                                    <option value="<?= $storage["storageID"] ?>"<?php if ($echo["storageID"] == $storage["storageID"]) {
                                        echo "selected";
                                    } ?>><?= $storage["component_name"] . ' - ' . $storage["price"] . ' TL' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <h1 style="color:white;" >RAM:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="ram" name="ram">

                                <?php
                                $sql = "SELECT * FROM ram ORDER BY price";
                                $result = mysqli_query($conn, $sql);

                                foreach ($result as $ram) {
                                    ?>
                                    <option value="<?= $ram["ramID"] ?>"<?php if ($echo["ramID"] == $ram["ramID"]) {
                                        echo "selected";
                                    } ?>><?= $ram["component_name"] . ' - ' . $ram["price"] . ' TL' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h1 style="color:white;">GPU:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="gpu" name="gpu">
                                <?php
                                $sql = "SELECT * FROM gpu ORDER BY price";
                                $result = mysqli_query($conn, $sql);

                                foreach ($result as $gpu) {
                                    ?>
                                    <option value="<?= $gpu["gpuID"] ?>" <?php if ($echo["gpuID"] == $gpu["gpuID"]) {
                                        echo "selected";
                                    } ?> ><?= $gpu["component_name"] . ' - ' . $gpu["price"] . ' TL' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h1 style="color:white;">CPU:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="cpu" name="cpu">

                                <?php
                                $sql = "SELECT * FROM cpu ORDER BY price";
                                $result = mysqli_query($conn, $sql);

                                foreach ($result as $cpu) {
                                    ?>
                                    <option value="<?= $cpu["cpuID"] ?>" <?php if ($echo["cpuID"] == $cpu["cpuID"]) {
                                        echo "selected";
                                    } ?> ><?= $cpu["component_name"] . ' - ' . $cpu["price"] . ' TL' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <h1 style="color:white;">Display:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="display" name="display">
                                <?php
                                $sql = "SELECT * FROM display ORDER BY price";
                                $result = mysqli_query($conn, $sql);

                                foreach ($result as $display) {
                                    ?>
                                    <option value="<?= $display["displayID"] ?>"<?php if ($echo["displayID"] == $display["displayID"]) {
                                        echo "selected";
                                    } ?>><?= $display["component_name"] . ' / ' . $display["refresh_rate"] . 'Hz - ' . $display["price"] . ' TL' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <h1 style="color:white;">Operating System:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="os" name="os">
                                <?php
                                $sql = "SELECT * FROM os ORDER BY price";
                                $result = mysqli_query($conn, $sql);

                                foreach ($result as $os) {
                                    ?>
                                    <option value="<?= $os["osID"] ?>" <?php if ($echo["osID"] == $os["osID"]) {
                                        echo "selected";
                                    } ?>><?= $os["component_name"] . ' - ' . $os["price"] . ' TL' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <h1 style="color:white;">Cost:</h1>
                        </div>
                        <div class="col-md-9">
                            
                            <h1 style="color:#c2f140;font-size: 40px;"><span id="price"></span> TL</h1>
                            <button class="button-41" role="button">Buy!</button>

                        </div>
                    </div>
                </div>
                </form>
            </div>
            <!---açıklamanın gelecei kısım-->
            <div class="col-md-6">
                <div class="container deneme" style="color:white;">
                    <div class="row">
                        <div>
                            <div>
                                <h2>Features</h2>
                                <table style="color:white;width:100%">
                                    <tr>
                                        <td>Laptop name:</td>
                                        <td style="font-size: 30px;"><?= $echo["laptopName"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>RAM:</td>
                                        <td><?= $echo["ramName"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>CPU:</td>
                                        <td><?= $echo["cpuName"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>GPU:</td>
                                        <td><?= $echo["gpuName"] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Display:</td>
                                        <td><?= $echo["displayName"] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Operating System:</td>
                                        <td><?= $echo["osName"] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Storage:</td>
                                        <td ><?= $echo["storageName"] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Cost:</td>
                                        <td style="color:#c2f140;font-size: 30px;"><span id="price" ></span> TL</td>
                                    </tr>
                                </table>

                            </div>

                        </div>

                        <div>
                            <br>
                            <h2>Information</h2>
                            <p>It is delivered to cargo within 3 working days at the latest.
                                If a operating system is purchased, its installation is performed by us.
                                Sigma Inc. notebook models are sent after being assembled and tested.</p>
                        </div>
                        <div>
                            <br>
                            <h2>Video</h2>
                            <p>
                                <iframe width="460" height="315" src="https://www.youtube.com/embed/jDLCz8kVko8"
                                        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;
                        clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </p>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>
<br>
<!---FOOTER-->
<div class="card container-fluid" style="background-color: #222222;border: 1px solid rgb(255 255 255 / 13%);">
    <div class="row mb-4 ">
        <div class="col-md-4 col-sm-11 col-xs-11">
            <div class="footer-text pull-left">
                <div class="d-flex">
                    <h1 class="font-weight-bold mr-2 px-3" style="color:#16151a; background-color:#957bda"> Sigma </h1>
                    <h1 style="color: #957bda">Inc</h1>
                </div>
                <p class="card-text" style="color: gray;">Σ Sigma Inc. is a laptop company. There are laptops that
                    have different components to appeal to different audiences. Also, laptops are customizable by the
                    customer with a price change.</p>
                <div class="social mt-2 mb-3"><i class="fa fa-facebook-official fa-lg"></i> <i
                            class="fa fa-instagram fa-lg"></i> <i class="fa fa-twitter fa-lg"></i> <i
                            class="fa fa-linkedin-square fa-lg"></i> <i class="fa fa-facebook"></i></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-1 mb-2"></div>
        <div class="col-md-2 col-sm-4 col-xs-4 " style="color: gray;">
            <h5 class="heading">Services</h5>
            <ul>
                <li>IT Consulting</li>
                <li>Development</li>
                <li>Cloud</li>
                <li>DevOps & Support</li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4" style="color: gray;">
            <h5 class="heading">Industries</h5>
            <ul class="card-text">
                <li>Finance</li>
                <li>Public Sector</li>
                <li>Smart Office</li>
                <li>Retail</li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4" style="color: gray;">
            <h5 class="heading">Company</h5>
            <ul class="card-text">
                <li>About Us</li>
                <li>Blog</li>
                <li>Contact</li>
                <li>Join Us</li>
            </ul>
        </div>
    </div>
    <div class="divider mb-4"></div>
    <div class="row" style="font-size:10px;">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-left">
                <p><i class="fa fa-copyright" style="color: gray;"></i> 2022 @copyright by sigma inc</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6" style="color: gray;">
            <div class="pull-right mr-4 d-flex policy">
                <div>Terms of Use</div>
                <div>Privacy Policy</div>
                <div>Cookie Policy</div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>