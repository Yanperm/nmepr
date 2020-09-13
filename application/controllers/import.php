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
                    "BrandName" => $Data[2],                    
                    "CommonName" => $Data[3],
                    "Barcode" => $Data[4],
                    "CategoryID" => $Data[5],
                    "SubID" => $Data[6],
                    "Indication" => $Data[7],
                    "CountUnit" => $Data[8],
                    "CallingUnit" => $Data[9],
                    "Frequency" => $Data[10],
                    "Meal" => $Data[11],
                    "Suggestion" => $Data[12],
                    "PregCat" => $Data[13],
                    "PriceBuy" => $Data[14],
                    "PriceSale" => $Data[15],
                    "Digit" => $Data[16],
                    "Unit" => $Data[17],
                    "SamaryAmount" => $Data[18],
                    "StoreID" => $Data[19],                    
                    "CLINICID" => $Data[20],
                    "Duration" => $Data[21]
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

    public function importMember() {
        $filename = $_FILES["file"]["tmp_name"];
        if (($file = fopen($filename, "r")) !== FALSE) {
            while (($Data = fgetcsv($file, 1024)) !== FALSE) {
                $data = array(
                    "MEMBERIDCARD" => $Data[0],
                    "IDCARD" => $Data[1],                    
                    "SET_NOTIFICATION" => $Data[2],
                    "OneSignalID" => $Data[3],
                    "CUSTOMERNAME" => $Data[4],
                    "BIRTHDAY" => $Data[5],
                    "LINEID" => $Data[6],
                    "EMAIL" => $Data[7],
                    "PASSWORD" => $Data[8],
                    "PHONE" => $Data[9],
                    "CHAN" => $Data[10],
                    "CLINICID" => $Data[11],
                    "ACTIVATE_STATUS" => $Data[12],
                    "email_verification_code" => $Data[13],
                    "verificationcode" => $Data[14],
                    "CREATE_DATE" => $Data[15]
                );                
                $import = $this->db->insert("tbmembers", $data);
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