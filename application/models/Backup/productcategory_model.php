<?php

class productcategory_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_productcategory()
    {
        $query = $this->db->get_where('tbproductcategory', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }
    public function insert($data)
    {
        $this->db->insert("tbproductcategory", $data);
    }
    public function delete($id)
    {
        $this->db->delete('tbproductcategory', array('CategoryID' => $id));
    }
}
