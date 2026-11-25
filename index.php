<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Sanctuary</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
</head>

<body>
    <header class="site-header">
        <div class="container">
            <h1 class="site-title"><a href="index.php">Book Sanctuary</a></h1>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>
            <nav id="primary-navigation" class="site-nav" aria-label="Primary">
                <ul>
                    <li><a href="index.php" aria-current="page">Login</a></li>
                    <li><a href="pages/register.php">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <div class="auth-wrapper">
            <div class="auth-card">
                <h2 class="auth-title">Welcome Back</h2>
                <p class="auth-subtitle">Sign in to manage and view your reserved books</p>

                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control"
                            placeholder="Enter your username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="button search-button">Sign In</button>
                    </div>

                    <p class="form-footer-text">
                        Don't have an account yet? <a href="pages/register.php">Register here</a>
                    </p>
                </form>

                <?php
                include "connection.php";

                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $u = $_POST['username'];
                    $p = $_POST['password'];

                    $sql = "SELECT * FROM Users WHERE Username = '$u'";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        
                        // Check if password matches
                        if ($row['PasswordHash'] === $p) {
                            $_SESSION['username'] = $u;
                            header("Location: pages/home.php");
                            exit();
                        } else {
                            echo "<p style='color: red; font-weight: bold; margin-top: 1rem;'>Incorrect password.</p>";
                        }
                    } else {
                        echo "<p style='color: red; font-weight: bold; margin-top: 1rem;'>Username does not exist.</p>";
                    }
                    

                    $conn->close();
                }
                ?>
            </div>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Book Sanctuary. All rights reserved.</p>
        </div>
    </footer>

    <script>

    </script>
</body>

</html>
