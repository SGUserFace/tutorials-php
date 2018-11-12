<?php

class User extends Model{

    private $table = 'users';

    private $id;

    private $email;

    // --------------------------------------------------------

    public function __construct(){

        if(!$this->loggedIn()){
            return;
        }

        $id = $_SESSION['user_id'];

        $this->email = $this->getEmailById($id);

    }

    // --------------------------------------------------------
    // --------------------------------------------------------
    // Getters
    // --------------------------------------------------------
    // --------------------------------------------------------

    public function getEmail(){

        if(!$this->loggedIn()){
            return false;
        }

        return $this->email;

    }

    // --------------------------------------------------------
    // --------------------------------------------------------
    // Setters
    // --------------------------------------------------------
    // --------------------------------------------------------

    public function setEmail($email){

        if(!$this->loggedIn()){
            return false;
        }

        $this->email = $email;

        return;

    }

    // --------------------------------------------------------
    // --------------------------------------------------------
    // Add User
    // --------------------------------------------------------
    // --------------------------------------------------------

    public function store(){

        // Sanitize

        $data = $this->arraySanitize($_POST);

        $email = $data['email'];

        $password = $data['password'];

        // Validate

        $errors = $this->getErrors($data);

        // Check if email exists in db

        if($this->emailExists($email)){
            $errors[] = "Email already exists.";
        }

        // Return if errors

        if(!empty($errors)){
            return $errors;
        }

        // Insert

        $password = Security::hashString($password);

        $query = "INSERT INTO $this->table (email, password) 
            VALUES ('$email','$password')";

        return $this->insertInto($query);
    }

    // --------------------------------------------------------
    // --------------------------------------------------------
    // Add User - validations
    // --------------------------------------------------------
    // --------------------------------------------------------

    private function getErrors($data){

    	$errors=[];

    	if(!$this->validEmail($data['email'])){
			$errors[]='Invalid email.';
    	}

    	if(!$this->validPassword($data['password'])){
    		$errors[]='Invalid password.';
    	}

    	return $errors;
    }

    // --------------------------------------------------------

    private function validEmail($email){

    	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    		return false;
    	}

    	return true;
    }

    // --------------------------------------------------------

    private function validPassword($password){

    	if(empty($password)){
    		return false;
    	}

    	return true;

    }

    // --------------------------------------------------------
    // --------------------------------------------------------
    // Login & Logout
    // --------------------------------------------------------
    // --------------------------------------------------------

    public function loggedIn(){

        if(isset($_SESSION['user_id']) == false){
            return false;
        }

        return true;

    }
    
    // --------------------------------------------------------

    public function startSession(){

        $errors = [];

        // Sanitize

        $input = $this->arraySanitize($_POST);

        $email = $input['email'];

        $password = $input['password'];

        // Get hashed password and compare

        $passwordDB = $this->getPasswordByEmail($email);

        $passwordCheck = password_verify($password, $passwordDB);

        if(!$passwordCheck){
            $errors [] = 'Invalid credentials!';
            return $errors;
        }

        $id = $this->getIdByEmail($email);

        $_SESSION['user_id'] = $id;

        $_SESSION['user_email'] = $email;

        return $errors;

    }

    // --------------------------------------------------------
    // --------------------------------------------------------
    // DB queries
    // --------------------------------------------------------
    // --------------------------------------------------------

    private function getIdByEmail($email){

        $query = "SELECT id FROM $this->table WHERE email = '$email'";

        return $this->selectFieldValueWhereParams($query);

    }

    // --------------------------------------------------------

    private function getEmailById($id){

        $query = "SELECT email FROM $this->table WHERE id = '$id'";

        return $this->selectFieldValueWhereParams($query);

    }

    // --------------------------------------------------------

    private function getPasswordByEmail($email){

        $query = "SELECT password FROM $this->table WHERE email = '$email'";

        return $this->selectFieldValueWhereParams($query);

    }

    // --------------------------------------------------------

    private function emailExists($email){

        $query = "SELECT id FROM $this->table WHERE email = '$email'";

        return $this->fieldExistsInDB($query);

    }

    // --------------------------------------------------------
  
}
