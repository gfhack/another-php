<?php
   $file = new File($_POST['file']);
   $files = array("name" => $_POST['file']['name'],"body" => $_POST['file']['body']);
   
   if ($file->create()) {
   	flash('success', 'Arquivo criado!');
      redirect_to('/files/');
   }
   else{
      flash('error', 'Existe dados incorretos no seu formulário!');
      require ('new.php');
   }
?>