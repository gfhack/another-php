<?php
	autenticated();

	if (empty($_POST['amount'])) {
		flash('info', 'Adicione quantos produtos deseja comprar!');
		redirect_to('/shop/');
		exit;
	}

	$cart['id'] = $_POST['id'];
	$cart['amount'] = $_POST['amount'];

	add($cart['id'], $cart['amount']);

	redirect_to('cart');
?>