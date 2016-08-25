<div class="body">
    <div class="create-delete-form">
      <?php $this->title = 'Add new part'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
           <form method="post">
               <div>Part Name:</div>
               <input type="text" name="part_name" />
               <div>Description:</div>
               <textarea rows="5" name="description"></textarea>
               <div>Car Kilometers:</div>
               <input type="text" name="car_kilometers" />
               <div>Part Life [km]</div>
               <input type="text" name="part_life" />
               <div><input type="submit" value="Create"/>
                  <a href="<?=APP_ROOT?>/parts">[Cancel]</a></div>
           </form>
    </div>
</div>