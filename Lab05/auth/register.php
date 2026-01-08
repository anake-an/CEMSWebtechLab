<?php require_once '../config.php'; // UPDATED: Go up one level ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEMS Registration</title>
    <link rel="stylesheet" href="../assets/css/styles.css" />
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

    <?php include("../include/topNav.php"); ?>

    <main>
        <section class="form-page">
            <h3>Register</h3>

            <form action="register_action.php" method="post" name="registration_form" class="form-card">

                <fieldset class="field-group">
                    <legend>Category</legend>
                    <label><input type="radio" name="category" value="Staff" required> Staff</label>
                    <label><input type="radio" name="category" value="Student"> Student</label>
                    <label><input type="radio" name="category" value="Public"> Public</label>
                </fieldset>

                <div class="field">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Ali Bin Abu">
                </div>
                <div class="field">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="you@example.com">
                </div>
                <div class="field">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required placeholder="0123456789">
                </div>
                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required minlength="6" placeholder="Min 6 characters">
                </div>

                <div class="field">
                    <p><strong>Recommend event about: </strong></p>
                    <label><input type="checkbox" name="event[]" value="Workshop"> Workshop</label><br>
                    <label><input type="checkbox" name="event[]" value="Seminar"> Seminar</label><br>
                    <label><input type="checkbox" name="event[]" value="Competition"> Competition</label><br>
                    <label><input type="checkbox" name="event[]" value="Festival"> Festival</label><br>
                    <label><input type="checkbox" name="event[]" value="Sport"> Sport</label><br>
                    <label><input type="checkbox" name="event[]" value="Course"> Course</label><br>
                </div>
                <div class="actions">
                    <button type="submit">Register</button>
                </div>

                <p class="muted">
                    Already have an account? <a href="login.php">Login here</a>
                </p>
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
        if(menuIcon && navLinks) {
            menuIcon.onclick = () => navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>
