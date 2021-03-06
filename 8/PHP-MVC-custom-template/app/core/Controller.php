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

    protected function get_param_value($param, $data) {
        foreach ($data as $key => $value) {
            if ($value[0] == $param) {
                return $value[1];
            }
        }
        return false;
    }

}
