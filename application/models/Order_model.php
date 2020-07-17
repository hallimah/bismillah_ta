<?php
class Order_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get("orders");
    }
 
    public function get_all_with_date($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT * FROM orders WHERE tanggal between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal ASC");
    }
 
    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}