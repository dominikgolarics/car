<?php
    require_once 'dbcon.php';

    class DBControllerTest{
        public function RunTest(){
            echo "Teszt indítása... <br>";
            $db = new DBController();
            if($this->TestConnection($db)){
                echo "Sikeres kapcsolódás<br>";
            }
            else{
                echo "Sikertelen kapcsolódás<br>";
            }
            if($this->SelectQueryTest($db)){
                echo "Sikeres<br>";
            }
            else{
                echo "Sikertelen<br>";
            }
            $db->closeDB();
        }

        private function TestConnection($db){
            $refl = new ReflectionClass($db);
            $property = $refl->getProperty('conn');
            $property->setAccessible(true);
            return !is_null($property->getValue($db));
        }

        private function SelectQueryTest($db){
            $result=$db->executeSelectQuery("SELECT c_type FROM tbl_car WHERE c_id = 1");
            print_r($result);
            echo "<br>";
            return is_array($result) && !empty($result) && isset($result[0]['c_type']) && $result[0]['c_type']==1;
        }
    }
$test = new DBControllerTest();
$test->runTest();