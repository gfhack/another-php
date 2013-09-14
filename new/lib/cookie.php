<?php
function quantity(){
	return sizeof(searchCookie()) / 2;
}

function searchCookie() {
	if (isset( $_COOKIE['cart'] )){
		return explode(';', $_COOKIE['cart']);
	}else{
		return array();
	}
}

function split_cart() {
	$cookies = searchCookie();
	$cart = array();
	
	if(!empty($cookies)){
		for($i = 0; $i < sizeof($cookies); $i++){
			if($i % 2 == 0){
				$cart['product'][] = $cookies[$i];
			}else{
				$cart['amount'][] = $cookies[$i];
			}
		}
	}

	return $cart;
}

function attach_cart($cart){
	$cookie = array();

	foreach ($cart['product'] as $key => $value) {
		$cookie[] = $cart['product'][$key];
		$cookie[] = $cart['amount'][$key];
	}

	return implode(';', $cookie);
}

function add($id, $amount) {
	$cart = split_cart();

	if(!empty($cart)){
		if(sizeof($cart['product']) == 1)
			$pos = 0;
		else
			$pos = array_search($id, $cart['product']);

		if($id == $cart['product'][$pos]){
			$cart['amount'][$pos] = $amount;
		}else{
			$cart['amount'][]  = $amount;
			$cart['product'][] = $id;
		}
	
		$cookie = attach_cart($cart);
	}else{
		$cookie = implode(';', array($id, $amount));
	}
	
	setCookie('cart', $cookie, time()+3600*24);
}

function del_cookie($cookie){
	setcookie($cookie);
}

?>