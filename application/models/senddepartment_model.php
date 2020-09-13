<?php

class senddepartment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_senddepartment()
    {
        $query = $this->db->get_where('tbsenddepartment', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert("tbsenddepartment", $data);
    }

    public function delete($id)
    {
        $this->db->delete('tbsenddepartment', array('SID' => $id));
    }

    function fetch_dep_re($data)
    {
        $this->db->where('LabCID', $data);
        $this->db->order_by('DepName', 'ASC');
        $query = $this->db->get('tbdepartment');
        $output = '<option value="">เลือกแผนกส่งตรวจ</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->DepName . '">' . $row->DepName . '</option>';
        }
        echo $output;
    }

    function fetch_dep($data)
    {
        $this->db->where('LabCID', $data);
        $this->db->order_by('DepName', 'ASC');
        $query = $this->db->get('tbdepartment');
        $output = '<option value="">เลือกแผนกส่งตรวจ</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->DepID . '">' . $row->DepName . '</option>';
        }
        echo $output;
    }
}
