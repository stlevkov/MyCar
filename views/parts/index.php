<div class="body">
    <div class="page-header">
        <?php $this->title = 'Check your part health'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
        <h3>Scroll down to check the status</h3>
    </div>

    <div id="button-scroll-down-welcome" onclick="location.href='#welcome-scroll';" style="cursor:pointer;"></div>
    <?php if (htmlspecialchars($_SESSION['username']) == 'admin') { ?>
        <div class="administrator">
          <h1>You are Administrator.</h1>
            <h3>You can now modify user input data.</h3>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Part Name</th>
            <th>Description</th>
            <th>Service Name</th>
            <th>Date</th>
            <th>Author</th>
            <th>Car Kilometers</th>
            <th>Part Life</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($this->parts as $part ) : ?>
            <tr>
                <td><?=htmlspecialchars($part['id'])?></td>
                <td><?=htmlspecialchars($part['part_name'])?></td>
                <td><?=cutLongText($part['description'])?></td>
                <td><?=cutLongText($part['service_name'])?></td>
                <td><?=htmlspecialchars($part['date'])?></td>
                <td><?=htmlspecialchars($part['full_name'])?></td>
                <td><?=htmlspecialchars($part['car_kilometers'])?></td>
                <td><?=htmlspecialchars($part['part_life'])?></td>
                <td>
                    <a href="<?=APP_ROOT?>/parts/edit/<?=
                    htmlspecialchars($part['id'])?>">[Edit]</a>
                    <a href="<?=APP_ROOT?>/parts/delete/<?=
                    htmlspecialchars($part['id'])?>">[Delete]</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <br>
<?php } else { ?>
    <div>
        <table>
            <tr>
                <th>Date</th>
                <th>Part Name</th>
                <th>Description</th>
                <th>Service Name</th>
                <th>Car Kilometers [km]</th>
                <th>Part Life [km]</th>
                <th>Changed?</th>
                <th>Actions</th>

            </tr>
                <?php foreach ($this->parts as $part ) : ?>
                    <tr>
                        <td><?=htmlspecialchars($part['date'])?></td>
                        <td><?=htmlspecialchars($part['part_name'])?></td>
                        <td><?=cutLongText($part['description'])?></td>
                        <td><?=cutLongText($part['service_name'])?></td>
                        <td><?=htmlspecialchars($part['car_kilometers'])?></td>
                        <td><?=htmlspecialchars($part['part_life'])?></td>
                        <td><?=htmlspecialchars($part['archive'])?></td>
                        <td>
                            <a href="<?=APP_ROOT?>/parts/edit/<?=
                            htmlspecialchars($part['id'])?>">Edit</a>
                            <a href="<?=APP_ROOT?>/parts/delete/<?=
                            htmlspecialchars($part['id'])?>">Delete</a>
                        </td>

                    </tr>
                <?php endforeach ?>
        </table>
        <br>
    </div>
        <?php $car_km = 1;?>
        <div id="car-check-form">
            <div id="welcome-scroll"></div>
        <form method="post">
            <div id="car-check-form-header">Current Car Kilometers</div>
            <br>
           <input id="car-check-form-input" type="number" name="car_check" />
            <br>
            <div><input  type="submit"  value="Car Check"/></div>
        </form>
            <br>
        </div>
        <?php
            if(isset($_REQUEST['car_check'])){
            $car_km = $_REQUEST['car_check'];
            } ?>

        <?php foreach ($this->parts as $part ) : ?>
            <?php
        if (htmlspecialchars($part['archive']) !== 'Yes') { ?>
              <form method="get">
              <?php
              $part_life = htmlspecialchars($part['part_life']);
              $car_kilometers = htmlspecialchars($part['car_kilometers']);
              $current_kilometers = $car_km;
              $left_kilometers = $current_kilometers - $car_kilometers;
              $total_car_kilometers = $car_kilometers + $part_life;
              $difference = $total_car_kilometers - $current_kilometers;
              if ($current_kilometers < $car_kilometers) {
                echo "<div id='car-check-form-validation-error-message'>You have parts in use. Please enter your current car kilometers to see their status.</div>";
               echo "<div id='car-check-form-validation-error-message'>Make sure that your parts are not changed! And you enter the right count</div>";
                echo "<br>";
                break;
              } ?>
              </form>
            <div class="progress-bar">

               <div class="progress-bar-header">Part Name: <i><?=htmlspecialchars($part['part_name']) ?></i></div>
               <div class="progress-bar-header">Installed on: <i><?=htmlspecialchars($part['date']) ?> </i></div>
               <div class="progress-bar-header">by <i><?=htmlspecialchars($part['service_name']) ?></i></div><br>
             <?php
               if  ($left_kilometers > $part_life) {
                 echo "<div id='progress-bar-message-override'>Consider that you need to replace that part!</div>";
                 echo "<br>";
                 echo "<div id='progress-bar-message'>You traveled " . "$left_kilometers" . " km!" . " Suggested part life is: " . "$part_life" . " km. </div>";
                   echo "<div id='progress-bar-message'>Override part life by  " . abs($difference) . " km.<br></div>";
               } else {
                 $percent = round(($left_kilometers / $part_life) * 100, 1);
                   echo "<div id='progress-bar-message'>You passed " . "$left_kilometers" . " km" . "  from " . "$part_life" . " km. of Part Life " . "</div>";
                   echo "<div id='progress-bar-message'>Now you have " . "$difference" . " km more to travel.</div><br>";
                   if ($percent >= 95) {
                       echo "<div id='progress-bar-message-override'>Nearing the end of life of the replacement part. Consider changing.</div>";
                   }
               } ?>
            <div class="progress-bar-out">
               <?php
               if  ($left_kilometers > $part_life) {
                   $percent = 100;
               }?>
               <?php
               if($percent == 100){ ?>
                  <div class="progress-bar-in-override" style="width: <?= $percent ?>%">
                      <?php echo "<div id='progress-bar-in-percents'>" . "$percent%" . "</div>"; ?>
                  </div>
               <?php } else {?>
                  <div class="progress-bar-in" style="width: <?= $percent ?>%">
                      <?php echo "<div id='progress-bar-in-percents'>" . "$percent%" . "</div>"; ?>
                  </div>
               <?php } ?>
            </div>
                <a id="change-button" href="<?=APP_ROOT?>/parts/change/<?=
                htmlspecialchars($part['id'])?>">Change</a>
           </div>
            <br>
            <br>
            <br>
            <br>
            <?php }  ?>
  <?php endforeach ?>

<?php } ?>
    <div id="button-scroll-up" onclick="location.href='#scroll-up';" style="cursor:pointer;"></div>
</main>
</div>
