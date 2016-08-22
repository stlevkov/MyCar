<?php $this->title = 'Update user info?'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Username:</div>
    <input type="text" name="username"
           value="<?=htmlspecialchars($this->user['username'])?>" />
    <div>Full Name:</div>
    <input type="text" name="full_name"
           value="<?=htmlspecialchars($this->user['full_name'])?>" />
    <div><input type="submit" value="Edit"/>
        <a href="<?=APP_ROOT?>/profiles">[Cancel]</a></div>
</form>
