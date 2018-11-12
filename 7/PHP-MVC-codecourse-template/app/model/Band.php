<?php

class Band extends User implements RoleInterface {

    public function create($data) {
        echo 'band/create';
    }

}
