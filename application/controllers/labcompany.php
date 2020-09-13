<?php

class labcompany extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('labcompany_model');
    }

    public function insert_labcompany()
    {
        $clinicid = $this->session->userdata('CLINICID');
        $query = $this->db->query("SELECT LCID from tblabscompany where CLINICID = '$clinicid' order by LCID DESC limit 1");
        $queryrow = $query->row();
        $count = $query->num_rows();
        if ($count == '') {
            $number = "CL0001";
        } else {
            $separate = substr($queryrow->LCID, 2);
            $number = "CL" . sprintf("%04d", ++$separate);
        }
        $data = array(
            "LabCID" =>  time(),
            "LCID" =>  $number,
            "LabCName" => $this->input->post('LabCName'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->labcompany_model->insert($data);
        $this->session->set_userdata("message", "บันทึกบริษัทรับตรวจเรียบร้อย");
        redirect(base_url('dashboard/labcompany'));
    }

    public function delete_labcompany($id)
    {
        $this->labcompany_model->delete($id);
        $this->session->set_userdata("messagedelete", "ลบบริษัทรับตรวจเรียบร้อย");
        redirect(base_url('dashboard/labcompany'));
    }
    public function update_labcompany(){
        $id = $this->input->post('LCID');
        $data = array(       
            "LabCName" => $this->input->post('LabCName')
        );   
        $this->db->update('tblabscompany', $data, array('LCID' => $id));       
        redirect('dashboard/labcompany');
    }
}
