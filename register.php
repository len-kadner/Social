<?php
require "db.php";
session_start();

if ($_POST) {
    $user = trim($_POST["username"]);
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$user, $pass]);

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
            <input name="password" type="password" placeholder="Password" required>
            <button>Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
