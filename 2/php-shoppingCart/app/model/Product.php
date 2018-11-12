<?php

class Product extends Model {

    private $table = 'products';
    private $name;
    private $price;
    private $model;

    // --------------------------------------------------------

    public function __construct() {

        $this->model = new Model();
    }

    // --------------------------------------------------------

    public function all() {

        $query = "SELECT id, name, price FROM $this->table";

        return $this->model->selectMultipleRowsFetchAssoc($query);
    }

    // --------------------------------------------------------

    public function getPriceById($id) {

        $query = "SELECT price FROM $this->table WHERE id = '$id'";

        return $this->model->selectFieldValueWhereParams($query);
    }

    // --------------------------------------------------------

    public function getNameById($id) {

        $query = "SELECT name FROM $this->table WHERE id = '$id'";

        return $this->model->selectFieldValueWhereParams($query);
    }

    // --------------------------------------------------------

    public function getById($id) {

        $query = "SELECT * FROM $this->table WHERE id = '$id'";

        return $this->model->selectMultipleRowsFetchAssoc($query);
    }

}
