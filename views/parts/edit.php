<div class="body">
    <div class="page-header">
        <?php $this->title = 'Edit Part replacement'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <br>
    <br>
    <div class="create-new-form">
    <form method="post">
        <div class="create-new-post-header">Title</div>
        <input type="text" name="part_name" value="<?=
        htmlspecialchars($this->part['part_name'])?>" />
        <div class="create-new-post-header">Description</div>
        <input type="text" name="description" value="<?=
        htmlspecialchars($this->part['description'])?>" />
        <div class="create-new-post-header">Car Kilometers</div>
        <input type="text" name="car_kilometers" value="<?=
        htmlspecialchars($this->part['car_kilometers'])?>" />
        <div class="create-new-post-header">Part Life [km]</div>
        <input type="text" name="part_life" value="<?=
        htmlspecialchars($this->part['part_life'])?>" />
        <div class="create-new-post-header">Service Name</div>
        <input type="text" name="service_name" value="<?=
        htmlspecialchars($this->part['service_name'])?>" />
        <div class="create-new-post-header">Replaced or still new part?</div>
        <br>
        <select id="option-button" name="archive">
            <option value="No">New part</option>
            <option value="Yes">Old part</option>
        </select>
        <br>
        <br>
        <div class="create-new-post-header">Date (yyyy-MM-dd hh:mm:ss):</div>
        <input type="text" name="post_date" value="<?=
        htmlspecialchars($this->part['date'])?>" />
        <br>
        <br>
        <div><input type="submit" value="Edit">
            <br>
            <div class="cancel-button">
            <a href="<?=APP_ROOT?>/parts">Cancel</a></div>
            </div>
    </form>


</div>
