<?php
class C_Tabel extends My_Controller{


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

     // $data['c_tabel']=$this->m_tabel->tampil_data();

        $this->load->view('templates/header');
        $this->load->view('admin/lihatdata/tabel_penduduk', $data);
        $this->load->view('templates/footer');


        
    }
    
    /* end controller lihat tabel*/

    /**controller form input data */
    public function view_input(){
        $data['c_tabel']=$this->m_tabel->kategori_kecamatan()->result();
        $data['menu'] = $this->m_variabel->sub_variabel();
        $data['menu'] = $this->m_variabel->sub_variabel_aset();
        $data['menu'] = $this->m_variabel->sub_variabel_program_sosial();
        $data['title']='c_tabel';
       // $data['variabel']=$this->m_tabel->variabel_penduduk();
     ///   $data['sub_variabel']=$this->m_tabel->sub_variabel_penduduk();
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
            $kecamatan = $this->input->post('kecamatan');
            $kelurahan = $this->input->post('kelurahan');
            $alamat = $this->input->post('alamat');
            $krt = $this->input->post('krt');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jml_art = $this->input->post('jml_art');
            $kk = $this->input->post('kk');
            $nik = $this->input->post('nik');

            $post= $this->input->post();

            $status_bangunan = $this->input->post('status_bangunan');
            $status_lahan = $this->input->post('status_lahan');
            $luas_lantai = $this->input->post('luas_lantai');
            $jenis_lantai = $this->input->post('jenis_lantai');
            $jenis_dinding = $this->input->post('jenis_dinding');
            $kondisi_dinding = $this->input->post('kondisi_dinding');
            $jenis_atap = $this->input->post('jenis_atap');
            $kondisi_atap = $this->input->post('kondisi_atap');
            $sumber_air_minum = $this->input->post('sumber_air_minum');
            $cara_memperoleh_air = $this->input->post('cara_memperoleh_air');
            $sumber_penerangan = $this->input->post('sumber_penerangan');
            $daya = $this->input->post('daya');
            $bahan_masak = $this->input->post('bahan_memasak');
            $fasilitas_bab = $this->input->post('fasilitas_bab');
            $jenis_kloset = $this->input->post('jenis_kloset');
            $tempat_pembuangan_akhir_tinja = $this->input->post('tempat_pembuangan_akhir_tinja');

            // $total=$status_bangunan+$status_lahan+$jenis_lantai+$jenis_dinding+$kondisi_dinding+$jenis_atap+
            // $kondisi_atap+$sumber_air_minum+$cara_memperoleh_air+$sumber_penerangan+$daya+$bahan_masak+
            // $fasilitas_bab+$jenis_kloset+$tempat_pembuangan_akhir_tinja;

            $tabung_gas = $this->input->post('tabung_gas');
            $lemari_es = $this->input->post('lemari_es');
            // $ac = $this->input->post('ac');
            $pemanas_air = $this->input->post('pemanas_air');
            // $telpon = $this->input->post('telpon');
            $televisi = $this->input->post('televisi');
            $emas = $this->input->post('emas');
            $komputer = $this->input->post('komputer');
            $sepeda = $this->input->post('sepeda');
            $sepeda_motor = $this->input->post('sepeda_motor');
            // $monil = $this->input->post('monil');
            // $perahu = $this->input->post('perahu');
            $lahan = $this->input->post('lahan');
            $rumah_ditempat_lain = $this->input->post('rumah_ditempat_lain');
            $pekerjaan = $this->input->post('pekerjaan');
            // $omset_perbulan = $this->input->post('omset_perbulan');
            $kps1 = $this->input->post('kps1');
            $kip1 = $this->input->post('kip1');
            $kis1 = $this->input->post('kis1');
            $bpjs_mandiri = $this->input->post('bpjs_mandiri');
            $jamsostek = $this->input->post('jamsostek');
            $asuransi_kesehatan_lainnya = $this->input->post('asuransi_kesehatan_lainnya');
            $pkh1 = $this->input->post('pkh1');
            $raskin1 = $this->input->post('raskin1');
            $kur = $this->input->post('kur');

            // $asset_bergerak=$tabung_gas+$lemari_es+$pemanas_air+$televisi+$emas+$komputer+$sepeda+$sepeda_motor;
            // $asset_tidak_bergerak=$lahan+$rumah_ditempat_lain+$pekerjaan;

            // $total_aset=$asset_bergerak+$asset_tidak_bergerak;
            // $total_jaminan_sosial=$kps1+$kip1+$kis1+$bpjs_mandiri+$jamsostek+$asuransi_kesehatan_lainnya+$pkh1+$raskin1+$kur;
        //    $created_at     = date('Y-m-d');

            $data = array(
                // 'provinsi' => $provinsi,
                // 'kabupaten' => $kota,
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                // 'nama_sls' => $sls,
                'alamat' => $alamat,
                'nama_krt'=>$krt,
                'jenis_kelamin'=>$jenis_kelamin,
                'jumlah_art'=>$jml_art,
                // 'jumlah_keluarga'=>$jml_keluarga,
                'kk' => $kk,
                'nik' => $nik,
                'tahun_input'=> date('Y')
             //   'created_at'    =>$created_at
            );

            $data2 = array('status_tempat_tinggal' => $status_bangunan,
            'status_lahan_tempat_tinggal' => $status_lahan,
            'luas_lantai' => $luas_lantai,
            'jenis_lantai_terluas' => $jenis_lantai,
            'jenis_dinding_terluas' =>$jenis_dinding,
            'kondisi_dinding' =>$kondisi_dinding,
            'jenis_atap_terluas'=>$jenis_atap,
            'kondisi_atap'=>$kondisi_atap,
            // 'jumlah_kamar_tidur'=>$jumlah_kamar_tidur,
            'sumber_air_minum'=>$sumber_air_minum,
            'cara_memperoleh_air_minum'=>$cara_memperoleh_air,
            'sumber_penerangan_utama'=>$sumber_penerangan,
            'daya_terpasang'=>$daya,
            'bahan_bakar_memasak'=>$bahan_masak,
            'penggunaan_fasilitas_bab'=>$fasilitas_bab,
            'jenis_kloset'=>$jenis_kloset,
            'tempat_pembuangan_akhir_tinja'=>$tempat_pembuangan_akhir_tinja
            // 'total'=> $total
         );

         $data4 = array('tabung_gas'=>$tabung_gas,'lemari_es'=>$lemari_es,
        //  'ac'=>$ac,
        'pemanas_air'=>$pemanas_air,
        // 'telepon'=>$telpon,
        'televisi'=>$televisi,'emas'=>$emas,'komputer'=>$komputer,
        'sepeda'=>$sepeda,'sepeda_motor'=>$sepeda_motor,
        // 'monil'=>$monil,'perahu'=>$perahu,
        'lahan'=>$lahan,'properti_lain'=>$rumah_ditempat_lain,'pekerjaan'=>$pekerjaan,
        // 'nama_ternak'=>$ternak,'jumlah_ternak'=>$jumlah_ternak,'omset'=>$omset_perbulan,
        'peserta_kks_kps'=>$kps1,
        'peserta_kip_bsm'=>$kip1, 'peserta_kis'=>$kis1,'peserta_bpjs'=>$bpjs_mandiri,
        'peserta_jamsostek'=>$jamsostek,'peserta_asuransi_lainnya'=>$asuransi_kesehatan_lainnya,
        'peserta_pkh'=>$pkh1, 'penerima_raskin'=>$raskin1,
        'kur'=>$kur
         );

       $data_klasifikasi=array('kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'jumlah_tanggungan'=>$jml_art,
    //    'keterangan_rumah'=>$total,
    //    'jumlah_kepemilikan_aset'=>$total_aset,'program_sosial'=>$total_jaminan_sosial,
    'tahun_klasifikasi'=>date('Y')
    );
         
           $this->m_tabel->input_data($data,$data2,$data4,$data_klasifikasi); //,$data_klasifikasi
   
            $this->session->set_flashdata('pesan','data sukses ditambahkan');
            redirect('c_tabel/tabel'); //tabel
        } 
    }
    /* end controller tambah tabel*/

    

     /* controller form edit data*/
     public function edit_pmks($id = null){
        $data['penduduk']=$this->m_tabel->menampilkan_tabel_penduduk($id);
        $data['kategori']=$this->m_tabel->kategori_kecamatan()->result();
        // $data['rumah'] = $this->m_tabel->get_sub_variabel();

        $this->load->view('templates/header');
        $this->load->view('admin/lihatdata/edit_pmks', $data);
        $this->load->view('templates/footer');
// var_dump($data);

    }
    /* end controller form edit data*/

    /* controller update data*/
    public function update_pmks($id){
        $this->_rules();
        if($this->form_validation->run()==FALSE){
            $this->edit_pmks($this->input->post('id'));
        }else{
            $id             = $this->input->post('id');

            $tempat_id = $this->input->post('tempat_id');
            $kecamatan = $this->input->post('kecamatan');
            $kelurahan = $this->input->post('kelurahan');
            // $sls = $this->input->post('sls');
            $alamat = $this->input->post('alamat');
            $krt = $this->input->post('krt');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jml_art = $this->input->post('jml_art');
            // $jml_keluarga = $this->input->post('jml_keluarga');
            $kk = $this->input->post('kk');
            $nik = $this->input->post('nik');

            $id_rumah= $this->input->post('id_rumah');
            $kk_rumah = $this->input->post('kk_rumah');
            $status_bangunan = $this->input->post('status_bangunan');
            $status_lahan = $this->input->post('status_lahan');
            $luas_lantai = $this->input->post('luas_lantai');
            $jenis_lantai = $this->input->post('jenis_lantai');
            $jenis_dinding = $this->input->post('jenis_dinding');
            $kondisi_dinding = $this->input->post('kondisi_dinding');
            $jenis_atap = $this->input->post('jenis_atap');
            $kondisi_atap = $this->input->post('kondisi_atap');
            $sumber_air_minum = $this->input->post('sumber_air_minum');
            $cara_memperoleh_air = $this->input->post('cara_memperoleh_air');
            $sumber_penerangan = $this->input->post('sumber_penerangan');
            $daya = $this->input->post('daya');
            $bahan_masak = $this->input->post('bahan_memasak');
            $fasilitas_bab = $this->input->post('fasilitas_bab');
            $jenis_kloset = $this->input->post('jenis_kloset');
            $tempat_pembuangan_akhir_tinja = $this->input->post('tempat_pembuangan_akhir_tinja');

            // $total=$status_bangunan+$status_lahan+$jenis_lantai+$jenis_dinding+$kondisi_dinding+$jenis_atap+
            // $kondisi_atap+$sumber_air_minum+$cara_memperoleh_air+$sumber_penerangan+$daya+$bahan_masak+
            // $fasilitas_bab+$jenis_kloset+$tempat_pembuangan_akhir_tinja;

            $id_aset = $this->input->post('id_aset');
            $kk_aset = $this->input->post('kk_aset');
            $tabung_gas = $this->input->post('tabung_gas');
            $lemari_es = $this->input->post('lemari_es');
            // $ac = $this->input->post('ac');
            $pemanas_air = $this->input->post('pemanas_air');
            // $telpon = $this->input->post('telpon');
            $televisi = $this->input->post('televisi');
            $emas = $this->input->post('emas');
            $komputer = $this->input->post('komputer');
            $sepeda = $this->input->post('sepeda');
            $sepeda_motor = $this->input->post('sepeda_motor');
            // $monil = $this->input->post('monil');
            // $perahu = $this->input->post('perahu');
            $lahan = $this->input->post('lahan');
            $rumah_ditempat_lain = $this->input->post('rumah_ditempat_lain');
            $pekerjaan = $this->input->post('pekerjaan');
            // $omset_perbulan = $this->input->post('omset_perbulan');
            $kps1 = $this->input->post('kps1');
            $kip1 = $this->input->post('kip1');
            $kis1 = $this->input->post('kis1');
            $bpjs_mandiri = $this->input->post('bpjs_mandiri');
            $jamsostek = $this->input->post('jamsostek');
            $asuransi_kesehatan_lainnya = $this->input->post('asuransi_kesehatan_lainnya');
            $pkh1 = $this->input->post('pkh1');
            $raskin1 = $this->input->post('raskin1');
            $kur = $this->input->post('kur');

            // $asset_bergerak=$tabung_gas+$lemari_es+$pemanas_air+$televisi+$emas+$komputer+$sepeda+$sepeda_motor;
            // $asset_tidak_bergerak=$lahan+$rumah_ditempat_lain;

            // $total_aset=$asset_bergerak+$asset_tidak_bergerak;
            // $total_jaminan_sosial=$kps1+$kip1+$kis1+$bpjs_mandiri+$jamsostek+$asuransi_kesehatan_lainnya+$pkh1+$raskin1+$kur;
       

            $data = array(
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                'alamat' => $alamat,
                'nama_krt'=>$krt,
                'jenis_kelamin'=>$jenis_kelamin,
                'jumlah_art'=>$jml_art,
                'kk' => $kk,
                'nik' => $nik,
                'tahun_input'=> date('Y')
            );

            $data2 = array('status_tempat_tinggal' => $status_bangunan,
            'status_lahan_tempat_tinggal' => $status_lahan,
            'luas_lantai' => $luas_lantai,
            'jenis_lantai_terluas' => $jenis_lantai,
            'jenis_dinding_terluas' =>$jenis_dinding,
            'kondisi_dinding' =>$kondisi_dinding,
            'jenis_atap_terluas'=>$jenis_atap,
            'kondisi_atap'=>$kondisi_atap,
            'sumber_air_minum'=>$sumber_air_minum,
            'cara_memperoleh_air_minum'=>$cara_memperoleh_air,
            'sumber_penerangan_utama'=>$sumber_penerangan,
            'daya_terpasang'=>$daya,
            'bahan_bakar_memasak'=>$bahan_masak,
            'penggunaan_fasilitas_bab'=>$fasilitas_bab,
            'jenis_kloset'=>$jenis_kloset,
            'tempat_pembuangan_akhir_tinja'=>$tempat_pembuangan_akhir_tinja
         );

         $data4 = array('tabung_gas'=>$tabung_gas,'lemari_es'=>$lemari_es,
        //  'ac'=>$ac,
         'pemanas_air'=>$pemanas_air,
        //  'telepon'=>$telpon,
         'televisi'=>$televisi,'emas'=>$emas,'komputer'=>$komputer,
         'sepeda'=>$sepeda,'sepeda_motor'=>$sepeda_motor,
        //  'monil'=>$monil,'perahu'=>$perahu,
         'lahan'=>$lahan,'properti_lain'=>$rumah_ditempat_lain,'pekerjaan'=>$pekerjaan,
        //'omset'=>$omset_perbulan,
        'peserta_kks_kps'=>$kps1,
         'peserta_kip_bsm'=>$kip1, 'peserta_kis'=>$kis1,'peserta_bpjs'=>$bpjs_mandiri,
         'peserta_jamsostek'=>$jamsostek,'peserta_asuransi_lainnya'=>$asuransi_kesehatan_lainnya,
         'peserta_pkh'=>$pkh1, 'penerima_raskin'=>$raskin1,
         'kur'=>$kur
          );

          $data_klasifikasi=array('kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,
       'jumlah_tanggungan'=>$jml_art,
    //    'keterangan_rumah'=>$total,
    //    'jumlah_kepemilikan_aset'=>$total_aset,'program_sosial'=>$total_jaminan_sosial,
       'tahun_klasifikasi'=>date('Y'));
         
        $where=array('klasifikasi_id'=>$id);
        $where2=array('id'=>$kk_rumah);
        $where3 = array('id' => $kk_aset);
        $where4 = array('id'=>$tempat_id);
        
        $this->m_tabel->update_data1($where4,$data,'tb_penduduk_pengenalan_tempat');
        $this->m_tabel->update_data2($where2,$data2,'tb_penduduk_keterangan_rumah');
        $this->m_tabel->update_data3($where3,$data4,'tb_penduduk_kepemilikan_aset');
        $this->m_tabel->update_data4($where,$data_klasifikasi,'tb_klasifikasi_penduduk'); //,$where2,$where3,$where4
       $this->m_tabel->update_total_bobot_klasifikasi($this->input->post('id'));
        
        redirect('c_tabel/tabel'); //tabel
        }
       
        
    }
    /* end controller update data*/


    /**validasi tambah data */
    public function _rules(){
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('krt','Nama Kepala Keluarga','required');
         $this->form_validation->set_rules('jml_art','Jumlah Anggota Rumah Tangga','required');
        $this->form_validation->set_rules('nik','Nomor Induk Keluarga','required|max_length[16]|numeric'); //|max_length[16]|min_length[16]
        $this->form_validation->set_rules('kk','Kartu Keluarga','required|max_length[16]|numeric'); //|max_length[16]|min_length[16]
        // $this->form_validation->set_rules('alamat_asal','Alamat Asal','required');
        $this->form_validation->set_rules('kelurahan','Desa','required');
        $this->form_validation->set_rules('kecamatan','Kecamatan','required');
        // $this->form_validation->set_rules('kota','Kota','required');
        // $this->form_validation->set_rules('jenis_pmks','Jenis PMKS','required');
        // $this->form_validation->set_rules('tahun_masuk','Tahun Masuk','required');

    }
    /**end validasi tambah data */

    /* controller hapus data*/
    public function hapus($id){
        // $where = array('penduduk_id' => $id );
        // $this->m_tabel->hapus_data($where, 'tb_penduduk');
        $this->m_tabel->hapus_data($id);
        redirect('c_tabel/tabel');
    }
    /* end controller hapus data*/

   
    /**view data */
    public function detail($penduduk_id){
        $this->load->model('m_tabel');
        $data['detail'] = $this->m_tabel->detail_tabel($penduduk_id);
        $data['rumah'] = $this->m_tabel->get_sub_variabel();
        $data['aset'] = $this->m_tabel->get_sub_variabel_aset();
        $data['program'] = $this->m_tabel->get_sub_variabel_program();
       // $data['detail'] = $detail;

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

    /* controller kategori desa*/
    public function sub_kategori_variabel_penduduk(){
        $variabel_id = $this->input->post('id');
        $data = $this->m_tabel->sub_variabel_penduduk($variabel_id)->result();
        echo json_encode($data);
    }
    /* end controller kategori desa*/

    /**data penduduk crud */
    function input_penduduk(){
        $data['c_tabel']=$this->m_tabel->kategori_kecamatan()->result();
       
        $this->load->view('templates/header');
        $this->load->view('admin/inputdata/input_data_penduduk',$data);
        $this->load->view('templates/footer');
    }

    function insert_penduduk(){
        $provinsi=$this->input->post('provinsi');
        $kota=$this->input->post('kota');
        $kecamatan=$this->input->post('kecamatan');
        $kelurahan=$this->input->post('kelurahan');
        $sls=$this->input->post('sls');
        $alamat=$this->input->post('alamat');
        $krt=$this->input->post('krt');
        $jml_art=$this->input->post('jml_art');
        $jml_keluarga=$this->input->post('jml_keluarga');
        $kk=$this->input->post('kk');

    }
    /**end data penduduk crud */
 
    function klasifikasi(){
        $data=$this->m_tabel->klasifikasi();

    }

    function buat_total_rumah($id){
        $detail = $this->m_tabel->detail_tabel($id);
        $rumah= $this->m_tabel->get_sub_variabel();

       
            foreach ($rumah as $k) {
                if ($k->sub_id== $detail->status_tempat_tinggal) {
                     $status_tempat_tinggal= $k->skor;
                }
                if ($k->sub_id== $detail->status_lahan_tempat_tinggal) {
                     $status_lahan= $k->skor;
                }
                if ($k->sub_id== $detail->luas_lantai) {
                     $luas_lantai= $k->skor;
                }
                if ($k->sub_id== $detail->jenis_lantai_terluas) {
                    $jenis_lantai= $k->skor;
               }
               if ($k->sub_id== $detail->jenis_dinding_terluas) {
                   $jenis_dinding= $k->skor;
                }
                if ($k->sub_id== $detail->kondisi_dinding) {
                    $kondisi_dinding= $k->skor;
               }
               if ($k->sub_id== $detail->jenis_atap_terluas) {
                    $jenis_atap= $k->skor;
                }
                if ($k->sub_id== $detail->kondisi_atap) {
                    $kondisi_atap= $k->skor;
               }
               if ($k->sub_id== $detail->sumber_air_minum) {
                    $sumber_air_minum= $k->skor;
                }
                if ($k->sub_id== $detail->cara_memperoleh_air_minum) {
                    $cara_memperoleh_air= $k->skor;
               }
               if ($k->sub_id== $detail->sumber_penerangan_utama) {
                    $sumber_penerangan= $k->skor;
                }
                if ($k->sub_id== $detail->daya_terpasang) {
                    $daya= $k->skor;
               }
               if ($k->sub_id== $detail->bahan_bakar_memasak) {
                    $bahan_masak= $k->skor;
                }
                if ($k->sub_id== $detail->penggunaan_fasilitas_bab) {
                    $fasilitas_bab= $k->skor;
                }
                if ($k->sub_id== $detail->jenis_kloset) {
                    $jenis_kloset= $k->skor;
               }
               if ($k->sub_id== $detail->tempat_pembuangan_akhir_tinja) {
                    $tempat_pembuangan_akhir_tinja= $k->skor;
                }
            }

            $update_total_rumah= $status_tempat_tinggal+$status_lahan+$luas_lantai+$jenis_lantai+$jenis_dinding+$kondisi_dinding+$jenis_atap+$kondisi_atap+$sumber_air_minum+$cara_memperoleh_air+$sumber_penerangan+$daya+$bahan_masak+$fasilitas_bab+$jenis_kloset+$tempat_pembuangan_akhir_tinja;
            $this->m_tabel->update_rumah($update_total_rumah);
        

        // var_dump($status_tempat_tinggal);die;

    }
}

?>