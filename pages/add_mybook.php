<?php
session_start();
include "../connection.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

$currentUser = $_SESSION['username'];
$isbn = $_GET['ISBN'];
$rd = date('Y-m-d');

$checkSql = "SELECT ISBN FROM Reservations WHERE ISBN = '$isbn'";
$checkResult = $conn->query($checkSql);

if ($checkResult && $checkResult->num_rows == 0) {
    $sql = "INSERT INTO Reservations (ISBN, Username, ReservedDate) VALUES ('$isbn', '$currentUser', '$rd')";
    $conn->query($sql);
    $conn->close();
    header("Location: home.php");  
    exit();
    
} else {
    $conn->close();
    header("Location: home.php?error=already_reserved"); 
     exit();
}

?>