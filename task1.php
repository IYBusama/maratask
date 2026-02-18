<?php
/**
 * PARENT CLASS: Vehicle
 * Demonstrates:
 * - Encapsulation
 * - $this keyword
 * - Protected properties
 */
class Vehicle
{
    // Public properties (this is  can be accessible via object)
    public $make;
    public $model;

    // Protected property (encapsulation: this is not accessible outside the class directly)
    protected $speed;

    
    //   Constructor
    //   $this keyword refers to the current object
     
    public function __construct($make, $model, $speed = 0)
    {
        $this->make = $make;
        $this->model = $model;
        $this->setSpeed($speed);
    }

    
    //  Set method for speed (encapsulation)
    //  Validating the speed before setting
     
    public function setSpeed($speed)
    {
        if ($speed >= 0) {
            $this->speed = $speed;
        }
    }

    
    //  Get method for speed
    
    public function getSpeed()
    {
        return $this->speed;
    }

    
    //   Method to display vehicle info
    
    public function getInfo()
    {
        return "Vehicle: {$this->make} {$this->model}, Speed: {$this->speed} km/h";
    }
}
/**
 * CHILD CLASS: Car
 * Demonstrates:
 * - Encapsulation
 * - $this keyword
 * - Protected properties
 */

class Car extends Vehicle
{
    public $fuelType;

    public function __construct($make, $model, $speed, $fuelType)
    {
        // Calling parent class constructor
        parent::__construct($make, $model, $speed);
        $this->fuelType = $fuelType;
    }

    
    //   OVERRIDING METHOD (with parent::)  
     
    public function getInfo()
    {
        // parent::getInfo() (calls Vehicle version)
        return parent::getInfo() . ", Fuel Type: {$this->fuelType}";
    }

   
    //   SIMPLE OVERRIDING (without parent::)
     
    public function startEngine()
    {
        return "Car engine started ";
    }
}

// Creating Vehicle object
$vehicle = new Vehicle("Toyota", "Corolla", 80);
echo $vehicle->getInfo();
echo "<br>";

// Creating Car object
$car = new Car("Honda", "Civic", 120, "Petrol");
echo $car->getInfo();
echo "<br>";

//  overriding method
echo $car->startEngine();
?>
