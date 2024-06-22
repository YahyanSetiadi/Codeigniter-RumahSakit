<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // ambil data untuk tampilan dashboard
    public function get_total_pasien() {
        $query = $this->db->query('SELECT COUNT(*) as total_pasien FROM pasien');
        return $query->row()->total_pasien;
    }
    
    public function get_total_register() {
        $query = $this->db->query('SELECT COUNT(*) as total_register FROM register_pasien');
        return $query->row()->total_register;
    }

    public function get_total_record() {
        $query = $this->db->query('SELECT COUNT(*) as total_record FROM record_pasien');
        return $query->row()->total_record;
    }
    
    public function get_total_dokter() {
        $query = $this->db->query('SELECT COUNT(*) as total_dokter FROM dokter');
        return $query->row()->total_dokter;
    }
    public function get_total_pesan() {
        $query = $this->db->query('SELECT COUNT(*) as total_pesan FROM pesan');
        return $query->row()->total_pesan;
    }

    // kode untuk tabel pasien
    public function ambil_data_pasien() {
        $query = $this->db->get('pasien');
        return $query->result_array();
    }

    public function get_patient_by_nik($nik) {
        return $this->db->get_where('pasien', array('NIK' => $nik))->row_array();
    }

    public function update_patient($data, $nik) {
        $this->db->where('NIK', $nik);
        return $this->db->update('pasien', $data);
    }

    public function hapus_pasien($nik) {
        $this->db->where('NIK', $nik);
        return $this->db->delete('pasien');
    }

    // input Record Pasien
    public function insert_record($data) {
        return $this->db->insert('record_pasien', $data);
    }

    

    // ambil data record
    public function get_records() {
        $query = $this->db->get('record_pasien');
        return $query->result_array();
    }

    public function ambil_record($nik) {
        $this->db->where('NIK', $nik);
        $query = $this->db->get('record_pasien');
        return $query->row_array();
    }

    public function update_record($nik, $data) {
        $this->db->where('NIK', $nik);
        return $this->db->update('record_pasien', $data);
    }

    public function delete_record($nik) {
        $this->db->where('NIK', $nik);
        return $this->db->delete('record_pasien');
    }

    // dokter
    public function get_dokter() {
        $query = $this->db->get('dokter'); 
        return $query->result(); 
    }
    public function get_dokter_by_id($id) {
        $query = $this->db->get_where('dokter', array('id' => $id));
        return $query->row();
    }

    public function update_dokter($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('dokter', $data);
    }


    // ambil data register
    public function get_register() {
        $query = $this->db->get('register_pasien');
        
        return $query->result_array();
    }

    public function insertRegister($data) {
        $this->db->insert('register_pasien', $data);
    }

    public function updateRegister($NIK, $data) {
        $this->db->where('NIK', $NIK);
        $this->db->update('register_pasien', $data);
    }

    // Metode untuk menghapus data pasien
    public function deleteRegister($NIK) {
        $this->db->where('NIK', $NIK);
        $this->db->delete('register_pasien');
    }




}
?>
