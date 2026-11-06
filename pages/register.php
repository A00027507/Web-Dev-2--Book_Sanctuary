<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Book Sanctuary</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1 class="site-title"><a href="../index.php">Book Sanctuary</a></h1>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>
            <nav id="primary-navigation" class="site-nav" aria-label="Primary">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="mybooks.php">MyBooks</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php" aria-current="page">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <div class="auth-wrapper">
            <div class="auth-card auth-card-wide">
                <h2 class="auth-title">Create an Account</h2>
                <p class="auth-subtitle">Join Book Sanctuary to reserve books and track your reading list</p>

                <form action="register.php" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="username">Username *</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Choose a username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Choose a secure password" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstname">First Name *</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name" required>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname *</label>
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Surname" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="addressline1">Address Line 1 *</label>
                        <input type="text" id="addressline1" name="addressline1" class="form-control" placeholder="Street address" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="addressline2">Address Line 2</label>
                            <input type="text" id="addressline2" name="addressline2" class="form-control" placeholder="Apartment, suite, etc.">
                        </div>
                        <div class="form-group">
                            <label for="city">City *</label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="City" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="tel" id="telephone" name="telephone" class="form-control" placeholder="Landline number">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile (10 digits) *</label>
                            <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="e.g. 0871234567" pattern="[0-9]{10}" required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="button search-button">Create Account</button>
                    </div>

                    <p class="form-footer-text">
                        Already have an account? <a href="login.php">Sign in here</a>
                    </p>
                </form>

<?php

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
