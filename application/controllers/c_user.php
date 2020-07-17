<?php
class C_User extends CI_Controller {
    public function user(){
        $data['total_pmks'] = $this->m_tabel->total_pmks();
        $data['total_perkecamatan'] = $this->m_tabel->total_perkecamatan();
		$data['total_jenis'] = $this->m_tabel->total_jenis();
        $this->load->view('templates/u_header');
        $this->load->view('user/view',$data);
        $this->load->view('templates/u_footer');
    }

    public function klasifikasi_kecamatan(){
        $data['fuzzy']=$this->m_login->klasifikasi()->result();
        $this->load->view('templates/u_header');
        $this->load->view('user/tabel',$data);
        $this->load->view('templates/u_footer');
    }

    public function klasifikasi_kelurahan(){
        $data['fuzzy']=$this->m_login->klasifikasi_desa()->result();
        $this->load->view('templates/u_header');
        $this->load->view('user/tabel_kelurahan',$data);
        $this->load->view('templates/u_footer');
    }
    
    /**coba peta */

    public function peta(){
        $data['arr']=$this->m_login->m_peta();
         $this->load->view('admin/peta2',$data);
    }
}

?>