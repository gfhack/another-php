<?php

function stylesheet_include_tag() {
   $params = func_get_args();
   
   foreach($params as $param){
      $path = SITE_ROOT . "/assets/css/" . $param;
      echo "<link href='{$path}' rel='stylesheet' type='text/css' />
      ";
   }
}

function link_to($path, $name, $options = '') {
   if (substr($path, 0, 1) == '/')
      $link = SITE_ROOT . $path;
   else
		$link = $path;

	return "<a href='{$link}' {$options}> $name </a>
	";
}

function redirect_to($address) {
	if (substr($address, 0, 1) == '/')
		header('location: ' . SITE_ROOT . $address);
	else
		header('location: ' . $address);
}

function back(){
	if (isset($_SERVER['HTTP_REFERER'])){
		return $_SERVER['HTTP_REFERER'];
	}else{
		return '/';
	}
}

function javascript_include_tag(){
	$params = func_get_args();
	
	foreach($params as $param){
		$path = SITE_ROOT . "/assets/js/" . $param;
		echo "<script language='JavaScript' src='{$path}' type='text/JavaScript'></script>
		";
	}
}

function currentUser($attr = null) {
    if (isset($_SESSION['user']))
      return isset($attr) ?  $_SESSION['user'][$attr] :  $_SESSION['user'];
    else
      return false;
 }

function autenticated(){
	if(!(isset($_SESSION['user']))) {
		flash('error', 'Você deve estar logado para acessar está página!');
		redirect_to('/login/log_in');
		exit;
	}
}

function notAutenticated(){
	if(isset($_SESSION['user'])) {
		flash('warning', 'Você deve estar deslogado para acessar está página!');
		redirect_to(back());
		exit;
	}
}

?>