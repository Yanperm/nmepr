<?php

class labcompany_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_labcompany()
    {
        $query = $this->db->get_where('tblabscompany', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }
    public function insert($data)
    {
        $this->db->insert("tblabscompany", $data);
    }
    public function delete($id)
    {
        $this->db->delete('tblabscompany', array('LabCID' => $id));
    }
}
