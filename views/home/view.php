<?php $this->title = $this->post['title']; ?>

<div class="body">
<main>
    <div id="blog-posts">
        <div id="posts-header">
              <h1><?=htmlentities($this->post['title'])?></h1>
              <p><i>Posted on</i>
              <?=htmlentities($this->post['date'])?>
              <i>by</i>
              <?=htmlentities($this->post['full_name'])?>
              </p>
        </div>
        <br>
        <div id="posts-content">
              <p><?=$this->post['content']?></p>
        </div>
    </div>
    <br>
    <br>
    <br>
</main>
</div>
