<?php
require "db.php";
session_start();

if ($_POST) {
    $user = trim($_POST["username"]);
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = trim($_POST["email"]);

    // Validate email format: name.nachname@mdg-hamburg.de
    if (!preg_match('/^[a-zA-Z]+\.[a-zA-Z]+@mdg-hamburg\.de$/', $email)) {
        die('Invalid email format. Must be name.nachname@mdg-hamburg.de');
    }

    // Check if username or email already exists
    $stmt = $db->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$user]);
    if ($stmt->fetch()) {
        die('Username already exists');
    }

    $stmt = $db->prepare("SELECT id FROM emails WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        die('Email already exists');
    }

    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$user, $pass]);

    // Get the new user ID
    $userId = $db->lastInsertId();

    // Insert email
    $stmt = $db->prepare("INSERT INTO emails (id, email) VALUES (?, ?)");
    $stmt->execute([$userId, $email]);

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social - Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="post" class="register-form">
            <h2>Join Social</h2>
            <input name="username" placeholder="Username" required>
            <input name="email" type="email" placeholder="E-Mail (name.nachname@mdg-hamburg.de)" required>
            <input name="password" type="password" placeholder="Password" required>
            <button>Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
