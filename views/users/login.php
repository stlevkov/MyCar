<div class="body">
    <div class="page-header">
        <?php $this->title = 'Login'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <div class="create-new-form">
       <form method="post">
           <div class="create-new-post-header">Username</div>
           <input type="text" name="username" />
           <div class="create-new-post-header">Password</div>
           <input type="password" name="password" />
           <br>
           <br>
    <div><input type="submit" value="Login"></div>
           <br>
           <br>
   </form>
 </div>
</div>
