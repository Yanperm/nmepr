<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class drugdetail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();   
        $this->load->model('drugdetail_model');     
    }
    //ครั้งละ
    public function CountUnit(){
        //tbCountUnit
        $data = array(
            "id"=> time(),
            "detail"=> $this->input->post('detail')
        );
        $this->drugdetail_model->insert_CountUnit($data);
        redirect(base_url('dashboard/detailmeal'));
    }
    //มื้ออาหารที่รับประทานยา
    public function Meal()
    {
        //tbmeal
        $data = array(
            "id"=> time(),
            "detail"=> $this->input->post('detail')
        );
        $this->drugdetail_model->insert_Meal($data);
        redirect(base_url('dashboard/detailmeal'));
    }
    //ความถี่ในการกินยา
    public function Fregquency()
    {
        //tbFregquency
        $data = array(
            "id"=> time(),
            "detail"=> $this->input->post('detail')
        );
        $this->drugdetail_model->insert_Fregquency($data);
        redirect(base_url('dashboard/detailmeal'));
    }
    //หน่วยความถี่ในการกินยา เม็ด แคปซูล
    public function CallingUnits()
    {
        //tbCallingUnits
        $data = array(
            "id"=> time(),
            "detail"=> $this->input->post('detail')
        );
        $this->drugdetail_model->insert_CallingUnits($data);
        redirect(base_url('dashboard/detailmeal'));
    }
    //คำแนะนำในการกินยา
    public function Suggestion()
    {
        //tbSuggestion
        $data = array(
            "id"=> time(),
            "detail"=> $this->input->post('detail')
        );
        $this->drugdetail_model->insert_Suggestion($data);
        redirect(base_url('dashboard/detailmeal'));
    }
}