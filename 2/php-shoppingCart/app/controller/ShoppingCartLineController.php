<?php

class ShoppingCartLineController extends Controller{

	// --------------------------------------------------------
	
	public function store($args){

		$this->redirectIfNotLoggedIn();

		$shoppingCartLine = $this->shoppingCartLine();

		return $shoppingCartLine->store($args);
		
	}

	// --------------------------------------------------------

    private function shoppingCartLine(){

        return $this->model('ShoppingCartLine');

    }

    // --------------------------------------------------------

}

