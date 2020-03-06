<?php
class Car{
    var $door_count=4;
    function car_details(){
        return "this car has " . $this->door_count;
        echo "Hello Student";
    }
}

$bmx=new Car();
$mercedes=new Car();
echo $bmx->car_details();
echo "<br>";

echo $mercedes->door_count=6;

?>

