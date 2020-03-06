<?php
class Car
{
    static $weel=2;
    static $door=6;

   static function car_detail(){
        echo self::$weel=8;
       echo Car::$door;
    }
}
class Truck extends Car{
    static function truck_detail(){
        echo parent::car_detail();
        echo parent::$door=9;
    }
}
Truck::truck_detail();
?>

