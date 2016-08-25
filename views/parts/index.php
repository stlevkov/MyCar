<div class="body">
<main>
    <?php if (htmlspecialchars($_SESSION['username']) == 'admin') { ?>
        <div class="administrator">
          <h1>You are Administrator.</h1>
            <h3>You can now modify user input data.</h3>
    </div>
    <table>
        <tr>
            <th>id</th>
            <th>part_name</th>
            <th>Description</th>
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
        <?php $car_km = 1;?>
        <form method="post">
            <div>Current Car Kilometers:</div>
            <input type="number" name="car_check" />
            <input type="submit" name="Go" />
        </form>
        <?php
         if(isset($_REQUEST['car_check'])){
          $car_km = $_REQUEST['car_check'];
         } ?>
        <h1>Parts health status</h1>
        <?php foreach ($this->parts as $part ) : ?>
        <div class="parts-life-box">
        <form method="get">
           <?php
           $part_life = htmlspecialchars($part['part_life']);
           $car_kilometers = htmlspecialchars($part['car_kilometers']);
           $current_kilometers = $car_km;
           $left_kilometers = $current_kilometers - $car_kilometers;
           $total_car_kilometers = $car_kilometers + $part_life;
           $difference = $total_car_kilometers - $current_kilometers;
            if ($current_kilometers < $car_kilometers) {
             echo "You have entered wrong current car kilometers. Check again";
             echo "<br>";
             break;
            } ?>
            <div>Оставащ живот на сменената част: <?=htmlspecialchars($part['part_name']) ?></div>
             <?php
               if  ($left_kilometers > $part_life) {
                 echo "Помислете за смяна! Изминали сте повече km от живота на частта!";
                 echo "<br>";
                 echo "Вие изминахте " . "$left_kilometers" . " km!" . " Препоръчителният живот на частта е: " . "$part_life" . " km. " . "Изминахте  " . abs($difference) . " km Повече.";
               } else {
                 $percent = round(($left_kilometers / $part_life) * 100, 1);
                 echo "Изминали сте " . "$left_kilometers" . "km" . " / " . "$percent%" . " от " . "$part_life" . " km " . "<br>";
               } ?>
            <div class="progress-bar-out">
               <?php
               if  ($left_kilometers > $part_life) {
                 $percent = 100;
               }?>
               <?php
               if($percent == 100){ ?>
                  <div class="progress-bar-in-override" style="width: <?= $percent ?>%">
                  </div>
               <?php } else {?>
                  <div class="progress-bar-in" style="width: <?= $percent ?>%">
                  </div>
               <?php } ?>
            </div>
        </form>
     <br>
    <?php endforeach ?>
    </div>
<?php } ?>
</main>
</div>

