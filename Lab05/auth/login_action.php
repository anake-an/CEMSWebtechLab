<?php
session_start();
require_once '../config.php'; // Ensure this points to config.php in the root

// Detect the request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Sanitize Input
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // 2. Prepare SQL
    $sql = "SELECT user_id, name, password, role FROM users WHERE email = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // 3. Check if user exists
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($user_id, $name, $hashed_password, $role);
            $stmt->fetch();

            // 4. Verify Password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, start session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_role'] = $role;
                $_SESSION['logged_in'] = true;

                // 5. Redirect based on Role
                if ($role === 'Admin') {
                    // Admins go to: /cems/lab05/admin/index.php
                    // Using BASE_URL is safest if defined, otherwise relative path
                    header("Location: ../admin/index.php");
                } else {
                    // Standard users go to: /cems/lab05/index.php (The Landing Page)
                    // FIX: Use "../" to go up from 'auth' folder to root folder
                    header("Location: ../index.php");
                }
                exit;

            } else {
                echo "<script>alert('Invalid password.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('No account found with that email.'); window.history.back();</script>";
        }
        $stmt->close();
    } else {
        echo "Database error: " . $conn->error;
    }
    $conn->close();

} else {
    header("Location: login.php");
    exit;
}
?>
