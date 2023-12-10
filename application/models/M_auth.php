<?php

class M_auth extends CI_Model
{
    function getWhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
