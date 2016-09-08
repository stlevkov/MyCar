<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>
<div id="scroll-up"></div>
<?php if ($this->isLoggedIn) { ?>
    <div id="greeting">
         <y style="font-size: 40px; color: white; ">Hello,</y> <i style="margin-right: 20px;  font-size: 45px; color: lightgoldenrodyellow;"><?=htmlspecialchars($_SESSION['username'])?></i><a href="<?=APP_ROOT?>/users/logout">EXIT</a>

    </div>
<?php } ?>
<header>
        <h1>My Car Reminder</h1>
    <a href="<?=APP_ROOT?>"><div id="progress-bar-logo"><img src="<?=APP_ROOT?>/content/images/peugeot-logo.png" style="width: 40%" alt="peugeot logo" />
    </div></a>
</header>

<nav>
    <ul>

        <?php
        if ($this->isLoggedIn && $username = htmlspecialchars($_SESSION['username']) == 'admin') { ?>
            <a  href="<?=APP_ROOT?>/posts/create"><li>New Post</li></a>
            <a  href="<?=APP_ROOT?>/parts/create"><li>Add new part</li></a>
            <a  href="<?=APP_ROOT?>/users/register"><li>Add new user</li></a>
            <a href="<?=APP_ROOT?>/posts"><li>Edit User Posts</li></a>
            <a href="<?=APP_ROOT?>/parts/index"><li>Edit User Parts</li></a>
            <a href="<?=APP_ROOT?>/profiles/index"><li>Edit User Profiles</li></a>
        <?php } else if($this->isLoggedIn){ ?>
            <a href="<?=APP_ROOT?>/"><li>Home</li></a>
            <a href="<?=APP_ROOT?>/posts"><li>More News</li></a>
            <a href="<?=APP_ROOT?>/parts"><li>Car Status</li></a>
            <a href="<?=APP_ROOT?>/parts/create"><li>Add new part</li></a>
        <?php }  else { ?>
            <a href="<?=APP_ROOT?>/users/login"><li>Login</li></a>
            <a href="<?=APP_ROOT?>/users/register"><li>Register</li></a>
        <?php } ?>
    </ul>
    <div class="handle">
        <img src="<?=APP_ROOT?>/content/images/menu_icon.png" style="width: 80px; height: 80px;" alt="menu icon logo" />
        </div>
</nav>

<br>
<body>
<section>

<?php include_once "messages.php" ?>
