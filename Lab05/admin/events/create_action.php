<?php
require_once __DIR__ . '/../../config.php'; // global config

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $mode = $_POST['mode'];
    $remarks = $_POST['remarks'];

    // Handle file upload
    $poster_path = "";

    if (isset($_FILES['poster']) && $_FILES['poster']['error'] == 0) {
        $upload_dir = ROOT_PATH . '/uploads/';
        // Create directory if it doesn't exist
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

        $filename = time() . "_" . basename($_FILES["poster"]["name"]); // Rename to avoid duplicates
        $target_file = $upload_dir . $filename;

        if(move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)){
            $poster_path = $filename; // Store only filename in DB
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO events (event_name, description, category_id, venue, event_date, mode, remarks, poster_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // 'ssisssss' corresponds to string, string, int, string, string, string, string, string
    $stmt->bind_param("ssisssss", $event_name, $description, $category, $venue, $date, $mode, $remarks, $poster_path);

    $message = "";
    if ($stmt->execute()) {
        $message = "✅ Event created successfully.";
    } else {
        $message = "❌ Error creating event: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CEMS - Action Result</title>
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
        <?php include(ROOT_PATH_ADMIN . '/include/sidebar.php'); ?>

        <main class="main-content" id="main-content">
            <h2>Create Event</h2>

            <div style="padding: 1rem; background-color: #f8f9fa; border-radius: 6px; border-left: 5px solid #4CAF50; margin-bottom: 20px;">
                <p style="font-size: 1.1em; margin: 0;"><?php echo isset($message) ? $message : ''; ?></p>
            </div>

            <a href="manage.php" class="btn-back" style="display:inline-block; margin-top:10px; color: #333; text-decoration: none;">&larr; Back to Manage Events</a>
        </main>
    </div>

    <footer id="myfoot">
        <hr>
        <p>&copy; <span id="y"></span> Aniq BI23110059 | Website</p>
    </footer>

    <script>document.getElementById('y').textContent = new Date().getFullYear();</script>
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
