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

        <a href="<?=APP_ROOT?>/">Начало</a>
        <?php if ($this->isLoggedIn) { ?>
            <a href="<?=APP_ROOT?>/posts">Новини</a>
            <a href="<?=APP_ROOT?>/posts/create">Нова новина</a>
            <a href="<?=APP_ROOT?>/users">Потребители</a>
            <a href="<?=APP_ROOT?>/mycar/index">Моята кола</a>
        <?php } else { ?>
            <a href="<?=APP_ROOT?>/users/login">Вход</a>
            <a href="<?=APP_ROOT?>/users/register">Регистрация</a>
        <?php } ?>
        <?php if ($this->isLoggedIn) { ?>
            <div class="greeting">Здравей, <?=htmlspecialchars($_SESSION['username'])?>

                <a href="<?=APP_ROOT?>/users/logout">Изход</a>

            </div>
        <?php } ?>
    </div>




</header>

<?php include_once "messages.php" ?>
