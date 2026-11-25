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


$sql = "INSERT INTO Reservations (ISBN, Username, ReservedDate) VALUES ('$isbn', '$currentUser', '$rd')";

if ($conn->query($sql) === TRUE) {
    echo "<p style='color: green; font-weight: bold; margin-top: 1rem;'>New record created successfully</p>";
} else {
    echo "<p style='color: red; font-weight: bold; margin-top: 1rem;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
}
header("Location: home.php");
$conn->close();







?>

