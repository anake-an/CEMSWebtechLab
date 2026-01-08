<?php
// Start session if it hasn't started yet (to access $_SESSION variables)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar">
    <div class="nav-container">
        <a href="<?= defined('BASE_URL') ? BASE_URL : '/cems/lab05' ?>/index.php" class="brand">CEMS</a>

        <div class="menu-icon" id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>

        <ul class="nav-links" id="nav-links">
            <li><a href="<?= defined('BASE_URL') ? BASE_URL : '/cems/lab05' ?>/index.php">Home</a></li>

            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'Admin'): ?>
                    <li><a href="<?= BASE_URL ?>/admin/index.php" style="color: #ff9800;">Admin Panel</a></li>
                <?php endif; ?>

                <li><span style="color: white; padding: 10px;">Hello, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></span></li>
                <li><a href="<?= BASE_URL ?>/auth/logout.php" style="background-color: #d9534f; border-radius: 5px;">Logout</a></li>

            <?php else: ?>
                <li><a href="<?= defined('BASE_URL') ? BASE_URL : '/cems/lab05' ?>/auth/register.php">Register</a></li>
                <li><a href="<?= defined('BASE_URL') ? BASE_URL : '/cems/lab05' ?>/auth/login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
