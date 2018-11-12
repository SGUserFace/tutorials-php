<?php

class DownloadsController extends Controller {

    public function videos($data) {
        $this->view('downloads/videos', ['id' => $data[0]]);
    }

}
