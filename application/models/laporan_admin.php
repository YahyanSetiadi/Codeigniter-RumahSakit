<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_Admin extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function ambil_pasien() {
        $query = $this->db->get('pasien');
        return $query->result_array();
    }
    
    public function ambil_register() {
        $query = $this->db->get('register_pasien');
        return $query->result_array();
    }

    public function ambil_records() {
        $query = $this->db->get('record_pasien');
        return $query->result_array();
    }
}
?>