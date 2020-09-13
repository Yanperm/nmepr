<?php

class Patient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('patient_model');
        $this->load->model('report_model');
    }

    public function createPatien()
    {
        $data = array(
            "PATIENT_ID" => 'PA' . time(),
            "IDCARD" => $this->input->post('IDCARD'),
            "PATIEN_NAMEPREFIX" => $this->input->post('PATIEN_NAMEPREFIX'),
            "PATIEN_NAME" => $this->input->post('PATIEN_NAME'),
            "PATIEN_BDAY" => $this->input->post('PATIEN_BDAY'),
            "PATIEN_ADDRESS" => $this->input->post('PATIEN_ADDRESS'),
            "PATIEN_EMAIL" => $this->input->post('PATIEN_EMAIL'),
            "PATIEN_PHONE" => $this->input->post('PATIEN_PHONE'),
            "PATIEN_LINEID" => $this->input->post('PATIEN_LINEID'),
            "PATIEN_DISEASE" => $this->input->post('PATIEN_DISEASE'),
            "PATIEN_DRUG_ALLERGY" => $this->input->post('PATIEN_DRUG_ALLERGY'),
            "PATIEN_DRUG_ALLERGY_DETAIL" => $this->input->post('PATIEN_DRUG_ALLERGY_DETAIL'),
            "PATIEN_NOTE" => $this->input->post('PATIEN_NOTE'),
            "PATIEN_EMERGENCY_CONTACT" => $this->input->post('PATIEN_EMERGENCY_CONTACT'),
            "PATIEN_EMERGENCY_PHONE" => $this->input->post('PATIEN_EMERGENCY_PHONE'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $IDCARD = $this->input->post('IDCARD');
        $query = $this->db->query("select IDCARD from tbpatients where IDCARD='$IDCARD'");
        if ($query->num_rows() == 0) {
            $this->patient_model->insertPatient($data);
            $this->session->set_userdata("message", "ทำประวัติคนไข้เรียบร้อยแล้ว");
            redirect(base_url('dashboard/record_information'));
        } else {
            $this->session->set_userdata("messages", "มีประวัติคนไข้ในระบบแล้ว");
            redirect(base_url('dashboard/record_information'));
        }
    }

    public function updatePatien()
    {
        $data = array(
            "IDCARD" => $this->input->post('IDCARD'),
            "PATIEN_NAMEPREFIX" => $this->input->post('PATIEN_NAMEPREFIX'),
            "PATIEN_NAME" => $this->input->post('PATIEN_NAME'),
            "PATIEN_BDAY" => $this->input->post('PATIEN_BDAY'),
            "PATIEN_ADDRESS" => $this->input->post('PATIEN_ADDRESS'),
            "PATIEN_EMAIL" => $this->input->post('PATIEN_EMAIL'),
            "PATIEN_PHONE" => $this->input->post('PATIEN_PHONE'),
            "PATIEN_LINEID" => $this->input->post('PATIEN_LINEID'),
            "PATIEN_DISEASE" => $this->input->post('PATIEN_DISEASE'),
            "PATIEN_DRUG_ALLERGY" => $this->input->post('PATIEN_DRUG_ALLERGY'),
            "PATIEN_DRUG_ALLERGY_DETAIL" => $this->input->post('PATIEN_DRUG_ALLERGY_DETAIL'),
            "PATIEN_NOTE" => $this->input->post('PATIEN_NOTE'),
            "PATIEN_EMERGENCY_CONTACT" => $this->input->post('PATIEN_EMERGENCY_CONTACT'),
            "PATIEN_EMERGENCY_PHONE" => $this->input->post('PATIEN_EMERGENCY_PHONE'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->db->where('IDCARD', $this->input->post('IDCARD'));
        $this->db->update('tbpatients', $data);
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        $this->session->set_userdata("message", "อัปเดตประวัติคนไข้แล้ว");
        redirect(base_url('dashboard/record_information'));
    }

    public function record_patienr()
    {
        date_default_timezone_set("Asia/Bangkok");
        $y = date("Y");
        $day = date("$y-m-d");
        $data = array(
            "PHID" => 'PH' . time(),
            "IDCARD" => $this->input->post('IDCARD'),
            "PH1" => $this->input->post('PH1'),
            "PH2" => $this->input->post('PH2'),
            "PH3" => $this->input->post('PH3'),
            "PH4" => $this->input->post('PH4'),
            "PH5" => $this->input->post('PH5'),
            "BOOKINGID" => $this->session->userdata('bookingid'),
            "CREATE" => $day
        );
        $this->patient_model->insertHistory($data);
        redirect(base_url('dashboard/record_patienr'));
    }

    public function updatePatienHistory()
    {
        $bookingid = $this->session->userdata('bookingid');
        $data = array(
            "PH1" => $this->input->post('PH1'),
            "PH2" => $this->input->post('PH2'),
            "PH3" => $this->input->post('PH3'),
            "PH4" => $this->input->post('PH4'),
            "PH5" => $this->input->post('PH5')
        );
        $this->db->where('BOOKINGID', $bookingid);
        $this->db->update('tbpatient_history', $data);
        redirect(base_url('dashboard/record_patienr'));
    }

    public function patient_medical()
    {
        date_default_timezone_set("Asia/Bangkok");
        $y = date("Y");
        $day = date("$y-m-d");
        $data = array(
            "MEDICALID" => 'MI' . time(),
            "IDCARD" => $this->input->post('IDCARD'),
            "PH1" => $this->input->post('PH1'),
            "PH2" => $this->input->post('PH2'),
            "PH3" => $this->input->post('PH3'),
            "PH4" => $this->input->post('PH4'),
            "PH5" => $this->input->post('PH5'),
            "PH6" => $this->input->post('PH6'),
            "PH7" => $this->input->post('PH7'),
            "PH8" => $this->input->post('PH8'),
            "PH9" => $this->input->post('PH9'),
            "COMMENT" => $this->input->post('COMMENT'),
            "Number" => $this->input->post('Number'),
            "Unit" => $this->input->post('Unit'),
            "PregCat" => $this->input->post('PregCat'),
            "Barcode" => $this->input->post('Barcode'),
            "FKID" => 'FK' . time(),
            "BOOKINGID" => $this->session->userdata('bookingid'),
            "CREATE" => $day
        );
        $this->patient_model->insertMedical($data);
        redirect(base_url('dashboard/record_medical'));
    }

    public function patient_updatemedical()
    {
        $data = array(
            "IDCARD" => $this->input->post('IDCARD'),
            "PH1" => $this->input->post('PH1'),
            "PH2" => $this->input->post('PH2'),
            "PH3" => $this->input->post('PH3'),
            "PH4" => $this->input->post('PH4'),
            "PH5" => $this->input->post('PH5'),
            "PH6" => $this->input->post('PH6'),
            "PH7" => $this->input->post('PH7'),
            "PH8" => $this->input->post('PH8'),
            "PH9" => $this->input->post('PH9'),
            "COMMENT" => $this->input->post('COMMENT'),
            "Number" => $this->input->post('Number'),
            "Unit" => $this->input->post('Unit'),
            "BOOKINGID" => $this->session->userdata('bookingid')
        );
        $this->db->where('BOOKINGID', $this->session->userdata('bookingid'));
        $this->db->where('MEDICALID', $this->input->post('MEDICALID'));
        $this->db->update('tbpatient_medical', $data);
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        redirect(base_url('dashboard/record_medical'));
    }

    public function patient_lab()
    {
        for ($i = 0; $i < count($_POST['foo']); $i++) {
            $number = $_POST['foo'][$i];
            $data = array(
                "LBID" => 'LB' . time() . $i,
                "IDCARD" => $this->session->userdata('patientid'),
                "PH1" => $_POST['PH1' . $number],
                "PH2" => $_POST['PH2' . $number],
                "PH3" => $_POST['PH3' . $number],
                "PH4" => $_POST['PH4' . $number],
                "BOOKINGID" => $this->session->userdata('bookingid')
            );
            $this->patient_model->insertLab($data);
        }
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        redirect(base_url('dashboard/record_lab'));
    }

    public function patient_procedure()
    {
        for ($i = 0; $i < count($_POST['foo']); $i++) {
            $number = $_POST['foo'][$i];
            date_default_timezone_set("Asia/Bangkok");
            $y = date("Y");
            $day = date("$y-m-d");
            $data = array(
                "PROID" => 'PRO' . time() . $i,
                "IDCARD" => $_POST['IDCARD' . $number],
                "PH1" => $_POST['ProcedureID' . $number],
                "PH2" => $_POST['ProcedureName' . $number],
                "PH3" => $_POST['ProcedurePrice' . $number],
                "BOOKINGID" => $this->session->userdata('bookingid'),
                "CREATE" => $day
            );
            $this->patient_model->insertProcedure($data);
        }
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        redirect(base_url('dashboard/record_procedure'));
    }

    public function patient_Sick()
    {
        date_default_timezone_set("Asia/Bangkok");
        $y = date("Y");
        $day = date("$y-m-d");
        $data = array(
            "SickID" => 'SK' . time(),
            "IDCARD" => $this->session->userdata('patientid'),
            "Dayoff" => $this->input->post('Dayoff'),
            "Startdate" => $this->input->post('Startdate'),
            "Enddate" => $this->input->post('Enddate'),
            "Recommendation" => $this->input->post('Recommendation'),
            "Price" => $this->input->post('Price'),
            "BOOKINGID" => $this->session->userdata('bookingid'),
            "CREATE" => $day
        );
        $this->patient_model->insertSick($data);
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        redirect(base_url('dashboard/record_certification'));
    }

    public function patient_UpdateSick()
    {
        $data = array(
            "Dayoff" => $this->input->post('Dayoff'),
            "Startdate" => $this->input->post('Startdate'),
            "Enddate" => $this->input->post('Enddate'),
            "Recommendation" => $this->input->post('Recommendation'),
            "Price" => $this->input->post('Price'),
        );
        $this->db->where('SickID', $this->input->post('SickID'));
        $this->db->update('tbpatient_sick', $data);
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        redirect(base_url('dashboard/record_certification'));
    }

    public function patient_Job()
    {
        date_default_timezone_set("Asia/Bangkok");
        $y = date("Y");
        $day = date("$y-m-d");
        $data = array(
            "JobID" => 'JB' . time(),
            "IDCARD" => $this->session->userdata('patientid'),
            "Diseases" => $this->input->post('Diseases'),
            "DiseasesDetail" => $this->input->post('DiseasesDetail'),
            "Accident" => $this->input->post('Accident'),
            "AccidentDetail" => $this->input->post('AccidentDetail'),
            "Hospital" => $this->input->post('Hospital'),
            "HospitalDetail" => $this->input->post('HospitalDetail'),
            "Others" => $this->input->post('Others'),
            "OthersDetail" => $this->input->post('OthersDetail'),
            "BodyHealth" => $this->input->post('BodyHealth'),
            "BodyHealthDetail" => $this->input->post('BodyHealthDetail'),
            "OtherSymptoms" => $this->input->post('OtherSymptoms'),
            "Recommendation" => $this->input->post('Recommendation'),
            "Price" => $this->input->post('Price'),
            "BOOKINGID" => $this->session->userdata('bookingid'),
            "CREATE" => $day
        );
        $this->patient_model->insertJob($data);
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        redirect(base_url('dashboard/record_certification'));
    }

    public function patient_UpdateJob()
    {
        $data = array(
            "Diseases" => $this->input->post('Diseases'),
            "DiseasesDetail" => $this->input->post('DiseasesDetail'),
            "Accident" => $this->input->post('Accident'),
            "AccidentDetail" => $this->input->post('AccidentDetail'),
            "Hospital" => $this->input->post('Hospital'),
            "HospitalDetail" => $this->input->post('HospitalDetail'),
            "Others" => $this->input->post('Others'),
            "OthersDetail" => $this->input->post('OthersDetail'),
            "BodyHealth" => $this->input->post('BodyHealth'),
            "BodyHealthDetail" => $this->input->post('BodyHealthDetail'),
            "OtherSymptoms" => $this->input->post('OtherSymptoms'),
            "Recommendation" => $this->input->post('Recommendation'),
            "Price" => $this->input->post('Price'),
        );
        $this->db->where('JobID', $this->input->post('JobID'));
        $this->db->update('tbpatient_job', $data);
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        redirect(base_url('dashboard/record_certification'));
    }

    public function patient_delete($hisid)
    {
        $this->db->delete('tbpatient_history', array('PHID' => $hisid));
        redirect(base_url('dashboard/record_patienr'));
    }

    public function patient_medicaldelete($hisid)
    {
        $this->db->delete('tbpatient_medical', array('MEDICALID' => $hisid));
        $id = $this->session->userdata('patientid');
        $ids = $this->session->userdata('bookingid');
        redirect(base_url('dashboard/record_medical/' . $id . '/' . $ids));
    }

    public function patient_labdelete($hisid)
    {
        $this->db->delete('tbpatient_lab', array('LBID' => $hisid));
        redirect(base_url('dashboard/record_lab/'));
    }

    public function patient_proceduredelete($hisid)
    {
        $this->db->delete('tbpatient_procedure', array('PROID' => $hisid));
        redirect(base_url('dashboard/record_procedure/'));
    }

    public function select_edit_job()
    {
        $data = $this->input->post('jobid');
        $this->patient_model->select_edit_job($data);
    }

    public function finish_case($idp, $idb)
    {
        $updateproduct = $this->db->get_where('tbpatient_medical', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        $show = $updateproduct->row();
        echo $midicalshow = $show->Barcode;
        echo '<br>';
        echo 'สั่งจ่าย '.$midicalshows = $show->Number;
        $product = $this->db->get_where('tbproducts', array('Barcode' => $midicalshow));
        $showstock = $product->row();
        $stock = $showstock->Digit;
        $store = $stock -= $midicalshows;
        echo '<br>';
        echo 'มีในคลัง '.$stock;
        echo '<br>';
        echo 'คงเหลือ'.$store;
        $query = $this->db->get_where('tbpatient_medical', array('IDCARD' => $idp, 'BOOKINGID' => $idb));
        if ($query->num_rows() > 0) {
            $medical = array(
                "dispense" => "1",
            );
            $this->db->where('IDCARD', $idp);
            $this->db->where('BOOKINGID', $idb);
            $this->db->update('tbbooking', $medical);
        }
        $data = array(
            "payment" => "1",
        );
        $Status = array(
            "Status" => "1",
        );
        $this->db->where('IDCARD', $idp);
        $this->db->where('BOOKINGID', $idb);
        $this->db->update('tbbooking', $data);
      
        $datastore = array(
            "Digit" => $store,
        );
        $this->db->where('Barcode', $midicalshow);
        $this->db->update('tbproducts', $datastore);
        
        $this->db->update('tbpatient_history', $Status);
        $this->db->update('tbpatient_medical', $Status);
        $this->db->update('tbpatient_lab', $Status);
        $this->db->update('tbpatient_procedure', $Status);
        $this->db->update('tbpatient_job', $Status);
        $this->db->update('tbpatient_sick', $Status);
        $this->db->update('tbpatient_health', $Status);

        redirect(base_url('dashboard/callques/'));
    }

    public function make_payment()
    {
        $clinicid = $this->session->userdata('CLINICID');
        $data_IC = array(
            'ci_id' => 'CI' . time(),
            'ci_queue' => $this->input->post('ci_queue'),
            'ci_order' => $this->input->post('ci_order'),
            'ci_date' => $this->input->post('ci_date'),
            'ci_nameprefix' => $this->input->post('ci_nameprefix'),
            'ci_name' => $this->input->post('ci_name'),
            'ci_check' => $this->input->post('ci_check'),
            'ci_drug' => $this->input->post('ci_drug'),
            'ci_lab' => $this->input->post('ci_lab'),
            'ci_procedure' => $this->input->post('ci_procedure'),
            'ci_certificate' => $this->input->post('ci_certificate'),
            'IDCARD' => $this->input->post('patientid'),
            'CLINICID' => $clinicid
        );
        $this->db->insert('tbincome', $data_IC);
        // ---------------------------------------------------------------------------------
        $idp = $this->input->post('patientid');
        $idb = $this->input->post('bookingid');
        $data = array(
            "payment" => "2",
        );

        $this->db->where('IDCARD', $idp);
        $this->db->where('BOOKINGID', $idb);
        $this->db->update('tbbooking', $data);

        redirect(base_url('dashboard/callques/'));
        
        /* $data['userinfo'] = $this->report_model->userinfo();
        $data['patients'] = $this->report_model->patients($idp);
        $data['BOOKINGID'] = $idb;
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun',
            'format' => [100, 200]
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $html = $this->load->view('report/report_invoice', $data, true);     
        $mpdf->WriteHTML($html);
        $mpdf->SetJS('this.print();');
        $mpdf->Output(); */
        
        
    }

    public function preparation($idp, $idb)
    {
        $data = array(
            "dispense" => "2",
        );
        $this->db->where('IDCARD', $idp);
        $this->db->where('BOOKINGID', $idb);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/callques/'));
    }

    public function dispense($idp, $idb)
    {
        $data = array(
            "dispense" => "3",
        );
        $this->db->where('IDCARD', $idp);
        $this->db->where('BOOKINGID', $idb);
        $this->db->update('tbbooking', $data);
        redirect(base_url('dashboard/callques/'));
    }

    public function insert_health()
    {
        date_default_timezone_set("Asia/Bangkok");
        $day = date("Y-m-d");
        $data = array(
            'PHID' => 'PH' . time(),
            'DATE_CREATE' => $day,
            'Wieght' => $this->input->post('Wieght'),
            'Height' => $this->input->post('Height'),
            'BMI' => $this->input->post('BMI'),
            'BodyTemp' => $this->input->post('BodyTemp'),
            'BP' => $this->input->post('BP'),
            'HR' => $this->input->post('HR'),
            'FBS' => $this->input->post('FBS'),
            'IDCARD' => $this->input->post('IDCARD'),
            'BOOKINGID' => $this->session->userdata('bookingid')
        );
        // $this->db->insert('tbpatient_health', $data);
        if ($this->db->insert('tbpatient_health', $data)) {
            $this->session->set_userdata("success", "บันทึกข้อมูลสำเร็จ");
        } else {
            $this->session->set_userdata("danger", "บันทึกข้อมูลผิดพลาด");
        }
        redirect(base_url('dashboard/record_health'));
    }

    public function patient_jobcerdelete($jobid)
    {
        $this->db->delete('tbpatient_job', array('JobID' => $jobid));
        redirect(base_url('dashboard/record_certification/'));
    }

    public function patient_sickcerdelete($sickid)
    {
        $this->db->delete('tbpatient_job', array('SickID' => $sickid));
        redirect(base_url('dashboard/record_certification/'));
    }
}
