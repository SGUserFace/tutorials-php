<?php

class Musician extends User implements RoleInterface {

    public function create($data) {
        echo 'musician/create';
    }

}
