<?php
   require('_cart.php');
   
   $cart['id'] = $_GET['id'];
   $cart['amount'] = 1;

   add($cart['id'], $cart['amount']);

   flash('success', 'Adicionado com sucesso!');
   redirect_to(back());
?>