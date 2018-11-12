<?php


class Admin extends User{

	
    public static $email = 'admin@gmail.com';

    private $model;

    // --------------------------------------------------------

    public function __construct(){

        $this->model = new Model();
    }

    public static function email(){

    	return self::$email;
    }
   

}
 