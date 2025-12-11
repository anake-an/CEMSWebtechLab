<?php
session_start();

// Get the data safely using htmlspecialchars
$category = $_POST['category'] ?? 'N/A';
$name = htmlspecialchars($_POST['name'] ?? 'N/A');
$email = htmlspecialchars($_POST['email'] ?? 'N/A');
$phone = htmlspecialchars($_POST['phone'] ?? 'N/A');
$password = htmlspecialchars($_POST['password'] ?? '');
$events = $_POST['event'] ?? []; // array of selected checkboxes

// Store registration information to session (Task 3)
if (!isset($_SESSION['registrations'])) {
    $_SESSION['registrations'] = [];
}

$_SESSION['registrations'] = [
    'category' => $category,
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'password' => $password,
    'events' => $events
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <?php include("include/topNav.php"); ?>

    <main>
        <section class="form-page">
            <h2>Thank you for registering!</h2>
            <div class="form-card">
                <p><strong>Name:</strong> <?= $name ?></p>
                <p><strong>Email:</strong> <?= $email ?></p>
                <p><strong>Phone:</strong> <?= $phone ?></p>
                <p><strong>Category:</strong> <?= ucfirst($category) ?></p>

                <?php if (!empty($events)): ?>
                    <p><strong>Interested Events:</strong></p>
                    <ul>
                        <?php foreach ($events as $event): ?>
                            <li><?= htmlspecialchars($event) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p><em>No event selected.</em></p>
                <?php endif; ?>

                <br>
                <a href="index.php">Back to Home</a> | <a href="register.php?action=edit">Edit?</a>
            </div>
        </section>
    </main>
</body>
</html>
