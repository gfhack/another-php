<?php
   autenticated();

   unset($_SESSION['user']);
   flash('info', 'Logout realizado com sucesso!');
   redirect_to('/');
   //header('location:' . SITE_ROOT);
?>

