<?php

class subcategory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subcategory_model');
    }

    public function insert_subcategory()
    {
        $clinicid = $this->session->userdata('CLINICID');
        $query = $this->db->query("SELECT SubIDs from tbsubcategory where CLINICID = '$clinicid' order by SubIDs DESC limit 1");
        $queryrow = $query->row();
        $count = $query->num_rows();
        if ($count == '') {
            $number = "S0001";
        } else {
            $separate = substr($queryrow->SubIDs, 1);
            $number = "S" . sprintf("%04d", ++$separate);
        }
        $data = array(
            "SubID" =>  time(),
            "SubIDs" =>  $number,
            "SubName" => $this->input->post('SubName'),
            "CategoryID" => $this->input->post('CategoryID'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->subcategory_model->insert($data);
        $this->session->set_userdata("message", "บันทึกกลุ่มยารองเรียบร้อย");
        redirect(base_url('dashboard/subcategory'));
    }

    public function delete_subcategory($id)
    {
        $this->subcategory_model->delete($id);
        $this->session->set_userdata("messagedelete", "ลบกลุ่มยารองเรียบร้อย");
        redirect(base_url('dashboard/subcategory'));
    }
}
