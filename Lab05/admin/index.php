<?php
// Always include config first
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CEMS Admin Dashboard</title>
    <link rel="stylesheet" href="<?= BASE_PATH_CSS ?>admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>CEMS Admin Dashboard</h1>
        </div>
    </header>

    <div class="admin-container">
        <?php
        if(file_exists(ROOT_PATH_ADMIN . '/include/sidebar.php')) {
            include(ROOT_PATH_ADMIN . '/include/sidebar.php');
        } else {
            echo "<nav>Sidebar Missing</nav>";
        }
        ?>

        <main class="main-content" id="main-content">
            <h2>Welcome to the CEMS Admin Dashboard</h2>
            <p style="text-align:center;">Select a menu item to view or manage content.</p>
        </main>
    </div>

    <footer id="myfoot">
        <hr>
        <p>&copy; <span id="y"></span> Aniq BI23110059 | Website</p>
    </footer>

    <script>
        // Toggle submenu in sidebar visibility
        document.querySelectorAll('.submenu-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.nextElementSibling.classList.toggle('show');
            });
        });
    </script>
</body>
</html>
