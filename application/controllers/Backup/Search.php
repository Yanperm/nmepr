<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class search extends CI_Controller
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
        $this->load->model('income_report_model');
    }

    public function income_report()
    {
        $dayfrom = $this->input->get('dayfrom');
        $dayto = $this->input->get('dayto');
        $name = $this->input->get('name');
        $data['query'] = $this->income_report_model->search_income_report($dayfrom, $dayto, $name);
        $data['dayfrom'] = $dayfrom;
        $data['dayto'] = $dayto;
        $data['name'] = $name;
        $this->load->view('template/header');
        $this->load->view('manage/income_report', $data);
        $this->load->view('template/footer');
    }
}
