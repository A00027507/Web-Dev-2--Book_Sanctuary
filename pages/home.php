<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

$currentUser = $_SESSION['username'];
if ($currentUser == '') {
    echo "<script>window.location.href = '../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Book Sanctuary</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body>
    <header class="site-header">
        <div class="container">
            <h1 class="site-title"><a href="home.php">Book Sanctuary</a></h1>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>
            <nav id="primary-navigation" class="site-nav" aria-label="Primary">
                <ul>
                    <li><span style="color: var(--text-secondary); font-size: 0.9rem; padding: 0.55rem 0.5rem;">Logged
                            in as: <strong><?php echo htmlspecialchars($currentUser); ?></strong></span></li>
                    <li><a href="home.php" aria-current="page">Home</a></li>
                    <li><a href="mybooks.php">MyBooks</a></li>
                    <li><a href="logout.php">Sign out</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <section id="book-search" class="collection">
            <div class="container">
                <div class="hero-content">
                    <h2 class="hero-title">Find Your Next Great Read</h2>
                    <p class="hero-subtitle">Search our curated catalogue by title or author to browse and reserve
                        books.</p>
                </div>
                <form class="search-panel" action="home.php" method="get">
                    <label class="search-box">
                        <span aria-hidden="true"></span>
                        <input type="search" name="q"
                            value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>"
                            placeholder="Search by title or author…" aria-label="Search by book title or author">
                    </label>
                    <button class="button search-button" type="submit">Search books</button>
                </form>
            </div>
        </section>

        <section class="container">
            <?php if (isset($_GET['error']) && $_GET['error'] === 'already_reserved'): ?>
                <p style="color: red; font-weight: bold; margin: 1rem 0;">
                    This book is already reserved!
                </p>
            <?php endif; ?>

            
            <?php
            $user = $currentUser;

            include "../connection.php";


            $search = isset($_GET['q']) ? trim($_GET['q']) : '';

            if ($search !== '') {
                $searchEscaped = $conn->real_escape_string($search);
                $query = "SELECT b.ISBN, b.BookTitle, b.Author, b.Edition, b.PublishedYear, c.CategoryDescription 
                FROM Books b 
                LEFT JOIN Categories c ON b.CategoryID = c.CategoryID 
                WHERE b.BookTitle LIKE '%$searchEscaped%' OR b.Author LIKE '%$searchEscaped%'";
                echo "<p style='margin: 1.5rem 0 0.5rem; color: var(--text-secondary);'>Search results for: <strong>" . htmlspecialchars($search) . "</strong> (<a href='home.php'>Show all</a>)</p>";
            } else {
                $query = "SELECT b.ISBN, b.BookTitle, b.Author, b.Edition, b.PublishedYear, c.CategoryDescription 
                FROM Books b 
                LEFT JOIN Categories c ON b.CategoryID = c.CategoryID";
            }

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                echo "<div class='table-wrapper'>";
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ISBN</th>";
                echo "<th>Title</th>";
                echo "<th>Author</th>";
                echo "<th>Edition</th>";
                echo "<th>Year</th>";
                echo "<th>Category</th>";
                echo "<th>ADD to MyBooks</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlentities($row['ISBN']) . "</td>";
                    echo "<td>" . htmlentities($row['BookTitle']) . "</td>";
                    echo "<td>" . htmlentities($row['Author']) . "</td>";
                    echo "<td>" . htmlentities($row['Edition']) . "</td>";
                    echo "<td>" . htmlentities($row['PublishedYear']) . "</td>";
                    echo "<td>" . htmlentities($row['CategoryDescription'] ?? '') . "</td>";
                    echo ("<td>" . '<a href="add_mybook.php?ISBN=' . htmlentities($row["ISBN"]) . '">Reserve</a> ' . "</td>");
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";

            } else {
                echo "<div class='alert' style='background-color: var(--bg-surface-alt); margin: 2rem 0;'>No books found." . ($search !== '' ? " <a href='home.php' style='margin-left: 0.5rem;'>View all books</a>" : "") . "</div>";
            }

            $conn->close();
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