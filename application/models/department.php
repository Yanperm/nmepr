<?php

class department extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('department_model');
    }

    public function insert_department()
    {
        $clinicid = $this->session->userdata('CLINICID');
        $query = $this->db->query("SELECT DID from tbdepartment where CLINICID = '$clinicid' order by DID DESC limit 1");
        $queryrow = $query->row();
        $count = $query->num_rows();
        if ($count == '') {
            $number = "D001";
        } else {
            $separate = substr($queryrow->DID, 1);
            $number = "D" . sprintf("%03d", ++$separate);
        }
        $data = array(
            "DepID" =>  time(),
            "DID" =>  $number,
            "LabCID" => $this->input->post('LabCID'),
            "DepName" => $this->input->post('DepName'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->department_model->insert($data);
        $this->session->set_userdata("message", "บันทึกแผนกส่งตรวจเรียบร้อย");
        redirect(base_url('dashboard/department'));
    }

    public function delete_department($id)
    {
        $this->department_model->delete($id);
        $this->session->set_userdata("messagedelete", "ลบแผนกส่งตรวจเรียบร้อย");
        redirect(base_url('dashboard/department'));
    }
}
