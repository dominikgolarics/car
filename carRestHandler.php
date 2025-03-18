<?php
include("resthandler.php");
include("car.php");

class CarRestHandler extends RestHandler{
    function getAllCars(){
        $cars = new Car();
        $sorAdat = $cars->getAllCars();

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat = array('error'=>'Cars Found!');
        } else{
            $statusCode = 200;
        }

        $this->setHttpHeaders($statusCode);
        header('Content-Type: Application/json; charset=utf-8');

        $result["Cars"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "cars.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getCarById($carID){
        $cars = new Car();
        $sorAdat = $cars->getCarByID($carID);

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat = array('error'=>'No Cars found by this ID!');
        } else{
            $statusCode = 200;
        }

        $this->setHttpHeaders($statusCode);
        header('Content-Type: Application/json; charset=utf-8');

        $result["CarsById"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "carsbyid.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getCarByType($carType){
        $cars = new Car();
        $sorAdat = $cars->getCarByType($carType);

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat = array('error'=>'No oscars found by this type!');
        } else{
            $statusCode = 200;
        }

        $this->setHttpHeaders($statusCode);
        header('Content-Type: Application/json; charset=utf-8');

        $result["CarByType"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "carsbytype.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getFault(){
        $statusCode = 400;
        $this->setHttpHeaders($statusCode);
        header('Content-Type: Application/json; charset=utf-8');
        $sorAdat = array('error'=>'Bad Request');
        $result["Fault"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "fault.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    public function encodeJSON($responseData){
        $jsonResponse=json_encode($responseData);
        return $jsonResponse;
    }

    function printfile($responseData, $file_path){
        file_put_contents($file_path, $responseData, LOCK_EX);
    }
}