<div class="body">
<?php $this->title = 'Delete user?'; ?>

<h1 style="font-family: 'Bookman Old Style'"><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Username:</div>
    <input type="text" name="user_name" disabled
           value="<?=htmlspecialchars($this->user['username'])?>" />
    <div>Password hash:</div>
    <textarea style="width: 450px " name="user_password" disabled><?=htmlspecialchars($this->user['password_hash'])?></textarea>
    <div><input type="submit" value="Delete"/>
        <a href="<?=APP_ROOT?>/profiles">[Cancel]</a></div>
</form>
</div>