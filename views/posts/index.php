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
    <?php if ($username = htmlspecialchars($_SESSION['username']) == 'admin') { ?>
        <td>
            <a href="<?=APP_ROOT?>/posts/edit/<?=
            htmlspecialchars($post['id'])?>">[Edit]</a>
            <a href="<?=APP_ROOT?>/posts/delete/<?=
            htmlspecialchars($post['id'])?>">[Delete]</a>
        </td>
    <?php } else {?>
        <td>
            <p>Administrator</p>
        </td>
        <?php } ?>
    </tr>
<?php endforeach ?>
    </table>
</main>
