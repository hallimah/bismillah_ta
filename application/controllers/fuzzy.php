<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Fuzzy extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_variabel', TRUE);
		//$this->load->helper(array('from','url'));
		$this->load->helper('url');
	}
	
	public function view(){
		
				$config = array();
        $config["base_url"] = base_url() . "fuzzy/view";
        $config["per_page"] = $this->m_tabel->total_kelurahan();
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0; 
		$fuzzy['fuzzy']=$this->mamdani->fuzzy($config["per_page"], $page);

	//	$fuzzy['fuzzy']=$this->mamdani->fuzzy();
		$fuzzy['tingkat']= $this->mamdani->klasifikasi_wilayah();
		$fuzzy['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();
		$fuzzy['kali_desa']=$this->mamdani->get_total_penduduk_desa();
		$fuzzy['tahun']=$this->mamdani->select_tahun_klasifikasi();
		
			$this->load->view('templates/header');
			$this->load->view('admin/lihatdata/tabel_klasifikasi',$fuzzy);
			$this->load->view('templates/footer');

	}


	public function viewKecamatan(){

		$config = array();
        $config["base_url"] = base_url() . "fuzzy/viewKecamatan";
        $config["per_page"] = $this->m_tabel->total_kelurahan();
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0; 
		$fuzzy['fuzzy']=$this->mamdani->viewKecamatan($config["per_page"], $page);
		$fuzzy['tingkat']= $this->mamdani->klasifikasi_wilayah();
		$fuzzy['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();

		$fuzzy['tahun']=$this->mamdani->select_tahun_klasifikasi();
	
		$this->load->view('templates/header');
		$this->load->view('admin/lihatdata/tabel_klasifikasi_kecamatan',$fuzzy);
		$this->load->view('templates/footer');
		
	//	$this->mamdani->klasifikasi_year_kec();
	}

	function viewPenduduk(){
		$this->mamdani->bobot_tanggungan();
		$this->mamdani->bobot_keterangan_rumah();
		$this->mamdani->bobot_jumlah_aset();
		$this->mamdani->bobot_program_sosial();
		$this->mamdani->total_bobot();

		$this->mamdani->klas();
	
		redirect('fuzzy/view_hasil_klasifikasi_penduduk');
	}

	function view_hasil_klasifikasi_penduduk(){
		$config = array();
        $config["base_url"] = base_url() . "fuzzy/viewPenduduk";
        $config["per_page"] = $this->m_tabel->total_kelurahan();
        $config["uri_segment"] = 3;

		$page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0; 
		$klasifikasi['klasifikasi']=$this->mamdani->getdata($config["per_page"], $page);

		 $klasifikasi['tahun']=$this->mamdani->select_tahun_klasifikasi();
	
		$this->load->view('templates/header');
		$this->load->view('admin/lihatdata/tabel_klasifikasi_penduduk',$klasifikasi);
		$this->load->view('templates/footer');

	}


	/***********************coba select tb_penduduk then insert in mamdani_kecamatan *******************/
	function select_tb_penduduk(){
		$this->load->model('mamdani');
		//$klasifikasi['klasifikasi']=$this->mamdani->getdata();
		$klasifikasi['jumlah_aset']=$this->mamdani->jumlah_aset();
		$klasifikasi['tingkat']= $this->mamdani->klasifikasi3();

		$this->load->view('templates/header');
		$this->load->view('admin/lihatdata/tabel_klasifikasi_penduduk',$klasifikasi);
		$this->load->view('templates/footer');
		// var_dump($jml_aset);
		// die;

	}
	
	/***********************END coba select tb_penduduk then insert in mamdani_kecamatan *******************/


	function klasifikasi(){
		$klasifikasi['data']=$this->mamdani->getdata();
		$klasifikasi['klas']=$this->mamdani->klasifikasi3();
				
		foreach ($klasifikasi['data'] as $key) {
		$id=$key->id;
		$tot= $key->total_bobot;
		foreach($klasifikasi['klas'] as $data){
			if(($data->min <= $key->total_bobot) && ($key->total_bobot <= $data->max)){
				//   $ting[]= $data->nama; 
				$this->db->query("UPDATE tb_klasifikasi_penduduk SET klasifikasi='$data->nama' where id='$key->id'  ");
			break;
		}
	}
	}
	redirect('fuzzy/view_hasil_klasifikasi_penduduk');
}


}
