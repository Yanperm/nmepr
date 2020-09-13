<?php

class dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function queue_today()
    {
        date_default_timezone_set('Asia/Bangkok');
        $day = date('Y-m-d');
        $clinicid = $this->session->userdata('CLINICID');
        $query = $this->db->get_where('tbbooking', array('CLINICID' => $clinicid, 'BOOKDATE' => $day))->num_rows();
        return $query;
    }
    public function sales_today()
    {
        date_default_timezone_set('Asia/Bangkok');
        $day = date('Y-m-d');
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->select('SUM(ci_check + ci_drug + ci_lab + ci_procedure + ci_certificate) as sums');
        $this->db->where('CLINICID', $clinicid);
        $this->db->where('ci_date', $day);
        $query = $this->db->get('tbincome')->row();
        return $query;
    }
    public function queue_year()
    {
        date_default_timezone_set('Asia/Bangkok');
        $day = date('Y');
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->like('ci_date', $day);
        $query = $this->db->get_where('tbincome', array('CLINICID' => $clinicid))->num_rows();
        return $query;
    }
    public function sales_year()
    {
        date_default_timezone_set('Asia/Bangkok');
        $day = date('Y');
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->like('ci_date', $day);
        $this->db->select('SUM(ci_check + ci_drug + ci_lab + ci_procedure + ci_certificate) as sums');
        $this->db->where('CLINICID', $clinicid);
        $query = $this->db->get('tbincome')->row();
        return $query;
    }
    public function sales_last_year()
    {
        date_default_timezone_set('Asia/Bangkok');
        $last_year = date('Y') - 1;
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->select('SUM(ci_check + ci_drug + ci_lab + ci_procedure + ci_certificate) as sums,ci_date');
        $this->db->where('CLINICID', $clinicid);
        $this->db->where('YEAR(ci_date)', $last_year);
        $this->db->group_by('MONTH(ci_date)');
        $query = $this->db->get('tbincome');
        return $query->result();
    }
    public function sales_this_year()
    {
        date_default_timezone_set('Asia/Bangkok');
        $this_year = date('Y');
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->select('SUM(ci_check + ci_drug + ci_lab + ci_procedure + ci_certificate) as sums,ci_date');
        $this->db->where('CLINICID', $clinicid);
        $this->db->where('YEAR(ci_date)', $this_year);
        $this->db->group_by('MONTH(ci_date)');
        $query = $this->db->get('tbincome');
        return $query->result();
    }

    public function services()
    {
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->select('SUM(ci_check) as ci_check,SUM(ci_drug) as ci_drug,SUM(ci_lab) as ci_lab,SUM(ci_procedure) as ci_procedure,SUM(ci_certificate) as ci_certificate');
        $this->db->where('CLINICID', $clinicid);
        $query = $this->db->get('tbincome');
        return $query->result();
    }
}
