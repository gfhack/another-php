<?php
   $contact = new Contact($_POST['contact']);
   
   if ($contact->isValid()) {
      flash('success', 'Mensagem enviada com sucesso!');
      redirect_to('/');
   }
   else{
      flash('error', 'Existe dados incorretos no seu formulário!');
      require ('new.php');
   }
?>