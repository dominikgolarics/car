<?php
require_once 'car.php';

function TestRun(){
    $car = new Car();
    $cars = $car->getAllCars();
    if(empty($cars)){
        echo "Nincs adat.<br>";
    }
    else{
        echo "Filmek felsorolása: <br>";
        foreach($cars as $car){
            echo "id: ".$car['c_id']. " | Leírás:".$car['c_desc']."<br><br>";
        }
    }
}

TestRun();