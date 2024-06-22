<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecordPasien_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_record_by_nik($nik) {
        $this->db->select('NIK, nama , tanggal, diagnosis, obat');
        $this->db->from('record_pasien');
        $this->db->where('NIK', $nik);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }

        return false;
    }
}
?>
