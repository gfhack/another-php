<?php
  /*
   * Função autoload é utilizada para carregar automaticamente as classes quando elas forem utilizadas
   */
  function __autoload($class_name) {
    # from camel case to snack case
    $class_name = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $class_name));

    $file = APP_ROOT . 'app/models/' . strtolower($class_name) . '.php';

    if (file_exists($file) == true)
      return require_once $file;
    else{
      $file = APP_ROOT . 'lib/' . $class_name . '.php';

      if (file_exists($file) == true)
        return require_once $file;

      return false;
    }
  }
?>
