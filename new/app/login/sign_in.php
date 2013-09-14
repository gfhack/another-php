<?php
   notAutenticated();

   $email = $_POST['email'];
   $password = $_POST['password'];
   
   $email_db = 'hack@web.com.br';
   $password_db = 'h2292b3m';
   
   if ($email_db === $email && $password_db == $password) {
      $_SESSION['user']['name'] = 'Hack';
      flash('success', 'Login realizado com sucesso!');
      redirect_to('/');
   }else{
      flash('error', 'Dados incorretos!');
      redirect_to('/login/log_in');
   }
?>