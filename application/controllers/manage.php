<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

//จัดการข้อมูลเกี่ยวกับฐานข้อมูลทั้งหมดที่ Controller นี้เท่านั้น
class Manage extends CI_Controller
{

    //สมัครสมาชิกใหม่สำหรับใช้งานระบบ
    public function register()
    {
        $digits = 3;
        $ran = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $data = array(
            "CLINICID" => "CL" . $ran,
            "MORID" => $this->input->post('MORID'),
            "IDCARD" => $this->input->post('IDCARD'),
            "CLINICNAME" => $this->input->post('CLINICNAME'),
            "USERNAME" => $this->input->post('USERNAME'),
            "PASSWORD" => MD5($this->input->post('PASSWORD')),
            "REPASSWORD" => MD5($this->input->post('REPASSWORD')),
            "CONTACTNAME" => $this->input->post('CONTACTNAME'),
            "PHONE" => $this->input->post('PHONE'),
            "TIME_OPEN" => $this->input->post('TIME_OPEN'),
            "TIME_CLOSE" => $this->input->post('TIME_CLOSE'),
        );
        $this->db->insert("tbclinic", $data);
        redirect(base_url('app/registersuccess'));
    }

    //ออกจากระบบ เคลียร์ session ทิ้งให้หมด
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    //ตรวจสอบข้อมูลการเข้าใช้งานระบบ พร้อมทั้ง สร้าง Session สำหรับ ผู้ดูแลคลินิก
    public function checklogin()
    {
        $username = $this->input->post('USERNAME');
        $password = md5($this->input->post('PASSWORD'));

        $this->db->select('*');
        $this->db->from('tbuser');
        $this->db->join('tbclinic', 'tbclinic.CLINICID = tbuser.CLINICID');
        $this->db->where('tbuser.UserID', $username);
        $this->db->where('tbuser.Password', $password);
        $query = $this->db->get();

        $row = $query->row();
        if ($query->num_rows() > 0) {
            if ($row->ACTIVATE == 1) {
                if ($row->Status == 1) {
                    $this->session->set_userdata('CLINICID', $row->CLINICID);
                    $this->session->set_userdata('UserID', $row->UserID);
                    $this->session->set_userdata('Level', $row->Leval);
                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_userdata('danger', 'ถูกระงับการใช้งานโปรดติดต่อผู้ดูแล');
                    redirect(base_url(''));
                }
            } else if ($row->ACTIVATE == 0) {
                redirect(base_url('app/waiteactivateaccount'));
            }
        } else {
            $this->session->set_userdata('danger', 'ไม่สามารถติดต่อฐานข้อมูลได้');
            redirect(base_url(''));
        }
    }

    //ตรวจสอบข้อมูลการเข้าใช้งานระบบ พร้อมทั้ง สร้าง Session สำหรับสมาชิกคลินิก
    public function customerchecklogin()
    {
        $username = $this->input->post('EMAIL');
        $password = md5($this->input->post('PASSWORD'));
        $query = $this->db->query("SELECT * FROM tbmembers WHERE EMAIL='$username' AND PASSWORD='$password'");
        $row = $query->row();
        if ($query->num_rows() > 0) {
            $this->session->set_userdata('username', $row->IDCARD);
            $this->session->set_userdata('customername', $row->CUSTOMERNAME);
            if ($this->input->is_ajax_request()) {
                $data['messages'] = 'ยินดีต้อนรับเข้าสู่ระบบ';
                $data['user_id'] = $row->IDCARD;
                $data['customername'] = $row->CUSTOMERNAME;
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($data));
            } else {
                redirect(base_url('app/customersbooking'));
            }
        } else {
            if ($this->input->is_ajax_request()) {
                $data['messages'] = 'ชื่อหรือรหัสผ่านผิด';
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(401)
                    ->set_output(json_encode($data));
            } else {
                redirect(base_url('app/signinerror'));
            }
        }
    }

    //ตรวจสอบข้อมูลซ้ำก่อนลงทะเบียนสมาชิกใหม่
    public function check_id_forregister()
    {
        $IDCARD = $this->input->post('IDCARD');
        $query = $this->db->query("SELECT * FROM tbmembers WHERE IDCARD='$IDCARD'");
        $row = $query->row();
        if ($query->num_rows() > 0) {
            redirect(base_url('app/failed_for_register'));
        } else {

            $this->session->set_userdata('IDCARD', $this->input->post('IDCARD'));
            redirect(base_url('app/past_for_register'));
        }
    }

    //CheckIn ยืนยันการเข้าตรวจที่คลินิก
    public function submitCheckin($id)
    {
        $data = array(
            "CHECKIN" => 1,
            "CHECKIN_BY" => "By Customer",
        );
        $this->db->where('BOOKINGID', $this->input->post('BOOKINGID'));
        $this->db->update('tbbooking', $data);
        redirect(base_url('app/checkinsuccess'));
    }

    //ปรับสถานะรอตรวจ
    public function waiting($bid)
    {
        $data = array(
            "STATUS" => 1,
        );
        $this->db->where('BOOKINGID', $bid);
        $this->db->update('tbbooking', $data);
        redirect(base_url('app/dashboard'));
    }

    //ปรับสถานะเป็นว่าตรวจเสร็จแล้ว
    public function success($id)
    {
        $data = array(
            "STATUS" => 1,
            'SHOWS' => 2,
        );
        $this->db->where('BOOKINGID', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url('admin/questoday'));
    }

    //CheckIn ยืนยันการเข้าตรวจที่คลินิกโดยผู้ดูแลระบบ
    public function adminCheckin($id)
    {
        $data = array(
            "ACCEPT" => 1,
            "CHECKIN" => 1,
            "CHECKIN_BY" => "By Staff",
        );
        $this->db->where('BOOKINGID', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/waitcheckin'));
    }

    //ยืนยันการจองคิวจากลูกค้า
    public function confirmBooking($bid)
    {
        $data = array(
            "CONFIRM" => 1,
        );
        $this->db->where('BOOKINGID', $bid);
        $this->db->update('tbbooking', $data);
        redirect(base_url('app/confirmsuccess'));
    }

    //ลบข้อมูลการจองทิ้ง
    public function deletebooking($id)
    {
        $this->db->delete('tbbooking', array('BOOKINGID' => $id));
        redirect(base_url('dashboard/booking'));
    }

    public function deletebookings()
    {
        $id = $_POST['id'];
        $this->db->delete('tbbooking', array('BOOKINGID' => $id));
        redirect(base_url('dashboard/booking'));
    }

    public function deletequetoday($id)
    {
        $this->db->delete('tbbooking', array('BOOKINGID' => $id));
        redirect(base_url('admin/questoday'));
    }

    public function memberdeletebooking($id)
    {
        $data = array(
            "STATUS" => 2,
        );
        $this->db->where('BOOKINGID', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url());
    }

    //ลูกค้าลบข้อมูลการจองหรือยกเลิกคิวทิ้ง
    public function customerdeletebooking($id)
    {
        $this->db->delete('tbbooking', array('BOOKINGID' => $id));
        redirect(base_url('app/customersbooking'));
    }

    //CheckIn ยืนยันการเข้าตรวจที่คลินิก
    public function acceptBooking($id)
    {
        $data = array(
            "ACCEPT" => 1,
            "ACCEPT_by" => "ADMIN",
        );
        $this->db->where('BOOKINGID', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard'));
    }

    // ยืนยันการการจองจาก dashboard&wait_accept
    public function acceptBookings()
    {
        $id = $_POST['id'];
        $data = array(
            "ACCEPT" => 1,
            "ACCEPT_by" => "ADMIN",
        );
        $this->db->where('BOOKINGID', $id);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard'));
    }

    //แอดมินจองคิวให้ลูกค้า
    public function admin_booking()
    {
        $digits = 3;
        $ran = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $data = array(
            "BOOKINGID" => "BOOK" . $ran,
            "IDCARD" => $this->input->post('IDCARD'),
            "CLINICID" => $this->input->post('CLINICID'),
            "NCDID" => $this->input->post('NCDID'),
            "QUES" => 'A' . $this->input->post('QUES'),
            "CONFIRM" => 1,
            "ACCEPT" => 1,
            "CHECKIN" => 1,
            "BOOKDATE" => $this->input->post('BOOKDATE'),
            "BOOKTIME" => $this->input->post('BOOKTIME'),
        );
        $data2 = array(
            "IDCARD" => $this->input->post('IDCARD'),
            "CUSTOMERNAME" => $this->input->post('CUSTOMERNAME'),
            "EMAIL" => $this->input->post('EMAIL'),
            "PASSWORD" => md5($this->input->post('PHONE')),
            "PHONE" => $this->input->post('PHONE'),
            "BIRTHDAY" => $this->input->post('BIRTHDAY'),
        );
        $this->db->insert("tbbooking", $data);
        $this->db->insert("tbmembers", $data2);
        redirect(base_url('app/dashboardques'));
    }

    //คนไข้ลงทะเบียนใหม่
    public function customer_register()
    {
        $data = array(
            "IDCARD" => $this->input->post('IDCARD'),
            "CUSTOMERNAME" => $this->input->post('CUSTOMERNAME'),
            "EMAIL" => $this->input->post('EMAIL'),
            "PASSWORD" => md5($this->input->post('PASSWORD')),
            "PHONE" => $this->input->post('PHONE'),
            "BIRTHDAY" => $this->input->post('BIRTHDAY'),
        );
        $this->db->insert("tbmembers", $data);
        $this->session->sess_destroy();
        redirect(base_url('app/created'));
    }

    //จองคิวตรวจ
    public function insertque()
    {
        date_default_timezone_set('Asia/Bangkok');
        $data = array(
            "QUES" => $this->input->post('QUES'),
            "TYPE" => $this->input->post('TYPE'),
            "ONTIME" => $this->input->post('ONTIME'),
            "BOOKINGID" => $this->input->post('BOOKINGID'),
            "CLINICID" => $this->input->post('CLINICID'),
            "DATE" => date("Y-m-d"),
        );
        $data2 = array(
            "QUES" => $this->input->post('QUES'),
        );
        $this->db->insert("tbques", $data);
        $this->db->where('BOOKINGID', $this->input->post('BOOKINGID'));
        $this->db->update('tbbooking', $data2);

        redirect(base_url('app/dashboard'));
    }
    // เพิ่มคิวคลินิกของ CPN callques
    public function addqueue()
    {
        date_default_timezone_set('Asia/Bangkok');
        $day = date("Y-m-d");

        $IDCARD = $this->input->post('IDCARD');
        $number = $this->input->post('number');
        $CLINICID = $this->session->userdata('CLINICID');

        if ($number == "B") {
            $data = array(
                "BOOKINGID" => "B" . time(),
                "BOOKTIME" => $this->input->post('BOOKTIME'),
                "QUES" => $this->input->post('QUES'),
                "QBER" => $this->input->post('QBER'),
                "BOOKDATE" => $day,
                "IDCARD" => $IDCARD,
                "CONFIRM" => 1,
                "TYPE" => 1,
                "CHECKIN" => 1,
                "ACCEPT" => 1,
                "ACCEPT_by" => "ADMIN",
                "CLINICID" => $CLINICID
            );
            $this->db->insert('tbbooking', $data);
        } else {
            $data = array(
                "BOOKINGID" => "B" . time(),
                "BOOKTIME" => $this->input->post('BOOKTIME' . $number),
                "QUES" => $this->input->post('QUES' . $number),
                "QBER" => $this->input->post('QBER' . $number),
                "BOOKDATE" => $day,
                "IDCARD" => $IDCARD,
                "CONFIRM" => 1,
                "ACCEPT" => 1,
                "CHECKIN" => 1,
                "ACCEPT_by" => "ADMIN",
                "CLINICID" => $CLINICID
            );
            $this->db->insert('tbbooking', $data);
        }

        $checkid = $this->db->query("SELECT IDCARD FROM tbmembers WHERE IDCARD = '$IDCARD'");
        if ($checkid->num_rows() == 0) {
            $customer = array(
                "IDCARD" => $IDCARD,
                "CUSTOMERNAME" => $this->input->post('CUSTOMERNAME'),
                "PHONE" => $this->input->post('PHONE')
            );
            echo "<pre>";
            print_r($customer);
            echo "<pre>";
            $this->db->insert("tbmembers", $customer);
        }

        $tbmembercheck = $this->db->query("SELECT * FROM tbmembercheck WHERE IDCARD = '$IDCARD' and CLINICID = '$CLINICID'");
        if ($tbmembercheck->num_rows() > 0) {
            redirect(base_url('dashboard/callques'));
        } else {
            $memberc = array(
                "CMID" => time(),
                "IDCARD" => $IDCARD,
                "CLINICID" => $CLINICID
            );
            $this->db->insert("tbmembercheck", $memberc);
            redirect(base_url('dashboard/callques'));
        }
    }
}
