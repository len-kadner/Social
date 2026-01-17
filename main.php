<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Social Platform</title>

<style>
:root {
    --primary: #000000ff;
    --secondary: #6b6b6bff;
    --bg: #f4f6f8;
    --card: #ffffff;
    --text: #1f2933;
    --muted: #6b7280;
    --radius: 18px;
    --shadow: 0 10px 25px rgba(0,0,0,0.08);
    --gradient: linear-gradient(135deg, #000000ff, #00bfae);
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Inter", system-ui, sans-serif;
}

body {
    background: var(--bg);
    color: var(--text);
}

/* TOP BAR */
header {
    position: sticky;
    top: 0;
    z-index: 10;
    background: var(--card);
    box-shadow: var(--shadow);
}

.topbar {
    max-width: 1200px;
    margin: auto;
    padding: 14px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 22px;
    font-weight: 800;
    background: var(--gradient);
    -webkit-background-clip: text;
    color: transparent;
}

nav a {
    margin-left: 20px;
    text-decoration: none;
    font-weight: 600;
    color: var(--muted);
}

nav a:hover {
    color: var(--primary);
}

/* LAYOUT */
.container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 20px;
    display: grid;
    grid-template-columns: 280px 1fr 280px;
    gap: 24px;
}

/* SIDEBAR */
.sidebar {
    background: var(--card);
    border-radius: var(--radius);
    padding: 20px;
    box-shadow: var(--shadow);
}

.sidebar h3 {
    margin-bottom: 15px;
}

.friend {
    display: flex;
    align-items: center;
    margin-bottom: 14px;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: black;
    margin-right: 10px;
}

/* FEED */
.feed {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* CREATE POST */
.create-post {
    background: var(--card);
    padding: 20px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
}

.create-post textarea {
    width: 100%;
    border: none;
    resize: none;
    font-size: 15px;
    padding: 10px;
    outline: none;
}

.create-post button {
    margin-top: 10px;
    padding: 10px 18px;
    border: none;
    border-radius: 12px;
    background: var(--gradient);
    color: white;
    font-weight: 600;
    cursor: pointer;
}

/* POST CARD */
.post {
    background: var(--card);
    border-radius: var(--radius);
    padding: 20px;
    box-shadow: var(--shadow);
}

.post-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.post-header .avatar {
    width: 46px;
    height: 46px;
}

.post h4 {
    margin-left: 10px;
}

.post p {
    margin: 12px 0;
    line-height: 1.5;
}

.post-actions {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: var(--muted);
}

/* RIGHT PANEL */
.trends {
    background: var(--card);
    border-radius: var(--radius);
    padding: 20px;
    box-shadow: var(--shadow);
}

.trends h3 {
    margin-bottom: 15px;
}

.trends div {
    margin-bottom: 10px;
    font-weight: 600;
    color: var(--primary);
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .container {
        grid-template-columns: 1fr;
    }
    .sidebar, .trends {
        display: none;
    }
}
</style>
</head>

<body>

<header>
    <div class="topbar">
        <div class="logo">Social</div>
        <nav>
            <a href="#">Friends</a>
            <a href="#">Feed</a>
            <a href="#">Explore</a>
            <a href="#">Account</a>
        </nav>
    </div>
</header>

<main class="container">

    <!-- LEFT SIDEBAR -->
    <aside class="sidebar">
        <h3>Friends</h3>
        <div class="friend"><div class="avatar"></div> Alex</div>
        <div class="friend"><div class="avatar"></div> Marie</div>
        <div class="friend"><div class="avatar"></div> Chris</div>
    </aside>

    <!-- FEED -->
    <section class="feed">

        <div class="create-post">
            <textarea rows="3" placeholder="What's on your mind?"></textarea>
            <button>Post</button>
        </div>

        <div class="post">
            <div class="post-header">
                <div class="avatar"></div>
                <h4>Let's start</h4>
            </div>
            <p>let's create something new!</p>
            <div class="post-actions">
                <span>❤️ 230.000</span>
                <span>💬 30237</span>
            </div>
        </div>


    </section>

    <!-- RIGHT PANEL -->
    <aside class="trends">
        <h3>Trends</h3>
        <div>#WebDesign</div>
        <div>#Startup</div>
        <div>#Frontend</div>
        <div>#UIUX</div>
    </aside>

</main>

</body>
</html>
