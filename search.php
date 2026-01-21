<?php
require "db.php";
require "auth.php";

$searchResults = [];
if (isset($_GET["q"]) && !empty(trim($_GET["q"]))) {
    $query = "%" . trim($_GET["q"]) . "%";
    $stmt = $db->prepare("SELECT id, username FROM users WHERE username LIKE ? ORDER BY username");
    $stmt->execute([$query]);
    $searchResults = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social - Search</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Social</h1>
            <nav class="nav-links">
                <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
                <?php if ($currentPage != 'index.php') echo '<a href="index.php">Home</a>'; ?>
                <?php if ($currentPage != 'trending.php') echo '<a href="trending.php">Trending</a>'; ?>
                <?php if ($currentPage != 'search.php') echo '<a href="search.php">Search</a>'; ?>
                <?php if ($currentPage != 'messages.php') echo '<a href="messages.php">Messages</a>'; ?>
                <?php if ($currentPage != 'profile.php') echo '<a href="profile.php">My Profile</a>'; ?>
                <a href="logout.php">Logout</a>
            </nav>
        </header>

        <div class="search-bar">
            <form method="get">
                <input name="q" placeholder="Search users..." value="<?=htmlspecialchars($_GET["q"] ?? "")?>" required>
            </form>
        </div>

        <?php if (!empty($searchResults)): ?>
        <div class="user-list">
            <h3>Search Results</h3>
            <?php foreach ($searchResults as $user): ?>
            <div class="user-item">
                <span class="username">@<?=htmlspecialchars($user["username"])?></span>
                <a href="profile.php?id=<?=$user["id"]?>">View Profile</a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php elseif (isset($_GET["q"])): ?>
        <p>No users found matching "<?=htmlspecialchars($_GET["q"])?>".</p>
        <?php endif; ?>

        <a href="index.php" class="back-link">Back to Home</a>
    </div>
</body>
</html>