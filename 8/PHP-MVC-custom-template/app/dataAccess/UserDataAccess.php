<?php

class UserDataAccess extends MySqlRepository {

    public function get_all() {
        return [
            1 => [
                'id' => 1,
                'name' => 'bill',
                'age' => '30',
                'role'=>'musician'
            ],
            2 => [
                'id' => 2,
                'name' => 'john',
                'age' => '32',
                'role'=>'band'
            ]
        ];

    }

}
