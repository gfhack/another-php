<?php
   class FileSearch {
      private $dir;

      public function __construct($dir) {
         $this->dir = $dir;
      }

      public function retrieve($file){
         if (file_exists($this->dir . '/' . $file)) {
            return array("name" => $file, "body" => file_get_contents($this->dir . '/' . $file));
         }
      }

      public function find($search) {
         $files = array();
      
         foreach(glob($this->dir.'/*') as $file) {
            $content = file_get_contents($file);

            if (preg_match("/($search)/i", $content) || preg_match("/($search)/i", $file)) {
               $files[] = array('name' => $this->getFilename($file),'content' => $content);
            }
         }
         return $files;
      }

      public function findAll() {
         $files = array();
         $files_path = glob($this->dir.'/*');

         foreach($files_path as $file) {
            $content = file_get_contents($file);
            $files[] = array('name' => $this->getFilename($file),'content' => $content);
         }

         return $files;
      }

      private function getFilename($name){
         $names = explode('/',$name);

         return $names[sizeof($names)-1];
      }
   }
?>

