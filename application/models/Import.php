<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function importCSV() {
        $filename = $_FILES["file"]["tmp_name"];
        if (($file = fopen($filename, "r")) !== FALSE) {
            while (($Data = fgetcsv($file, 1024)) !== FALSE) {
                $data = array(
                    "ProductID" => $Data[0],
                    "ProID" => $Data[1],                    
                    "CommonName" => $Data[2],
                    "Barcode" => $Data[4],
                    "CategoryID" => $Data[5],
                    "SubID" => $Data[6],
                    "PregCat" => $Data[14],
                    "PriceBuy" => $Data[15],
                    "PriceSale" => $Data[16],
                    "Digit" => $Data[17],
                    "Unit" => $Data[18],
                    "SamaryAmount" => $Data[19],
                    "StoreID" => $Data[20],
                    "BrandName" => $Data[3],
                    "Indication" => $Data[7],
                    "CountUnit" => $Data[8],
                    "CallingUnit" => $Data[9],
                    "Frequency" => $Data[10],
                    "Meal" => $Data[11],
                    "Suggestion" => $Data[12],
                    "Duration" => $Data[13],
                    "CLINICID" => $Data[21]
                );                
                $import = $this->db->insert("tbproducts", $data);
                if (!$import) {
                    echo 'Error..';
                }
            }
            $message = $this->session->set_userdata('message','นำเข้าข้อมูลสำเร็จ');
            redirect('dashboard/import',$message);
            fclose($file);
        }
    }
}