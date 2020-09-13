<?php
class Profile_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_profile()
    {
        $query = $this->db->get_where('tbclinic', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }
    //แสดงข้อมูลโปรไฟล์เมื่อเข้าใช้งานระบบ
    public function getprofile()
    {
        $this->db->get('');
        return;
    }
    //เปลี่ยนแปลงข้อมูลโปรไฟล์ในระบบคลินิก
    public function updateprofile($data)
    {
        $this->db->update('', $data, array("id=>$id"));
        redirect('', 'refresh');
    }
    //หยุดการใช้งานบัญชีของคลินิกที่ไม่ได้ทำการต่ออายุบริการ
    public function deactivate_account($data)
    {
        $this->db->update('', $data, array("id=>$id"));
        redirect('', 'refresh');
    }
    //ระงับการให้บริการระบบงานเนื่องจากขาดการต่ออายุนานเกิน 1 เดือน
    public function drop_account($data)
    {
        $this->db->delete('', $data, "id=>$id");
        redirect('', 'refresh');
    }
}
