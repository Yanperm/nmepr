<?php

class subcategory_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_subcategory()
    {
        $query = $this->db->get_where('tbsubcategory', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }
    public function insert($data)
    {
        $this->db->insert("tbsubcategory", $data);
    }
    public function delete($id)
    {
        $this->db->delete('tbsubcategory', array('SubID' => $id));
    }
}
