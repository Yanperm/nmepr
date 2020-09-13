<?php

class Login extends CI_Controller {
    public function index() {
        $this->load->view('login');
    }
     //แจ้งเตือนเติมเครดิต
    public function line() {        
        $this->load->view('template/line');
    }
}
