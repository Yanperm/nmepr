<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
    }

    //โหลดหน้าจองคิวตรวจ
    public function index()
    {
        $this->load->view('header');
        $this->load->view('member/booking');
        $this->load->view('footer');
    }

    public function detailbooking()
    {
        $data['IDCARD'] = $this->input->post('IDCARD');
        $this->load->view('header');
        $this->load->view('member/detailbooking', $data);
        $this->load->view('footer');
    }

    //ลูกค้าลบข้อมูลการจองหรือยกเลิกคิวทิ้ง
    public function deletecustomer($id)
    {
        $this->db->delete('tbmembers', array('IDCARD' => $id));
        redirect(base_url('dashboard/patiendatabase'));
    }

    public function deletecustomers($id)
    {
        $this->db->delete('tbmembercheck', array('CMID' => $id));
        redirect(base_url('dashboard/patiendatabase'));
    }

    public function signup()
    {
        $data = array(
            "IDCARD" => $this->input->post('IDCARD'),
            "CUSTOMERNAME" => $this->input->post('CUSTOMERNAME'),
            "BIRTHDAY" => $this->input->post('BIRTHDAY'),
            "EMAIL" => $this->input->post('EMAIL'),
            "PASSWORD" => md5($this->input->post('PASSWORD')),
            "CHAN" => "REGISTER",
        );
        $this->db->insert("tbmembers", $data);
        redirect(base_url());
    }

    //คำสั่งค้นหาาแบบเรียลไทม์ ตอนนี้ยังไม่ใช้งานแต่ทำตองรับไว้
    function fetch()
    {
        $this->load->model('autocomplete_model');
        echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
    }

    //คำสั่งค้นหาทำงานร่วมกันกับ function fetch() 
    public function search()
    {
        $query = $this->input->get('term');
        $this->db->like('CLINICNAME', $query);
        $this->db->select('CLINICID, CLINICNAME');
        $data = $this->db->get("tbclinic")->result();
        echo json_encode($data);
    }

    //ยืนยันการเติมเครดิต
    public function acceptcredit($creditid)
    {
        $data = array(
            'status' => 1,
        );
        $this->db->where('creditid', $creditid);
        $this->db->update('tbcredit', $data);
        redirect(base_url('admin/crediteurned'));
    }

    //ตรวจสอบการเข้าใช้งานระบบของผู้ดูแลระบบ
    public function checklogin()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $query = $this->db->query("SELECT * FROM tbadmin WHERE username='$username' AND password='$password'");
        $row = $query->row();
        if ($query->num_rows() > 0) {
            $this->session->set_userdata('username', 'admin');
            $this->session->set_userdata('adminid', $row->adminid);
            redirect(base_url('admin/dashboard'));
        } else {
            echo 'valide username';
        }
    }

    //สำหรับตรวจสอบคิวว่างแต่ละคลินิกที่ต้องการจองเพื่อเข้าตรวจ
    public function booking()
    {
        $data['CID'] = $this->input->post('CLINICID');
        $data['DATEBOOK'] = $this->input->post('DATEBOOKING');
        $this->load->view('template/header');
        $this->load->view('manage/search', $data);
        $this->load->view('template/footer');
    }

    //ยืนยันการจองคิวแบบจองออนไลน์
    public function confirmbooking($CID, $showtime, $DATEBOOK, $QA, $QBER)
    {
        $data['CID'] = $CID;
        $data['showtime'] = $showtime;
        $data['DATEBOOK'] = $DATEBOOK;
        $data['QBER'] = $QBER;
        $data['QA'] = $QA;
        $this->load->view('header');
        $this->load->view('member/confirmbooking', $data);
        $this->load->view('footer');
    }

    //ยืนยันการจองคิวแบบออนไลน์แต่อยู่ในโหมดคิวเสริมที่ต้องแทรกระหว่างคิวตรวจ
    public function confirmbookingWalkin($CID, $DATEBOOK, $WA, $QBER)
    {
        $data['CID'] = $CID;
        $data['showtime'] = 'รอเรียกจากเคาเตอร์';
        $data['DATEBOOK'] = $DATEBOOK;
        $data['QBER'] = $QBER;
        $data['QUES'] = $WA;
        $this->load->view('header');
        $this->load->view('member/confirmbookingWalkin', $data);
        $this->load->view('footer');
    }

    //เคลียร์สถานะการยืนยันว่าตรวจแล้ว
    public function resetStatus()
    {
        $data = array(
            'STATUS' => 0,
            'SHOWS' => 0,
            'CALLED' => 0
        );
        $this->db->where('clinicid', $this->session->userdata('CLINICID'));
        $this->db->where('STATUS', 1);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/callques'));
    }

    public function resetStatusAgain($id)
    {
        $this->db->query("UPDATE tbbooking SET SHOWS = 3");
        $data = array(
            'SHOWS' => 2,
            'STATUS' => 1,
        );
        $this->db->where('bookingid', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/callques'));
    }

    public function resetStatusAgainTypeA($id)
    {
        $CLINICID = $this->session->userdata('CLINICID');
        $this->db->query("UPDATE tbbooking SET SHOWS = 3 WHERE TYPE = 0 and CLINICID = '$CLINICID'");
        $data = array(
            'SHOWS' => 2,
            'STATUS' => 1,
            'CALLED' => 1
        );
        $this->db->where('bookingid', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/callques'));
    }

    public function resetStatusAgainTypeB($id)
    {
        $CLINICID = $this->session->userdata('CLINICID');
        $this->db->query("UPDATE tbbooking SET SHOWS = 3 WHERE TYPE = 1 and CLINICID = '$CLINICID'");
        $data = array(
            'SHOWS' => 2,
            'STATUS' => 1,
            'CALLED' => 1
        );
        $this->db->where('bookingid', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/callques'));
    }

    public function resetStatusAgains($id)
    {
        $this->db->query("UPDATE tbbooking SET SHOWS = '3'");
        $data = array(
            'SHOWS' => 2,
            'STATUS' => 2,
        );
        $this->db->where('bookingid', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/callques'));
    }
}
