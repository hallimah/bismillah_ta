<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Fuzzy extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_variabel', TRUE);
		//$this->load->helper(array('from','url'));
		$this->load->helper('url');
	}
	
	public function view(){
		$data=$this->mamdani->insert_or_update();
		 $this->mamdani->hasil_kemiskinan();
		 $this->mamdani->hasil_ketelantaran();
		 $this->mamdani->hasil_kecacatan();
			
			redirect('fuzzy/view2');
	}

	public function view2(){
		 $this->mamdani->keterangan();
		redirect('fuzzy/view_klasifikasi');
	}

	public function view_klasifikasi(){
		$config = array();
        $config["base_url"] = base_url() . "fuzzy/view";
        $config["per_page"] = $this->m_tabel->total_kelurahan();
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0; 
		$fuzzy['fuzzy']=$this->mamdani->fuzzy($config["per_page"], $page);
			  
		$fuzzy['tahun']=$this->mamdani->select_tahun_klasifikasi_kelurahan();
		
			$this->load->view('templates/header');
			$this->load->view('admin/lihatdata/tabel_klasifikasi',$fuzzy);
			$this->load->view('templates/footer');
	}

	public function viewKecamatan(){
		$data = $this->mamdani->InsertorUpdateDataKecamatan();
		$this->mamdani->hasil_kemiskinan_kecamatan();
		$this->mamdani->hasil_ketelantaran_kecamatan();
		$this->mamdani->hasil_kecacatan_kecamatan();
		redirect('fuzzy/viewKecamatan2');
		
	}

	public function viewKecamatan2(){
		$this->mamdani->keterangan_kecamatan();
	
		redirect('fuzzy/view_klasifikasi_kecamatan');	
	}

	public function view_klasifikasi_kecamatan(){

		$config = array();
        $config["base_url"] = base_url() . "fuzzy/viewKecamatan";
        $config["per_page"] = $this->m_tabel->total_kelurahan();
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0; 
		$fuzzy['fuzzy']=$this->mamdani->viewKecamatan($config["per_page"], $page);
		
		$fuzzy['tahun']=$this->mamdani->select_tahun_klasifikasi_kecamatan();
	
		$this->load->view('templates/header');
		$this->load->view('admin/lihatdata/tabel_klasifikasi_kecamatan',$fuzzy);
		$this->load->view('templates/footer');
		
	//	$this->mamdani->klasifikasi_year_kec();
	}

	function viewPenduduk(){
		redirect('fuzzy/viewPenduduk2');
	}

	function viewPenduduk2(){
		redirect('fuzzy/view_hasil_klasifikasi_penduduk');

	}

	function view_hasil_klasifikasi_penduduk(){
		$config = array();
        $config["base_url"] = base_url() . "fuzzy/viewPenduduk";
        $config["per_page"] = $this->m_tabel->total_kelurahan();
        $config["uri_segment"] = 3;

        // $this->pagination->initialize($config);

		// $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0; 
		// $fuzzy['fuzzy']=$this->mamdani->viewPenduduk($config["per_page"], $page);
		
		 $fuzzy['tahun']=$this->mamdani->select_tahun_klasifikasi_kecamatan();
	
		$this->load->view('templates/header');
		$this->load->view('admin/lihatdata/tabel_klasifikasi_penduduk');
		$this->load->view('templates/footer');

	}


	/***********************coba select tb_penduduk then insert in mamdani_kecamatan *******************/
	function select_tb_penduduk(){
		$this->load->model('m_variabel');
	//	$this->m_variabel->get_kecamatan();
	//	$this->m_variabel->get_tb_penduduk();

	//$dat['p']=$this->m_variabel->multi_query();
		 $dat['pecah']=$this->m_variabel->view();
		$this->load->view('admin/perhitunganfuzzy/coba_tabel',$dat);

		// foreach ($dat['pecah'] as $key) {
		// 	$nama_kecamatan= $key->nama_kecamatan;
		// 	$kemiskinan = $key->kemiskinan;
		// 	$ketelantaran = $key->ketelantaran;
		// 	$kecacatan = $key->kecacatan;
		// 	$variabel_id = $key->variabel_id;
		// 	$nama_variabel = $key->nama_variabel;
		// 	$sub_variabel_id = $key->sub_variabel_id;
		// 	$jenis_oi = $key->jenis_io;
		// 	$sub_id = $key->sub_id;
		// 	$nama = $key->nama;
		// }

		// if ($variabel_id && $nama_variabel=='kemiskinan' && $sub_variabel_id) {
		// 	if ($kemiskinan /  >= ) {
		// 		$hasil_kemiskinan = 
		// 	}
			
		// }else{
		// 	false;
		// }

		// $arr = array('kemiskinan' => $kemiskinan,
		// 	'hasil_kemiskinan' => $hasil_kemiskinan );

		// var_dump($dat);
		// die;

	}
	
	/***********************END coba select tb_penduduk then insert in mamdani_kecamatan *******************/
	
}
