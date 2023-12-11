<?php

class M_admin extends CI_Model
{

    function getData($table, $order)
    {
        $this->db->select("*");
        $this->db->from("$table");
        $this->db->order_by("$order", "desc");
        return $this->db->get();
    }

    function getWhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function getPemesanan($periode1, $periode2)
    {
        $this->db->select("*");
        $this->db->from("tbl_pemesanan");
        $this->db->where("tanggal BETWEEN '$periode1' AND '$periode2'");
        $this->db->join("tbl_barang", "tbl_barang.id_barang=tbl_pemesanan.id_barang", "LEFT");
        $this->db->order_by("tanggal", "desc");
        return $this->db->get();
    }

    function getPemakaian($periode1, $periode2)
    {
        return $this->db->query("SELECT id_barang, SUM(qty) as total FROM tbl_pemakaian WHERE tanggal BETWEEN '$periode1' AND '$periode2' GROUP BY id_barang");
    }

    function getPemakaian2($id, $periode1, $periode2)
    {
        return $this->db->query("SELECT id_barang, SUM(qty) as total FROM tbl_pemakaian WHERE id_barang='$id' AND tanggal BETWEEN '$periode1' AND '$periode2' GROUP BY id_barang");
    }
}
