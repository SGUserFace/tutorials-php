<?php

class OrderLineService{

	private $orderLine;

	public function __construct(){

		$this->orderLine = new OrderLine();
	}

	public function storeArray($orderLines, $orderId){

		return $this->orderLine->storeArray($orderLines, $orderId);
	}

	
	public function getAllByOrderId($orderId){

		return $this->orderLine->getAllByOrderId($orderId);

	}
	
}