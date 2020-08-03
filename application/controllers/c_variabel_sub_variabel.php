<?php
class C_variabel_sub_variabel extends MY_Controller{
public function index(){
 
$data['menu'] = $this->m_variabel->sub_variabel();
$data['title']='C_variabel_sub_variabel';
$this->load->view('templates/header');
    $this->load->view('admin/inputdata/input_data_penduduk',$data); //input_data_penduduk
    $this->load->view('templates/footer');

}
}