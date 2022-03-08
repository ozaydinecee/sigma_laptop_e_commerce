<?php
session_start();
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sigma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
else{
    //echo 'connected succ';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigma Inc</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            var names = {};

            function updateNames() {
                names['storage'] = $('#storage option:selected').text();
                names['ram'] = $('#ram option:selected').text();
                names['gpu'] = $('#gpu option:selected').text();
                names['cpu'] = $('#cpu option:selected').text();
                names['display'] = $('#display option:selected').text();
                names['os'] = $('#os option:selected').text();
            }

            function updatePrices() {
                $.post("updatePrice.php", names, function (data) {
                        $("#price").show().html(data);
                    }
                );
            }

            $("#storage").change(function () {
                updateNames();
                updatePrices();
            });
            $("#ram").change(function () {
                updateNames();
                updatePrices();
            });
            $("#gpu").change(function () {
                updateNames();
                updatePrices();
            });
            $("#cpu").change(function () {
                updateNames();
                updatePrices();
            });
            $("#display").change(function () {
                updateNames();
                updatePrices();
            });
            $("#os").change(function () {
                updateNames();
                updatePrices();
            });
        });
    </script>
</head>
<body>
<section>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top ">
        <div class="container">
            <a class="navbar-brand" href="#">Sigma Inc</a>
            <br>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a class="nav-link" href="#">olası sekme eklenebilir</a></li>

                </ul>
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
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/laptop_images/1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/laptop_images/1_2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src=assets/laptop_images/1_3.png class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-3 ">
                            <h1>Storage:</h1>
                            <div id="price">

                            </div>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="storage">
                                <option>Please select your option</option>
                                <?php
                                $sql = "SELECT * FROM storage";
                                $result = mysqli_query($conn, $sql);

                                foreach( $result as $storage ) {
                                    ?>
                                    <option selected value="<?=$storage["storageID"]?>"><?=$storage["component_name"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <h1>RAM:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="ram">
                                <option>Open this select menu</option>
                                <?php
                                $sql = "SELECT * FROM ram";
                                $result = mysqli_query($conn, $sql);

                                foreach( $result as $ram ) {
                                    ?>
                                    <option selected value="<?=$ram["ramID"]?>"><?=$ram["component_name"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h1>GPU:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="gpu">
                                <option>Open this select menu</option>
                                <?php
                                $sql = "SELECT * FROM gpu";
                                $result = mysqli_query($conn, $sql);

                                foreach( $result as $gpu ) {
                                    ?>
                                    <option selected value="<?=$gpu["gpuID"]?>"><?=$gpu["component_name"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h1>CPU:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="cpu">
                                <option>Open this select menu</option>
                                <?php
                                $sql = "SELECT * FROM cpu";
                                $result = mysqli_query($conn, $sql);

                                foreach( $result as $cpu ) {
                                    ?>
                                    <option selected value="<?=$cpu["cpuID"]?>"><?=$cpu["component_name"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <h1>Display:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="display">
                                <option>Open this select menu</option>
                                <?php
                                $sql = "SELECT * FROM display";
                                $result = mysqli_query($conn, $sql);

                                foreach( $result as $display ) {
                                    ?>
                                    <option selected value="<?=$display["displayID"]?>"><?=$display["component_name"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <h1>Operating System:</h1>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" aria-label="Default select example" id="os">
                                <option>Open this select menu</option>
                                <?php
                                $sql = "SELECT * FROM os";
                                $result = mysqli_query($conn, $sql);

                                foreach( $result as $os ) {
                                    ?>
                                    <option selected value="<?=$os["osID"]?>"><?=$os["component_name"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>
            </div>
            <!---açıklamanın gelecei kısım-->
            <div class="col-md-6">
                <div class="container deneme" style="color:white;">
                    <div class="row">
                        <div >
                            <h2>Features</h2>
                            <table style="color:white;width:100%">
                                <tr>
                                    <td>ram:</td>
                                    <td>6gb</td>
                                </tr>
                                <tr>
                                    <td>cpu:</td>
                                    <td>6gb</td>
                                </tr>
                                <tr>
                                    <td>ram:</td>
                                    <td>6gb</td>
                                </tr>

                                <tr>
                                    <td>Display:</td>
                                    <td>6gb</td>
                                </tr>
                            </table>

                        </div>

                        <div >
                            <br>
                            <h2>Bir şey</h2>
                            <p>It is delivered to XXX(firmaadi) cargo within 3 working days at the latest.
                                If the operating system is not purchased, the installation is not performed.
                                Sigma Inc. notebook models are sent after being assembled and tested.</p>
                        </div>
                        <div >
                            <br>
                            <h2>Bir şey</h2>
                            <p>It is delivered to XXX(firmaadi) cargo within 3 working days at the latest.
                                If the operating system is not purchased, the installation is not performed.
                                Sigma Inc. notebook models are sent after being assembled and tested.</p>
                        </div>
                        <div >
                            <br>
                            <h2>Bir şey</h2>
                            <p>It is delivered to XXX(firmaadi) cargo within 3 working days at the latest.
                                If the operating system is not purchased, the installation is not performed.
                                Sigma Inc. notebook models are sent after being assembled and tested.</p>
                        </div><div >
                            <br>
                            <h2>Bir şey</h2>
                            <p>It is delivered to XXX(firmaadi) cargo within 3 working days at the latest.
                                If the operating system is not purchased, the installation is not performed.
                                Sigma Inc. notebook models are sent after being assembled and tested.</p>
                        </div>

                    </div>

                </div>






            </div>
        </div>
    </div>
</section>

<footer>

</footer>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>