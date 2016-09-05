
<div class="body">
    <div class="page-header">
        <?php $this->title = 'Create new post'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <div class="create-new-form">
        <form method="post">
            <div class="create-new-post-header">Title</div>
            <input type="text" name="post_title" />
            <div class="create-new-post-header">Content</div>
            <textarea id="post-description" name="post_content"></textarea>
            <br>
            <br>
            <?php
            $current_user = htmlspecialchars($_SESSION['username']);
            if ($current_user == 'admin' ) {
                echo " <div><input type=\"submit\" value=\"Create\"></div>";
            } else {
                $this->redirect('home');
            }?>
            <div class="cancel-button">
                <a href="<?=APP_ROOT?>/myposts">Cancel</a></div>

        </form>
    </div>
</div>
