<?php

class drugdetail_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //รายการมื้ออาหาร
    public function insert_CountUnit($data)
    {
        $this->db->insert("tbCountUnit", $data);
    }
    //รายการมื้ออาหาร
    public function insert_Meal($data)
    {
        $this->db->insert("tbMeal", $data);
    }
    //ความถี่ในการกินยา
    public function insert_Fregquency($data)
    {
        $this->db->insert("tbFregquency", $data);
    }
    //หน่วยความถี่ในการกินยา
    public function insert_CallingUnits($data)
    {
        $this->db->insert("tbCallingUnits", $data);
    }
    //คำแนะนำการกินยา
    public function insert_Suggestion($data)
    {
        $this->db->insert("tbSuggestion", $data);
    }
    //ดึงข้อมูลรายการให้ยาครั้งละ 
    public function queue_countUnit()
    {
        $query = $this->db->get('tbCountUnit');
        return $query->result();
    }
    //ดึงข้อมูลรายการมื้ออาหาร
    public function queue_meal()
    {
        $query = $this->db->get('tbMeal');
        return $query->result();
    }
    //ดึงข้อมูลความถี่การกินยา
    public function queue_fregquency()
    {
        $query = $this->db->get('tbFregquency');
        return $query->result();
    }
    //ดึงข้อมูลหน่วยเรียก
    public function queue_callingUnits()
    {
        $query = $this->db->get('tbCallingUnits');
        return $query->result();
    }
    //ดึงข้อมูลคำแนะนำกินยา
    public function queue_suggestion()
    {
        $query = $this->db->get('tbSuggestion');
        return $query->result();
    }
}