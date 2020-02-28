<?php
/*
   Represents a users order
 */
class Reviews
{  
   static private $id = 1;
    
   private $order_id;
   private $plan_id;
   private $num_travelers;
   private $ages;
   private $total;
    
   // constructor is 
   function __construct($plan_id, $num_travelers, $ages, $total) { 
       $this->plan_id = $plan_id;
       $this->num_travelers = $num_travelers;
       $this->ages = $ages;
       $this->total = $total;

       self::$id++;
       $this->order_id =  self::$id;
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
        $tag = "<div>";
        $tag .= "<p>Order id: ".$this->order_id."</p>";
        $tag .= "<p>Plan id: ".$this->plan_id."</p>";
        $tag .= "<p>Number of Travelers: ".$this->num_travelers." days </p>";
        $tag .= "<p>Ages of Travelers: ".$this->ages."</p>";
        $tag .= "<p>Total Price: ".$this->total."</p>";
        $tag .= "</div>";

      return $tag;       
   }
    
}

?>