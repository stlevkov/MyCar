<div class="body">
<div class="page-header">
        <?php $this->title = 'My Blog posts'; ?>
<h1><?=htmlspecialchars($this->title)?></h1>
</div>

<main>
    <table>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($this->posts as $post) : ?>
            <tr>
                <td><?=htmlspecialchars($post['date'])?></td>
                <td><?=htmlspecialchars($post['title'])?></td>
                <td><?=cutLongText($post['content'])?></td>
                <td><?=htmlspecialchars($post['full_name'])?></td>
                <td>
                    <a href="<?=APP_ROOT?>/myposts/edit/<?=
                    htmlspecialchars($post['id'])?>">Edit</a>
                    <br>
                    <a href="<?=APP_ROOT?>/myposts/delete/<?=
                    htmlspecialchars($post['id'])?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</main>
</div>
