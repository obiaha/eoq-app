<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang');
        $this->load->library('session');
        if ($this->session->userdata('role') != "2") {
            redirect(base_url());
        }
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $this->load->view('structure/header');
        $this->load->view('structure/sidebar_gudang');
        $this->load->view('structure/navbar');
        $this->load->view('gudang/dashboard');
        $this->load->view('structure/footer');
    }

    public function pages()
    {

        $data_supplier = $this->M_gudang->getData('tbl_supplier', 'id_supplier');
        $data_barang = $this->M_gudang->getData('tbl_barang', 'id_barang');
        $pemesanan = $this->M_gudang->getData('tbl_pemesanan', 'surat_jalan');
        $pemakaian = $this->M_gudang->getData('tbl_pemakaian', 'bukti_keluar');

        $data = array('data_supplier' => $data_supplier, 'data_barang' => $data_barang, 'pemesanan' => $pemesanan, 'pemakaian' => $pemakaian);

        $pages = base64_decode($this->input->get('p'));
        $this->load->view('structure/header');
        $this->load->view('structure/sidebar_gudang');
        $this->load->view('structure/navbar');
        $this->load->view('gudang/' . $pages, $data);
        $this->load->view('structure/footer');
    }

    public function insertSupplier()
    {
        $id = $this->M_gudang->newId('id_supplier', 'tbl_supplier', 'SPY-');
        $nama = $this->input->post('nm_supplier');
        $almt = $this->input->post('alamat');
        $telp = $this->input->post('telepon');
        $tgl = date('Y-m-d');
        $jam = date('H:i:s');

        $insert = array(
            'id_supplier' => $id,
            'nm_supplier' => $nama,
            'alamat' => $almt,
            'telepon' => $telp,
            'tgl_record' => $tgl,
            'jam_record' => $jam
        );

        $this->M_gudang->insertData('tbl_supplier', $insert);
        redirect(base_url('gudang/pages?p=' . base64_encode('data_supplier')));
    }

    public function updateSupplier()
    {
        $id = $this->input->post('id_supplier');
        $nama = $this->input->post('nm_supplier');
        $almt = $this->input->post('alamat');
        $telp = $this->input->post('telepon');

        $update = array(
            'nm_supplier' => $nama,
            'alamat' => $almt,
            'telepon' => $telp
        );

        $where = array('id_supplier' => $id);

        $this->M_gudang->updateData('tbl_supplier', $update, $where);
        redirect(base_url('gudang/pages?p=' . base64_encode('data_supplier')));
    }

    public function deleteSupplier()
    {
        $id = $this->input->post('id_supplier');

        $where = array('id_supplier' => $id);

        $this->M_gudang->deleteData('tbl_supplier', $where);
        redirect(base_url('gudang/pages?p=' . base64_encode('data_supplier')));
    }

    public function insertBarang()
    {
        $id = $this->M_gudang->newId('id_barang', 'tbl_barang', 'BRG-');
        $nama = $this->input->post('nm_barang');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga_beli');
        $stok = $this->input->post('stok');
        $tgl = date('Y-m-d');
        $jam = date('H:i:s');

        $insert = array(
            'id_barang' => $id,
            'nm_barang' => $nama,
            'satuan' => $satuan,
            'harga_beli' => $harga,
            'stok' => $stok,
            'tgl_record' => $tgl,
            'jam_record' => $jam
        );

        $this->M_gudang->insertData('tbl_barang', $insert);
        redirect(base_url('gudang/pages?p=' . base64_encode('data_barang')));
    }

    public function updateBarang()
    {
        $id = $this->input->post('id_barang');
        $nama = $this->input->post('nm_barang');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga_beli');
        $stok = $this->input->post('stok');

        $update = array(
            'nm_barang' => $nama,
            'satuan' => $satuan,
            'harga_beli' => $harga,
            'stok' => $stok
        );

        $where = array('id_barang' => $id);

        $this->M_gudang->updateData('tbl_barang', $update, $where);
        redirect(base_url('gudang/pages?p=' . base64_encode('data_barang')));
    }

    public function deleteBarang()
    {
        $id = $this->input->post('id_barang');

        $where = array('id_barang' => $id);

        $this->M_gudang->deleteData('tbl_barang', $where);
        redirect(base_url('gudang/pages?p=' . base64_encode('data_barang')));
    }

    public function insertPemesanan()
    {
        $id = $this->M_gudang->newId('id_pemesanan', 'tbl_pemesanan', 'PSN-');
        $sj = $this->M_gudang->newSj('surat_jalan', 'tbl_pemesanan', 'SJ-') . "/" . date('d-m-Y');
        $id_sup = $this->input->post('id_supplier');
        $id_brg = $this->input->post('id_barang');
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $qty = $this->input->post('qty');
        $tgl = date('Y-m-d');
        $jam = date('H:i:s');

        $insert = array(
            'id_pemesanan' => $id,
            'surat_jalan' => $sj,
            'id_supplier' => $id_sup,
            'id_barang' => $id_brg,
            'tanggal' => $tanggal,
            'qty' => $qty,
            'tgl_record' => $tgl,
            'jam_record' => $jam
        );

        $this->M_gudang->insertData('tbl_pemesanan', $insert);

        $data_barang = $this->M_gudang->getWhere('tbl_barang', array('id_barang' => $id_brg))->row();

        $plus = $data_barang->stok + $qty;

        $update = array('stok' => $plus);

        $where = array('id_barang' => $id_brg);

        $this->M_gudang->updateData('tbl_barang', $update, $where);

        redirect(base_url('gudang/pages?p=' . base64_encode('transaksi_pemesanan')));
    }

    public function deletePemesanan()
    {
        $id = $this->input->post('id_pemesanan');

        $where = array('id_pemesanan' => $id);

        $this->M_gudang->deleteData('tbl_pemesanan', $where);
        redirect(base_url('gudang/pages?p=' . base64_encode('transaksi_pemesanan')));
    }

    public function insertPemakaian()
    {
        $id = $this->M_gudang->newId('id_pemakaian', 'tbl_pemakaian', 'PMK-');
        $bk = $this->M_gudang->newSj('bukti_keluar', 'tbl_pemakaian', 'BK-') . "/" . date('d-m-Y');
        $id_brg = $this->input->post('id_barang');
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $qty = $this->input->post('qty');
        $tgl = date('Y-m-d');
        $jam = date('H:i:s');

        $insert = array(
            'id_pemakaian' => $id,
            'bukti_keluar' => $bk,
            'id_barang' => $id_brg,
            'tanggal' => $tanggal,
            'qty' => $qty,
            'tgl_record' => $tgl,
            'jam_record' => $jam
        );

        $this->M_gudang->insertData('tbl_pemakaian', $insert);

        $data_barang = $this->M_gudang->getWhere('tbl_barang', array('id_barang' => $id_brg))->row();

        $min = $data_barang->stok - $qty;

        $update = array('stok' => $min);

        $where = array('id_barang' => $id_brg);

        $this->M_gudang->updateData('tbl_barang', $update, $where);

        redirect(base_url('gudang/pages?p=' . base64_encode('transaksi_pemakaian')));
    }

    public function deletePemakaian()
    {
        $id = $this->input->post('id_pemakaian');

        $where = array('id_pemakaian' => $id);

        $this->M_gudang->deleteData('tbl_pemakaian', $where);
        redirect(base_url('gudang/pages?p=' . base64_encode('transaksi_pemakaian')));
    }
}
