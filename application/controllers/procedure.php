<?php

class Procedure extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('procedure_model');
    }

    public function create()
    {
        $clinicid = $this->session->userdata('CLINICID');
        $query = $this->db->query("SELECT ProcedureIDs from tbProcedure where CLINICID = '$clinicid' order by ProcedureIDs DESC limit 1");
        $queryrow = $query->row();
        $count = $query->num_rows();
        if ($count == '') {
            $number = "P0001";
        } else {
            $separate = substr($queryrow->ProcedureIDs, 1);
            $number = "P" . sprintf("%04d", ++$separate);
        }
        $data = array(
            "ProcedureID" => 'PRO' . time(),
            "ProcedureIDs" => $number,
            "ProcedureName" => $this->input->post('ProcedureName'),
            "ProcedurePrice" => $this->input->post('ProcedurePrice'),
            "CLINICID" => $this->session->userdata('CLINICID')
        );
        $this->procedure_model->insertprocedure($data);
        redirect('dashboard/procedure');
    }
    public function deleteprocedure($id)
    {
        $this->db->delete('tbProcedure', array('ProcedureID' => $id));
        redirect(base_url('dashboard/procedure'));
    }
    public function updateprocedure(){
        $id = $this->input->post('ProdecureID');
        $data = array(       
            "ProcedureName" => $this->input->post('ProcedureName'),
            "ProcedurePrice" => $this->input->post('ProcedurePrice')
        );   
        $this->db->update('tbProcedure', $data, array('ProcedureID' => $id));       
        redirect('dashboard/procedure');
    }
}
