<?php

class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_login');
    }
    function index(){
        $this->load->view('admin/login');
    }
    function aksi_login(){
        $username = $this->input->post('user_nama');
        $password = $this->input->post('user_password');
        $where = array(
            'user_nama' => $username,
            'user_password' => md5($password));
            $cek = $this->m_login->cek_login("tb_admin",$where)->num_rows();
            if($cek > 0){
                redirect(base_url("admin/dashboard"));
            }else{
                $this->session->set_flashdata('pesan','Maaf Username atau Password Anda Salah!');
                redirect('admin/login');
            }
        }
        function logout(){
            $this->session->sess_destroy();
            redirect(base_url('auth'));
        }
    }