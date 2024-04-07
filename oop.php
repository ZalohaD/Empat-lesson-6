<?php
//OOP

// Створюємо інтерфейс для класу "Транспорт"
interface Transport {
    public function move();
}

// Трейт з методом "звук"
trait Sound {
    public function makeSound() {
        echo "Making sound...\n";
    }
}

// Базовий клас "Транспорт"
class Vehicle implements Transport {
    private $name;

    public function __construct($name) {
        $this->name = $name;
        echo "A new vehicle named $name has been created.\n";
    }

    public function move() {
        echo "$this->name is moving.\n";
    }
}

// Клас автомобіля, який успадковує від базового класу "Транспорт"
class Car extends Vehicle {
    use Sound;

    public function move() {
        parent::move(); // Виклик методу батьківського класу
        echo "The car is moving on the road.\n";
    }
}

// Клас літака, який успадковує від базового класу "Транспорт"
class Airplane extends Vehicle {
    use Sound;

    public function move() {
        parent::move(); // Виклик методу батьківського класу
        echo "The airplane is flying in the sky.\n";
    }
}

// Статичний клас для обробки даних про транспорт
class TransportHandler {
    public static function printDetails(Transport $transport) {
        echo "Details of the transport:\n";
        $transport->move();
    }
}

// Створення об'єктів і виклик методів
$car = new Car("Toyota");
echo "</br>";
$car->move();
echo "</br>";
$car->makeSound();
echo "</br>";
echo "</br>";
echo "</br>";

$airplane = new Airplane("Boeing");
$airplane->move();
echo "</br>";
$airplane->makeSound();
echo "</br>";
echo "</br>";
echo "</br>";

// Виклик статичного методу
TransportHandler::printDetails($car);
echo "</br>";
TransportHandler::printDetails($airplane);