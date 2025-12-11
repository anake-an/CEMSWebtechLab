<?php
session_start();

// Initialize variables
$category = $name = $email = $phone = $password = '';
$events = [];

// Check if edit mode is active and session data exists (Task 3)
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_SESSION['registrations'])) {
    $record = $_SESSION['registrations'];
    $category = $record['category'];
    $name = $record['name'];
    $email = $record['email'];
    $phone = $record['phone'];
    // usually we don't pre-fill passwords for security, but we will skip it here as per lab
    $events = $record['events'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEMS Registration</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <img src="../assets/img/logo.jpg" alt="CEMS Logo" class="logo" />
            <h1>Campus Event Management System</h1>
            <p>Create your account to start managing and participating in campus events.</p>
        </div>
    </header>

    <?php include("include/topNav.php"); ?>

    <main>
        <section class="form-page">
            <h3>Register</h3>

            <form action="register_action.php" method="post" name="registration_form" class="form-card">

                <p id="output" style="color:green;">
                    <?php
                    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                        echo "Editing: " . htmlspecialchars($name);
                    }
                    ?>
                </p>

                <fieldset class="field-group">
                    <legend>Category</legend>
                    <label><input type="radio" name="category" value="staff" <?= ($category === 'staff') ? 'checked' : '' ?> required> Staff</label>
                    <label><input type="radio" name="category" value="student" <?= ($category === 'student') ? 'checked' : '' ?>> Student</label>
                    <label><input type="radio" name="category" value="public" <?= ($category === 'public') ? 'checked' : '' ?>> Public</label>
                </fieldset>

                <div class="field">
                    <label for="name">Full Name:</label><br>
                    <input type="text" id="name" name="name" required autocomplete="name" placeholder="Anake N" value="<?= htmlspecialchars($name) ?>">
                </div>
                <div class="field">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required autocomplete="email" placeholder="you@example.com" value="<?= htmlspecialchars($email) ?>">
                </div>
                <div class="field">
                    <label for="phone">Phone:</label><br>
                    <input type="tel" id="phone" name="phone" required autocomplete="tel" placeholder="0123456789" value="<?= htmlspecialchars($phone) ?>">
                </div>
                <div class="field">
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required minlength="6" maxlength="8" autocomplete="new-password" placeholder="6–8 characters">
                </div>

                <div class="field">
                    <p><strong>Recommend event about: </strong></p>
                    <label><input type="checkbox" name="event[]" value="workshop" <?= in_array('workshop', $events) ? 'checked' : '' ?>> Workshop</label><br>
                    <label><input type="checkbox" name="event[]" value="seminar" <?= in_array('seminar', $events) ? 'checked' : '' ?>> Seminar</label><br>
                    <label><input type="checkbox" name="event[]" value="competition" <?= in_array('competition', $events) ? 'checked' : '' ?>> Competition</label><br>
                    <label><input type="checkbox" name="event[]" value="festival" <?= in_array('festival', $events) ? 'checked' : '' ?>> Festival</label><br>
                    <label><input type="checkbox" name="event[]" value="sport" <?= in_array('sport', $events) ? 'checked' : '' ?>> Sport</label><br>
                    <label><input type="checkbox" name="event[]" value="course" <?= in_array('course', $events) ? 'checked' : '' ?>> Course</label><br>
                </div>
                <div class="actions">
                    <button type="submit">Register</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
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
        menuIcon.onclick = () => navLinks.classList.toggle('active');
    </script>

    </body>
</html>
