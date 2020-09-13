<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of procedure_model
 *
 * @author Partc
 */
class procedure_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function showprocedure() {
        $query = $this->db->get_where('tbProcedure', array('CLINICID' => $this->session->userdata('CLINICID')));
        return $query->result();
    }

    public function insertprocedure($data) {
        $this->db->insert('tbProcedure', $data);
    }

}
