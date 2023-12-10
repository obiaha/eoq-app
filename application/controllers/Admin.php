<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('role') != "1") {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('structure/header');
        $this->load->view('structure/sidebar_admin');
        $this->load->view('structure/navbar');
        $this->load->view('admin/dashboard');
        $this->load->view('structure/footer');
    }
}
