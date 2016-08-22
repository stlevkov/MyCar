


<?php $this->title = 'Моят профил'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>



  <?php
     $con = mysqli_connect("localhost","root", "", "blog" );
     $q = mysqli_query($con,"SELECT username, image FROM users");


     while ($row = mysqli_fetch_assoc($q)) {
         echo $row['username'];
       if ($row['image'] == "") {
        echo  "<img width='100' height='100' src='/blog/content/pictures/default.jpg' alt='Default Profile Pic>";
       } else {
         echo  "<img width='100' height='100' src='/blog/content/pictures/".$row['image']."' alt='Profile Pic>";
       }
       echo "<br>";
    }
  ?>




