<?php
class C_Rumusfuzzy extends CI_Controller{


	/*********************************fuzzy************************************ */
	public function view() //untuk menampilkan INPUT VARIABEL
	{
		//$this->load->model('M_mamdani');
        //$data['tingkat'] = $this->M_mamdani->fuzzytambah();
        $this->load->view('templates/header');
        $this->load->view('admin/perhitunganfuzzy/coba_input_fuzzy_nilai'); //namaview
        $this->load->view('templates/footer');
	}
	
	public function view2() //untuk menampilkan INPUT VARIABEL
	{
		//$this->load->model('M_mamdani');
        //$data['tingkat'] = $this->M_mamdani->fuzzytambah();
        $this->load->view('templates/header');
        $this->load->view('admin/perhitunganfuzzy/coba_input_fuzzy_nilai2'); //namaview
        $this->load->view('templates/footer');
	}

	public function tabel() //untuk menampilkan tabel
	{
		//$this->load->model('M_mamdani');
        $data['fuzzy'] = $this->m_rumusfuzzy->fuzzytabel();
        $this->load->view('templates/header');
        $this->load->view('admin/perhitunganfuzzy/coba_tabel_fuzzy_nilai', $data); //namaview
        $this->load->view('templates/footer');
	}
	

	public function tabel2() //untuk menampilkan tabel
	{
		//$this->load->model('M_mamdani');
        $data['fuzzy'] = $this->m_rumusfuzzy->fuzzytabel2();
        $this->load->view('templates/header');
        $this->load->view('admin/perhitunganfuzzy/coba_tabel_fuzzy_nilai2', $data); //namaview
        $this->load->view('templates/footer');
	}
	
	//NILAI INPUT VARIABEL///////////////////////////////////////////////////////
	function klasifikasi(){
		// Fungsi Inisialisasi 
		$kemiskinan = $this->input->post('kemiskinan');
		$ketelantaran = $this->input->post('ketelantaran');
		$kecacatan = $this->input->post('kecacatan');
		
		$data = array(
			'kemiskinan'=>$kemiskinan,
			'ketelantaran'=>$ketelantaran,
			'kecacatan'=>$kecacatan);
			
			$this->load->model('m_rumusfuzzy');
			$sql = $this->m_rumusfuzzy->fuzzytambah($data);
			
			if($sql){
				redirect('c_rumusfuzzy/tabel');
			}else{
				echo"gagal";
			}
		}

	function klasifikasi2(){
		// Fungsi Inisialisasi 
		$kemiskinan = $this->input->post('kemiskinan');
		$ketelantaran = $this->input->post('ketelantaran');
		$kecacatan = $this->input->post('kecacatan');
		$data = array(
			'kemiskinan'=>$kemiskinan,
			'ketelantaran'=>$ketelantaran,
			'kecacatan'=>$kecacatan);
			$this->load->model('m_rumusfuzzy');
			$sql = $this->m_rumusfuzzy->fuzzytambah2($data);
			if($sql){
				redirect('c_rumusfuzzy/tabel2');
			}else{
				echo"gagal";
			}
		}
		
		//FUZZIFIKASI/////////////////////////////////////////////////
	function proses($id){
		//proses konversi ke klasfikasi
		$this->load->model('m_rumusfuzzy');
		$data['pecah'] = $this->m_rumusfuzzy->pecah($id);
		// var_dump($data);
		// die();
		
		foreach($data['pecah'] as $row){
			$id = $row->mamdani_id;
			$kemiskinan = $row->kemiskinan;
			$ketelantaran = $row->ketelantaran;
			$kecacatan = $row->kecacatan;
		}
	
		if($kemiskinan <=0){
			$miskin = "SEDIKIT";
		}elseif((0<=$kemiskinan)&&($kemiskinan<=2000)){
			$miskin= "SEDIKIT";
		}elseif((2000<=$kemiskinan)&&($kemiskinan<=5000)){
			$miskin= "SEDANG";
		}elseif((5000<=$kemiskinan)&&($kemiskinan<=8000)){
			$miskin= "BANYAK";
		}elseif(8000<=$kemiskinan){ 
			$miskin= "BANYAK";
		}
	
		if($ketelantaran<=0){
			$terlantar= "SEDIKIT";
		}elseif((0<=$ketelantaran)&&($ketelantaran<=500)){
			$terlantar= "SEDIKIT";
		}elseif((200<=$ketelantaran)&&($ketelantaran<=1000)){
			$terlantar= "SEDANG";
		}elseif((1000<=$ketelantaran)&&($ketelantaran<=1800)){
			$terlantar= "BANYAK";
		}elseif(1800<=$ketelantaran){
			$terlantar= "BANYAK";
		}
	
		if($kecacatan<=0){
			$cacat= "SEDIKIT";
		}elseif((0<=$kecacatan)&&($kecacatan<=100)){
			$cacat= "SEDIKIT";
		}elseif((100<=$kecacatan)&&($kecacatan<=400)){
			$cacat= "SEDANG";
		}elseif((300<=$kecacatan)&&($kecacatan<=600)){
			$cacat= "BANYAK";
		}elseif(600<=$kemiskinan){
			$cacat= "BANYAK";
		}
		
		// Defuzzyfikasi
		$where = array('mamdani_id'=>$id);
		$data = array(
			'kemiskinan'=>$kemiskinan,
			'ketelantaran'=>$ketelantaran,
			'kecacatan'=>$kecacatan,
			'rule_kemiskinan'=>$miskin,
			'rule_ketelantaran'=>$terlantar,
			'rule_kecacatan'=>$cacat
		);
		// var_dump($data);
		// die();
	
		$this->m_rumusfuzzy->update_hasil($data,$where);
		redirect('c_rumusfuzzy/tabel');
	}

	function proses2($id){
		//proses konversi ke klasfikasi
		$this->load->model('m_rumusfuzzy');
		$data['pecah'] = $this->m_rumusfuzzy->pecah2($id);
		// var_dump($data);
		// die();
		
		foreach($data['pecah'] as $row){
			$id = $row->mamdani_id;
			$kemiskinan = $row->kemiskinan;
			$ketelantaran = $row->ketelantaran;
			$kecacatan = $row->kecacatan;
		}
	
		if($kemiskinan <=0){
			$miskin = "SEDIKIT";
		}elseif((0<=$kemiskinan)&&($kemiskinan<=2000)){
			$miskin= "SEDIKIT";
		}elseif((2000<=$kemiskinan)&&($kemiskinan<=5000)){
			$miskin= "SEDANG";
		}elseif((5000<=$kemiskinan)&&($kemiskinan<=8000)){
			$miskin= "BANYAK";
		}elseif(8000<=$kemiskinan){ 
			$miskin= "BANYAK";
		}
	
		if($ketelantaran<=0){
			$terlantar= "SEDIKIT";
		}elseif((0<=$ketelantaran)&&($ketelantaran<=500)){
			$terlantar= "SEDIKIT";
		}elseif((200<=$ketelantaran)&&($ketelantaran<=1000)){
			$terlantar= "SEDANG";
		}elseif((1000<=$ketelantaran)&&($ketelantaran<=1800)){
			$terlantar= "BANYAK";
		}elseif(1800<=$ketelantaran){
			$terlantar= "BANYAK";
		}
	
		if($kecacatan<=0){
			$cacat= "SEDIKIT";
		}elseif((0<=$kecacatan)&&($kecacatan<=100)){
			$cacat= "SEDIKIT";
		}elseif((100<=$kecacatan)&&($kecacatan<=400)){
			$cacat= "SEDANG";
		}elseif((300<=$kecacatan)&&($kecacatan<=600)){
			$cacat= "BANYAK";
		}elseif(600<=$kemiskinan){
			$cacat= "BANYAK";
		}
		
		// Defuzzyfikasi
		$where = array('mamdani_id'=>$id);
		$data = array(
			'kemiskinan'=>$kemiskinan,
			'ketelantaran'=>$ketelantaran,
			'kecacatan'=>$kecacatan,
			'rule_kemiskinan'=>$miskin,
			'rule_ketelantaran'=>$terlantar,
			'rule_kecacatan'=>$cacat
		);
		// var_dump($data);
		// die();
	
		$this->m_rumusfuzzy->update_hasil2($data,$where);
		redirect('c_rumusfuzzy/tabel2');
	}

//FUZZIFIKASI RUMUS 0 - 1, RULE, DEFUZZIFIKASI
	public function rumus_nilai ($id){
		$this->load->model('m_rumusfuzzy');
		$data['pecah'] = $this->m_rumusfuzzy->pecahpunya($id);
		// var_dump($data);
		// die();
	
		foreach($data['pecah'] as $row){
			$id = $row->mamdani_id;
			$kemiskinan = $row->kemiskinan;
			$ketelantaran = $row->ketelantaran;
			$kecacatan = $row->kecacatan;
			$rule_kemiskinan = $row->rule_kemiskinan;
			$rule_ketelantaran = $row->rule_ketelantaran;
			$rule_kecacatan = $row->rule_kecacatan;
		}
		
		if($rule_kemiskinan == 'SEDIKIT'){
			if($kemiskinan <=0){
				$m_sedikit = 0;
			}elseif((0<=$kemiskinan)&&($kemiskinan<=100)){
				$m_sedikit= (($kemiskinan-0)/(100-0));
			}elseif((100<=$kemiskinan)&&($kemiskinan<=1000)){
				$m_sedikit= 1;
			}elseif((1000<=$kemiskinan)&&($kemiskinan<=2000)){
				$m_sedikit= ((2000-$kemiskinan)/(2000-1000));
			}elseif(8000<=$kemiskinan){
				$m_sedikit= 0;
			}
		}elseif ($rule_kemiskinan=='SEDANG') {
			if($kemiskinan <=2000){
				$m_sedang = 0;
			}elseif((2000<=$kemiskinan)&&($kemiskinan<=3000)){
				$m_sedang= (($kemiskinan-2000)/(3000-2000));
			}elseif((3000<=$kemiskinan)&&($kemiskinan<=4000)){
				$m_sedang= 1;
			}elseif((4000<=$kemiskinan)&&($kemiskinan<=5000)){
				$m_sedang= ((5000-$kemiskinan)/(5000-4000));
			}elseif(5000<=$kemiskinan){ 
				$m_sedang= 0;
			}
		}elseif ($rule_kemiskinan == 'BANYAK') {
			if($kemiskinan <=5000){
				$m_banyak = 0;
			}elseif((5000<=$kemiskinan)&&($kemiskinan<=6000)){
				$m_banyak= (($kemiskinan-5000)/(6000-5000));
			}elseif((6000<=$kemiskinan)&&($kemiskinan<=7000)){
				$m_banyak= 1;
			}elseif((7000<=$kemiskinan)&&($kemiskinan<=8000)){
				$m_banyak= ((8000-$kemiskinan)/(8000-7000));
			}elseif(8000<=$kemiskinan){ 
				$m_banyak= 0;
			}
		}
		
		if($rule_ketelantaran == 'SEDIKIT'){
			if($ketelantaran<=0){
				$t_sedikit= 0;
			}elseif((0<=$ketelantaran)&&($ketelantaran<=0)){
				$t_sedikit= (($ketelantaran-0)/(0-0));
			}elseif((0<=$ketelantaran)&&($ketelantaran<=200)){
				$t_sedikit= 1;
			}elseif((200<=$ketelantaran)&&($ketelantaran<=500)){
				$t_sedikit= ((500-$ketelantaran)/(500-200));
			}elseif(500<=$ketelantaran){
			 $t_sedikit= 0;
		}
	}elseif ($rule_ketelantaran=='SEDANG') {
		if($ketelantaran<=200){
			$t_sedang= 0;
         }elseif((200<=$ketelantaran)&&($ketelantaran<=500)){
             $t_sedang= (($ketelantaran-200)/(500-200));
         }elseif((500<=$ketelantaran)&&($ketelantaran<=700)){
	 		$t_sedang= 1;
	 	}elseif((700<=$ketelantaran)&&($ketelantaran<=1000)){
	 		$t_sedang= ((1000-$ketelantaran)/(1000-700));
	 	}elseif(1000<=$ketelantaran){
	 		$t_sedang= 0;
	 	}
	 }elseif ($rule_ketelantaran == 'BANYAK') {
	 	if($ketelantaran<=1000){
	 		$t_banyak= 0;
         }elseif((1000<=$ketelantaran)&&($ketelantaran<=1300)){
             $t_banyak= (($ketelantaran-1000)/(1300-1000));
         }elseif((1300<=$ketelantaran)&&($ketelantaran<=1500)){
	 		$t_banyak= 1;
	 	}elseif((1500<=$ketelantaran)&&($ketelantaran<=1800)){
	 		$t_banyak= ((1800-$ketelantaran)/(1800-1500));
	 	}elseif(1800<=$ketelantaran){
	 		$t_banyak= 0;
	 	}
	 }


	 if($rule_kecacatan == 'SEDIKIT'){
	 	if($kecacatan<=0){
	 		$c_sedikit= 0;
         }elseif((0<=$kecacatan)&&($kecacatan<=0)){
             $c_sedikit= (($kecacatan-0)/(0-0));
         }elseif((0<=$kecacatan)&&($kecacatan<=50)){
	 		$c_sedikit= 1;
	 	}elseif((50<=$kecacatan)&&($kecacatan<=100)){
	 		$c_sedikit= ((100-$kecacatan)/(100-50));
	 	}elseif(100<=$kecacatan){
	 		$c_sedikit= 0;
	 	}
	 }elseif ($rule_kecacatan=='SEDANG') {
	 	if($kecacatan<=100){
	 		$c_sedang= 0;
         }elseif((100<=$kecacatan)&&($kecacatan<=200)){
             $c_sedang= (($kecacatan-100)/(100-200));
         }elseif((200<=$kecacatan)&&($kecacatan<=300)){
	 		$c_sedang= 1;
	 	}elseif((300<=$kecacatan)&&($kecacatan<=400)){
	 		$c_sedang= ((400-$kecacatan)/(400-300));
	 	}elseif(400<=$kecacatan){
	 		$c_sedang= 0;
	 	}
	 }elseif ($rule_kecacatan == 'BANYAK') {
	 	if($kecacatan<=300){
	 		$c_banyak= 0;
         }elseif((300<=$kecacatan)&&($kecacatan<=400)){
             $c_banyak= (($kecacatan-0)/(400-300));
         }elseif((400<=$kecacatan)&&($kecacatan<=500)){
	 		$c_banyak= 1;
	 	}elseif((500<=$kecacatan)&&($kecacatan<=600)){
	 		$c_banyak= ((600-$kecacatan)/(600-500));
	 	}elseif(600<=$kecacatan){
	 		$c_banyak= 0;
	 	}
	 }


	// if($kemiskinan <=0){
	// 	$m_sedikit = 0;
	// }elseif((0<=$kemiskinan)&&($kemiskinan<=2000)){
	// 	$m_sedikit= (($kemiskinan-2000)/(2000-0));
	// }elseif((2000<=$kemiskinan)&&($kemiskinan<=5000)){
	// 	$m_sedikit= 1;
	// }elseif((5000<=$kemiskinan)&&($kemiskinan<=8000)){
	// 	$m_sedikit= ((8000-$kemiskinan)/(8000-5000));
	// }elseif(8000<=$kemiskinan){ 
	// 	$m_sedikit= 0;
	// }
	
	// if($ketelantaran<=0){
	// 	$m_sedang= 0;
	// }elseif((0<=$ketelantaran)&&($ketelantaran<=500)){
	// 	$m_sedang= (($ketelantaran-0)/(500-0));
	// }elseif((200<=$ketelantaran)&&($ketelantaran<=1000)){
	// 	$m_sedang= 1;
	// }elseif((1000<=$ketelantaran)&&($ketelantaran<=1800)){
	// 	$m_sedang= ((1800-$ketelantaran)/(1800-1000));
	// }elseif(1800<=$ketelantaran){
	// 	$m_sedang= 0;
	// }
	
	// if($kecacatan<=0){
	// 	$m_banyak= 0;
	// }elseif((0<=$kecacatan)&&($kecacatan<=100)){
	// 	$m_banyak= (($kecacatan-0)/(400-300));
	// }elseif((100<=$kecacatan)&&($kecacatan<=400)){
	// 	$m_banyak= 1;
	// }elseif((300<=$kecacatan)&&($kecacatan<=600)){
	// 	$m_banyak= ((600-$kecacatan)/(600-500));
	// }elseif(600<=$kemiskinan){
	// 	$m_banyak= 0;
	// }
	

	/********************************* hasil fuzzy */
	//IMPLIKASI
	if($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDANG"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "BANYAK"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDANG"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "BANYAK"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDANG"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDANG"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "BANYAK"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDANG"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDANG"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDANG"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDANG"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDANG"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}

	// Defuzzyfikasi
	$where = array('mamdani_id'=>$id);
	$data = array(
		'kemiskinan'=>$kemiskinan,
		'ketelantaran'=>$ketelantaran,
		'kecacatan'=>$kecacatan,
		'rule_kemiskinan'=>$rule_kemiskinan,
		'rule_ketelantaran'=>$rule_ketelantaran,
		'rule_kecacatan'=>$rule_kecacatan,
		'm_sedikit'=>$m_sedikit,
		'm_sedang'=>$m_sedang,
		'm_banyak'=>$m_banyak,
		't_sedikit'=>$t_sedikit,
		't_sedang'=>$t_sedang,
		't_banyak'=>$t_banyak,
		'c_sedikit'=>$c_sedikit,
		'c_sedang'=>$c_sedang,
		'c_banyak'=>$c_banyak,
		'keterangan'=>$hasil
	);
	// var_dump($data);
	// die();
	
	$this->m_rumusfuzzy->update_hasil_nilai($data,$where);
	redirect('c_rumusfuzzy/tabel');
	}

	public function rumus_nilai2 ($id){
		$this->load->model('m_rumusfuzzy');
		$data['pecah'] = $this->m_rumusfuzzy->pecahpunya2($id);
		// var_dump($data);
		// die();
	
		foreach($data['pecah'] as $row){
			$id = $row->mamdani_id;
			$kemiskinan = $row->kemiskinan;
			$ketelantaran = $row->ketelantaran;
			$kecacatan = $row->kecacatan;
			$rule_kemiskinan = $row->rule_kemiskinan;
			$rule_ketelantaran = $row->rule_ketelantaran;
			$rule_kecacatan = $row->rule_kecacatan;
		}
		
		if($rule_kemiskinan == 'SEDIKIT'){
			if($kemiskinan <=0){
				$m_sedikit = 0;
			}elseif((0<=$kemiskinan)&&($kemiskinan<=100)){
				$m_sedikit= (($kemiskinan-0)/(100-0));
			}elseif((100<=$kemiskinan)&&($kemiskinan<=1000)){
				$m_sedikit= 1;
			}elseif((1000<=$kemiskinan)&&($kemiskinan<=2000)){
				$m_sedikit= ((2000-$kemiskinan)/(2000-1000));
			}elseif(8000<=$kemiskinan){
				$m_sedikit= 0;
			}
		}elseif ($rule_kemiskinan=='SEDANG') {
			if($kemiskinan <=2000){
				$m_sedang = 0;
			}elseif((2000<=$kemiskinan)&&($kemiskinan<=3000)){
				$m_sedang= (($kemiskinan-2000)/(3000-2000));
			}elseif((3000<=$kemiskinan)&&($kemiskinan<=4000)){
				$m_sedang= 1;
			}elseif((4000<=$kemiskinan)&&($kemiskinan<=5000)){
				$m_sedang= ((5000-$kemiskinan)/(5000-4000));
			}elseif(5000<=$kemiskinan){ 
				$m_sedang= 0;
			}
		}elseif ($rule_kemiskinan == 'BANYAK') {
			if($kemiskinan <=5000){
				$m_banyak = 0;
			}elseif((5000<=$kemiskinan)&&($kemiskinan<=6000)){
				$m_banyak= (($kemiskinan-5000)/(6000-5000));
			}elseif((6000<=$kemiskinan)&&($kemiskinan<=7000)){
				$m_banyak= 1;
			}elseif((7000<=$kemiskinan)&&($kemiskinan<=8000)){
				$m_banyak= ((8000-$kemiskinan)/(8000-7000));
			}elseif(8000<=$kemiskinan){ 
				$m_banyak= 0;
			}
		}
		
		if($rule_ketelantaran == 'SEDIKIT'){
			if($ketelantaran<=0){
				$t_sedikit= 0;
			}elseif((0<=$ketelantaran)&&($ketelantaran<=0)){
				$t_sedikit= (($ketelantaran-0)/(0-0));
			}elseif((0<=$ketelantaran)&&($ketelantaran<=200)){
				$t_sedikit= 1;
			}elseif((200<=$ketelantaran)&&($ketelantaran<=500)){
				$t_sedikit= ((500-$ketelantaran)/(500-200));
			}elseif(500<=$ketelantaran){
			 $t_sedikit= 0;
		}
	}elseif ($rule_ketelantaran=='SEDANG') {
		if($ketelantaran<=200){
			$t_sedang= 0;
         }elseif((200<=$ketelantaran)&&($ketelantaran<=500)){
             $t_sedang= (($ketelantaran-200)/(500-200));
         }elseif((500<=$ketelantaran)&&($ketelantaran<=700)){
	 		$t_sedang= 1;
	 	}elseif((700<=$ketelantaran)&&($ketelantaran<=1000)){
	 		$t_sedang= ((1000-$ketelantaran)/(1000-700));
	 	}elseif(1000<=$ketelantaran){
	 		$t_sedang= 0;
	 	}
	 }elseif ($rule_ketelantaran == 'BANYAK') {
	 	if($ketelantaran<=1000){
	 		$t_banyak= 0;
         }elseif((1000<=$ketelantaran)&&($ketelantaran<=1300)){
             $t_banyak= (($ketelantaran-1000)/(1300-1000));
         }elseif((1300<=$ketelantaran)&&($ketelantaran<=1500)){
	 		$t_banyak= 1;
	 	}elseif((1500<=$ketelantaran)&&($ketelantaran<=1800)){
	 		$t_banyak= ((1800-$ketelantaran)/(1800-1500));
	 	}elseif(1800<=$ketelantaran){
	 		$t_banyak= 0;
	 	}
	 }


	 if($rule_kecacatan == 'SEDIKIT'){
	 	if($kecacatan<=0){
	 		$c_sedikit= 0;
         }elseif((0<=$kecacatan)&&($kecacatan<=0)){
             $c_sedikit= (($kecacatan-0)/(0-0));
         }elseif((0<=$kecacatan)&&($kecacatan<=50)){
	 		$c_sedikit= 1;
	 	}elseif((50<=$kecacatan)&&($kecacatan<=100)){
	 		$c_sedikit= ((100-$kecacatan)/(100-50));
	 	}elseif(100<=$kecacatan){
	 		$c_sedikit= 0;
	 	}
	 }elseif ($rule_kecacatan=='SEDANG') {
	 	if($kecacatan<=100){
	 		$c_sedang= 0;
         }elseif((100<=$kecacatan)&&($kecacatan<=200)){
             $c_sedang= (($kecacatan-100)/(100-200));
         }elseif((200<=$kecacatan)&&($kecacatan<=300)){
	 		$c_sedang= 1;
	 	}elseif((300<=$kecacatan)&&($kecacatan<=400)){
	 		$c_sedang= ((400-$kecacatan)/(400-300));
	 	}elseif(400<=$kecacatan){
	 		$c_sedang= 0;
	 	}
	 }elseif ($rule_kecacatan == 'BANYAK') {
	 	if($kecacatan<=300){
	 		$c_banyak= 0;
         }elseif((300<=$kecacatan)&&($kecacatan<=400)){
             $c_banyak= (($kecacatan-0)/(400-300));
         }elseif((400<=$kecacatan)&&($kecacatan<=500)){
	 		$c_banyak= 1;
	 	}elseif((500<=$kecacatan)&&($kecacatan<=600)){
	 		$c_banyak= ((600-$kecacatan)/(600-500));
	 	}elseif(600<=$kecacatan){
	 		$c_banyak= 0;
	 	}
	 }


	// if($kemiskinan <=0){
	// 	$m_sedikit = 0;
	// }elseif((0<=$kemiskinan)&&($kemiskinan<=2000)){
	// 	$m_sedikit= (($kemiskinan-2000)/(2000-0));
	// }elseif((2000<=$kemiskinan)&&($kemiskinan<=5000)){
	// 	$m_sedikit= 1;
	// }elseif((5000<=$kemiskinan)&&($kemiskinan<=8000)){
	// 	$m_sedikit= ((8000-$kemiskinan)/(8000-5000));
	// }elseif(8000<=$kemiskinan){ 
	// 	$m_sedikit= 0;
	// }
	
	// if($ketelantaran<=0){
	// 	$m_sedang= 0;
	// }elseif((0<=$ketelantaran)&&($ketelantaran<=500)){
	// 	$m_sedang= (($ketelantaran-0)/(500-0));
	// }elseif((200<=$ketelantaran)&&($ketelantaran<=1000)){
	// 	$m_sedang= 1;
	// }elseif((1000<=$ketelantaran)&&($ketelantaran<=1800)){
	// 	$m_sedang= ((1800-$ketelantaran)/(1800-1000));
	// }elseif(1800<=$ketelantaran){
	// 	$m_sedang= 0;
	// }
	
	// if($kecacatan<=0){
	// 	$m_banyak= 0;
	// }elseif((0<=$kecacatan)&&($kecacatan<=100)){
	// 	$m_banyak= (($kecacatan-0)/(400-300));
	// }elseif((100<=$kecacatan)&&($kecacatan<=400)){
	// 	$m_banyak= 1;
	// }elseif((300<=$kecacatan)&&($kecacatan<=600)){
	// 	$m_banyak= ((600-$kecacatan)/(600-500));
	// }elseif(600<=$kemiskinan){
	// 	$m_banyak= 0;
	// }
	

	/********************************* hasil fuzzy */
	//IMPLIKASI
	if($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDANG"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "BANYAK"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDANG"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "BANYAK"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDANG"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDIKIT" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDANG"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "BANYAK"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDANG"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDANG"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "SEDANG" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SANGAT SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "SEDANG"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDIKIT" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "SEDANG"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "SEDANG" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDIKIT"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "SEDANG"){
		$hasil = "KURANG SEJAHTERA";
	}elseif($rule_kemiskinan == "BANYAK" && $rule_ketelantaran == "BANYAK" && $rule_kecacatan == "BANYAK"){
		$hasil = "KURANG SEJAHTERA";
	}

	// Defuzzyfikasi
	$where = array('mamdani_id'=>$id);
	$data = array(
		'kemiskinan'=>$kemiskinan,
		'ketelantaran'=>$ketelantaran,
		'kecacatan'=>$kecacatan,
		'rule_kemiskinan'=>$rule_kemiskinan,
		'rule_ketelantaran'=>$rule_ketelantaran,
		'rule_kecacatan'=>$rule_kecacatan,
		'm_sedikit'=>$m_sedikit,
		'm_sedang'=>$m_sedang,
		'm_banyak'=>$m_banyak,
		't_sedikit'=>$t_sedikit,
		't_sedang'=>$t_sedang,
		't_banyak'=>$t_banyak,
		'c_sedikit'=>$c_sedikit,
		'c_sedang'=>$c_sedang,
		'c_banyak'=>$c_banyak,
		'keterangan'=>$hasil
	);
	// var_dump($data);
	// die();
	
	$this->m_rumusfuzzy->update_hasil_nilai2($data,$where);
	redirect('c_rumusfuzzy/tabel2');
	}
	/*******************************end fuzzy****************************** */
	

	public function nilai_fuzzy_inferensi(){

		$this->load->model('m_rumusfuzzy');

		$this->m_rumusfuzzy->nilai_inferensi();
		$this->m_rumusfuzzy->fungsi_keanggotaan_output();
		redirect('c_rumusfuzzy/tabel');
	}

	// public function output_fungsi_keanggotaan($id){
	// 	//segitiga
	// 	$this->load->model('m_rumusfuzzy');
	// 	$data['pecah'] = $this->m_rumusfuzzy->fungsi_keanggotaan_output($id);
	// 	foreach($data['pecah'] as $row){
	// 	$id = $row->mamdani_id;
	// 	$kemiskinan = $row->rule_nilai;
		
	// }
	//}

	}

?>
	
	