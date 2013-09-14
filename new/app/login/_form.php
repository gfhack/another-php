<?php notAutenticated(); ?>
<div class="span5">
<section>
   <header class='page-header'>
      <h1>Login</h1>
   </header>

   <form class="form-horizontal" action='log_in.php' method='POST' >
      <div class="control-group <?= isset($errors['email']) ? 'error' : '' ?>">
         <label class="control-label" for="inputEmail">Email</label>
         <div class="controls">
            <input type="text" id="inputEmail" name="user[email]" placeholder="Email" value="<?= @$email ?>">
         </div>
      </div>

      <div class="control-group <?= isset($errors['password']) ? 'error' : '' ?>">
         <label class="control-label" for="inputPassword">Password</label>
         <div class="controls">
            <input type="password" id="inputPassword" name="user[password]" placeholder="Password">
         </div>
      </div>

      <div class="control-group">
         <div class="controls">
            <label class="checkbox">
               <input type="checkbox"> Remember me
            </label>

            <button type="submit" class="btn">Sign in</button>
         </div>
      </div>
   </form>
</section>
</div>