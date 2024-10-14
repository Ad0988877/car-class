<?php

class Car {
    private static $id = 1;
    public $make;
    public $model;
    private $price;
    private $carID;

    public function __construct($make, $model, $price) {
        $this->make = $make;
        $this->model = $model;
        $this->price = $price;
        $this->carID = self::$id;
        self::$id++; 
    }

    public function setPrice($newPrice) {
        $minPrice = $this->price * 0.9;
        $maxPrice = $this->price * 1.1;
        if ($newPrice >= $minPrice && $newPrice <= $maxPrice) {
            $this->price = $newPrice;
            echo "Price updated successfully to $newPrice.\n";
        } else {
            echo "Error: New price must be within ±10% of the current price.\n";
        }
    }

    public function getCar() {
        return [
            'make' => $this->make,
            'model' => $this->model,
            'price' => $this->price,
            'carID' => $this->carID
        ];
    }

    public function __toString() {
        return "I am a {$this->make} {$this->model} that costs \${$this->price}.";
    }
}

$car1 = new Car("Toyota", "Camry", 25000.00);
$car2 = new Car("Honda", "Civic", 22000.00);

$aryCars = [$car1, $car2];

foreach ($aryCars as $car) {
    echo $car . "\n";
}
echo "Test Case 1: Valid Price Update for Car 1\n";
$car1->setPrice(27000.00);


echo "Test Case 2: Invalid Price Update for Car 1\n";
$car1->setPrice(35000.00); 


echo "Test Case 3: Retrieve Car Details Using getCar\n";
$car1Details = $car1->getCar();
$car2Details = $car2->getCar();
print_r($car1Details); 
print_r($car2Details); 
?>