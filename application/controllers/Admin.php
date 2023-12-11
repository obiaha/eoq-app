<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('session', 'pdf');
        if ($this->session->userdata('role') != "1") {
            redirect(base_url());
        }
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $this->load->view('structure/header');
        $this->load->view('structure/sidebar_admin');
        $this->load->view('structure/navbar');
        $this->load->view('admin/dashboard');
        $this->load->view('structure/footer');
    }

    public function pages()
    {

        $data_barang = $this->M_admin->getData('tbl_barang', 'id_barang');

        $data = array('data_barang' => $data_barang);

        $pages = base64_decode($this->input->get('p'));
        $this->load->view('structure/header');
        $this->load->view('structure/sidebar_admin');
        $this->load->view('structure/navbar');
        $this->load->view('admin/' . $pages, $data);
        $this->load->view('structure/footer');
    }

    public function printLaporanPemesanan()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_pemesanan.pdf";
        $this->pdf->load_view('admin/print_pemesanan');
    }

    public function printLaporanPersediaan()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_persediaan.pdf";
        $this->pdf->load_view('admin/print_persediaan');
    }

    public function printLaporanEoq()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_eoq.pdf";
        $this->pdf->load_view('admin/print_eoq');
    }

    public function printLaporanBiaya()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_biaya_persediaan.pdf";
        $this->pdf->load_view('admin/print_biaya');
    }
}
