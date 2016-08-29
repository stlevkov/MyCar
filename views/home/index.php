<?php
if ($this->isLoggedIn && $username = htmlspecialchars($_SESSION['username']) == 'admin') { ?>
<div id="home-image-admin"></div>
<?php } else { ?>
    <div id="home-image-user">
        <div id="button-scroll-down" onclick="location.href='#scroll';" style="cursor:pointer;"></div>
    </div>
<?php } ?>
<div class="body">
<div id="scroll"></div>
<div id="welcome-logo">
    <div id="car-icon-1" onclick="location.href='parts/create';" style="cursor:pointer;"></div>
    <div id="car-icon-2" onclick="location.href='parts/create';" style="cursor:pointer;"></div>
    <div id="car-icon-3" onclick="location.href='parts/create';" style="cursor:pointer;"></div>
    <div id="car-icon-4" onclick="location.href='parts/create';" style="cursor:pointer;"></div>
    </div>
    <div id="button-scroll-down-welcome" onclick="location.href='#welcome-scroll';" style="cursor:pointer;"></div>
    <div id="home-blog-posts">
        <aside id="home-aside">
            <h2>Last news</h2>
            <?php foreach ($this->postsSidebar as $post) : ?>
                <div id="aside-nav">
                    <li><a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?= htmlentities($post['title'])?></a></li>
                </div>
            <?php endforeach ?>
        </aside>
    <?php foreach ($this->posts as $post) : ?>
        <div id="blog-posts">
            <div id="posts-header">
            <div id="welcome-scroll"></div>
            <h1><?=htmlentities($post['title'])?></h1>
            <i>Posted on</i>
            <?=htmlentities($post['date'])?>
            <i>by</i>
            <?=htmlentities($post['full_name'])?>
            </div>
            <br>
            <div id="posts-content">
                   <?=$post['content']?>
            </div>
        </div>
        <br>
        <br>
    <?php endforeach ?>
    </div>
    <div id="button-scroll-up" onclick="location.href='#scroll-up';" style="cursor:pointer;"></div>
