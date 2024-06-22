<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_models extends CI_Model {

    // insert pesan dari sisi user
    public function pesan_proses($data) {
        return $this->db->insert('pesan', $data);
    }

    // ambil pesan untuk admin
    public function ambil_pesan() {
        $query = $this->db->get('pesan');
        return $query->result_array();
    }

    public function delete_pesan($id) {
        $this->db->where('id', $id);
        $this->db->delete('pesan');
    }
}