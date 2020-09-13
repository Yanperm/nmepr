<?php

class productcategory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('productcategory_model');
    }

    public function insert_productcategory()
    {
        $clinicid = $this->session->userdata('CLINICID');
        $query = $this->db->query("SELECT CategoryIDs from tbproductcategory where CLINICID = '$clinicid' order by CategoryIDs DESC limit 1");
        $queryrow = $query->row();
        $count = $query->num_rows();
        if ($count == '') {
            $number = "M001";
        } else {
            $separate = substr($queryrow->CategoryIDs, 1);
            $number = "M" . sprintf("%03d", ++$separate);
        }
        $data = array(
            "CategoryID" => "C" . time(),
            "CategoryIDs" =>  $number,
            "CategoryName" => $this->input->post('CategoryName'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->productcategory_model->insert($data);
        $this->session->set_userdata("message", "บันทึกกลุ่มยาหลักเรียบร้อย");
        redirect(base_url('dashboard/productcategory'));
    }

    public function delete_productcategory($id)
    {
        $this->productcategory_model->delete($id);
        $this->session->set_userdata("messagedelete", "ลบกลุ่มยาหลักเรียบร้อย");
        redirect(base_url('dashboard/productcategory'));
    }
}
