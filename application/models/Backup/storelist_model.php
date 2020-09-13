<?php

class storelist_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_storelist()
    {
        $query = $this->db->get_where('tbproducts', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }
}
