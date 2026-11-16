<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}
$no_user = '';
$_SESSION['username'] = $no_user;


echo "<script>window.location.href = '../index.php';</script>";


?>