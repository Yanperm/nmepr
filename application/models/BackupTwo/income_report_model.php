<?php

class income_report_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_income_report($dayfrom, $dayto)
    {
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->where(array('CLINICID' => $clinicid, 'ci_date >=' => $dayfrom, 'ci_date <=' => $dayto));
        $this->db->order_by('ci_date ASC , ci_order ASC');
        $query = $this->db->get('tbincome');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function search_income_report($dayfrom, $dayto, $name)
    {
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->where(array('CLINICID' => $clinicid, 'ci_date >=' => $dayfrom, 'ci_date <=' => $dayto));
        $this->db->like('ci_name', $name);
        $this->db->order_by('ci_date ASC , ci_order ASC');
        $query = $this->db->get('tbincome');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}
