<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($data) {
        return $this->db->insert('data_akun', $data);
    }

    public function check_login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('data_akun');

        if ($query->num_rows() > 0) {
            return true;
        }

        return false;
    }

    public function get_user_info($email) {
        $this->db->select('nama, email, phone, gender, address, profile_image');
        $this->db->where('email', $email);
        $query = $this->db->get('data_akun');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }

        return false;
    }



    public function update_profile_image($email, $file_path) {
        $this->db->where('email', $email);
        return $this->db->update('data_akun', array('profile_image' => $file_path));
    }
    

    public function get_user_profil($email) {
        $query = $this->db->get_where('data_akun', array('email' => $email));
        return $query->row_array();
    }

    public function update_user($email, $data) {
        $this->db->where('email', $email);
        $this->db->update('data_akun', $data);
    }

    
}
?>
