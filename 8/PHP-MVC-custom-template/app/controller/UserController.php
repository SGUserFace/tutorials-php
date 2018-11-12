<?php

class UserController extends Controller {

    private $user;

    public function get_all_users() {
        $this->user = new User();
        return $this->user->get_all();
    }

    public function create($type, $data = '') {
        if (empty($data)) {
            $this->view('user/create', $type);
            return;
        }
        echo 'create this shit-><pre>'.print_r($data,true);
        $user = $this->model('User');
        $user->create($type,$data);
    }

}
