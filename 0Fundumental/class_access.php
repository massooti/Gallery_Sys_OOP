<?php
class Car{
    public $wheel=4;
    private $door=2;
    protected $seat=2;

    function car_details(){
        echo $this->wheel;
        echo $this->door=8;
        echo $this->seat;
    }
}
class Motor extends Car{
    public $wheel=3;
    private $door=1;
    public function car_sub()
    {
        return $this->car_details();
    }
}

$bmw=new Car();
$honda=new Motor();

//echo $bmw->car_details();



?>