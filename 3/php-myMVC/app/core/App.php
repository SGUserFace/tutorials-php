<?php

class App {

    private $controller = 'HomeController';
    private $method = 'index';
    private $params = [];

    public function __construct() {
        $url = $this->parse_url();

        $this->set_controller($url);
        $this->set_method($url);
        $this->set_params($url);

        call_user_func_array([$this->controller, $this->method], [$this->params]);
    }

    protected function parse_url() {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }

    protected function set_controller($url) {
        $url_controller = $url[0] . 'Controller';
        $controller_path = "../app/controller/$url_controller.php";
        if (file_exists($controller_path)) {
            $this->controller = $url_controller;
        } else {
            $controller_path = "../app/controller/$this->controller.php";
        }
        require_once $controller_path;

        $this->controller = new $this->controller;
    }

    protected function set_method($url) {
        if (isset($url[1]) == false) {
            return;
        }
        $url_method = $url[1];
        if (method_exists($this->controller, $url_method)) {
            $this->method = $url_method;
        }
    }

    protected function set_params($url) {
        unset($url[0]);
        unset($url[1]);

        if (empty($url)) {
            $this->params = [];
            return;
        }
        foreach ($url as $key => $value) {
            $arg = explode('=', $value);
            array_push($this->params, $arg);
        }
    }

}
