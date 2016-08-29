<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<header>
    <div id="scroll-up"></div>
    <div id="site-logo">
        <a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/site-logo.png" width="200" height="100"></a>
        <?php if ($this->isLoggedIn) { ?>
            <div id="greeting">
                Hello,  <?=htmlspecialchars($_SESSION['username'])?>
                <div class="exit-button"><a href="<?=APP_ROOT?>/users/logout">EXIT</a></div>
            </div>
        <?php } ?>
    </div>
        <div id="site-nav">
            <li><a class="main-nav" href="<?=APP_ROOT?>/">Home</a></li>
            <?php
            if ($this->isLoggedIn && $username = htmlspecialchars($_SESSION['username']) == 'admin') { ?>
            <li><a class="main-nav" href="<?=APP_ROOT?>/posts/create">New Post</a></li>
            <li><a class="main-nav" href="<?=APP_ROOT?>/parts/create">Add new part</a></li>
            <li><a class="main-nav" href="<?=APP_ROOT?>/users/register">Add new user</a></li>
                <div class="dropdown">
                    <button class="main-nav">Admin Menu</button>
                    <div class="dropdown-content">
                        <a class="main-nav" href="<?=APP_ROOT?>/posts">Posts</a>
                        <a class="main-nav" href="<?=APP_ROOT?>/parts/index">Parts</a>
                        <a class="main-nav" href="<?=APP_ROOT?>/profiles">Users</a>
                    </div>
                </div>
            <?php } else if($this->isLoggedIn){ ?>
                    <li><a href="<?=APP_ROOT?>/posts">Blog</a></li>
                    <li><a href="<?=APP_ROOT?>/myposts">View My posts</a></li>
                    <li><a href="<?=APP_ROOT?>/posts/create">New Post</a></li>
                    <li><a href="<?=APP_ROOT?>/parts/index">Car Status</a></li>
                    <li><a href="<?=APP_ROOT?>/parts/create">Add new part</a></li>


            <?php }  else { ?>

                <li><a class="main-nav" href="<?=APP_ROOT?>/users/login">Login</a></li>
                <li><a class="main-nav" href="<?=APP_ROOT?>/users/register">Register</a></li>
                </>
            <?php } ?>

        </div>

</header>
<body>

<?php include_once "messages.php" ?>
