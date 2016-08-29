<div class="body">
    <div class="new-part-form">
      <?php $this->title = 'Add new part'; ?>
        <h1 style="font-family: 'Bookman Old Style'"><?=htmlspecialchars($this->title)?></h1>
           <form method="post">
               <div>Part Name:</div>
               <input type="text" name="part_name" />
               <div>Description:</div>
               <textarea id="part-description" rows="5" name="description"></textarea>
               <div>Car Kilometers:</div>
               <input type="text" name="car_kilometers" />
               <div>Part Life [km]</div>
               <input type="text" name="part_life" />
               <div>Service Name</div>
               <input type="text" name="service_name" />
               <div>Changed part (Yes/No)?</div>
               <div>by default is No</div>
               <input type="text" name="archive" />
               <div><input type="submit" value="Create"/>
                   <a href="<?=APP_ROOT?>/parts">[Cancel]</a></div>
           </form>
    </div>
</div>