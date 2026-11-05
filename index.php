<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1 class="site-title">Book Sanctuary</h1>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>
            <nav class="site-nav" aria-label="Primary">
                <ul>
                    <li><a href="index.php" aria-current="page">Home</a></li>
                    <li><a href="Pages/mybooks.php">MyBooks</a></li>
                    <li><a href="Pages/login.php">Login</a></li>
                    <li><a href="Pages/register.php">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="book-search" class="collection">
        <form class="search-panel" action="index.php" method="get">
            <label class="search-box"><span aria-hidden="true"></span><input type="search" name="q" placeholder="Search by title or author…" aria-label="Search by book title or author"></label>
            <button class="button search-button" type="submit">Search books</button>
        </form>
    </section>
<?php

?>

<footer class="site-footer">
        <div class="container">
            <p>&copy; Book Sanctuary. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
