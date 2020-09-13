<?php

class department_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_department()
    {
        $query = $this->db->get_where('tbdepartment', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert("tbdepartment", $data);
    }

    public function delete($id)
    {
        $this->db->delete('tbdepartment', array('DepID' => $id));
    }

}
