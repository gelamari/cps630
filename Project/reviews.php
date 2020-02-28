<?php
/*
   Represents a single travel photo
 */
class Reviews
{  
   static private $inc = 1;
    
   private $r_id;
   private $name;
   private $rating;
   private $review;
   private $a_id;
   private $date_posted;    
    
   // constructor is 
   function __construct($name, $rating, $review, $a_id, $date_posted) { 
       $this->name = $name;
       $this->rating = $rating;
       $this->review = $review;
       $this->a_id = $a_id;  
       $this->date_posted = $date_posted;
       self::$inc++;
       $this->r_id =  self::$inc;
   }    
   // TOSTRING NEEDS MODIFICATION
    
   public function __toString() {
      $tag = '<table><tr><td><a href="readmore.php?id=' . $this->a_id . '" class="img-responsive">';
      $tag .= '<img src="' . $this->fileName . '" title="' . $this->title . '" alt="' . $this->title . '" >';   
      $tag .= '<div class="caption"><div class="blur"></div><div class="caption-text"><h1>' . $this->title . 
                  '</h1></div></div></a>';
      return $tag;       
   }
    
}

?>