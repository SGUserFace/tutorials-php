<?php

class Controller {

    protected function model($model) {
        $model_path = "../app/model/$model.php";
        require_once $model_path;
        return new $model();
    }

    protected function view($view, $data = []) {
        require_once "../app/view/$view.php";
    }

}
