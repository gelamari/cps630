<?php
/*
   Represents a single travel photo
 */
class Attractions
{  
   static private $inc = 1;
    
   private $a_id;
   private $title;
   private $date_of_creation;
   private $founder_name;
   private $dimensions;
   private $location;
   private $country;    
   private $continent;
    
   // constructor is 
   function __construct($title, $date_of_creation, $founder_name, $dimensions, $location, $country, $continent) { 
       $this->title = $title;
       $this->date_of_creation = $date_of_creation;
       $this->founder_name = $founder_name;
       $this->dimensions = $dimensions;  
       $this->location = $location;
       $this->country = $country;     
       $this->continent = $continent;
       self::$inc++;
       $this->a_id =  self::$inc;
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