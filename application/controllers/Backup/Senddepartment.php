<?php

class senddepartment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('senddepartment_model');
    }

    public function insert_senddepartment()
    {
        $clinicid = $this->session->userdata('CLINICID');
        $query = $this->db->query("SELECT SPID from tbsenddepartment where CLINICID = '$clinicid' order by SPID DESC limit 1");
        $queryrow = $query->row();
        $count = $query->num_rows();
        if ($count == '') {
            $number = "T0001";
        } else {
            $separate = substr($queryrow->SPID, 1);
            $number = "T" . sprintf("%04d", ++$separate);
        }
        $data = array(
            "SID" =>  time(),
            "SPID" =>  $number,
            "STESTNAME" => $this->input->post('STESTNAME'),
            "Price" => $this->input->post('Price'),
            "PriceSale" => $this->input->post('PriceSale'),
            "LabCID" => $this->input->post('LabCID'),
            "DepID" => $this->input->post('DepID'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->senddepartment_model->insert($data);
        $this->session->set_userdata("message", "บันทึกรายการส่งตรวจเรียบร้อย");
        redirect(base_url('dashboard/senddepartment'));
    }

    public function delete_senddepartment($id)
    {
        $this->senddepartment_model->delete($id);
        $this->session->set_userdata("messagedelete", "ลบรายการส่งตรวจเรียบร้อย");
        redirect(base_url('dashboard/senddepartment'));
    }

    function fetch_department()
    {
        if ($this->input->post('LabCName')) {
            $data = $this->input->post('LabCName');
            $query = $this->db->get_where('tblabscompany', array('CLINICID' => $this->session->userdata("CLINICID"), 'LabCName' => $data));
            $queryrow = $query->row();
            $data = $queryrow->LabCID;
            $this->senddepartment_model->fetch_dep_re($data);
        } else {
            $data = $this->input->post('LabCID');
            $this->senddepartment_model->fetch_dep($data);
        }
    }
}
