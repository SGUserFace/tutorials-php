<?php

class ProductController extends Controller{

	// --------------------------------------------------------

    private function product(){

        return $this->model('Product');

    }

    // --------------------------------------------------------

    // GET: /public/product

    public function index(){

    	$product = $this->product();

    	$products = $product->all();
    	
    	return $this->view('product/index', [
            'products' => $products
        ]);
    }

    // --------------------------------------------------------
    
    public function all(){

        $product = $this->product();

        $products = $product->all();

        return $products;
    }
}