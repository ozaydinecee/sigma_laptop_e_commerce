<?php
session_start();
$_SESSION['email'] = NULL;

echo "<script>location.replace('index.php')</script>";
