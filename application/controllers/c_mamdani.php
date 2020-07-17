<?php defined('BASEPATH') OR exit('No direct script access allowed');

class c_mamdani extends CI_Controller{
  function __construct(){
		parent::__construct();
		$this->load->model('m_variabel', TRUE);
		$this->load->helper('url');
  }

  
function nilai_grafik_kemiskinan(){
  //$p=$this->mamdani->fuzzifikasi_kemiskinan_kecamatan();
  $p=$this->mamdani->variabel_kemiskinan_kecamatan();
  $p=$this->mamdani->variabel_ketelantaran_kecamatan();
  $p=$this->mamdani->variabel_kecacatan_kecamatan();
  // var_dump($p);
  // die;
}







}
?>