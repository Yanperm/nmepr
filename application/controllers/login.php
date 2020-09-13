<?php

class Login extends CI_Controller {
    public function index() {
        $this->load->view('signin');
    }
     //แจ้งเตือนเติมเครดิต
    public function line() {        
        $this->load->view('template/line');
    }
}
