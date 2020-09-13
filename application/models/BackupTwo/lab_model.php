<?php

class lab_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_lab()
    {
        $query = $this->db->get_where('tblabs', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }
    public function insertlab($data)
    {
        $this->db->insert('tblabs', $data);
    }
}
