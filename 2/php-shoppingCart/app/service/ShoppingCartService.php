<?php

class ShoppingCartService{

	private $shoppingCart;

	// --------------------------------------------------------

	public function __construct(){

		$this->shoppingCart = new ShoppingCart();
	}

	// --------------------------------------------------------

	public function createShoppingCart($accountId){

		return $this->shoppingCart->store($accountId);

	}

	// --------------------------------------------------------

	public function getShoppingCartIdFromUserId(){

		$accountId = $this->getAccountIdFromUserId();

		return $this->shoppingCart->getIdByAccountId($accountId);
	}

	// --------------------------------------------------------

	public function getAccountIdFromUserId(){

		$account = new AccountService();

		return $account->getAccountIdFromUserId();
		
	}

	// --------------------------------------------------------

	public function getTotal(){

		$shoppingCartLines = $this->shoppingCart->getAllShoppingCartLinesByShoppingCartId();

		$total = 0;

		$productService = new ProductService();

		foreach ($shoppingCartLines as $key => $value) {

			$price 	= $productService->getProductPriceById($value['product_id']);
			
			$total += $value['quantity'] * $price;
		}

		return $total;

	}

	// --------------------------------------------------------
	
	public function clearShoppingCart(){

		return $this->shoppingCart->clear();
	}


}