<?php
/*
   Represents a single plan
 */
class Plans
{  
   static private $id = 1;

   private $plan_id;
   private $start_date;
   private $duration;
   private $fare;
   private $total_price;
   private $purchased;
   private $map_link;
   private $description;
    
   // constructs the plan object
   function __construct($start_date, $duration, $fare, $total_price, $map_link, $description) { 
       $this->start_date = $start_date;
       $this->duration = $duration;
       $this->fare = $fare;
       $this->total_price = $total_price;
       $this->purchased = $purchased;
       $this->map_link = $map_link;
       $this->description = $description;

       self::$id++;
       $this->plan_id =  self::$id;
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
  
    
   public function __toString() {
      $tag = "<div id=\"map".$this->id."\" class=\"hide\">".$this->map_link."</div>";
      $tag .= "<div value=\"".$this->id."\" class=\"hoverable card plan blue-grey card-action\">";
      $tag .= "<div class=\"card-content white-text\">";
      $tag .= "<span class=\"card-title\">Vacation Plan ".$this->id."</span>";
      $tag .= "<p>Start Date: ".$this->start_date."</p>";
      $tag .= "<p>Duration: ".$this->duration." days </p>";
      $tag .= "<p>Air/Cruise Fare: ".$this->fare."</p>";
      $tag .= "<p>Total Price: ".$this->total_price."</p>";
      $tag .= "</div>";
      $tag .= "</div>";

      return $tag;       
   }
    
}

?>