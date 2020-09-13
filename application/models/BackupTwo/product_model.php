<?php

class product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Model เพิ่มข้อมูลสินค้าเข้าระบบ
    public function insert_product($data)
    {
        $this->db->insert('tbproducts', $data);
    }

    // ดึงข้อมูลมาโชว์หน้าแก้ไขสินค้า
    public function read($product_id)
    {
        $query = $this->db->get_where('tbproducts', array('ProductID' => $product_id));
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }

    public function updateproduct()
    {
        $data = array(
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
            "Suggestion" => $this->input->post('Suggestion')
        );

        $this->db->where('ProductID', $this->input->post('ProductID'));
        $this->db->update('tbproducts', $data);
    }

    function fetch_sub_re($data)
    {
        $this->db->where('CategoryID', $data);
        $this->db->order_by('SubName', 'ASC');
        $query = $this->db->get('tbsubcategory');
        $output = '<option value="">เลือกกลุ่มยารอง</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->SubName . '">' . $row->SubName . '</option>';
        }
        echo $output;
    }
    function fetch_sub($data)
    {
        $this->db->where('CategoryID', $data);
        $this->db->order_by('SubName', 'ASC');
        $query = $this->db->get('tbsubcategory');
        $output = '<option value="">เลือกกลุ่มยารอง</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->SubID . '">' . $row->SubName . '</option>';
        }
        echo $output;
    }
}
