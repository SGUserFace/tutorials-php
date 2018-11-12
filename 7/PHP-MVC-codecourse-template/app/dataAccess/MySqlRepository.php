<?php

class MySqlRepository {

    private $link;

    public function __construct() {
        $link = mysqli_connect("127.0.0.1", "root", "secret", "mvc");
        $this->link = $link;
    }

    public function get_link() {
        return $this->link;
    }

}
