<?php
/*
   Represents a single travel photo
 */
class Photos
{  
   static private $inc = 1;
    
   private $p_id;
   private $img_path;
   private $a_id;
    
    
   // constructor is 
   function __construct($img_path, $a_id) { 
       $this->img_path = $img_path;
       self::$inc++;
       $this->p_id = self::$inc;
   }    

   public function __get($property) {
      if (property_exists($this, $property)) {
        return $this->$property;
      }
    }
  
    public function __set($property, $value) {
      if (property_exists($this, $property)) {
        $this->$property = $value;
      }
  
      return $this;
    }

    // TOSTRING NEEDS MODIFICATION
   public function __toString() {
      $tag = '<a href="readmore.php?id=' . $this->a_id . '" class="responsive-img">';
      $tag .= '<img src="' . $this->img_path . '" >';   
      $tag .= '<div class="caption"><div class="blur">';
      return $tag;       
   }
    
}

?>