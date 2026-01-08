<?php
// TASK 2: Add database connection, filtering, and pagination logic
require_once __DIR__ . '/config.php';

// --- CONFIGURATION ---
$results_per_page = 3; // Number of events to show per page

// --- 1. DETERMINE CURRENT PAGE ---
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = (int)$_GET['page']; // Ensure it is an integer
}

// --- 2. FILTERING LOGIC ---
$where_clause = "";
$url_param = ""; // Used to keep the category selected when changing pages

if(isset($_GET['cat']) && ($_GET['cat'] != '0')){
    $cat_id = intval($_GET['cat']);
    $where_clause = "WHERE category_id = $cat_id";
    $url_param = "&cat=" . $cat_id;
}

// --- 3. PAGINATION CALCULATIONS ---
// First, count total records matching the filter
$sql_count = "SELECT count(event_id) AS total FROM events $where_clause";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_records = $row_count['total'];

// Calculate total pages needed
$number_of_pages = ceil($total_records / $results_per_page);

// Calculate the starting point (offset) for the SQL query
$this_page_first_result = ($page - 1) * $results_per_page;

// --- 4. FETCH DATA ---
// Get the actual events with LIMIT
$sql = "SELECT * FROM events $where_clause ORDER BY event_date DESC LIMIT $this_page_first_result, $results_per_page";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEMS v0.1</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <header class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <img src="assets/img/logo.jpg" alt="CEMS Logo" class="logo" />
            <h1>Campus Event Management System</h1>
            <p>Organize, Manage, and Participate in Campus Events Seamlessly.</p>
        </div>
    </header>

    <?php include("include/topNav.php"); ?>

    <main>
        <section class="intro">
            <h2>Welcome to CEMS</h2>
            <p>This system helps you manage and explore upcoming campus events efficiently. Register or Login to get started.</p>
        </section>

        <section class="listing">
            <h3>Event Listings</h3>

            <div id="filter-container">
                <a href="index.php?cat=0" class="<?= (!isset($_GET['cat']) || $_GET['cat']==0) ? 'active' : '' ?>">All</a>
                <a href="index.php?cat=1" class="<?= (isset($_GET['cat']) && $_GET['cat']==1) ? 'active' : '' ?>">Workshop</a>
                <a href="index.php?cat=2" class="<?= (isset($_GET['cat']) && $_GET['cat']==2) ? 'active' : '' ?>">Seminar</a>
                <a href="index.php?cat=3" class="<?= (isset($_GET['cat']) && $_GET['cat']==3) ? 'active' : '' ?>">Competition</a>
                <a href="index.php?cat=4" class="<?= (isset($_GET['cat']) && $_GET['cat']==4) ? 'active' : '' ?>">Festival</a>
                <a href="index.php?cat=5" class="<?= (isset($_GET['cat']) && $_GET['cat']==5) ? 'active' : '' ?>">Sport</a>
                <a href="index.php?cat=6" class="<?= (isset($_GET['cat']) && $_GET['cat']==6) ? 'active' : '' ?>">Course</a>
            </div>

            <div>
                <div id="event_grid">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $poster = htmlspecialchars($row['poster_path']);
                            $name = htmlspecialchars($row['event_name']);

                            // Create the event card
                            echo "<div class='event-card'>";
                            echo "<img src='" . BASE_URL . "/uploads/" . $poster . "' alt='$name' class='event-poster'>";
                            echo "<b>$name</b>";
                            echo "</div>";
                        }
                    } else {
                        // If no events, this spans all grid columns to show the message
                        echo "<p style='grid-column: 1 / -1; text-align: center; padding: 20px;'>No events available.</p>";
                    }
                    ?>
                </div>

                <div style="text-align: center; margin-top: 20px; font-family: sans-serif;">
                    <?php
                    // Only show pagination if there is more than 1 page
                    if ($number_of_pages > 1) {
                        echo "Page: ";
                        for ($page_number = 1; $page_number <= $number_of_pages; $page_number++) {
                            // Highlight the current page
                            $active_style = ($page == $page_number) ? 'font-weight:bold; text-decoration:underline; color:red;' : 'color: blue; text-decoration: none;';

                            echo '<a href="index.php?page=' . $page_number . $url_param . '" style="margin: 0 5px; ' . $active_style . '">' . $page_number . '</a> ';
                        }
                    }
                    ?>
                </div>

                <?php
                // Clean up database connection
                if (isset($result)) {
                    mysqli_free_result($result);
                }
                mysqli_close($conn);
                ?>
            </div>
            </section>
    </main>

    <footer id="myfoot">
        <hr>
        <p>&copy; <span id="y"></span> Aniq BI23110059 | Website</p>
    </footer>
    <script>document.getElementById('y').textContent = new Date().getFullYear();</script>
    <script>
        const menuIcon = document.getElementById('menu-icon');
        const navLinks = document.getElementById('nav-links');
        // Check if elements exist before adding event listener
        if(menuIcon && navLinks) {
            menuIcon.onclick = () => navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>
