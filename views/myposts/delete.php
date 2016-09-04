<div class="body">
    <div class="page-header">
        <?php $this->title = 'Delete Post'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <br>
    <br>
    <div class="create-new-form">
        <div id="progress-bar-message-override" style="font-size: 50px;">Are you sure you want to delete this Post?</div>
        <form method="post">
          <div class="create-new-post-header">Title</div>
          <input type="text" name="post_title" disabled
           value="<?=htmlspecialchars($this->post['title'])?>" />
          <div class="create-new-post-header">Content</div>
          <textarea id="post-description" name="post_content" disabled><?=
              htmlspecialchars($this->post['content'])?></textarea>
          <br>
          <br>
            <?php
            if ($this->post['user_id'] == htmlspecialchars($_SESSION['user_id'])) {
                echo " <div><input type=\"submit\" value=\"Delete\"></div>";
            } else {
                $this->redirect('myposts');
            }?>
            <div class="cancel-button">
                <a href="<?=APP_ROOT?>/myposts">Cancel</a></div>
    <br>
    <br>
</form>
</div>
