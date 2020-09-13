<?php


class Lab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('lab_model');
    }
    public function create()
    {
        $data = array(
            "LabID" => time(),
            "LID" => $this->input->post('LID'),
            "LabName" => $this->input->post('LabName'),
            "LabPrice" => $this->input->post('LabPrice'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->lab_model->insertlab($data);
        $this->session->set_userdata("message", "บันทึกรายการแล็ปเรียบร้อย");
        redirect(base_url('dashboard/lab'));
    }
    public function deletelab($id)
    {
        $this->db->delete('tblabs', array('LabID' => $id));
        $this->session->set_userdata("messagedelete", "ลบรายการแล็ปเรียบร้อย");
        redirect(base_url('dashboard/lab'));
    }
}
