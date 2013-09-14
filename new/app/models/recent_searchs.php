<?php
   class RecentSearchs {
   private $cookieName;
   private $limit;
   private $recents = array();

   public function __construct($cookieName, $limit = 5) {
      $this->cookieName = $cookieName;
      $this->limit = $limit;
      $this->recents = $this->searchs();
   }

   public function add($value) {
      $value = str_replace(';','', trim($value));

      if (!empty($value) && !in_array($value, $this->recents)) {
	      if (sizeof($this->recents) >= $this->limit){
            array_pop($this->recents);
	   }

	      array_unshift($this->recents, $value);

         setCookie($this->cookieName, implode(';', $this->recents), time()+24*60*60);
      }
   }

   private function searchs() {
      if (isset( $_COOKIE[$this->cookieName] ))
         return explode(';', $_COOKIE[$this->cookieName]);
      else
         return array();
   }

   public function getRecents(){
      return $this->recents;
   }
}
?>
