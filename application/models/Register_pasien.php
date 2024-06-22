<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_pasien extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    // register pasien baru
    public function register($data) {
        return $this->db->insert('pasien', $data);
    }

    public function insert_patient_registration($data) {
        return $this->db->insert('register_pasien', $data);
    }

    public function get_latest_registration() {
        $this->db->order_by('id', 'DESC');  
        $this->db->limit(1);                
        $query = $this->db->get('register_pasien');
        return $query->row_array();         
    }

    // Pasien lama
    public function get_patient_by_nik($nik) {
        $this->db->where('nik', $nik);
        $query = $this->db->get('pasien');
        return $query->result_array(); 
    }

    public function save_patient_data($data) {
        return $this->db->insert('register_pasien', $data);
    }

    public function get_patient_old($nik) {
        $this->db->where('nik', $nik);
        $query = $this->db->get('register_pasien');
        return $query->row_array();
    }
    


    public function insert_pasien($data) {
        $this->db->insert('pasien', $data);
    }


    
}

?>
