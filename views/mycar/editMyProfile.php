<?php
if(isset($_POST['submit'])) {
    move_uploaded_file($_FILES['file']['tmp_name'],"content/pictures/".$_FILES['file']['name']);
    $con = mysqli_connect ("localhost", "root","", "blog");
    $q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
}
?>


<?php $this->title = 'Моят профил'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<div id="my-profile-upload-form">
    <form action=""  method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit">
    </form>
</div>


<?php


$con = mysqli_connect("localhost","root", "", "blog" );
$q = mysqli_query($con,"SELECT username FROM users WHERE username='admin'");


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

<div id="profile-nav">
   <p> Опции </p>
</div>








