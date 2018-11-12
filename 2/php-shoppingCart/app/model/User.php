<?php

class User extends Model {

    private $model;
    private $table = 'users';
    private $id;
    private $email;
    private $password;

    // --------------------------------------------------------

    public function __construct() {

        $this->model = new Model();

        if (!$this->loggedIn()) {
            return;
        }

        $id = $_SESSION['user_id'];

        $this->email = $this->getEmailById($id);

        if($this->email == Admin::email()){

            return new Admin();
        }
         
        return $this;
    }


    // --------------------------------------------------------

    public function store() {

        // Sanitize

        $data = $this->model->arraySanitize($_POST);

        $email = $data['email'];

        $password = $data['password'];

        // Validate

        $errors = $this->getErrors($data);

        // Check if email exists in db

        if ($this->emailExists($email)) {
            $errors[] = "Email already exists.";
        }

        // Return if errors

        if (!empty($errors)) {
            return $errors;
        }

        // Insert

        $password = Security::hashString($password);

        $query = "INSERT INTO $this->table (email, password) 
            VALUES ('$email','$password')";

        return $this->model->insertInto($query);
    }

    // --------------------------------------------------------

    private function getErrors($data) {

        $errors = [];

        if (!$this->validEmail($data['email'])) {
            $errors[] = 'Invalid email.';
        }

        if (!$this->validPassword($data['password'])) {
            $errors[] = 'Invalid password.';
        }

        return $errors;
    }

    // --------------------------------------------------------

    private function validEmail($email) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    // --------------------------------------------------------

    private function validPassword($password) {

        if (empty($password)) {
            return false;
        }

        return true;
    }

    // --------------------------------------------------------

    public function loggedIn() {

        if (isset($_SESSION['user_id']) == false) {
            return false;
        }

        return true;
    }

    // --------------------------------------------------------

    public function startSession() {

        $errors = [];

        // Sanitize

        $input = $this->model->arraySanitize($_POST);

        $email = $input['email'];

        $password = $input['password'];

        // Get hashed password and compare

        $passwordDB = $this->getPasswordByEmail($email);

        $passwordCheck = password_verify($password, $passwordDB);

        if (!$passwordCheck) {
            $errors [] = 'Invalid credentials!';
            return $errors;
        }

        $id = $this->getIdByEmail($email);

        $_SESSION['user_id'] = $id;

        $_SESSION['user_email'] = $email;

        return $errors;
    }


    // Stuff to stay in this class for now; should be on repo

    // --------------------------------------------------------

    public function getEmail() {

        if (!$this->loggedIn()) {
            return false;
        }

        return $this->email;
    }

    // --------------------------------------------------------

    public function setEmail($email) {

        if (!$this->loggedIn()) {
            return false;
        }

        $this->email = $email;

        return;
    }

    // --------------------------------------------------------

    public function getIdByEmail($email) {

        $query = "SELECT id FROM $this->table WHERE email = '$email'";

        return $this->model->selectFieldValueWhereParams($query);
    }

    // --------------------------------------------------------

    private function getEmailById($id) {

        $query = "SELECT email FROM $this->table WHERE id = '$id'";

        return $this->model->selectFieldValueWhereParams($query);
    }

    // --------------------------------------------------------

    private function getPasswordByEmail($email) {

        $query = "SELECT password FROM $this->table WHERE email = '$email'";

        return $this->model->selectFieldValueWhereParams($query);
    }

    // --------------------------------------------------------

    private function emailExists($email) {

        $query = "SELECT id FROM $this->table WHERE email = '$email'";

        return $this->model->fieldExistsInDB($query);
    }

    // --------------------------------------------------------
}
