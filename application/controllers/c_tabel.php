<?php
class C_Tabel extends CI_Controller{


    function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('m_tabel');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library("pagination");
       
    }

    /* controller lihat tabel*/
    public function tabel(){
        $config = array();
        $config["base_url"] = base_url() . "c_tabel/tabel";
        $config["per_page"] = 10000;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
        $data["c_tabel"] = $this->m_tabel->
            tampil_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view('templates/header');
        $this->load->view('admin/lihatdata/tabel', $data);
        $this->load->view('templates/footer');
        
    }
    
    /* end controller lihat tabel*/

    /**controller form input data */
    public function view_input(){
        $data['c_tabel']=$this->m_tabel->kategori_kecamatan()->result();
        $data['pmks']=$this->m_tabel->kategori_pmks()->result();
        $this->load->view('templates/header');
        $this->load->view('admin/inputdata/input_pmks',$data);
        $this->load->view('templates/footer');
    }
    /**end controller form input data */

    /* controller tambah data*/
    public function tambah_data(){

        $this->_rules();
        if($this->form_validation->run()==FALSE){
            $this->view_input();
        }else{
            $nama           = $this->input->post('nama');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir  = $this->input->post('tanggal_lahir');
            $nik            = $this->input->post('nik');
            $kk             = $this->input->post('kk');
            $alamat_asal    = $this->input->post('alamat_asal');
            $kelurahan      = $this->input->post('kelurahan');
            $kecamatan      = $this->input->post('kecamatan');
            $kota           = $this->input->post('kota');
            $jenis_pmks     = $this->input->post('jenis_pmks');
            $tahun_masuk    = $this->input->post('tahun_masuk');
        //    $created_at     = date('Y-m-d');

            $data = array(
                'nama'          => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'nik'           => $nik,
                'kk'            => $kk,
                'alamat_asal'   => $alamat_asal,
                'kelurahan'     => $kelurahan,
                'kecamatan'     => $kecamatan,
                'kota'          => $kota,
                'jenis_pmks'    => $jenis_pmks,
                'tahun_masuk'   => $tahun_masuk
             //   'created_at'    =>$created_at
            );
            $this->m_tabel->input_data($data,'tb_penduduk');
            $this->session->set_flashdata('pesan','data sukses ditambahkan');
            redirect('c_tabel/tabel');
        } 
    }
    /* end controller tambah tabel*/

     /* controller form edit data*/
     public function edit_pmks($id){
        $where = array('penduduk_id' => $id );
        $data['penduduk'] = $this->db->query("SELECT * FROM tb_penduduk WHERE 
        penduduk_id ='$id'")->result();

        $data['kategori']=$this->m_tabel->kategori_kecamatan()->result();
        $data['pmks']=$this->m_tabel->kategori_pmks()->result();

        $this->load->view('templates/header');
        $this->load->view('admin/lihatdata/edit_pmks', $data);
        $this->load->view('templates/footer');
    }
    /* end controller form edit data*/

    /* controller update data*/
    public function update_pmks(){
            $id             = $this->input->post('penduduk_id');
            $nama           = $this->input->post('nama');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir  = $this->input->post('tanggal_lahir');
            $nik            = $this->input->post('nik');
            $kk             = $this->input->post('kk');
            $alamat_asal    = $this->input->post('alamat_asal');
            $kelurahan      = $this->input->post('kelurahan');
            $kecamatan      = $this->input->post('kecamatan');
            $kota           = $this->input->post('kota');
            $jenis_pmks     = $this->input->post('jenis_pmks');
            $tahun_masuk    = $this->input->post('tahun_masuk');
            //$created_at     = date('Y-m-d');

            $data = array(
                'nama'          => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'nik'           => $nik,
                'kk'            => $kk,
                'alamat_asal'   => $alamat_asal,
                'kelurahan'     => $kelurahan,
                'kecamatan'     => $kecamatan,
                'kota'          => $kota,
                'jenis_pmks'    => $jenis_pmks,
                'tahun_masuk'   => $tahun_masuk
              //  'created_at'    =>$created_at
            );
            $where = array(
                'penduduk_id' => $id
            );
            $this->m_tabel->update_data($where, $data,'tb_penduduk');
            redirect('c_tabel/tabel');
        
    }
    /* end controller update data*/


    /**validasi tambah data */
    public function _rules(){
        $this->form_validation->set_rules('nama','Nama','required|alpha');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|alpha');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('nik','Nomor Induk Keluarga','required|numeric|max_length[16]|min_length[16]');
        $this->form_validation->set_rules('kk','Kartu Keluarga','required|numeric|max_length[16]|min_length[16]');
        $this->form_validation->set_rules('alamat_asal','Alamat Asal','required');
        $this->form_validation->set_rules('kelurahan','Kelurahan','required');
        $this->form_validation->set_rules('kecamatan','Kecamatan','required');
        $this->form_validation->set_rules('kota','Kota','required');
        $this->form_validation->set_rules('jenis_pmks','Jenis PMKS','required');
        $this->form_validation->set_rules('tahun_masuk','Tahun Masuk','required');

    }
    /**end validasi tambah data */

    /* controller hapus data*/
    public function hapus($id){
        $where = array('penduduk_id' => $id );
        $this->m_tabel->hapus_data($where, 'tb_penduduk');
        redirect('c_tabel/tabel');
    }
    /* end controller hapus data*/

   
    /**view data */
    public function detail($penduduk_id){
        $this->load->model('m_tabel');
        $detail = $this->m_tabel->detail_tabel($penduduk_id);
        $data['detail'] = $detail;

        $this->load->view('templates/header');
        $this->load->view('admin/lihatdata/detail', $data);
        $this->load->view('templates/footer');
    }
    /**end view data */

    /**search */
    public function search(){
        $keyword = $this->input->post('keyword');
        $data['c_tabel']=$this->m_tabel->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('admin/tabel', $data);
        $this->load->view('templates/footer');
    }
    /**end search */

    /* controller kategori desa*/
    public function kategori_desa(){
        $kecamatan_id = $this->input->post('id');
        $data = $this->m_tabel->kategori_desa($kecamatan_id)->result();
        echo json_encode($data);
    }
    /* end controller kategori desa*/

    /**data penduduk crud */
    function input_penduduk(){
        $data['c_tabel']=$this->m_tabel->kategori_kecamatan()->result();
       // $data['pmks']=$this->m_tabel->kategori_pmks()->result();
        $this->load->view('templates/header');
        $this->load->view('admin/inputdata/input_data_penduduk',$data);
        $this->load->view('templates/footer');
    }
    /**end data penduduk crud */
    
}

?>