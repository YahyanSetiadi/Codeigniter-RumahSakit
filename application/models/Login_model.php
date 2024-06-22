<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function verify_user($userName, $password)
    {
        $this->db->where('nama', $userName);
        $this->db->where('password', $password);
        $query = $this->db->get('data_akun');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
