<?php

class User {

    private $role;
    private $name;
    private $age;
    private $user_data_access;

    public function get_all() {
        $this->user_data_access = new UserDataAccess();
        return $this->user_data_access->get_all();
    }

    public static function find($id) {
        return true;
    }

    public function create($type,$data) {
        $role = $this->role_by_type($type);
        $role->create($data);
    }

    public function role_by_type($type) {
        switch ($type) {
            case 1:
                $model = 'Musician';
                break;
            case 2:
                $model = 'Band';
                break;
            default:
                die('error');
        }
        $model_path = "../app/model/$model.php";
        require_once "../app/model/RoleInterface.php";
        require_once $model_path;
        return new $model;
    }

}
