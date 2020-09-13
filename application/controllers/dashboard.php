<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->model('profile_model');
        $this->load->model('product_model');
        $this->load->model('productcategory_model');
        $this->load->model('storelist_model');
        $this->load->model('patiendatabase_model');
        $this->load->model('procedure_model');
        $this->load->model('phamarcy_model');
        $this->load->model('lab_model');
        $this->load->model('department_model');
        $this->load->model('senddepartment_model');
        $this->load->model('labcompany_model');
        $this->load->model('subcategory_model');
        $this->load->model('income_report_model');
        $this->load->model('dashboard_model');
        $this->load->model('drugdetail_model'); 

        $user = $this->session->all_userdata();
        if ($this->session->userdata('CLINICID') == '') {
            redirect(base_url('login'));
        }
    }

    public function import()
    {
        $this->load->view('template/header');
        $this->load->view('manage/import');
        $this->load->view('template/footer');
    }

    public function detailmeal()
    {
        $data['query'] = $this->drugdetail_model->queue_meal();
        $this->load->view('template/header');
        $this->load->view('manage/detailmeal',$data);
        $this->load->view('template/footer');
    }

    public function index()
    {
        $data['queue_today'] = $this->dashboard_model->queue_today();
        $data['sales_today'] = $this->dashboard_model->sales_today();
        $data['queue_year'] = $this->dashboard_model->queue_year();
        $data['sales_year'] = $this->dashboard_model->sales_year();
        $data['sales_year'] = $this->dashboard_model->sales_year();
        $data['sales_last_year'] = $this->dashboard_model->sales_last_year();
        $data['sales_this_year'] = $this->dashboard_model->sales_this_year();
        $data['services'] = $this->dashboard_model->services();
        $this->load->view('template/header');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }

    public function print_labs()
    {
        $this->load->view('manage/print_labs');
    }

    public function wait_accept()
    {
        $this->load->view('wait_accept');
    }

    public function onboard()
    {
        $this->load->view('manage/onboard');
    }

    public function wait_phamacy()
    {
        $this->load->view('wait_phamacy');
    }

    public function change($lang)
    {
        $this->session->set_userdata('lang', $lang);
        redirect($this->router->class, 'refresh');
    }

    public function profile()
    {
        $data['query'] = $this->Profile_model->show_profile();
        $this->load->view('template/header');
        $this->load->view('manage/profile', $data);
        $this->load->view('template/footer');
    }

    public function store()
    {
        $data['query'] = $this->productcategory_model->show_productcategory();
        $data['queue_countUnit'] = $this->drugdetail_model->queue_countUnit();
        $data['query_meal'] = $this->drugdetail_model->queue_meal();
        $data['queue_fregquency'] = $this->drugdetail_model->queue_fregquency();
        $data['queue_callingUnits'] = $this->drugdetail_model->queue_callingUnits();
        $data['queue_suggestion'] = $this->drugdetail_model->queue_suggestion();
        $this->load->view('template/header');
        $this->load->view('manage/store', $data);
        $this->load->view('template/footer');
    }

    public function pos()
    {
        $this->load->view('template/header');
        $this->load->view('manage/pos');
        $this->load->view('template/footer');
    }

    public function productcategory()
    {
        $data['query'] = $this->productcategory_model->show_productcategory();
        $this->load->view('template/header');
        $this->load->view('manage/productcategory', $data);
        $this->load->view('template/footer');
    }

    public function productstore()
    {
        $data['query'] = $this->storelist_model->show_storelist();
        $this->load->view('template/header');
        $this->load->view('manage/storelist', $data);
        $this->load->view('template/footer');
    }

    public function booking()
    {
        $this->load->view('template/header');
        $this->load->view('manage/booking');
        $this->load->view('template/footer');
    }

    public function appointment()
    {
        $this->load->view('template/header');
        $this->load->view('manage/appointment');
        $this->load->view('template/footer');
    }

    public function waitcheckin()
    {
        $this->load->view('template/header');
        $this->load->view('manage/waitcheckin');
        $this->load->view('template/footer');
    }

    public function patiendatabase()
    {
        $data['query'] = $this->patiendatabase_model->show_patiendatabase();
        $this->load->view('template/header');
        $this->load->view('manage/patiendatabase', $data);
        $this->load->view('template/footer');
    }

    public function setting()
    {
        $this->load->view('template/header');
        $this->load->view('manage/setting');
        $this->load->view('template/footer');
    }

    public function callques()
    {
        $this->load->view('template/header');
        $this->load->view('manage/questoday');
        $this->load->view('template/footer');
    }

    public function loadquestoday()
    {
        $this->load->view('template/header');
        $this->load->view('manage/loadquestoday');
        $this->load->view('template/footer');
    }

    public function record_historys($id, $idc)
    {
        $this->session->set_userdata('patientid', $id);
        $this->session->set_userdata('bookingid', $idc);
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 1;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_historys');
        $this->load->view('template/footer');
    }

    public function record_information()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 2;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_information');
        $this->load->view('template/footer');
    }

    public function record_health()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 2;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_health');
        $this->load->view('template/footer');
    }

    public function record_health_history()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 2;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_health_history');
        $this->load->view('template/footer');
    }

    public function record_patienr()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_patienr');
        $this->load->view('template/footer');
    }

    public function record_patienr_history()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_patienr_history');
        $this->load->view('template/footer');
    }

    public function record_medical()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_medical');
        $this->load->view('template/footer');
    }

    public function record_medical_history()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_medical_history');
        $this->load->view('template/footer');
    }

    public function record_lab()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_lab');
        $this->load->view('template/footer');
    }

    public function record_lab_history()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_lab_history');
        $this->load->view('template/footer');
    }

    public function record_procedure()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_procedure');
        $this->load->view('template/footer');
    }

    public function record_procedure_history()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_procedure_history');
        $this->load->view('template/footer');
    }

    public function record_certification()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_certification');
        $this->load->view('template/footer');
    }

    public function record_certification_history()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_certification_history');
        $this->load->view('template/footer');
    }

    public function record_sumary()
    {
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 3;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_sumary');
        $this->load->view('template/footer');
    }

    public function record_drug($idp, $idb)
    {
        $data['patientid'] = $this->session->set_userdata('patientid', $idp);
        $data['bookingid'] = $this->session->set_userdata('bookingid', $idb);
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 4;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_drug');
        $this->load->view('template/footer');
    }

    public function record_cost($idp, $idb)
    {
        $data['patientid'] = $this->session->set_userdata('patientid', $idp);
        $data['bookingid'] = $this->session->set_userdata('bookingid', $idb);
        $data['patientid'] = $this->session->userdata('patientid');
        $data['bookingid'] = $this->session->userdata('bookingid');
        $data['page'] = 5;
        $this->load->view('template/header');
        $this->load->view('manage/patientprofilehead', $data);
        $this->load->view('manage/record_cost');
        $this->load->view('template/footer');
    }

    public function phamarcy()
    {
        $data['query'] = $this->phamarcy_model->show_phamarcy();
        $this->load->view('template/header');
        $this->load->view('manage/phamarcy', $data);
        $this->load->view('template/footer');
    }

    public function procedure()
    {
        $data['query'] = $this->procedure_model->showprocedure();
        $this->load->view('template/header');
        $this->load->view('manage/procedure', $data);
        $this->load->view('template/footer');
    }

    public function lab()
    {
        $data['query'] = $this->lab_model->show_lab();
        $this->load->view('template/header');
        $this->load->view('manage/lab', $data);
        $this->load->view('template/footer');
    }

    public function department()
    {
        $data['query'] = $this->department_model->show_department();
        $this->load->view('template/header');
        $this->load->view('manage/department', $data);
        $this->load->view('template/footer');
    }

    public function senddepartment()
    {
        $data['query'] = $this->senddepartment_model->show_senddepartment();
        $this->load->view('template/header');
        $this->load->view('manage/senddepartment', $data);
        $this->load->view('template/footer');
    }

    public function labcompany()
    {
        $data['query'] = $this->labcompany_model->show_labcompany();
        $this->load->view('template/header');
        $this->load->view('manage/labcompany', $data);
        $this->load->view('template/footer');
    }

    public function subcategory()
    {
        $data['query'] = $this->subcategory_model->show_subcategory();
        $this->load->view('template/header');
        $this->load->view('manage/subcategory', $data);
        $this->load->view('template/footer');
    }

    public function income_report()
    {
        date_default_timezone_set('Asia/Bangkok');
        $day = date("Y-m-d");
        $dayfrom = $day;
        $dayto = $day;
        $name = '';
        $data['query'] = $this->income_report_model->show_income_report($dayfrom, $dayto);
        $data['dayfrom'] = $dayfrom;
        $data['dayto'] = $dayto;
        $data['name'] = $name;
        $this->load->view('template/header');
        $this->load->view('manage/income_report', $data);
        $this->load->view('template/footer');
    }
}
