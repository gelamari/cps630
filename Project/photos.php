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
    // TOSTRING NEEDS MODIFICATION
   public function __toString() {
      $tag = '<a href="readmore.php?id=' . $this->a_id . '" class="responsive-img">';
      $tag .= '<img src="' . $this->img_path . '" >';   
      $tag .= '<div class="caption"><div class="blur">';
      return $tag;       
   }
    
}

?>