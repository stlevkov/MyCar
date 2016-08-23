<main>
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
        <?php foreach ($this->parts as $part) : ?>
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
</main>
<div id="body">
    <form class="Current-kilometers">

    </form>
    <h1>Живот на частите</h1>
    <?php foreach ($this->parts as $part ) : ?>
     <div class="parts-life-box">

        <form method="get">
            </div>
                <?php
                $part_life = htmlspecialchars($part['part_life']);
                $car_kilometers = htmlspecialchars($part['car_kilometers']);
                $current_kilometers = 189375; // TODO: Да направя проверка на километрите с форма
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
                    echo "Consider that u have override part life kilometers!";
                    echo "<br>";
                    echo "You past " . "$left_kilometers" . " km!" . " Suggested part kilometers: " . "$part_life" . " km. " . "Difference: " . abs($difference);
                } else {
                    $percent = round(($left_kilometers / $part_life) * 100, 1);
                    echo "Изминали сте " . "$left_kilometers" . "km" . " / " . "$percent%" . " от " . "$part_life" . " km " . "<br>";
                } ?>
                <div class="progress-bar-out">
                  <?php if  ($left_kilometers > $part_life) {
                    $percent = 100;
                  }?>
                   <?php if($percent == 100){ ?>
                    <div class="progress-bar-in-override" style="width: <?= $percent ?>%">
                    </div>
                    <?php } else {?>
                    <div class="progress-bar-in" style="width: <?= $percent ?>%">
                    </div>
                    <?php } ?>
                </div>
        </form>
      </div><br>
    <?php endforeach ?>

</div>
