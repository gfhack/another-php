<?php
   notAutenticated();

   if(isset($_POST['user'])){
   	$email = $_POST['user']['email'];
   	$password = $_POST['user']['password'];
   
   	$email_db = 'hack@web.com.br';
   	$password_db = 'h2292b3m';
   
   	if ($email_db === $email && $password_db == $password) {
   		$_SESSION['user']['name'] = 'hack';
      	flash('success', 'Login realizado com sucesso!');
      	redirect_to('/');
      	exit;
   	}else{
   		$errors['email'] = ($email_db === $email) ? '' : 'error' ;
   		$errors['password'] = ($password_db == $password) ? '' : 'error' ;

      	flash('error', 'Dados incorretos!');
   	}
   }
?>

<?php require('_header.php'); ?>

<?php require('_form.php'); ?>

<?php require('_footer.php'); ?>