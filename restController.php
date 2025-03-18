<?php
require_once("carRestHandler.php");
$view = "";
if(isset($_GET["view"])){
    $view = $_GET["view"];

    switch($view){
        case "all":
            $carrest = new CarRestHandler();
            $carrest->getAllCars();
            break;
        case "single":
            $carrest = new CarRestHandler();
            $carrest->getCarById($_GET["id"]);
            break;
        case "type":
            $carrest = new CarRestHandler();
            $carrest->getCarByType($_GET["name"]);
            break;
        default:
            $carrest = new CarRestHandler();
            $carrest->getFault();
    }
}