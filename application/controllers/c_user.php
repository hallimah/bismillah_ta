<?php
class C_User extends CI_Controller {
    public function user(){
        $data['total_pmks'] = $this->m_tabel->total_pmks();
       $data['total_perkecamatan'] = $this->m_tabel->total_perkecamatan();
	//	$data['total_perdesa'] = $this->m_tabel->total_jenis();
        $this->load->view('templates/u_header');
        $this->load->view('user/view',$data);//
        $this->load->view('templates/u_footer');
    }

    public function klasifikasi_kecamatan(){
        $fuzzy['fuzzy']= $this->mamdani->viewKecamatan();
        $fuzzy['tingkat']= $this->mamdani->klasifikasi_wilayah();
		$fuzzy['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();
		$fuzzy['kali_desa']=$this->mamdani->get_total_penduduk_desa();
        //$data['fuzzy']=$this->m_login->klasifikasi()->result();
        $this->load->view('templates/u_header');
        $this->load->view('user/tabel',$fuzzy);
        $this->load->view('templates/u_footer');
    }

    public function klasifikasi_kelurahan(){
        $fuzzy['fuzzy']= $this->mamdani->fuzzy();
        $fuzzy['tingkat']= $this->mamdani->klasifikasi_wilayah();
		$fuzzy['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();
		$fuzzy['kali_desa']=$this->mamdani->get_total_penduduk_desa();
        $this->load->view('templates/u_header');
        $this->load->view('user/tabel_kelurahan',$fuzzy);
        $this->load->view('templates/u_footer');
    }
    
    /**coba peta */

    public function peta(){
        $data['arr']=$this->m_login->m_peta();
         $this->load->view('admin/peta2',$data);
    }
}

?>