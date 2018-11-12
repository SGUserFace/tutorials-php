<?php

class OrderLine extends Model {

    private $table = 'order_lines';
    private $id;
    private $orderId;
    private $productId;
    private $quantity;
    private $model;

    // --------------------------------------------------------

    public function __construct() {

        $this->model = new Model();
    }

    // --------------------------------------------------------

    public function storeArray($orderLines, $orderId) {

        foreach ($orderLines as $line) {

            try {

                $this->store($line, $orderId);
            } catch (Exception $e) {

                die('error saving order lines');
            }
        }

        return true;
    }

    // --------------------------------------------------------

    public function store($line, $orderId) {

        $product_id = $line['product_id'];

        $quantity = $line['quantity'];

        $query = "INSERT INTO $this->table (order_id, product_id, quantity) VALUES ($orderId, $product_id, $quantity)";

        return $this->model->insertInto($query);
    }

    // --------------------------------------------------------

    public function getAllByOrderId($orderId) {

        $query = "SELECT * FROM $this->table WHERE order_id = '$orderId'";

        return $this->model->selectMultipleRowsFetchAssoc($query);
    }

}
