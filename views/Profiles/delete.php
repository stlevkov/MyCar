<div class="body">
    <div class="page-header">
        <?php $this->title = 'Delete User'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <br>
    <br>
    <div class="create-new-form">
        <div id="progress-bar-message-override" style="font-size: 50px;">Are you sure you want to delete this user?</div>
      <form method="post">
          <div class="create-new-post-header">Username</div>
          <input type="text" name="user_name" disabled value="<?=
          htmlspecialchars($this->user['username'])?>" />
          <div class="create-new-post-header">Password</div>
        <input type="text" name="user_password" disabled
               value="<?=htmlspecialchars($this->user['password_hash'])?>" />
          <br>
          <br>
          <div><input type="submit" value="delete"/>
              <br>
              <div class="cancel-button">
                 <a href="<?=APP_ROOT?>/profiles">Cancel</a></div>
              </div>
      </form>
    </div>
</div>