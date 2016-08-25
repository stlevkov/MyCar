<div id="Home-blog">
<?php $this->title = 'Welcome to my Car Reminder!'; ?>
<h1><?=htmlspecialchars($this->title)?></h1>
</div>
<aside id="home-aside">
   <h2>Last news</h2>
    <?php foreach ($this->postsSidebar as $post) : ?>
        <a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?= htmlentities($post['title'])?></a>
    <?php endforeach ?>
</aside>
<div class="body">
<main>
    <?php foreach ($this->posts as $post) : ?>
        <div id="blog-posts">
            <h1><?=htmlentities($post['title'])?></h1>
        <p>
            <i>Posted on</i>
            <?=htmlentities($post['date'])?>
            <i>by</i>
            <?=htmlentities($post['full_name'])?>
        </p>
        <p><?=$post['content']?></p>
        </div>
        <br>
        <br>
    <?php endforeach ?>
</main>
</div>






