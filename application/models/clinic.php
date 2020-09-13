<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Clinic extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function setting()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/setting');
        $this->load->view('clinic/footer');
    }

    public function loadquestoday()
    {
        $this->load->view('clinic/loadquestoday');
    }

    public function loaddashboard()
    {
        $this->load->view('clinic/loaddashboard');
    }

    public function profile()
    {
        $this->load->view('profile');
    }

    public function report()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/report');
        $this->load->view('clinic/footer');
    }

    public function dashboarddate()
    {
        $data['BOOKDATE'] = $this->input->post('BOOKDATE');
        $this->load->view('clinic/header');
        $this->load->view('clinic/dashboarddate', $data);
        $this->load->view('clinic/footer');
    }

    public function insertclosedate()
    {
        $digits = 3;
        $ran = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $customer = array(
            "CLOSEID" => "C" . $ran,
            "CLINICID" => $this->session->userdata('CLINICID'),
            "CLOSEDATE" => $this->input->post('CLOSEDATE')
        );
        $this->db->insert("tbclose", $customer);
        redirect(base_url('dashboard/setting'));
    }

    public function deleteclosedate($id)
    {
        $this->db->delete('tbclose', array('CLOSEID' => $id));
        redirect(base_url('dashboard/setting'));
    }

    public function confirmbooking()
    {
        $data = array(
            "BOOKINGID" => "B" . time(),
            "TYPE" => $this->input->post('TYPE'),
            "QUES" => $this->input->post('QUES'),
            "QBER" => $this->input->post('QBER'),
            "IDCARD" => $this->input->post('IDCARD'),
            "CONFIRM" => 1,
            "CLINICID" => $this->input->post('CLINICID'),
            "BOOKDATE" => $this->input->post('BOOKDATE'),
            "BOOKTIME" => $this->input->post('BOOKTIME')
        );
        $this->db->insert("tbbooking", $data);
        $cusid = $this->input->post('IDCARD');
        $checkid = $this->db->query("SELECT IDCARD FROM tbmembers WHERE IDCARD = '$cusid'");
        $num = $checkid->num_rows();
        if ($num > 0) {
            redirect(base_url('clinic/bookingsuccess'));
        } else {
            $customer = array(
                "IDCARD" => $this->input->post('IDCARD'),
                "CUSTOMERNAME" => $this->input->post('CUSTOMERNAME'),
                "EMAIL" => $this->input->post('IDCARD'),
                "PASSWORD" => md5($this->input->post('IDCARD')),
                "BIRTHDAY" => $this->input->post('BIRTHDAY'),
                "LINEID" => $this->input->post('LINEID'),
                "PHONE" => $this->input->post('PHONE')
            );
            $this->db->insert("tbmembers", $customer);
            redirect(base_url('clinic/bookingsuccess'));
        }
    }

    public function updateprofile()
    {
        $data = array(
            'QUETIME' => $this->input->post('QUETIME'),
            'TIME_OPEN' => $this->input->post('TIME_OPEN'),
            'TIME_CLOSE' => $this->input->post('TIME_CLOSE'),
            'TIME1' => $this->input->post('TIME1'),
            'CLOSE1' => $this->input->post('CLOSE1'),
            'TIME2' => $this->input->post('TIME2'),
            'CLOSE2' => $this->input->post('CLOSE2'),
            'TIME3' => $this->input->post('TIME3'),
            'CLOSE3' => $this->input->post('CLOSE3'),
            'TIME4' => $this->input->post('TIME4'),
            'CLOSE4' => $this->input->post('CLOSE4'),
            'TIME5' => $this->input->post('TIME5'),
            'CLOSE5' => $this->input->post('CLOSE5'),
            'TIME6' => $this->input->post('TIME6'),
            'CLOSE6' => $this->input->post('CLOSE6')
        );
        $this->db->where('CLINICID', $this->session->userdata('CLINICID'));
        $this->db->update('tbclinic', $data);
        redirect(base_url('clinic/updateprofilesuccess'));
    }

    public function updateprofilesuccess()
    {
        $this->load->view('clinic/header');
        $this->load->view('clinic/settingsuccess');
        $this->load->view('clinic/footer');
    }

    public function bookingsuccess()
    {
        $this->load->view('header');
        $this->load->view('member/bookingsuccess');
        $this->load->view('footer');
    }

    public function deletephamacy($id)
    {
        $this->db->delete('tbncds', array('NCDID' => $id));
        redirect(base_url('dashboard/phamarcy'));
    }

    public function insert_user()
    {
        $config['upload_path']   = './assets/images/profile';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 0;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        $config['encrypt_name']  = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('Image')) {
            $up_file_name = $this->upload->data();
            $image = $up_file_name['file_name'];
        } else {
            $image = "607414.svg";
        }

        $data = array(
            'Image' => $image,
            "UserID" => $this->input->post('UserID'),
            "Nameprefix" => $this->input->post('Nameprefix'),
            "UserName" => $this->input->post('UserName'),
            "Email" => $this->input->post('Email'),
            "Address" => $this->input->post('Address'),
            "Leval" => $this->input->post('Leval'),
            "CLINICID" => $this->session->userdata('CLINICID'),
            "Password" => md5($this->input->post('Password')),
            "Prepassword" => md5($this->input->post('Password')),
            "Category" => 1,
            "Phone" => $this->input->post('Phone'),
            "License" => $this->input->post('License'),
            "More" => $this->input->post('More')
        );
        if (!$this->db->insert('tbuser', $data)) {
            $this->session->set_userdata("error", "Username นี้มีผู้อื่นใช้แล้ว " . $this->input->post('UserID'));
        }
        redirect(base_url('dashboard/setting'));
    }

    public function update_user()
    {
        $config['upload_path']   = './assets/images/profile';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 0;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        $config['encrypt_name']  = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('Image')) {
            $up_file_name = $this->upload->data();
            $image = $up_file_name['file_name'];
        } else {
            $OldImage = $this->input->post('OldImage');
            $image = $OldImage;
        }

        if ($this->input->post('Password') == '') {
            $password = $this->input->post('Prepassword');
        } else {
            $password = md5($this->input->post('Password'));
        }

        $data = array(
            'Image' => $image,
            "Nameprefix" => $this->input->post('Nameprefix'),
            "UserName" => $this->input->post('UserName'),
            "Email" => $this->input->post('Email'),
            "Address" => $this->input->post('Address'),
            "Leval" => $this->input->post('Leval'),
            "CLINICID" => $this->session->userdata('CLINICID'),
            "Password" => $password,
            "Prepassword" => $password,
            "Category" => 1,
            "Phone" => $this->input->post('Phone'),
            "License" => $this->input->post('License'),
            "More" => $this->input->post('More')
        );
        $this->db->where('UserID', $this->input->post('UserID'));
        $this->db->update('tbuser', $data);
        redirect(base_url('dashboard/setting'));
    }

    public function open_close_user()
    {
        $open_close = $this->input->post('open_close');
        $UserID = $this->input->post('UserID');
        $data = array(
            "Status" => $open_close
        );
        $this->db->where('UserID', $UserID);
        $this->db->update('tbuser', $data);
        redirect(base_url('dashboard/setting'));
    }

    public function update_clinicinfo()
    {
        $config['upload_path']   = './assets/images/profile';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 0;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        $config['encrypt_name']  = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('Image')) {
            $up_file_name = $this->upload->data();
            $image = $up_file_name['file_name'];
        } else {
            $OldImage = $this->input->post('OldImage');
            $image = $OldImage;
        }

        $data = array(
            'cif_image' => $image,
            "cif_name" => $this->input->post('cif_name'),
            "cif_service" => $this->input->post('cif_service'),
            "cif_license" => $this->input->post('cif_license'),
            "cif_taxid" => $this->input->post('cif_taxid'),
            "cif_phone" => $this->input->post('cif_phone'),
            "cif_fax" => $this->input->post('cif_fax'),
            "cif_email" => $this->input->post('cif_email'),
            "cif_address" => $this->input->post('cif_address'),
            "cif_subdistrict" => $this->input->post('cif_subdistrict'),
            "cif_district" => $this->input->post('cif_district'),
            "cif_province" => $this->input->post('cif_province'),
            "cif_postal" => $this->input->post('cif_postal')
        );
        $this->db->where('CLINICID', $this->input->post('CLINICID'));
        $this->db->update('tbclinicinfo', $data);
        redirect(base_url('dashboard/setting'));
    }

    public function insert_videolink()
    {
        $data = array(
            "VDOID" => 'VDO' . time(),
            "LINK" => $this->input->post('LINK'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->db->insert('tbvideolink', $data);
        redirect(base_url('dashboard/setting'));
    }

    public function update_videolink($id)
    {
        $data = array(
            "LINK" => $this->input->post('LINK')
        );
        $this->db->where('VDOID', $id);
        $this->db->update('tbvideolink', $data);
        redirect(base_url('dashboard/setting'));
    }

    public function delete_videolink($id)
    {
        $this->db->delete('tbvideolink', array('VDOID' => $id));
        redirect(base_url('dashboard/setting'));
    }
}
