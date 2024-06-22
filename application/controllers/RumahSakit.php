<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class RumahSakit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Register_pasien');
        $this->load->model('Pesan_models');
        $this->load->model('RecordPasien_model');
        $this->load->model('Jadwal_model');
        $this->load->library('session');
        $this->load->library('image_lib');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('index');
    }

    public function login() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
    
            $this->form_validation->set_rules('logemailS', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                $data['error'] = validation_errors();
                $this->load->view('login', $data);
            } else {
                $email = $this->input->post('logemailS');
                $password = $this->input->post('password');
    
                if ($this->User_model->check_login($email, $password)) {
                    $this->session->set_userdata('user_email', $email);
                    $this->session->set_flashdata('success_message', 'Account Login was successful!');
                    redirect('RumahSakit/index'); 
                } else {
                    $data['error'] = 'Invalid email or password. Please try again.';
                    $this->load->view('login', $data); 
                }
            }
        } else {
            $this->load->view('login');
        }
    }
    
    public function register() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
    
            if ($this->User_model->register($data)) {
                $this->session->set_flashdata('success_message', 'Account registration was successful!');
                $this->session->set_userdata('loggedin', true);
                $this->session->set_userdata('email', $data['email']);
                redirect('RumahSakit/index');
            } else {
                $data['error'] = 'There was a problem registering your account. Please try again.';
            }
        }
    
        $this->load->view('index', isset($data) ? $data : NULL);
    }
    
    // 
    public function jadwal() {
        $data['jadwal'] = $this->Jadwal_model->get_jadwal(); 
        $this->load->view('jadwal', $data);
    }



    // profil ---------------
    public function profil() {
        if ($this->session->userdata('user_email')) {
            $userEmail = $this->session->userdata('user_email');
            $userInfo = $this->User_model->get_user_info($userEmail);

            if ($userInfo) {
                $data['nama'] = $userInfo['nama'];
                $data['email'] = $userInfo['email'];
                $data['phone'] = $userInfo['phone'];
                $data['gender'] = $userInfo['gender'];
                $data['address'] = $userInfo['address'];
                $data['profile_image'] = !empty($userInfo['profile_image']) ? base_url($userInfo['profile_image']) : base_url('uploads/default-user.png');
                $this->load->view('profil', $data);
            } else {
                log_message('error', 'User not found for profile display: ' . $userEmail); // Tambahkan log untuk user tidak ditemukan
                redirect('RumahSakit/login');
            }
        } else {
            log_message('error', 'User not logged in for profile display'); // Tambahkan log untuk user tidak login
            redirect('RumahSakit/login');
        }
    }


    // proses upload
    public function upload() {
        if (!$this->session->userdata('user_email')) {
            echo json_encode(['status' => 'error', 'message' => 'Please log in first.']);
            return;
        }
    
        $userEmail = $this->session->userdata('user_email');
        $userInfo = $this->User_model->get_user_info($userEmail);
    
        if (!$userInfo) {
            echo json_encode(['status' => 'error', 'message' => 'User information not found.']);
            return;
        }
    
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = 'profile_' . $userEmail . '_' . time();
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('profile_image')) {
            $error = $this->upload->display_errors();
            echo json_encode(['status' => 'error', 'message' => 'Upload failed: ' . $error]);
            return;
        } else {
            $data = $this->upload->data();
            $file_path = 'uploads/' . $data['file_name'];
    
            $resize_config['image_library'] = 'gd2';
            $resize_config['source_image'] = './' . $file_path;
            $resize_config['maintain_ratio'] = TRUE;
            $resize_config['width'] = 100;
            $resize_config['height'] = 100;
    
            $this->load->library('image_lib', $resize_config);
    
            if (!$this->image_lib->resize()) {
                $error = $this->image_lib->display_errors();
                echo json_encode(['status' => 'error', 'message' => 'Resize failed: ' . $error]);
                return;
            }
    
            $this->image_lib->clear();
    
            $update_result = $this->User_model->update_profile_image($userEmail, $file_path);
    
            if ($update_result) {
                echo json_encode(['status' => 'success', 'message' => 'Image uploaded and resized successfully.', 'image_url' => base_url($file_path)]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update image in database.']);
            }
        }
    }
    
    
    
   
    public function profil_edit() {
        if ($this->session->userdata('user_email')) {
            $userEmail = $this->session->userdata('user_email');
            $userInfo = $this->User_model->get_user_profil($userEmail);

            if ($userInfo) {
                $data['nama'] = $userInfo['nama'];
                $data['email'] = $userInfo['email'];
                $data['phone'] = $userInfo['phone'];
                $data['gender'] = $userInfo['gender'];
                $data['address'] = $userInfo['address'];
                $this->load->view('profil_edit', $data);
            } else {
                redirect('RumahSakit/login');
            }
        } else {
            redirect('RumahSakit/login');
        }
    }

    public function update_profile() {
        if ($this->session->userdata('user_email')) {
            $userEmail = $this->session->userdata('user_email');

            $update_data = array(
                'nama' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address')
            );

            $this->User_model->update_user($userEmail, $update_data);

            redirect('RumahSakit/profil');
        } else {
            redirect('RumahSakit/login');
        }
    }


    // end profil-----

    public function logout() {
        $this->session->unset_userdata('user_email');
        redirect('RumahSakit/login');
    }

    // End Login dan Register Akun
    
    public function register_process() {
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $data = array(
            'NIK' => $this->input->post('nik'),
            'nama_pasien' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('date'),
            'jenis_kelamin' => $this->input->post('gender'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat')
        );

        // // Debug: Print the posted data
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        $result = $this->Register_pasien->register($data);

        if ($result) {
            $this->session->set_userdata('patient_data', $data);
            $this->session->set_flashdata('success_message', 'Data entered successfully!');
            redirect('RumahSakit/pilih_poli');
        } else {
            $data['error'] = 'Error registering patient. Please try again.';
            $this->load->view('register_baru', $data);
        }
    } else {
        $this->load->view('register_baru');
    }
}

    

    public function pilih_poli() {
        // cek data pasien di season
        if ($this->session->userdata('patient_data')) {
            $patient_data = $this->session->userdata('patient_data');

            // proses
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = array(
                    'NIK' => $patient_data['NIK'],
                    'nama_pasien' => $patient_data['nama_pasien'],
                    'email' => $patient_data['email'],
                    'alamat' => $patient_data['alamat'],
                    'tanggal' => $this->input->post('tanggal'),
                    'poli' => $this->input->post('poli')
                );

                // Insert data ke database
                if ($this->Register_pasien->insert_patient_registration($data)) {
                    // notif data sukses 
                    $this->session->set_flashdata('success_message', 'Registration successful!');
                    redirect('RumahSakit/index');
                } else {
                    // notif data error
                    $data['error'] = 'Failed to register. Please try again.';
                }
            }

            // masuk ke pilih poli
            $this->load->view('pilih_poli', $patient_data);
            
        } else {
            // masuk ke index
            redirect('RumahSakit/index');
        }
    }

    public function buktiR() { 
        $data['pasien'] = $this->Register_pasien->get_latest_registration();
        $this->load->view('buktiR', $data);
    }

    // lama
    public function register_old() {
        $this->load->view('register_lama');
    }

    public function proses_old() {
        // Ambil data NIK dari form
        $nik = $this->input->post('nik');

        // Validasi input
        if (!$nik) {
            // Redirect atau tampilkan pesan error jika NIK tidak ada
            redirect(base_url('some_error_page'));
        }

        // Panggil model untuk mencari data pasien berdasarkan NIK
        $data['dataPasien'] = $this->Register_pasien->get_patient_by_nik($nik);

        // Tampilkan hasil pencarian ke view proses_old.php
        $this->load->view('proses_old', $data);
    }
    
    public function register_lama() {
        $nik = $this->input->post('nik');
        $nama_pasien = $this->input->post('nama_pasien');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $tanggal = $this->input->post('tanggal');
        $poli = $this->input->post('poli');
    
        log_message('info', 'Data received: ' . json_encode($_POST));
    
        if (empty($nik) || empty($tanggal) || empty($poli) || $poli == '0' || empty($nama_pasien) || empty($email) || empty($alamat)) {
            log_message('error', 'Validation failed.');
            redirect(base_url('some_error_page'));
        }
    
        $data = array(
            'nik' => $nik,
            'nama_pasien' => $nama_pasien,
            'email' => $email,
            'alamat' => $alamat,
            'tanggal' => $tanggal,
            'poli' => $poli
        );
    
        if ($this->Register_pasien->save_patient_data($data)) {
            log_message('info', 'Data saved successfully.');
    
            // Retrieve patient data based on NIK
            $pasien = $this->Register_pasien->get_patient_old($nik);
            
            // Log the returned patient data
            log_message('info', 'Patient data retrieved: ' . json_encode($pasien));
    
            if ($pasien) {
                // Redirect to the view with patient data
                $this->load->view('buktiRL', ['pasien' => $pasien]);
            } else {
                log_message('error', 'Patient data not found.');
                redirect(base_url('error_page'));
            }
        } else {
            log_message('error', 'Failed to save data.');
            redirect(base_url('error_page'));
        }
    }
    

    // record pasien
    public function record_pasien() {
        $this->load->view('record_pasien');
    }

    public function search_record() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $nik = $this->input->post('nik');
            $data['record'] = $this->RecordPasien_model->get_record_by_nik($nik);

            if ($data['record']) {
                $this->load->view('tampil_record', $data);
            } else {
                $data['error'] = "No record found for NIK: $nik";
                $this->load->view('record_pasien', $data);
            }
        } else {
            redirect('RumahSakit/index');
        }
    }
    
    // Pesan
    public function pesan() {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no = $this->input->post('no');
        $pesan = $this->input->post('pesan');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no,
            'pesan' => $pesan
        );

        if ($this->Pesan_models->pesan_proses($data)) {
            // pesan
            $this->session->set_flashdata('message', 'Message sent successfully!');
            redirect(base_url('RumahSakit/index'));
        } else {
            echo "Gagal mengirim pesan.";
        }
    }
}
?>
