<?php

class Order extends Model {

    private $table = 'orders';
    private $id;
    private $accountId;
    private $model;

    // --------------------------------------------------------

    public function __construct() {

        $this->model = new Model();
    }

    // --------------------------------------------------------

    public function store() {

        $accountService = new AccountService();

        $accountId = $accountService->getAccountIdFromUserId();

        $query = "INSERT INTO $this->table (account_id) VALUES ('$accountId')";

        return $this->model->insertInto($query);
    }

    // --------------------------------------------------------

    public function getLastId($accountId) {

        $query = "SELECT MAX(id) FROM $this->table WHERE account_id = $accountId";

        return $this->model->selectFieldValueWhereParams($query);
    }

    // --------------------------------------------------------

    public function all() {

        $accountService = new AccountService();

        $accountId = $accountService->getAccountIdFromUserId();

        $query = "SELECT * FROM $this->table WHERE account_id = $accountId";

        return $this->model->selectMultipleRowsFetchAssoc($query);
    }

}
