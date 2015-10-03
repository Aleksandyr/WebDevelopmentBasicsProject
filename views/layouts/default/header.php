<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="/content/styles.css">
    <title>
        <?php if(isset($this->title)) echo htmlspecialchars($this->title); ?>
    </title>
</head>

<body>
    <header>
        <a href="/"><img src="/content/images/site-logo.png"></a>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/categories">Categories</a></li>
            <?php if($this->isLoggedIn()) : ?>
                <li><a href="/cart">Cart</a></li>
            <?php endif ?>
            <?php if($this->isAdmin()) : ?>
                <li><a href="/users">users</a></li>
            <?php endif ?>
        </ul>
        <?php if ($this->isLoggedIn()): ?>
            <div id="logged-in-info">
                <span>Welcome, <?= $_SESSION['username']; ?></span>
                <form action="/account/logout">
                    <input type="submit" value="Logout" />
                </form>
                <p>Cash: <?= $_SESSION['cash']; ?>$</p>
            </div>
        <?php endif; ?>
    </header>
    <?php include_once('views/layouts/messages.php'); ?>