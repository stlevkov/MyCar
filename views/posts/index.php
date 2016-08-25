<div class="body">
<?php if ($username = htmlspecialchars($_SESSION['username']) == 'admin') { ?>
    <div id="Home-blog">
        <?php $this->title = 'Admin | Blog posts'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
<main>
    <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Content</th>
          <th>Date</th>
          <th>Author</th>
            <th>Actions</th>
        </tr>
<?php foreach ($this->posts as $post) : ?>
    <tr>
        <td><?=htmlspecialchars($post['id'])?></td>
        <td><?=htmlspecialchars($post['title'])?></td>
        <td><?=cutLongText($post['content'])?></td>
        <td><?=htmlspecialchars($post['date'])?></td>
        <td><?=htmlspecialchars($post['full_name'])?></td>
        <td>
            <a href="<?=APP_ROOT?>/posts/edit/<?=
            htmlspecialchars($post['id'])?>">[Edit]</a>
            <a href="<?=APP_ROOT?>/posts/delete/<?=
            htmlspecialchars($post['id'])?>">[Delete]</a>
        </td>
    </tr>
<?php endforeach ?>
    </table>
</main>

<?php } else { ?>
    <div class="body">
        <div id="Home-blog">
            <?php $this->title = '|View all posts'; ?>
            <h1><?=htmlspecialchars($this->title)?></h1>
        </div>
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
<?php } ?>
</div>
