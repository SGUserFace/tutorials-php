<?php

class UserController extends Controller {

    private $user;

    // --------------------------------------------------------

    public function __construct(){

        $this->user = $this->model('User');

    }

    // --------------------------------------------------------

    // POST: /public/user/register

    public function register(){

        return $this->view('user/register');

    }

    // --------------------------------------------------------

    // POST: /public/user/store
    public function store() {

        if(empty($_POST)){

            $errors = ['Every field is required.'];

        }else{

            $user = $this->user();

            $stored = $user->store();

            $errors = $this->storeResultToErrorsArray($stored);  

        }   

        return $this->view('user/register', ['errors' => $errors]);

    }

    // --------------------------------------------------------

    // GET: public/user/login
    public function login() {

        return $this->view('user/login');

    }

    // --------------------------------------------------------

    // POST: public/user/startSession
    public function startSession() {

        if(empty($_POST)){

            $errors = ['Every field is required.'];

        }
        else{

            $user = $this->user();

            $logged = $user->startSession();

            $errors = $this->storeResultToErrorsArray($logged); 

        }  

        if(!empty($errors)){

            return $this->view('user/login', ['errors' => $errors]);

        }     

        Redirect::toIndex();

    }

    // --------------------------------------------------------

    // GET: public/user/logout
    public function logout() {

        session_destroy();

        Redirect::toIndex();

    }

    // --------------------------------------------------------

    private function user(){

        return $this->model('User');

    }

    // --------------------------------------------------------

    public function sqliTest(){

        return $this->view('user/sqliTest');

    }

    // --------------------------------------------------------

    public function interfacesTest(){

        return $this->view('user/interfacesTest');

    }

    // --------------------------------------------------------

    public function loggedIn(){

        $user = $this->user();

        return $user->loggedIn();

    }

    // --------------------------------------------------------

    public function redirectIfloggedIn(){

        if($this->loggedIn()){

            Redirect::toIndex();
            
        }
    }

}
