<?php

	$cart = split_cart(searchCookie());

	foreach ($cart['product'] as $key => $value) {
		if($_GET['id'] == $value) {
			unset($cart['product'][$key]);
			unset($cart['amount'][$key]);
		}
	}

	$cookie = attach_cart($cart);
	setCookie('cart', $cookie, time()+3600*24);

	redirect_to('cart');
?>