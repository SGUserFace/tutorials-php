<?php

class OrderController extends Controller{

	// --------------------------------------------------------

	public function index(){

		$all = $this->order()->all();

		$ordersLines = $this->userOrdersWithOrdersLines($all);

		$orderLinesGrouped = $this->groupLinesByProductId($ordersLines);

		return $this->view('order/index', [
			'ordersGrouped' => $orderLinesGrouped
		]);
	}

	// --------------------------------------------------------

    public function groupLinesByProductId($ordersLines){

    	$grouped = [];

    	foreach($ordersLines as $orderId => $orderLines){

    		$grouped [$orderId] = [];
    	}
    	
    	foreach($ordersLines as $orderId => $orderLines){

    		$finalArrPos = $grouped [$orderId];

    		foreach($orderLines as $orderLine){

    			if(!array_key_exists($orderLine['product_id'], $grouped [$orderId]) ){

    				$productService = new ProductService();

    				$productName = $productService->getProductNameById($orderLine['product_id']);

    				$grouped [$orderId][$orderLine['product_id']] = [
    					'product_id' 	=> 		$orderLine['product_id'],
    					'product_name'	=>		$productName,
    					'quantity' 		=>		$orderLine['quantity']
    				];

    				continue;
    			}
    			
    			$grouped [$orderId][$orderLine['product_id']]['quantity'] += $orderLine['quantity'];
    		}
    	}

    	return $grouped;

    }

	// --------------------------------------------------------

	private function userOrdersWithOrdersLines($all){

		$orderLineService = new OrderLineService();

		$ordersLines = [];

		foreach($all as $order){

			$orderId = $order['id'];

			$lines = $orderLineService->getAllByOrderId($orderId);

			$ordersLines[$orderId] = $lines;
			
		}

		return $ordersLines;
	}

	// --------------------------------------------------------

	public function confirm(){

		$user = new User();

		if(!$user->loggedIn()){
			return Redirect::toIndex();
		}

		$shoppingCartService = new ShoppingCartService();

		$shoppingCartTotal = $shoppingCartService->getTotal();

		if($shoppingCartTotal <= 0){
			return Redirect::toIndex();
		}

		return $this->view('order/confirm');
	}

	// --------------------------------------------------------

	public function store(){

		$accountService = new AccountService();

		$shoppingCartLineService = new ShoppingCartLineService();

		$orderLineService = new OrderLineService();

		$shoppingCartService = new ShoppingCartService();

		$shoppingCartTotal = $shoppingCartService->getTotal();

		if($shoppingCartTotal <= 0){
			return Redirect::toIndex();
		}

		$order = $this->order();

		$order->store();

		// get shopping cart id

		$accountId = $accountService->getAccountIdFromUserId();

		$lastOrderId = $order->getLastId($accountId);

		// get order lines		

		$shoppingCartLines = $shoppingCartLineService->getAllByShoppingCartId();
		
		$orderLineService->storeArray($shoppingCartLines, $lastOrderId);		

		$shoppingCartService->clearShoppingCart();

		return Redirect::toIndex();

	}

	// --------------------------------------------------------

    private function order(){

        return $this->model('Order');

    }

    // --------------------------------------------------------


}