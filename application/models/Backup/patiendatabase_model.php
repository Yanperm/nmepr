<?php

class patiendatabase_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_patiendatabase()
    {
        // $query = $this->db->get_where('tbmembers', array("CLINICID" => $this->session->userdata('CLINICID')));
        // return $query->result();
        $this->db->select('tbmembercheck.CMID,
        tbmembers.IDCARD,
        tbpatients.PATIENT_ID,
        tbmembers.CUSTOMERNAME,
        tbpatients.PATIEN_NAMEPREFIX,
        tbpatients.PATIEN_NAME,
        tbmembers.BIRTHDAY,
        tbpatients.PATIEN_BDAY,
        tbmembers.LINEID,
        tbpatients.PATIEN_LINEID,
        tbmembers.PHONE,
        tbpatients.PATIEN_PHONE
        ');
        $this->db->from('tbmembercheck');
        $this->db->join('tbmembers', 'tbmembers.IDCARD = tbmembercheck.IDCARD');
        $this->db->join('tbpatients', 'tbpatients.IDCARD = tbmembers.IDCARD', 'left');
        $this->db->where('tbmembercheck.CLINICID', $this->session->userdata('CLINICID'));
        $query = $this->db->get();
        return $query->result();
    }
}
