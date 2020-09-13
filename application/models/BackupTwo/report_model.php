<?php

class report_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_lab($idp, $idb)
    {
        //
        $lab = $this->db->get_where('tbpatient_lab', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        return $lab->result();
    }

    public function health($idb)
    {
        //
        $health = $this->db->get_where('tbpatient_health', array('BOOKINGID' => $idb))->row();
        if ($health) {
            return $health;
        } else {
            return "null";
        }
    }

    public function show_count_job()
    {
        date_default_timezone_set('Asia/Bangkok');
        $day = date("Y-m-");
        $clinicid = $this->session->userdata('CLINICID');
        $this->db->select('*');
        $this->db->from('tbpatient_job');
        $this->db->join('tbbooking', 'tbbooking.BOOKINGID = tbpatient_job.BOOKINGID');
        $this->db->where('tbbooking.CLINICID', $clinicid);
        $this->db->like('tbpatient_job.CREATE', $day);
        $counts = $this->db->get();
        $count = $counts->num_rows();
        return $count;
    }

    public function show_job($idp, $idb)
    {
        $job = $this->db->get_where('tbpatient_job', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        return $job->result();
    }

    public function have_patienr($idp, $idb)
    {
        $patienr = $this->db->get_where('tbpatient_history', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        return $patienr->result();
    }
    public function have_medical($idp, $idb)
    {
        $count = $this->db->get_where('tbpatient_medical', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        $medical = $count->num_rows();
        return $medical;
    }
    public function have_lab($idp, $idb)
    {
        $count = $this->db->get_where('tbpatient_lab', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        $lab = $count->num_rows();
        return $lab;
    }
    public function have_procedure($idp, $idb)
    {
        $count = $this->db->get_where('tbpatient_procedure', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        $procedure = $count->num_rows();
        return $procedure;
    }
    public function show_sick($idp, $idb)
    {
        $sick = $this->db->get_where('tbpatient_sick', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        return $sick->result();
    }

    public function show_drug($idp, $idb, $idm)
    {
        //
        $this->db->select('*');
        $this->db->from('tbpatient_medical');
        $this->db->join('tbpatients', 'tbpatients.IDCARD = tbpatient_medical.IDCARD');
        $this->db->where('tbpatient_medical.IDCARD', $idp);
        $this->db->where('tbpatient_medical.BOOKINGID', $idb);
        if ($idm != "all") {
            $this->db->where('tbpatient_medical.MEDICALID', $idm);
        }
        $drug = $this->db->get();
        return $drug->result();
    }

    public function Prescription($idp, $idb)
    {
        //
        $orders = $this->db->get_where('tbpatient_medical', array('IDCARD' => $idp, 'BOOKINGID' => $idb))->result();
        return $orders;
    }
    public function userinfo()
    {
        //
        $UserID = $this->session->userdata('UserID');
        $this->db->select('*');
        $this->db->from('tbuser');
        $this->db->join('tbclinic', 'tbclinic.CLINICID = tbuser.CLINICID');
        $this->db->join('tbclinicinfo', 'tbclinicinfo.CLINICID = tbuser.CLINICID');
        $this->db->where('tbuser.UserID', $UserID);
        $userinfo = $this->db->get()->row();
        return $userinfo;
    }

    public function patients($idp)
    {
        //
        $patients = $this->db->get_where('tbpatients', array('IDCARD' => $idp))->row();
        if ($patients) {
            return $patients;
        } else {
            return "null";
        }
    }

    public function income($dayfrom, $dayto, $name)
    {
        //
        if ($name == "noname") {
            $name = '';
        } else {
            $name = urldecode($name);
        }
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
