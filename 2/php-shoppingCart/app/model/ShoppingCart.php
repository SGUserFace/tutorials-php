<?php

class ShoppingCart extends Model {

    private $table = 'shopping_carts';
    private $id;
    private $accountId;
    private $model;

    // --------------------------------------------------------

    public function __construct() {

        $this->model = new Model();
    }

    // --------------------------------------------------------

    public function store($accountId) {

        $query = "INSERT INTO $this->table (account_id) 
            VALUES ('$accountId')";

        return $this->model->insertInto($query);
    }

    // --------------------------------------------------------

    public function getIdByAccountId($accountId) {

        $query = "SELECT id FROM $this->table WHERE account_id = '$accountId'";

        return $this->model->selectFieldValueWhereParams($query);
    }

    // --------------------------------------------------------

    public function getAllShoppingCartLinesByShoppingCartId() {

        $shoppingCartLineService = new ShoppingCartLineService();

        return $shoppingCartLineService->getAllByShoppingCartId();
    }

    // --------------------------------------------------------

    public function clear() {

        $shoppingCartId = $this->getId();

        $shoppingCartLineService = new ShoppingCartLineService();

        return $shoppingCartLineService->deleteAllByShoppingCartId($shoppingCartId);
    }

    // --------------------------------------------------------

    public function getId() {

        $shoppingCartService = new ShoppingCartService();

        $accountId = $shoppingCartService->getAccountIdFromUserId();

        $shoppingCartId = $this->getIdByAccountId($accountId);

        return $shoppingCartId;
    }

}
