<?php

class test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'clinic');
    }
    public function index()
    {
        $query = $this->clinic->showAll();
        if ($query) {
            $result['clinic'] = $this->clinic->showAll();
        }
    }

    public function xxx()
    {
        // $UserID = $this->session->userdata('UserID');
        // $this->db->select('*');
        // $this->db->from('tbuser');
        // $this->db->join('tbclinic', 'tbclinic.CLINICID = tbuser.CLINICID');
        // $this->db->join('tbclinicinfo', 'tbclinicinfo.CLINICID = tbuser.CLINICID');
        // $this->db->where('tbuser.UserID', $UserID);
        // $data = $this->db->get()->row();

        // $data = $this->db->get_where('tbpatient_medical', array('IDCARD' => "1209703309484",'BOOKINGID' => 'B1586507248'))->result();

        // $this->db->select('*');
        // $this->db->from('tbpatients');
        // $this->db->where('tbpatient_medical.IDCARD', "1209703309484");
        // $this->db->where('tbpatient_medical.BOOKINGID', "B1586507248");
        // $data = $this->db->get()->result();

        // $this->db->select('*');
        // $this->db->from('tbpatient_medical');
        // $this->db->join('tbpatients', 'tbpatients.IDCARD = tbpatient_medical.IDCARD');
        // $this->db->where('tbpatient_medical.IDCARD', "1209703309484");
        // $this->db->where('tbpatient_medical.BOOKINGID', "B1586507248");
        // $data = $this->db->get()->result();


        $data = $this->db->get_where('tbpatient_medical', array('IDCARD' => "1361200107816"))->result();

        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }

}
