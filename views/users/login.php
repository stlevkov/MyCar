<div class="body">
    <div class="login-register-form">
          <?php $this->title = 'Login'; ?>
          <h1 style="font-family: 'Bookman Old Style'"><?= htmlspecialchars($this->title) ?></h1>
       <form method="post">
       <div>Username: <input type="text" name="username" /></div>
       <div>Password: <input type="password" name="password" /></div>
    <div><input type="submit" value="Login"></div>
   </form>
 </div>
</div>
