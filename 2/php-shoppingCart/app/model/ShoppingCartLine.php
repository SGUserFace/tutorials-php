<?php

class ShoppingCartLine extends Model {

    private $table = 'shopping_carts_lines';
    private $id;
    private $shoppingCartId;
    private $productId;
    private $quantity;
    private $model;

    // --------------------------------------------------------

    public function __construct() {

        $this->model = new Model();
    }

    // --------------------------------------------------------

    public function store($args) {

        // get shopping cart Id

        $shoppingCartService = new ShoppingCartService();

        $shoppingCartId = $shoppingCartService->getShoppingCartIdFromUserId();

        // other vars

        $quantity = 1;

        $productId = $args[1][0];

        // store

        $query = "INSERT INTO $this->table 
			(shopping_cart_id, product_id, quantity)
			VALUES ('$shoppingCartId','$productId','$quantity')";

        if ($this->model->insertInto($query)) {

            Redirect::toIndex();
        }

        die('error: insert shopping cart line');
    }

    // --------------------------------------------------------

    public function getAllByShoppingCartId() {

        $shoppingCartService = new ShoppingCartService();

        $shoppingCartId = $shoppingCartService->getShoppingCartIdFromUserId();

        $query = "SELECT * FROM $this->table WHERE shopping_cart_id = '$shoppingCartId'";

        return $this->model->selectMultipleRowsFetchAssoc($query);
    }

    // --------------------------------------------------------

    public function deleteAllByShoppingCartId($shoppingCartId) {

        $query = "DELETE FROM $this->table WHERE shopping_cart_id = $shoppingCartId";

        return $this->model->deleteFrom($query);
    }

    // --------------------------------------------------------

    public function deleteAllByShoppingCartIdAndProductId($shoppingCartId, $productId) {

        $query = "DELETE FROM $this->table WHERE shopping_cart_id = $shoppingCartId AND product_id = $productId";

        return $this->model->deleteFrom($query);
    }

}
