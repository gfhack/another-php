<?php
	setcookie('cart', "", time() - 3600);
	flash('success', 'Compra Efetuada!');
	redirect_to('/');
?>