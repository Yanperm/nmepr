<?php

class phamarcy_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_phamarcy()
    {
        $query = $this->db->get_where('tbncds', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }
}
