<div class="body">
    <div class="page-header">
        <?php $this->title = 'Part replacement'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <div class="create-new-form">
    <form method="post">
        <div id="part-replacement-header">You are replacing part</div> <div id="part-replacement-name"><?=
        htmlspecialchars($this->part['part_name'])?></div>
        <div class="create-new-post-header">Part Life [km]</div>
        <input type="text" name="part_life" value="<?=
        htmlspecialchars($this->part['part_life'])?>" />
        <div class="create-new-post-header">Replace part?</div>
        <select id="option-button" name="archive">
            <option value="Yes">Old part</option>
        </select>
        <br>
        <br>
        <div class="create-new-post-header">Date (yyyy-MM-dd hh:mm:ss)</div>
        <input type="text" name="post_date" value="" />
        <br>
        <br>
        <div><input type="submit" value="Replace part">
            <br>
            <div class="cancel-button">
                <a href="<?=APP_ROOT?>/parts">Cancel</a></div>
        </div>
        <br>
        <br>
    </form>
    </div>
</div>
