<?php

class ContactController extends Controller {

    public function index() {
        echo 'contactController/index';
    }

    public function test($a = '') {
        echo "$a";
    }

}
