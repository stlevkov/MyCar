<div class="body">
    <div class="page-header">
        <?php $this->title = 'Delete Part'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <br>
    <br>
    <div class="create-new-form">
    <form method="post">
        <div id="progress-bar-message-override" style="font-size: 50px;">Are you sure you want to delete this Part?</div>

        <div class="create-new-post-header">Part Name</div>
        <input type="text" name="part_name" disabled
               value="<?=htmlspecialchars($this->part['part_name'])?>" />
        <div class="create-new-post-header">Description</div>
        <input type="text" name="description" disabled value="<?=
        htmlspecialchars($this->part['description'])?>"/>
        <br>
        <br>
        <?php
        if ($this->part['user_id'] == htmlspecialchars($_SESSION['user_id'])) {
            echo "<div><input type=\"submit\" value=\"Delete\"></div>";
        } else if (htmlspecialchars($_SESSION['username']) == 'admin') {
            echo "<div><input type=\"submit\" value=\"Delete\"></div>";
        } else {
            $this->redirect('parts');
        }?>
        <div class="cancel-button">
            <a href="<?=APP_ROOT?>/parts">Cancel</a></div>
        <br>
    </form>
    </div>
</div>

