<?php

class DownloadsController extends Controller {

    public function videos($data) {
        $id = $this->get_param_value('id', $data);
        $this->view('downloads/videos', $data);
    }

}
