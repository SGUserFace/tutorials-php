<?php

class HomeController extends Controller {

    public function index($id = '') {
        $user = $this->model('User');
        $all_users = $user->get_all();
        $user_id = 1;
        $found = User::find($user_id);
        $this->view('home/index', ['user' => $all_users[$user_id], 'found' => $found]);

//        return $all_users;
    }

    public function test($a = '', $b = '') {
        echo "$a & $b";
    }

}
