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
            <div class="greeting">Здравей, <?=htmlspecialchars($_SESSION['username'])?>

                <a class="main-nav" href="<?=APP_ROOT?>/users/logout">Изход</a>

            </div>
        <?php } ?>
        </div>
    </div>




    <div id="site-nav">
        <a class="main-nav" href="<?=APP_ROOT?>/">Начало</a>
        <?php if ($this->isLoggedIn) { ?>
            <a class="main-nav" href="<?=APP_ROOT?>/posts">Новини</a>
            <a class="main-nav" href="<?=APP_ROOT?>/posts/create">Нова новина</a>
            <a class="main-nav" href="<?=APP_ROOT?>/profiles">Потребители</a>
            <a class="main-nav" href="<?=APP_ROOT?>/parts/index">Сменени Части</a>
        <?php } else { ?>
            <a class="main-nav" href="<?=APP_ROOT?>/users/login">Вход</a>
            <a class="main-nav" href="<?=APP_ROOT?>/users/register">Регистрация</a>
        <?php } ?>
    </div>




</header>

<?php include_once "messages.php" ?>
