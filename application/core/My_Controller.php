<?php
class MY_Controller extends CI_Controller{
public function __construct(){
parent::__construct();

//load class Database
$this->load->database();
 
//load model
$this->load->model(array('m_variabel'));
 
//load helper
$this->load->helper(array('url'));
}
}