<?php
class File {
   private $name;
   private $body;
   private $dir = 'txt/';

   private $errors = array();

   public function __construct($data = array()){
      foreach($data as $key => $value){
         $method = "set{$key}";
         $this->$method($value);
      }
   }
   
   public function setName($name){
      if (Validations::isText($name) || empty($name)){ 
           $this->name = $name; 
        }else{
           $this->name = $name . '.txt'; 
        }
   }

   public function setBody($body){
      $this->body = $body;
   }

   public function getName(){
      return $this->name;
   }

   public function getBody(){
      return $this->body;
   }

   public function isValid(){
      Validations::uniqueFile($this->dir . $this->name, $this->errors['name']);
      Validations::notEmpty($this->name, $this->errors['name']);
      Validations::notEmpty($this->body, $this->errors['body']);

      $this->errors = array_filter($this->errors, "Validations::notEmpty");
      return empty($this->errors);
   }

   public function isRewriteAble(){
      Validations::notEmpty($this->name, $this->errors['name']);
      Validations::notEmpty($this->body, $this->errors['body']);

      $this->errors = array_filter($this->errors, "Validations::notEmpty");
      return empty($this->errors);
   }

   public function errors(){
      return $this->errors;
   }

   public function save(){
      if ($this->isRewriteAble()) {
         $text = fopen($this->dir . $this->name, 'w+');
         fwrite($text, $this->body);
         fclose($text);

         return true;
      }

      return false;
   }

   public function create(){
      if ($this->isValid()) {
         $text = fopen($this->dir . $this->name, 'w+');
         fwrite($text, $this->body);
         fclose($text);

         return true;
      }

      return false;
   }

   public function delete(){
      return unlink($this->dir . $this->name); 
   }

   public static function findByName($name, $dir){ 
      $path = $dir . '/' . $name;
    
      if(file_exists($path)) { 
         $file = new File();
         
         $file->setName($name); 
         $file->setBody(file_get_contents($path));

         return $file; 
      }
   }
}
?>