<?php

class excel_model extends CI_Model
{
    function index(){
        $p=$this->db->query("SELECT * FROM tb_kecamatan ");
        return $p->num_rows();
    }
}
