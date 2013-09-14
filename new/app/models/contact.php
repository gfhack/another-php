<?php

class Contact {
   private $name;
   private $email;
   private $body;

   private $errors = array();

   public function __construct($data = array()){
      foreach($data as $key => $value){
         $method = "set{$key}";
         $this->$method($value);
      }
   }
   

   public function setName($name){
      $this->name = $name;
   }

   public function setBody($body){
      $this->body = $body;
   }

   public function setEmail($email){
      $this->email = $email;
   }

   public function getName(){
      return $this->name;
   }

   public function getEmail(){
      return $this->email;
   }

   public function getBody(){
      return $this->body;
   }

   public function isValid(){
      Validations::notEmpty($this->name, $this->errors['name']);
      Validations::email($this->email, $this->errors['email']);
      Validations::notEmpty($this->body, $this->errors['body']);

      $this->errors = array_filter($this->errors, 'Validations::notEmpty');
      return empty($this->errors);
   }

   public function errors(){
      return $this->errors;
   }

}
?>

