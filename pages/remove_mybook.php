<?php
session_start();
include "../connection.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

$currentUser = $_SESSION['username'];
$message = "";
$deleted = false;
$reservation = null;

if (isset($_POST["Remove"]) && isset($_POST["ISBN"])) {

    $ISBN = $conn->real_escape_string($_POST["ISBN"]);

    $sql = "DELETE FROM Reservations WHERE ISBN = '$ISBN' AND Username = '$currentUser'";

    if ($conn->query($sql)) {
        $message = "BOOK removed successfully!";
        $deleted = true;
    } else {
        $message = "Error removing book: " . $conn->error;
    }
}


if (!$deleted && isset($_GET["ISBN"])) {
    $ISBN = $conn->real_escape_string($_GET["ISBN"]);
    $sql = "SELECT * FROM Reservations WHERE ISBN = '$ISBN'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $reservation = $result->fetch_assoc();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>remove book</title>
</head>

<body>

<h1>remove book</h1>

<?php
if (!empty($message)) {
    echo "<p style='color: green;'>$message</p>";
}

if ($deleted) {
  
} elseif ($reservation) {
   
?>
    <p>Do you want to remove book:  <?php echo htmlentities($reservation['ISBN']); ?></p>

    <form method="POST">
        <input type="hidden" name="ISBN" value="<?php echo htmlentities($reservation['ISBN']); ?>">
        <input type="submit" name="Remove" value="Yes Remove">
        <a href="mybooks.php">Cancel</a>
    </form>
<?php
} elseif (isset($_GET["ISBN"])) {
    echo "<p>Book not found.</p>";
} else {
    // Direct access fallback
?>
<form method="POST">

    ISBN:
    <input type="number" name="ISBN" required>
    <br><br>

    <input type="submit" name="Remove" value="Remove book">

</form>
<?php
}
?>

<br>

<a href="mybooks.php">Back to My Books</a> | <a href="home.php">Back to Home</a>

</body>
</html>

<?php
$conn->close();
?>


