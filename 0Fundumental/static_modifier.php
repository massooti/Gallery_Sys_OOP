<?php
class Car
{
    static $weel=2;
    static $door=6;

   static function car_detail(){
        echo Car::$weel=8;
       echo Car::$door;
    }
}
 $bmw=Car::car_detail();
echo $bmw->weel=9;
?>

