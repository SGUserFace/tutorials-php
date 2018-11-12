<?php

class MySqlRepository {

    private $link;

    public function __construct() {

        $credentials = $this->credentials();

        $link = mysqli_connect(
            $credentials['host'], 
            $credentials['username'], 
            $credentials['password'], 
            $credentials['dbname']);

        if ($link == false) {

            die("Connection failed");

        } 

        $this->link = $link;

    }

    public function insertInto($query){

        return mysqli_query($this->link, $query);

    }

    public function fieldExistsInDB($query){

        $result = mysqli_query($this->link, $query);

        if(mysqli_num_rows($result) == 0){

            return false;

        }

        return true;
    }

    public function selectFieldValueWhereParams($query){

        $result = mysqli_query($this->link, $query);

        if (mysqli_num_rows($result) == 1) {
            
            $row = mysqli_fetch_array($result);
            
            return $row[0];
        }

        return false;

    }

    public function sanitize($string){

        return Security::sanitize($this->link, $string);

    }

     public function arraySanitize($array){

        return Security::arraySanitize($this->link, $array);

    }

    private function credentials(){

        $baseDir =          dirname(dirname(__FILE__));

        $baseDir =          str_replace('\\','/',$baseDir);

        $config  =          $baseDir . '/config';

        $configActive =     require $config . '/configActive.php';

        $configParams =     parse_ini_file("$config/config$configActive.ini", true);

        return              $configParams['mysql_database'];

    }

}
