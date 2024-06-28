<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');  
        $this->load->model('Login_model');  
        $this->load->model('Pesan_models');  
        $this->load->model('Register_pasien'); 
        $this->load->model('laporan_Admin');
        $this->load->library('form_validation'); 
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));

        // Memeriksa apakah user sudah login
        if (!$this->session->userdata('userName') && $this->router->fetch_method() != 'index' && $this->router->fetch_method() != 'proses_login') {
            redirect('admin');
        }
    }

    public function index() {
        $this->load->view('admin/login');
    }

    // login dan logout
    public function proses_login() {
          
        // Set validation rules
        $this->form_validation->set_rules('userName', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
            $this->load->view('login', $data);
        } else {
            // Validation 
            $userName = $this->input->post('userName', true);
            $password = $this->input->post('password', true);
    
            if ($this->Login_model->verify_user($userName, $password)) {
                $this->session->set_userdata('userName', $userName);
                redirect('admin/dashboard');
            } else {
                // Login gagal, balik ke login
                $data['error'] = 'Invalid username or password. Please try again.';
                $this->load->view('admin/login', $data);
            }
        }
    }
    

    public function logout() {
        $this->session->unset_userdata('userName');
        redirect('admin');
    }

    public function dashboard() {
        $data['total_pasien'] = $this->Admin_model->get_total_pasien();
        $data['total_register'] = $this->Admin_model->get_total_register();
        $data['total_record'] = $this->Admin_model->get_total_record();
        $data['total_dokter'] = $this->Admin_model->get_total_dokter();
        $data['total_pesan'] = $this->Admin_model->get_total_pesan();
        
        $this->load->view('admin/index', $data);
    }

    // tabel pasien

    public function pasien() {
        $data['patients'] = $this->Admin_model->ambil_data_pasien();
        $this->load->view('Admin/pasien', $data);
    }

    public function add_pasien()
    {
        // Ambil data dari form
        $data = [
            'NIK' => $this->input->post('nik'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat')
        ];

        // Simpan data ke database 
        $this->Register_pasien->insert_pasien($data);

        // Redirect atau set flashdata 
        $this->session->set_flashdata('success', 'Data pasien berhasil ditambahkan.');

        // Redirect 
        redirect('Admin/pasien');
    }
    
    public function edit_pasien($nik = NULL) {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = array(
                'nama_pasien' => $this->input->post('nama_pasien'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat')
            );

            if ($this->Admin_model->update_patient($data, $this->input->post('nik'))) {
                $this->session->set_flashdata('success', 'Data updated successfully!');
                redirect('Admin/pasien');
            } else {
                echo "Failed to edit data.";
            }
        } else {
            $data['patient'] = $this->Admin_model->get_patient_by_nik($nik);
            if (empty($data['patient'])) {
                echo "Data not found.";
            } else {
                $this->load->view('admin/edit_pasien', $data);
            }
        }
    }
    public function delete($nik) {
        $this->Admin_model->hapus_pasien($nik);
        $this->session->set_flashdata('success', 'Data has been successfully deleted!');
        redirect('Admin/pasien');
    }

    // input Record pasien
    public function inputRecord() {
        $this->load->view('Admin/inputRecord.php');
    }
    
    public function proses_inputR() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('NIK', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('tanggal', 'Reservation Date', 'required');
        $this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
        $this->form_validation->set_rules('obat', 'Medicine', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('inputRecord');
        } else {
            $data = array(
                'NIK' => $this->input->post('NIK'),
                'nama' => $this->input->post('nama'),
                'tanggal' => $this->input->post('tanggal'),
                'diagnosis' => $this->input->post('diagnosis'),
                'obat' => $this->input->post('obat')
            );

            if ($this->Admin_model->insert_record($data)) {
                $this->session->set_flashdata('success', 'Record added successfully.');
                redirect('Admin/dataRecord');
            } else {
                $this->session->set_flashdata('error', 'Failed to add record.');
                $this->load->view('inputRecord');
            }
        }
    }

    // tabel resgister pasien 
    public function registerPatient() {  
        $data['dataRegister'] = $this->Admin_model->get_register();
        $this->load->view('admin/registerPatient', $data);
    }

    public function addRegister() {
        $data = array(
            'NIK' => $this->input->post('NIK'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'tanggal' => $this->input->post('tanggal'),
            'poli' => $this->input->post('poli')
        );

        $this->load->model('Admin_model');
        $this->Admin_model->insertRegister($data);

        redirect('admin/registerPatient');
    }

    public function editRegister() {
        $NIK = $this->input->post('NIK');
        $data = array(
            'nama_pasien' => $this->input->post('nama_pasien'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'tanggal' => $this->input->post('tanggal'),
            'poli' => $this->input->post('poli')
        );

        $this->load->model('Admin_model');
        $this->Admin_model->updateRegister($NIK, $data);

        redirect('admin/registerPatient');
    }

    // Metode untuk menghapus data pasien
    public function deleteRegister($NIK) {
        $this->load->model('Admin_model');
        $this->Admin_model->deleteRegister($NIK);

        redirect('admin/registerPatient');
    }


    // data record 
    public function dataRecord() {
        $data['records'] = $this->Admin_model->get_records();
        $this->load->view('admin/dataRecord', $data);
    }

    public function edit_record($nik) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = array(
                'nama' => $this->input->post('nama_pasien'), 
                'tanggal' => $this->input->post('tanggal'), 
                'diagnosis' => $this->input->post('diagnosis'), 
                'obat' => $this->input->post('obat') 
            );

            if ($this->Admin_model->update_record($nik, $data)) {
                $this->session->set_flashdata('success_message', 'Record updated successfully!');
                redirect('Admin/dataRecord');
            } else {
                $this->session->set_flashdata('error_message', 'Failed to update record.');
                redirect('Admin/edit_record/' . $nik);
            }
        } else {
            $data['record'] = $this->Admin_model->ambil_record($nik);
            if (empty($data['record'])) {
                show_404();
            }
            $this->load->view('admin/edit_record', $data);
        }
    }

    public function delete_record($nik) {
        $this->Admin_model->delete_record($nik);
        $this->session->set_flashdata('success_message', 'Record deleted successfully!');
        redirect('Admin/dataRecord');
    }

    // dokter
    public function dokter() {
        $data['dokter'] = $this->Admin_model->get_dokter(); 
        $this->load->view('admin/dokter', $data); 
    }

    public function edit_dokter($id) {
        $data['dokter'] = $this->Admin_model->get_dokter_by_id($id);
        $this->load->view('admin/edit_dokter', $data);
    }

    public function update_dokter($id) {
        $this->Admin_model->update_dokter($id, array(
            'ket' => $this->input->post('information')
        ));
        redirect('Admin/dokter');
    }

    // pesan 
    public function pesan() {
        $data['messages'] = $this->Pesan_models->ambil_pesan();
        $this->load->view('admin/pesan', $data);
    }

    public function delete_pesan($id) {
        $this->Pesan_models->delete_pesan($id);
        $this->session->set_flashdata('success', 'Pesan berhasil dihapus.');
        redirect('Admin/pesan');
    }

    public function laporanPasien () {
        $data['patients'] = $this->laporan_Admin->ambil_pasien();
        $this->load->view('admin/laporanPasien', $data);
    }
    
    public function laporanRegister () {
        $data['dataRegister'] = $this->laporan_Admin->ambil_register();
        $this->load->view('admin/laporanRegister', $data);
    }

    public function laporanRecord() {
        $data['records'] = $this->laporan_Admin->ambil_records();
        $this->load->view('admin/laporanRecord', $data);
    }

    
}
?>
