<?php
// TASK 3: Database Insertion Logic
require_once '../config.php'; // UPDATED: Go up one level

$success = false;
$error_msg = "";

// ... (Rest of your PHP logic remains exactly the same as before) ...
// Just ensure you copy the PHP logic I gave you in the previous step,
// but make sure line 2 is require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1. Capture and Sanitize Input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $category = $_POST['category'];
    $password = $_POST['password'];
    $events = $_POST['event'] ?? [];

    // TASK: Auto-assign Admin role if category is Staff
    if ($category === 'Staff') {
        $role = 'Admin';
    } else {
        $role = 'User';
    }

    // 2. Check for Duplicate Email
    $check_sql = "SELECT user_id FROM users WHERE email = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $error_msg = "This email ($email) is already registered.";
    }
    else {
        // 3. Hash the Password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // 4. Insert User into Database
        $sql = "INSERT INTO users (name, email, phone, category, password, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $email, $phone, $category, $hashed_password, $role);

        if ($stmt->execute()) {
            $success = true;
            $new_user_id = $conn->insert_id;

            // 5. Insert Event Recommendations
            if (!empty($events)) {
                // FIXED: The database table 'user_event_recommend' has 'user_id' as PRIMARY KEY.
                // This means a user can only have ONE recommendation record.
                // To prevent the "Duplicate entry" fatal error, we only save the FIRST selection.

                $first_event = $events[0]; // Take only the first selected event

                $rec_sql = "INSERT INTO user_event_recommend (user_id, name) VALUES (?, ?)";
                $rec_stmt = $conn->prepare($rec_sql);
                $rec_stmt->bind_param("is", $new_user_id, $first_event);
                $rec_stmt->execute();
                $rec_stmt->close();
            }
        } else {
            $error_msg = "Database Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $stmt_check->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Status</title>
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>
<body>
    <?php include("../include/topNav.php"); ?>

    <main>
        <section class="form-page">
            <?php if ($success): ?>
                <h2>Registration Successful!</h2>
                <div class="form-card" style="text-align: center;">
                    <p style="color: green; font-size: 1.2rem; margin-bottom: 20px;">
                        Welcome, <strong><?= htmlspecialchars($name) ?></strong>! Your account has been created.
                    </p>
                    <a href="login.php" style="display: inline-block; padding: 10px 20px; background-color: #379de1; color: white; text-decoration: none; border-radius: 5px;">Go to Login</a>
                </div>

            <?php else: ?>
                <h2>Registration Failed</h2>
                <div class="form-card" style="text-align: center;">
                    <p style="color: red; margin-bottom: 20px;"><?= htmlspecialchars($error_msg) ?></p>
                    <a href="javascript:history.back()" style="color: #379de1;">Go Back and Try Again</a>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
