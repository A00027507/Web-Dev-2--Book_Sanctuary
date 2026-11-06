<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books - Book Sanctuary</title>
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
                    <li><a href="mybooks.php" aria-current="page">MyBooks</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <section class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
            <div style="margin-bottom: 2rem;">
                <h2 style="font-family: var(--font-heading); font-size: 2.2rem; color: var(--primary); margin-bottom: 0.5rem;">My Reserved Books</h2>
                <p style="color: var(--text-secondary);">View and manage books you currently have reserved.</p>
            </div>

<?php

?>
        </section>
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
