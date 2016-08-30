<div class="body">
    <div class="page-header">
        <?php $this->title = 'Add new part'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <div class="create-new-form">
           <form method="post">
               <div class="create-new-post-header">Part Name</div>
               <input type="text" name="part_name" />
               <div class="create-new-post-header">Description</div>
               <input type="text" name="description"></input>
               <div class="create-new-post-header">Current Car Kilometers</div>
               <input type="text" name="car_kilometers" />
               <div class="create-new-post-header">Part Life [km]</div>
               <input type="text" name="part_life" />
               <div class="create-new-post-header">Service Name</div>
               <input type="text" name="service_name" />
               <br>
               <br>
               <div class="create-new-post-header">Kind of Part</div>
               <select id="option-button" name="archive">
                   <option value="No">New part</option>
                   <option value="Yes">Old part</option>
               </select>
               <br>
               <br>
               <br>
               <div id="progress-bar-message-override">If you enter old part replacement, please ensure that u enter old date too!</div>
               <div class="create-new-post-header">Date (yyyy-MM-dd hh:mm:ss)</div>
               <input type="text" name="post_date" value="" />
               <br>
               <br>
               <div><input type="submit" value="CREATE"/></div>
               <div class="cancel-button">
                   <a href="<?=APP_ROOT?>/parts">CANCEL</a>
               </div>
           </form>
    </div>
</div>