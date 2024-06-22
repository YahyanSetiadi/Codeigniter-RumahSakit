<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

    public function get_jadwal() {
        $query = $this->db->get('dokter');
        return $query->result_array(); 
    }

}
?>
