<div class="body">
    <div class="create-delete-form">
    <?php $this->title = 'Add New Post'; ?>

       <h1><?=htmlspecialchars($this->title)?></h1>

             <form method="post">
                 <div>Title:</div>
                  <input type="text" name="post_title" />
                   <div>Content:</div>
               <textarea rows="10" name="post_content"></textarea>
             <div><input type="submit" value="Create"/>
                <a href="<?=APP_ROOT?>/posts">[Cancel]</a></div>
             </form>
    </div>
</div>
