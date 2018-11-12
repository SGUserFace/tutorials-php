<?php

class AccountService{

	private $account;

	public function __construct(){

		$this->account = new Account();
	}
	
	public function createAccount($userId){

		$this->account->store($userId);

		$accountId = $this->account->getIdByUserId($userId);

		return $accountId;		

	}

	public function getAccountIdFromUserId(){

		return $this->account->getIdByUserId($_SESSION['user_id']);

	}

}