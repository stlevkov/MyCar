<div class="body">
    <main>
        <table>
            <tr>
                <th>full_name</th>
                <th>id</th>
                <th>password_hash</th>
                <th>username</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($this->users as $user) : ?>
                <tr>
                    <td><?=htmlspecialchars($user['full_name'])?></td>
                    <td><?=htmlspecialchars($user['id'])?></td>
                    <td><?=cutLongText($user['password_hash'])?></td>
                    <td><?=htmlspecialchars($user['username'])?></td>
                    <td>
                        <a href="<?=APP_ROOT?>/profiles/edit/<?=
                        htmlspecialchars($user['id'])?>">[Edit]</a>
                        <a href="<?=APP_ROOT?>/profiles/delete/<?=
                        htmlspecialchars($user['id'])?>">[Delete]</a>
                    </td>

                </tr>

            <?php endforeach ?>
        </table>
    </main>
</div>