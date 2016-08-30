<div class="body">
    <div class="page-header">
        <?php $this->title = 'Register'; ?>
        <h1><?=htmlspecialchars($this->title)?></h1>
    </div>
    <div class="create-new-form">
     <form method="post">
         <div class="create-new-post-header">Username</div>
         <input type="text" name="username" required />
         <div class="create-new-post-header">Password</div>
         <input type="password" name="password" required />
         <div class="create-new-post-header">Password Confirm</div>
         <input type="password" name="password_confirm" required />

         <div class="create-new-post-header">Full Name</div>
         <input type="text" name="full_name" />
         <br>
         <br>
         <input type="submit" value="Register">
         <br>
         <br>
     </form>
    </div>
    </div>
</div>