<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        if ($this->session->userdata('status')) {
            switch ($this->session->userdata('role')) {
                case '1':
                    redirect('admin');
                    break;
                case '2':
                    redirect('gudang');
                    break;
            }
        } else {
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }
    }

    public function prosesLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Cek Data
        $cekData = $this->M_auth->getWhere("tbl_user", array('email' => $email, 'password' => $password));
        if ($cekData->num_rows() > 0) {
            $getData = $cekData->row();
            // if (password_verify($password, $getData->password)) {
            // Create Session
            $data_session = array(
                'id_user' => $getData->id_user,
                'nama' => $getData->nama,
                'role' => $getData->role,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            // Hak Akses
            if ($this->session->userdata('role') == 1) {
                $response = "success";
                $role = "1";
                $ket = "Login Berhasil !";
            } else {
                $response = "success";
                $role = "2";
                $ket = "Login Berhasil !";
            }
            // } else {
            //     $response = "error";
            //     $role = "";
            //     $ket = "Gagal Masuk !";
            // }
        } else {
            $response = "error";
            $role = "";
            $ket = "Akun Tidak Tersedia !";
        }
        echo json_encode(array('response' => $response, "role" => $role, "keterangan" => $ket));
    }

    public function prosesLogout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Auth'));
    }
}
