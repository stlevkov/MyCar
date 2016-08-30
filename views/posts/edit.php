<div class="body">
    <div class="page-header">
        <?php $this->title = 'Edit Post'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <br>
    <br>
    <div class="create-new-form">
     <form method="post">
         <div class="create-new-post-header">Title</div>
       <input type="text" name="post_title" value="<?=
       htmlspecialchars($this->post['title'])?>" />
         <div class="create-new-post-header">Content</div>
         <textarea id="post-description" name="post_content"><?=
             htmlspecialchars($this->post['content'])?></textarea>
         <div class="create-new-post-header">Date (yyyy-MM-dd hh:mm:ss)</div>
       <input type="text" name="post_date" value="<?=
       htmlspecialchars($this->post['date'])?>" />
         <div class="create-new-post-header">Author ID</div>
       <input type="text" name="user_id" value="<?=
       htmlspecialchars($this->post['user_id'])?>" />
         <br>
         <br>
           <div><input type="submit" value="Edit">
               <div class="cancel-button">
               <a href="<?=APP_ROOT?>/posts">Cancel</a></div>
         </div>
         <br>
         <br>
</form>
</div>
