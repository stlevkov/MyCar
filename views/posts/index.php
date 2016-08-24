<?php if ($username = htmlspecialchars($_SESSION['username']) == 'admin') { ?>
    <div class="administrator">
        <h1>Вие сте влезли като Администратор.</h1>
        <h3>Може да правите промени и виждате, редактирате и изтривате всички данни на потребителите.</h3>
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
    <div>
        <h1>Съдържанието е достъпно само за администратор.</h1>
    </div>
<?php } ?>
