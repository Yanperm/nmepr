<?php

/*
  Controller product clinic for sale and use
 */

class product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('drugdetail_model'); 
    }
    //เพิ่มข้อมูลสินค้าเข้าสู่คลังสินค้า
    public function addproduct()
    {
        $data = array(
            "ProductID" => time(),
            "ProID" => $this->input->post('ProID'),
            "CommonName" => $this->input->post('CommonName'),
            "Barcode" => $this->input->post('Barcode'),
            "CategoryID" => $this->input->post('CategoryID'),
            "SubID" => $this->input->post('SubID'),
            "PregCat" => $this->input->post('PregCat'),
            "PriceBuy" => $this->input->post('PriceBuy'),
            "PriceSale" => $this->input->post('PriceSale'),
            "Digit" => $this->input->post('Digit'),
            "Unit" => $this->input->post('Unit'),
            "SamaryAmount" => $this->input->post('SamaryAmount'),
            "StoreID" => $this->input->post('StoreID'),
            "BrandName" => $this->input->post('BrandName'),
            "Indication" => $this->input->post('Indication'),
            "CountUnit" => $this->input->post('CountUnit'),
            "CallingUnit" => $this->input->post('CallingUnit'),
            "Frequency" => $this->input->post('Frequency'),
            "Meal" => $this->input->post('Meal'),
            "Suggestion" => $this->input->post('Suggestion'),
            "CLINICID" => $this->session->userdata("CLINICID")
        );
        $this->product_model->insert_product($data);
        $this->session->set_userdata("message", "เพิ่มสินค้าเข้าคลังสินค้าเรียบร้อยแล้ว");
        redirect(base_url('dashboard/store'));
    }

    //ลบรายการยาออกจากระบบในคลินิก
    public function drop_product($product_id)
    {
        $this->db->delete('tbproducts', array('ProductID' => $product_id));
        $data['messagedelete'] = 'Data Delete Successfully';
        if ($this->session->userdata('lang') == NULL) {
            $lang = "thailand";
            $this->session->set_userdata('lang', $lang);
        } else {
            $lang = $this->session->userdata('lang');
        }
        $this->lang->load($lang, $lang);
        redirect('dashboard/productstore');
    }

    //โชว์หน้าแก้ไขข้อมูลสินค้า
    public function storeupdate($product_id)
    {
        if ($this->session->userdata('lang') == NULL) {
            $lang = "thailand";
            $this->session->set_userdata('lang', $lang);
        } else {
            $lang = $this->session->userdata('lang');
        }
        $this->lang->load($lang, $lang);
        $data['query'] = $this->product_model->read($product_id);
        //$data['query'] = $this->productcategory_model->show_productcategory();
        $data['queue_countUnit'] = $this->drugdetail_model->queue_countUnit();
        $data['query_meal'] = $this->drugdetail_model->queue_meal();
        $data['queue_fregquency'] = $this->drugdetail_model->queue_fregquency();
        $data['queue_callingUnits'] = $this->drugdetail_model->queue_callingUnits();
        $data['queue_suggestion'] = $this->drugdetail_model->queue_suggestion();
        $this->load->view('template/header');
        $this->load->view('manage/storeupdate', $data);
        $this->load->view('template/footer');
    }

    // แก้ไขข้อมูลสินค้า
    public function update_product()
    {
        $this->product_model->updateproduct();
        redirect('dashboard/productstore');
    }

    function fetch_subcategory()
    {
        if ($this->input->post('CategoryName')) {
            $data = $this->input->post('CategoryName');
            $query = $this->db->get_where('tbproductcategory', array('CLINICID' => $this->session->userdata("CLINICID"), 'CategoryName' => $data));
            $queryrow = $query->row();
            $data = $queryrow->CategoryID;
            $this->product_model->fetch_sub_re($data);
        } else {
            $data = $this->input->post('CategoryID');
            $this->product_model->fetch_sub($data);
        }
        
    }
}
