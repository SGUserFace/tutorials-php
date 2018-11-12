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

        }
        else{

            try
            {
                // Create User, Account and ShoppingCart

                $user = $this->user();

                $stored = $user->store();

                $errors = $this->storeResultToErrorsArray($stored);  

                $this->createAccountAndShoppingCart($errors);    

            }
            catch (Exception $e)
            {
                echo('usercontroller.store error: ' . $e);
            }
            
        }   

        return $this->view('user/register', ['errors' => $errors]);

    }

    // --------------------------------------------------------

    private function createAccountAndShoppingCart($errors){

        if(empty($errors) == false){

            return false;
        }           

        // Create Account

        $accountId = $this->createAccount();

        // Create Shopping Cart

        $shoppingCartId = $this->createShoppingCart($accountId);

        return true;
    }

    // --------------------------------------------------------

    private function createAccount(){

        $user = $this->user();

        $accountService = new AccountService();

        $email = $_POST['email'];

        $userId = $user->getIdByEmail($email);

        $accountId = $accountService->createAccount($userId);

        return $accountId;

    }

    // --------------------------------------------------------

    private function createShoppingCart($accountId){

        $shoppingCartService = new ShoppingCartService();

        return $shoppingCartService->createShoppingCart($accountId);
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
