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
    <div class="menu">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/categories">Categories</a></li>
            <li><a href="/products">Products</a></li>
            <?php if($this->isLoggedIn()) : ?>
                <li><a href="/cart">Cart</a></li>
            <?php endif ?>
            <?php if($this->isAdmin()) : ?>
                <li><a href="/users">users</a></li>
            <?php endif ?>
        </ul>
    </div>
    <?php if(!$this->isLoggedIn()) : ?>
        <div class="menu-login">
            <ul>
                <li><a href="/account/login">Login</a></li>
                <li><a href="/account/register">Register</a></li>
            </ul>
        </div>
    <?php endif ?>
    <?php if ($this->isLoggedIn()): ?>
        <div id="logged-in-info">
            <span>Welcome, <?= $_SESSION['username']; ?></span>
            <form action="/account/logout">
                <input type="submit" value="Logout" />
            </form>
            <p>Amount: <?= $this->currUser[1]; ?>$</p>
        </div>
    <?php endif; ?>
</header>
<?php include_once('views/layouts/messages.php'); ?>