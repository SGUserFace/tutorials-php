<?php

class Account extends Model {

    private $table = 'accounts';
    private $id;
    private $userId;
    private $model;

    // --------------------------------------------------------

    public function __construct() {

        $this->model = new Model();
    }

    // --------------------------------------------------------

    public function store($userId) {

        $query = "INSERT INTO $this->table (user_id) VALUES ('$userId')";

        return $this->model->insertInto($query);
    }

    // --------------------------------------------------------

    public function getIdByUserId($userId) {

        $query = "SELECT id FROM $this->table WHERE user_id = '$userId'";

        return $this->model->selectFieldValueWhereParams($query);
    }

}
