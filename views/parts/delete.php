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
        <div><input type="submit" value="Delete"/>
            <br>
            <br>
            <div class="cancel-button">
                <a href="<?=APP_ROOT?>/parts">Cancel</a></div>
        </div>
        <br>
    </form>
    </div>
</div>

