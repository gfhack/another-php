<?php
function redirect_if_not_a_post() {
   $location = '/';
   $params = func_get_args();
   $last_element = $params[sizeof($params)-1];
   
   if (strpos($last_element, 'location:') !== false)
      $location = array_pop($params);

      foreach($params as $param){
         if (!isset($_POST[$param])){
            header($location);
            exit();
         }
      }
}

function notEmpty($value, $key = null, &$errors = null){
   if (empty($value)){
      if ($key !== null && $errors !== null) {
         $msg = 'não deve ser vazio';
         $errors[$key] = $msg;
      }
      return false;
   }
   return true;
}

function validEmail($email, $key = null, $errors = null){
   $pattern = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+/';
   
   if (preg_match($pattern, $email))
      return true;
   
   if ($key !== null && $errors !== null)
      $errors[$key] = 'não é válido';

   return false;
}

class Validations {
  public static function uniqueFile($path, &$msg) {
      if (!file_exists($path)) {
        unset($msg);
        return true;
      }
      $msg = 'já existe um arquivo com esse nome';
      return false;
   }
   
  public static function isText($name){
      $pattern = '/^.+\.txt$/';

      if (preg_match($pattern, $name)) {
        return true;
      }

      return false;
   }

  public static function notEmpty($value, &$msg = ''){
    if (empty($value)){
      $msg = 'não deve ser vazio';
      return false;
    }
    unset($msg);
    return true;
  }

  public static function email($email, &$msg = ''){
    $pattern = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+/';

    if (preg_match($pattern, $email)) {
      unset($msg);
      return true;
    }

    $msg = 'não é valido';
    return false;
  }
}
?>