<?php

class M_gudang extends CI_Model
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

    function newId($id, $table, $object)
    {
        $this->db->select("(SELECT MAX($id) FROM $table WHERE $id LIKE '$object%') AS id", FALSE);
        $query = $this->db->get();
        $row = $query->row();
        $id = (int) substr($row->id, 4, 4);
        $id++;
        return $new = $object . sprintf("%04s", $id);
    }

    function newSj($id, $table, $object)
    {
        $this->db->select("(SELECT MAX($id) FROM $table WHERE $id LIKE '$object%') AS id", FALSE);
        $query = $this->db->get();
        $row = $query->row();
        $id = (int) substr($row->id, 3, 4);
        $id++;
        return $new = $object . sprintf("%04s", $id);
    }

    function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function updateData($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function deleteData($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
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
