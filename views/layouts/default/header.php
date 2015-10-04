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
        <nav id="navigation" class="site-navigation" role="navigation">
            <ul clas="menu">
                <li class="menu-item"><a href="/">Home</a></li>
                <li class="menu-item"><a href="/categories">Categories</a></li>
                <li class="menu-item"><a href="/products">Products</a>
                    <?php if($this->isEditor() || $this->isAdmin()): ?>
                        <ul class="dropdown">
                            <li class="menu-item sub-menu"><a href="/admin/addProductInCategory">Add product in category</a></li>
                            <li class="menu-item sub-menu"><a href="/admin/addProduct">Add product</a></li>
                        </ul>
                    <?php endif ?>
                </li>
                <?php if($this->isLoggedIn()) : ?>
                    <li class="menu-item"><a href="/cart">Cart</a></li>
                <?php endif ?>
                <?php if($this->isAdmin()) : ?>
                    <li class="menu-item"><a href="/users">users</a></li>
                <?php endif ?>
            </ul>
        </div>
        <?php if(!$this->isLoggedIn()) : ?>
            <div class="menu-login">
                <ul class="menu-item">
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
                <?php if(!$this->isEditor() && !$this->isAdmin()): ?>
                    <p>Amount: <?= htmlspecialchars($this->currUser[1]); ?>$</p>
                <?php endif ?>
            </div>
        <?php endif; ?>
    </nav>
</header>
<div id="wrapper">
<?php include_once('views/layouts/messages.php'); ?>