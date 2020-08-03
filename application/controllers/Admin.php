<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function dashboard()
	{
		

		$data['total_pmks'] = $this->m_tabel->total_pmks();
		$data['total_kelurahan'] = $this->m_tabel->total_kelurahan();
		$data['total_kecamatan'] = $this->m_tabel->total_kecamatan();
		$data['total_laki'] = $this->m_tabel->total_laki();
		$data['total_perempuan'] = $this->m_tabel->total_perempuan();
		// $data['total_perkecamatan'] = $this->m_tabel->total_perkecamatan();
		// $data['total_jenis'] = $this->m_tabel->total_jenis();

		$this->load->view('templates/header');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('templates/footer');
	}

	/** EXAMPLE MAPS */
	public function leaflet(){
		$this->load->library('leaflet');
		$config = array(
			'center'         => '-0.959, 100.39716', // Center of the map
			'zoom'           => 12, // Map zoom
			);
		$this->leaflet->initialize($config);
		
		$marker = array(
			'latlng' 		=>'-0.959, 100.39716', // Marker Location
			'popupContent' 	=> 'Hi, iam a popup!!', // Popup Content
			);
			$this->leaflet->add_marker($marker);
			$data['map'] =  $this->leaflet->create_map();
			$this->load->view('admin/peta',$data);
		
	}

	
	/**END EXAMPLE MAPS */
/** coba Maps */
	public function visualisasi(){
		$this->load->library('leaflet');
		$config = array(
			'center'         => '-6.879704, 109.125595', // Center of the map
			'zoom'           => 12, // Map zoom
			);
		$this->leaflet->initialize($config);
		
		// $marker = array(
		// 	'latlng' 		=>'-6.879704, 109.125595', // Marker Location
		// 	'popupContent' 	=> 'Hi, iam a popup!!', // Popup Content
		// 	);
		//	$this->leaflet->add_marker($marker);
			//$data['map']= $this->m_login->m_visualisasi();
			$data['map'] =  $this->leaflet->create_map();
			$this->load->view('user/gis',$data);

	}

	public function vis(){
		$this->load->view('user/gis2');
	}

	/** END coba Maps */
	public function login(){
        $this->load->view('admin/login');
	}
	
	public function profil(){
		$data['profil'] = $this->m_tabel->profil()->result();
		
        $this->load->view('templates/header');
        $this->load->view('admin/profil',$data);
        $this->load->view('templates/footer');
	}
	
	/* controller update data*/
    public function update(){
        $id         = $this->input->post('user_id');
        $email		= $this->input->post('user_email');
        $password	= $this->input->post('user_password');
        $nama	   	= $this->input->post('user_nama');

        $data = array('user_email' => $email,
            'user_password' => MD5($password),
            'user_nama'  => $nama,
     );
     $where = array(
         'user_id' => $id
     );
     $this->m_tabel->update_profil($where,$data,'tb_admin');
     redirect('admin/profil');

    }
}
