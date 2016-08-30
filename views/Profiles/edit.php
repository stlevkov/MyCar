<div class="body">
    <div class="page-header">
        <?php $this->title = 'Edit User'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <br>
    <br>
    <div class="create-new-form">
      <form method="post">
        <div class="create-new-post-header">Username</div>
           <input type="text" name="username"
           value="<?=htmlspecialchars($this->user['username'])?>" />
        <div class="create-new-post-header">Full Name</div>
           <input type="text" name="full_name"
           value="<?=htmlspecialchars($this->user['full_name'])?>" />
          <br>
        <br>
        <div><input type="submit" value="Edit"/></div>
           <div class="cancel-button">
              <a href="<?=APP_ROOT?>/profiles">Cancel</a></div>
           </div>
        <br>
        <br>
      </form>
    </div>
</div>
