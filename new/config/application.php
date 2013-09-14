<?php

  define('APP_NAME', 'new' );
  define('APP_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/' .   APP_NAME . '/');
  define('SITE_ROOT', '/new/app' );
  define('IMAGE_PATH', '/assets/img/');
  /* Adicionar pastas defaults para inclução de arquivos com as funções require e include */
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT);
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT . 'config/');
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT . 'app/');
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT . 'app/layout/');
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT . 'lib/');


  session_start();
  date_default_timezone_set('America/Sao_Paulo');

  require 'flash_message.php';
  require 'utils.php';
  require 'cookie.php';
  require '_auto_load_class.php';
?>
