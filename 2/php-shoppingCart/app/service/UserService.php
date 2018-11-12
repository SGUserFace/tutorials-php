<?php

class UserService{

	private $user;

	public function __construct(){
		
		$this->user = new User();
	}

	public function loggedIn(){

		return $this->user->loggedIn();
	}

}