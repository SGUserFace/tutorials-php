<?php

class ShoppingCartLineService{

	private $shoppingCartLine;

	public function __construct(){
		
		$this->shoppingCartLine = new ShoppingCartLine();
	}

	public function getAllByShoppingCartId(){

		return $this->shoppingCartLine->getAllByShoppingCartId();
	}

	public function deleteAllByShoppingCartId($shoppingCartId){

		return $this->shoppingCartLine->deleteAllByShoppingCartId($shoppingCartId);
	}

	public function deleteAllByShoppingCartIdAndProductId($shoppingCartId, $productId){

		return $this->shoppingCartLine->deleteAllByShoppingCartIdAndProductId($shoppingCartId, $productId);
	}

}
