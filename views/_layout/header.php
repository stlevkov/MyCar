<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>
    <div id="site-logo">
        <a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/site-logo.png" width="200" height="100"></a>
        <div id="exit">
        <?php if ($this->isLoggedIn) { ?>
            <div class="greeting">Hello, <?=htmlspecialchars($_SESSION['username'])?>

                <a class="main-nav" href="<?=APP_ROOT?>/users/logout">EXIT</a>

            </div>
        <?php } ?>
        </div>
    </div>




    <div id="site-nav">

        <a class="main-nav" href="<?=APP_ROOT?>/">Home</a>
        <?php

        if ($this->isLoggedIn && $username = htmlspecialchars($_SESSION['username']) == 'admin') { ?>

            <a class="main-nav" href="<?=APP_ROOT?>/posts">News</a>
            <a class="main-nav" href="<?=APP_ROOT?>/posts/create">New Post</a>
            <a class="main-nav" href="<?=APP_ROOT?>/parts/index">Car Status</a>
            <a class="main-nav" href="<?=APP_ROOT?>/parts/create">Add new part</a>
            <a class="main-nav" href="<?=APP_ROOT?>/profiles">Users</a>
            <a class="main-nav" href="<?=APP_ROOT?>/users/register">Add new user</a>

        <?php } else if($this->isLoggedIn){ ?>

            <a class="main-nav" href="<?=APP_ROOT?>/posts/create">New Post</a>
            <a class="main-nav" href="<?=APP_ROOT?>/parts/index">Car Status</a>
            <a class="main-nav" href="<?=APP_ROOT?>/parts/create">Add new part</a>
            <a class="main-nav" href="<?=APP_ROOT?>/checks/create">Check Status</a>
        <?php }  else { ?>
            <a class="main-nav" href="<?=APP_ROOT?>/users/login">Login</a>
            <a class="main-nav" href="<?=APP_ROOT?>/users/register">Register</a>
        <?php } ?>
    </div>




</header>

<?php include_once "messages.php" ?>
