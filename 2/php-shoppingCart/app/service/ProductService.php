<?php

class ProductService{

	private $product;

	public function __construct(){

		$this->product = new Product();
	}

	public function getProductPriceById($id){

		return $this->product->getPriceById($id);
	}

	public function getProductNameById($id){

		return $this->product->getNameById($id);
	}


	public function getProductById($id){

		return $this->product->getById($id);
	}

}