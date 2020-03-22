<?php
/*
   Represents an Attraction
 */
class Attractions
{  
   // static private $inc = 1;
    
   private $a_id;
   private $title;
   private $date_of_creation;
   private $founder_name;
   private $dimensions;
   private $location;
   private $country;    
   private $continent;
    
   // constructor is 
   function __construct() { 
       // $this->title = $title;
       // $this->date_of_creation = $date_of_creation;
       // $this->founder_name = $founder_name;
       // $this->dimensions = $dimensions;  
       // $this->location = $location;
       // $this->country = $country;     
       // $this->continent = $continent;
       // self::$inc++;
       // $this->a_id =  self::$inc;
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
  
    }
    
   public function __toString() {

      $tag = '<tr>';
      $tag .= '<td>'. $this->a_id . '</td>';
      $tag .= '<td>'. $this->title . '</td>';
      $tag .= '<td>'. $this->date_of_creation . '</td>';
      $tag .= '<td>'. $this->founder_name . '</td>';
      $tag .= '<td>'. $this->dimensions . '</td>';
      $tag .= '<td>'. $this->location . '</td>';
      $tag .= '<td>'. $this->country . '</td>';
      $tag .= '<td>'. $this->continent . '</td>';
      $tag .= '</tr>';   

      return $tag; 
   }
    
}

?>