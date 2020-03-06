<?php
class Car
{
    var $wheels=4;
function  Car_type(){

    return "hello my car";
}
}
class Truck extends Car{
    var $doors=6;
    var $wheels=60;
    function Door(){
        return "the truck machine has " . $this->doors=4;
    }
}

$peykan=new Truck();
echo $peykan->Door()."<br>";
echo $peykan->wheels;
?>

