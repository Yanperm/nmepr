<?php

class report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('lang') == NULL) {
            $lang = "thailand";
            $this->session->set_userdata('lang', $lang);
        } else {
            $lang = $this->session->userdata('lang');
        }
        $this->lang->load($lang, $lang);
        $this->load->model('report_model');
    }
    public function report1()
    {
        $this->load->view('template/header');
        $this->load->view('report/report1');
        $this->load->view('template/footer');
    }
    public function report2()
    {
        $this->load->view('template/header');
        $this->load->view('report/report2');
        $this->load->view('template/footer');
    }
    public function report3()
    {
        $this->load->view('template/header');
        $this->load->view('report/report3');
        $this->load->view('template/footer');
    }
    public function report4()
    {
        $this->load->view('template/header');
        $this->load->view('report/report4');
        $this->load->view('template/footer');
    }

    public function report_prescription($idp, $idb)
    {
        //
        $data['userinfo'] = $this->report_model->userinfo();
        $data['patients'] = $this->report_model->patients($idp);
        $data['orders'] = $this->report_model->Prescription($idp, $idb);
        $data['BOOKINGID'] = $idb;

        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'default_font_size' => 16,
            'default_font' => 'sarabun',
            'format' => 'A4-L'
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $mpdf->SetDocTemplate('application/views/report/MyPDF/Prescription.pdf', true);
        $html = $this->load->view('report/report_prescription', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function report_druglabel($idp, $idb, $idm)
    {
        //
        $data['userinfo'] = $this->report_model->userinfo();
        $data['drug'] = $this->report_model->show_drug($idp, $idb, $idm);
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => [100, 75],
            'default_font_size' => 16,
            'default_font' => 'sarabun'
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $html = $this->load->view('report/report_druglabel', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function report_lab($idp, $idb)
    {
        $data['userinfo'] = $this->report_model->userinfo();
        $data['patients'] = $this->report_model->patients($idp);
        $data['BOOKINGID'] = $idb;
        $data['lab'] = $this->report_model->show_lab($idp, $idb);
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun'
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $html = $this->load->view('report/report_lab', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function report_job($idp, $idb)
    {
        $data['userinfo'] = $this->report_model->userinfo();
        $data['patients'] = $this->report_model->patients($idp);
        $data['health'] = $this->report_model->health($idb);
        $data['count'] = $this->report_model->show_count_job();
        $data['job'] = $this->report_model->show_job($idp, $idb);
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun',
            'format' => 'A4'
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $mpdf->SetDocTemplate('application/views/report/MyPDF/Medical_Certificate_TH.pdf', true);
        $html = $this->load->view('report/report_job', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function report_job_en($idp, $idb)
    {
        $data['userinfo'] = $this->report_model->userinfo();
        $data['patients'] = $this->report_model->patients($idp);
        $data['health'] = $this->report_model->health($idb);
        $data['count'] = $this->report_model->show_count_job();
        $data['job'] = $this->report_model->show_job($idp, $idb);
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun',
            'format' => 'A4'
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $mpdf->SetDocTemplate('application/views/report/MyPDF/Medical_Certificate_EN.pdf', true);
        $html = $this->load->view('report/report_job_en', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function report_sick($idp, $idb)
    {
        $data['userinfo'] = $this->report_model->userinfo();
        $data['patients'] = $this->report_model->patients($idp);
        $data['BOOKINGID'] = $idb;
        $data['patienr'] = $this->report_model->have_patienr($idp, $idb);
        $data['medical'] = $this->report_model->have_medical($idp, $idb);
        $data['lab'] = $this->report_model->have_lab($idp, $idb);
        $data['procedure'] = $this->report_model->have_procedure($idp, $idb);
        $data['sick'] = $this->report_model->show_sick($idp, $idb);
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun',
            'format' => 'A4'
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $mpdf->SetDocTemplate('application/views/report/MyPDF/eMedCer.pdf', true);
        $html = $this->load->view('report/report_sick', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function report_income($dayfrom, $dayto, $name)
    {
        $data['userinfo'] = $this->report_model->userinfo();
        $data['dayfrom'] = $dayfrom;
        $data['dayto'] = $dayto;
        $data['name'] = urldecode($name);
        $data['income'] = $this->report_model->income($dayfrom, $dayto, $name);
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun',
            'format' => 'A4'
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $html = $this->load->view('report/report_income', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function report_payment($idp, $idb)
    {
        $data['userinfo'] = $this->report_model->userinfo();
        $data['patients'] = $this->report_model->patients($idp);
        $data['BOOKINGID'] = $idb;
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun'
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $html = $this->load->view('report/report_payment', $data, true);     
        $mpdf->WriteHTML($html);
        $mpdf->SetJS('this.print();');
        $mpdf->Output();
    }

    public function report_invoice($idp, $idb)
    {
        $data['userinfo'] = $this->report_model->userinfo();
        $data['patients'] = $this->report_model->patients($idp);
        $data['BOOKINGID'] = $idb;
        require_once(APPPATH . '../vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun',
            'format' => [100, 145]
        ]);
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->normalLineheight = 1;
        $html = $this->load->view('report/report_invoice', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->SetJS('this.print();');
        $mpdf->Output();
    }
}
