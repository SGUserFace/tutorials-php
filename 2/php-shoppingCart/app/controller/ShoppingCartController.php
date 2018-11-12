<?php

class ShoppingCartController extends Controller{

	// --------------------------------------------------------

    private function shoppingCart(){

        return $this->model('ShoppingCart');

    }

    // --------------------------------------------------------

	public function getTotal(){

        $shoppingCartService = new ShoppingCartService();

        return $shoppingCartService->getTotal();

	}

    // --------------------------------------------------------

	public function getTotalToJSON(){

		echo json_encode($this->getTotal());

	}

	// --------------------------------------------------------

	public function show(){

		$this->redirectIfNotLoggedIn();

		$shoppingCart = $this->shoppingCart();

		$lines = $shoppingCart->getAllShoppingCartLinesByShoppingCartId();

		$products = $this->getProductsFromLines($lines);

		$linesGrouped = $this->groupLinesByProductId($lines);

        return $this->view('shoppingCart/show',[            
        	'lines'    => $linesGrouped,
            'products' => $products,
            'total'    => $this->getTotal(),
            'id'       => $shoppingCart->getId()
        ]);

    }

    // --------------------------------------------------------

    private function getProductsFromLines($lines){

    	$ids = [];

    	$products = [];

    	$productService = new ProductService();

    	foreach($lines as $line){

    		$productId = $line['product_id'];

    		if(!in_array($productId, $ids)){
  			
    			$ids [] = $productId;

    			$product = $productService->getProductById($productId);

    			$products [$productId] = $product;
    		} 		
    	}

    	return $products;
    }

    // --------------------------------------------------------

    public function groupLinesByProductId($lines){

    	$grouped = [];

    	foreach($lines as $key => $value){

    		if(!array_key_exists($value['product_id'], $grouped) ){

    			$grouped[$value['product_id']] = [
    				'product_id' 	=> 		$value['product_id'],
    				'quantity' 		=>		$value['quantity']
    			];

    			continue;
    		}

    		$grouped [$value['product_id']]['quantity'] += $value['quantity'];
    	}

    	return $grouped;

    }

	// --------------------------------------------------------

	public function clear(){

		$this->redirectIfNotLoggedIn();

		$shoppingCart = $this->shoppingCart();

		if(!$shoppingCart->clear()){
			die('error clearing cart');
		}

		Redirect::toIndex();

	}

    // --------------------------------------------------------

    public function removeProduct($params){

        $id = $params[0][1];

        $productId = $params[1][1];

        $shoppingCartLineService = new shoppingCartLineService();

        try{

            $shoppingCartLineService->deleteAllByShoppingCartIdAndProductId($id, $productId);

            return $this->show();

        }catch(Exception $e){

            die($e);

        }

    }

}