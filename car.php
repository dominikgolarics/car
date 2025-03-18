<?php
require_once 'dbcon.php';

class Car{
    private $db;
    public function __construct(){
        $this->db = new DBController();
    }
    public function getAllCars(){
        $query = "SELECT c_id, c_desc, path, c_type FROM tbl_car";
        return $this->db->executeSelectQuery($query);
    }

    public function getCarByID($carId){
        $query = "SELECT c_id, c_desc, path, c_type FROM tbl_car WHERE c_id = ?";
        return $this->db->executeSelectQuery($query, [$carId]);
    }

    public function getCarByType($carType){
        $query = "SELECT c_ID, c_desc, path, car_type.ct_desc FROM tbl_car INNER JOIN car_type ON car_type.ct_id = tbl_car.c_type WHERE car_type.ct_name = ?";
        return $this->db->executeSelectQuery($query, [$carType]);
    }

    public function __destruct(){
        $this->db->closeDB();
    }
}