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
 }
?>