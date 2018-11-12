<?php

class TestController extends Controller{
	
	// --------------------------------------------------------

    public function sqli(){

        return $this->view('test/sqli');

    }

    // --------------------------------------------------------

    public function interfaces(){

        return $this->view('test/interfaces');

    }
}