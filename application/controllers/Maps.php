<?php

class Maps extends CI_Controller {

    public function __construct() {
         parent::__construct();
 
   }   
   public function index() {
     $this->load->view('templates/header');
     $this->load->view('v_maps');
     $this->load->view('templates/footer');
   }  
   
   function get_grafik(){
    $query = $this->db->query("SELECT tb_kecamatan.nama_kecamatan,count(klasifikasi) AS stok FROM barang GROUP BY merk");
     
    if($query->num_rows() > 0){
        foreach($query->result() as $data){
            $hasil[] = $data;
        }
        return $hasil;
    }
}

 }
?>