<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();        
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function dashboard()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/dashboard');
        $this->load->view('clinic/footer');
    }

    public function monitor()
    {
        $this->load->view('clinic/monitor');
    }

    public function showall()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/showall');
        $this->load->view('clinic/footer');
    }

    public function dashboardbefore()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/dashboardbefore');
        $this->load->view('clinic/footer');
    }

    public function dashboardnextday()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/dashboardnextday');
        $this->load->view('clinic/footer');
    }

    public function dashboardtoday()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/dashboardtoday');
        $this->load->view('clinic/footer');
    }

    public function ques()
    {
        $this->load->view('clinic/ques');
    }

    public function questoday()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/questoday');
        $this->load->view('clinic/footer');
    }

    public function quesadmin()
    {
        $this->load->view('clinic/quesclinic');
    }

    public function adminlogout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function checkinall()
    {
        date_default_timezone_set('Asia/Bangkok');
        $day = date("Y-m-d");
        $data = array(
            "ACCEPT" => 1,
            "CHECKIN" => 1,
            "CHECKIN_BY" => "By Website"
        );
        $this->db->where('CLINICID', $this->session->userdata('CLINICID'));
        $this->db->where('BOOKDATE', $day);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/waitcheckin'));
    }
}
