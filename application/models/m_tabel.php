 <?php

class M_Tabel extends CI_Model{

    /**prfil admin */
    public function profil(){
            $hasil = $this->db->query("SELECT * FROM tb_admin WHERE user_id ");
            return $hasil;
    }

    /**model update data */
    public function update_profil($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    /**model tampil data */
    public function tampil_data($limit, $start){ //
        $this->db->limit($limit, $start);
       $res=array();
        $this->db->select("*");
        $this->db->from("tb_klasifikasi_penduduk");
        $this->db->join("tb_kecamatan","tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan");
        $this->db->join("tb_desa","tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan");
        $this->db->join("tb_penduduk_pengenalan_tempat","tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id");
        $this->db->order_by('klasifikasi_id','desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // foreach ($query->result() as $row) {
            //     $data[] = $row;
            // }
            // return $data;
            $res=$query->result();
        }
        return $query->result();
    }
    
    /**model input data */
    public function input_data($data,$data2,$data4,$data_klasifikasi){ //,$data_klasifikasi
        $this->db->trans_start();
        // $this->db->distinct();
        $d=$this->db->insert('tb_penduduk_pengenalan_tempat',$data);
        $id=$this->db->insert_id();
      
        $data2['kk']=$id;
        $this->db->insert('tb_penduduk_keterangan_rumah',$data2);
        $rumah_id=$this->db->insert_id();
        //   $data3['kk']=$id;
        //   $this->db->insert('tb_penduduk_anggota',$data3);
      
        $data4['kk']=$id;
        $this->db->insert('tb_penduduk_kepemilikan_aset',$data4);
        $aset_id=$this->db->insert_id();
      
        $data_klasifikasi['tempat_id']=$id;
        $data_klasifikasi['rumah_id']=$rumah_id;
        $data_klasifikasi['aset_id']=$aset_id;
        $this->db->insert('tb_klasifikasi_penduduk',$data_klasifikasi);
        $klasifikasi_id= $this->db->insert_id();
    
        //   $this->db->trans_complete();
        //   return $this->db->insert_id();
     
        // $this->db->trans_start();
        $detail= $this->db->select('*')->from('tb_klasifikasi_penduduk')
        ->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id','inner')
        ->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id','inner')
        ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id','inner')
        ->where(array('klasifikasi_id'=>$klasifikasi_id))->get()->row();

        $rumah =  $this->db->select('*')->from('tb_sub_variabel')->get()->result();
        $aset =  $this->db->select('*')->from('tb_sub_variabel_aset')->get()->result();
        $program =  $this->db->select('*')->from('tb_sub_variabel_program_sosial')->get()->result();

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

        foreach ($aset as $key) {
            if ($key->sub_id==$detail->tabung_gas) {
                $gas= $key->skor;
            }
            if ($key->sub_id==$detail->lemari_es) {
                $lemari_es= $key->skor;
            }
            if ($key->sub_id==$detail->pemanas_air) {
                $pemanas_air= $key->skor;
            }
            if ($key->sub_id==$detail->televisi) {
                $tv= $key->skor;
            }
            if ($key->sub_id==$detail->emas) {
                $emas= $key->skor;
            }
            if ($key->sub_id==$detail->komputer) {
                $komputer= $key->skor;
            }
            if ($key->sub_id==$detail->sepeda) {
                $sepeda= $key->skor;
            }
            if ($key->sub_id==$detail->sepeda_motor) {
                $sepeda_motor= $key->skor;
            }
            if ($key->sub_id==$detail->lahan) {
                $lahan= $key->skor;
            }
            if ($key->sub_id==$detail->properti_lain) {
                $properti= $key->skor;
            }
            if ($key->sub_id==$detail->pekerjaan) {
                $pekerjaan= $key->skor;
            }
            
        }

        $update_total_aset = $gas+$lemari_es+$pemanas_air+$tv+$emas+$komputer+$sepeda+$sepeda_motor+$lahan+$properti+$pekerjaan;

        foreach ($program as $p) {
            if ($p->sub_id==$detail->peserta_kks_kps) {
                $kks = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_kip_bsm) {
                $kip = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_kis) {
                $kis = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_bpjs) {
                $bpjs = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_jamsostek) {
                $jamsostek = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_asuransi_lainnya) {
                $asuransi_lain = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_pkh) {
                $pkh= $p->skor;
            }
            if ($p->sub_id==$detail->penerima_raskin) {
                $raskin= $p->skor;
            }
            if ($p->sub_id==$detail->kur) {
                $kur= $p->skor;
            }
        }

        $update_total_program_sosial = $kks+$kip+$kis+$bpjs+$jamsostek+$asuransi_lain+$pkh+$raskin+$kur;

        $this->db->query("UPDATE tb_klasifikasi_penduduk SET keterangan_rumah='$update_total_rumah', jumlah_kepemilikan_aset='$update_total_aset', program_sosial='$update_total_program_sosial' WHERE klasifikasi_id='$klasifikasi_id' ");

        
        $this->db->trans_complete();
        return $this->db->insert_id();
    }

    function update_rumah($update_total_rumah){
        $get_insert_id=$this->db->insert_id();
        $this->db->query("UPDATE tb_klasifikasi_penduduk SET keterangan_rumah='$update_total_rumah'");
    }
   
    /**model hapus data */
    public function hapus_data($id){ //$where, $table
        // $this->db->where($where);
        // $this->db->delete($table);
        
        $this->db->query("DELETE tb_klasifikasi_penduduk,tb_penduduk_pengenalan_tempat, tb_penduduk_kepemilikan_aset,tb_penduduk_keterangan_rumah
        FROM tb_klasifikasi_penduduk,tb_penduduk_pengenalan_tempat, tb_penduduk_kepemilikan_aset,tb_penduduk_keterangan_rumah
        WHERE tb_penduduk_pengenalan_tempat.id= tb_klasifikasi_penduduk.tempat_id
        AND tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id AND tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id
        AND klasifikasi_id= '$id' ");

        // $this->db->where('tb_klasifikasi_penduduk.aset_id=tb_penduduk_kepemilikan_aset.id');
        // $this->db->where('tb_klasifikasi_penduduk.rumah_id=tb_penduduk_keterangan_rumah.id');
        // $this->db->where('tb_klasifikasi_penduduk.tempat_id=tb_penduduk_pengenalan_tempat.id');
        // $this->db->where('tb_klasifikasi_penduduk.id',$id);
        // $this->db->delete(array('tb_klasifikasi_penduduk','tb_penduduk_kepemilikan_aset','tb_penduduk_keterangan_rumah','tb_penduduk_pengenalan_tempat'));
    }

    /**model edit data */
    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

    /**Update Data */
    function update_data1($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function update_data2($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function update_data3($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function update_data4($where,$data,$table){ //,$where1,$where2,$where3,$where4
        $this->db->where($where);
         $this->db->update($table,$data);

    }

    function update_total_bobot_klasifikasi($where){
        $this->db->trans_start();
        $detail= $this->db->select('*')->from('tb_klasifikasi_penduduk')
        ->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id','inner')
        ->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id','inner')
        ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id','inner')
        ->where(array('klasifikasi_id'=>$where))->get()->row();

        $rumah =  $this->db->select('*')->from('tb_sub_variabel')->get()->result();
        $aset =  $this->db->select('*')->from('tb_sub_variabel_aset')->get()->result();
        $program =  $this->db->select('*')->from('tb_sub_variabel_program_sosial')->get()->result();

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

        foreach ($aset as $key) {
            if ($key->sub_id==$detail->tabung_gas) {
                $gas= $key->skor;
            }
            if ($key->sub_id==$detail->lemari_es) {
                $lemari_es= $key->skor;
            }
            if ($key->sub_id==$detail->pemanas_air) {
                $pemanas_air= $key->skor;
            }
            if ($key->sub_id==$detail->televisi) {
                $tv= $key->skor;
            }
            if ($key->sub_id==$detail->emas) {
                $emas= $key->skor;
            }
            if ($key->sub_id==$detail->komputer) {
                $komputer= $key->skor;
            }
            if ($key->sub_id==$detail->sepeda) {
                $sepeda= $key->skor;
            }
            if ($key->sub_id==$detail->sepeda_motor) {
                $sepeda_motor= $key->skor;
            }
            if ($key->sub_id==$detail->lahan) {
                $lahan= $key->skor;
            }
            if ($key->sub_id==$detail->properti_lain) {
                $properti= $key->skor;
            }
            if ($key->sub_id==$detail->pekerjaan) {
                $pekerjaan= $key->skor;
            }
            
        }

        $update_total_aset = $gas+$lemari_es+$pemanas_air+$tv+$emas+$komputer+$sepeda+$sepeda_motor+$lahan+$properti+$pekerjaan;

        foreach ($program as $p) {
            if ($p->sub_id==$detail->peserta_kks_kps) {
                $kks = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_kip_bsm) {
                $kip = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_kis) {
                $kis = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_bpjs) {
                $bpjs = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_jamsostek) {
                $jamsostek = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_asuransi_lainnya) {
                $asuransi_lain = $p->skor;
            }
            if ($p->sub_id==$detail->peserta_pkh) {
                $pkh= $p->skor;
            }
            if ($p->sub_id==$detail->penerima_raskin) {
                $raskin= $p->skor;
            }
            if ($p->sub_id==$detail->kur) {
                $kur= $p->skor;
            }
        }

        $update_total_program_sosial = $kks+$kip+$kis+$bpjs+$jamsostek+$asuransi_lain+$pkh+$raskin+$kur;

        $this->db->query("UPDATE tb_klasifikasi_penduduk SET keterangan_rumah='$update_total_rumah', jumlah_kepemilikan_aset='$update_total_aset', program_sosial='$update_total_program_sosial' WHERE klasifikasi_id='$where' ");

        $this->db->trans_complete();
    }

     /**END Update Data */

    /**melihat data penduduk */
    function menampilkan_tabel_penduduk($id){
        return $this->db->select('*')->from('tb_klasifikasi_penduduk')
        ->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan','inner')
        ->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan','inner')
        ->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id','inner')
        ->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id','inner')
        ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id','inner')
        ->where('klasifikasi_id',$id)->get()->result();
      
    }

    /**model detail data */
    public function detail_tabel($id = NULL){
        // $query = $this->db->get_where('tb_klasifikasi_penduduk', array('id'=>$id))->row();
        // return $query;
        return $this->db->select('*')->from('tb_klasifikasi_penduduk')
        ->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id','inner')
        ->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id','inner')
        ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id','inner')
        ->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan','inner')
        ->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan','inner')
        ->where(array('klasifikasi_id'=>$id))->get()->row();
    }

    function get_sub_variabel(){
        return $this->db->select('*')->from('tb_sub_variabel')->get()->result();
      }

      function get_sub_variabel_aset(){
        return $this->db->select('*')->from('tb_sub_variabel_aset')->get()->result();
      }

      function get_sub_variabel_program(){
        return $this->db->select('*')->from('tb_sub_variabel_program_sosial')->get()->result();
      }

    /**serch */
    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tb_penduduk');
        $this->db->like('nama',$keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('tempat_lahir', $keyword);
        $this->db->or_like('tanggal_lahir', $keyword);
        $this->db->or_like('nik', $keyword);
        $this->db->or_like('kk', $keyword);
        $this->db->or_like('alamat_asal', $keyword);
        $this->db->or_like('kelurahan', $keyword);
        $this->db->or_like('kecamatan', $keyword);
        $this->db->or_like('kota', $keyword);
        $this->db->or_like('jenis_pmks', $keyword);
        $this->db->or_like('tahun_masuk', $keyword);
        return $this->db->get()->result();
    }

    // /**serch jumlah*/
    // public function get_keyword_jml($keyword){
    //     $this->db->select('*');
    //     $this->db->from('tb_hasil');
    //     $this->db->like('id_kecamatan',$keyword);
    //     return $this->db->get()->result();
    // }

    /**model kategori kecamatan */
    public function kategori_kecamatan(){
        $hasil = $this->db->get('tb_kecamatan');
        return $hasil;
    }

    /**model kategori desa */
    public function kategori_desa($id_desa){
        $hasil = $this->db->get_where('tb_desa', array('kecamatan_id' =>$id_desa));
        return $hasil;
    }
    
    /**model kategori pmks */
    public function kategori_pmks(){
        $hasil = $this->db->get('tb_pmks');
        return $hasil;
    }

    /**model total data */
    public function total_pmks(){
        $query = $this->db->query("SELECT * FROM tb_penduduk_pengenalan_tempat");
        $total = $query->num_rows();
        return $total;
    }

    public function total_kelurahan(){
        $query = $this->db->query("SELECT * FROM tb_desa");
        $total = $query->num_rows();
        return $total;
    }

    public function total_kecamatan(){
        $query = $this->db->query("SELECT * FROM tb_kecamatan");
        $total = $query->num_rows();
        return $total;
    }
    public function total_laki(){
        $query = $this->db->query("SELECT * FROM tb_penduduk_pengenalan_tempat WHERE jenis_kelamin='L' order by id DESC");
        $total = $query->num_rows();
        return $total;
    }

    public function total_perempuan(){
        $query = $this->db->query("SELECT * FROM tb_penduduk_pengenalan_tempat WHERE jenis_kelamin='P' order by id DESC");
        $total = $query->num_rows();
        return $total;
    }

    /**end total data */

    /**total pmks */
    public function total_jenis(){
        $this->db->select('tb_kecamatan.nama_kecamatan, count(tb_desa.nama_desa) as total');
        $this->db->from('tb_klasifikasi_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
        $this->db->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan');
        $this->db->group_by('nama_kecamatan,nama_desa');
        $query = $this->db->get();
        return $query->result();
    }

    /**end total pmks */

    /**total tiap kecamatan */
    
    public function total_perkecamatan(){
        $this->db->select('tb_kecamatan.nama_kecamatan, count(tb_kecamatan.nama_kecamatan) as total');
        $this->db->from('tb_klasifikasi_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
        $this->db->group_by('nama_kecamatan');
        $query = $this->db->get();
        return $query->result();
    }


    /**end total tiap kecamatan */

    /**jumlah pmks tiap kecamatan */
    #penduduk_id,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,nik,kk,alamat_asal,kelurahan,kecamatan,kota,jenis_pmks,tahun_masuk
    function count_kecamatan(){
        //$hasil = $this->db->count_all("tb_penduduk"); //HITUNG TOTAL TABEL 
        //$hasil = $this->db->where(['kecamatan'=>'16'])->from("tb_penduduk")->count_all_results(); //HITUNG SELECT ID
        
        $this->db->select('*');
        $this->db->from('tb_penduduk');
        $this->db->like('kecamatan','MARGASARI');
        $hasil = $this->db->count_all_results();
        return $hasil;
    }

    function variabel_penduduk(){
//        $p= $this->db->select('*')->from('tb_sub_variabel')->join('tb_variabel','tb_variabel.variabel_id=tb_sub_variabel.sub_variabel_id','right')->get()->result();
//      //return $this->db->select('*')->from('tb_variabel')->get()->result();

// return $p;

        $this->db->select('*');
        $this->db->from('tb_sub_variabel');
        $this->db->join('tb_variabel','tb_variabel.variabel_id=tb_sub_variabel.sub_variabel_id');
        $this->db->where('sub_id AND sub_variabel_id');
        $this->db->order_by('sub_variabel_id','DESC');
        $p=$this->db->get()->result();
        return $p;

//               $this->db->select('tb_variabel.variabel_id,tb_variabel.nama_variabel, tb_sub_variabel.nama,tb_sub_variabel.skor,tb_sub_variabel.sub_id');
// $this->db->from('tb_sub_variabel');
// // $this->db->where('sub_variabel_id',$id);
// $this->db->join('tb_variabel','tb_variabel.variabel_id=tb_sub_variabel.sub_variabel_id');
// $this->db->group_by('nama_variabel,sub_id');

// $q=$this->db->get()->result();
// return $q;


    }

    function sub_variabel_penduduk(){
     //  return $this->db->get('tb_sub_variabel')->result();
        // return $this->db->select('*')->from('tb_sub_variabel')
        // ->join('tb_variabel','tb_variabel.variabel_id=tb_sub_variabel.sub_variabel_id')
        // ->where('sub_variabel_id',$id)->get()->result();
       
      // return $this->db->select('*')->from('tb_sub_variabel')->get()->result();
//       $this->db->select('tb_variabel.variabel_id,tb_variabel.nama_variabel, tb_sub_variabel.nama,tb_sub_variabel.sub_id');
// $this->db->from('tb_sub_variabel');
// // $this->db->where('sub_variabel_id',$id);
// $this->db->join('tb_variabel','tb_variabel.variabel_id=tb_sub_variabel.sub_variabel_id');
// $this->db->group_by('nama_variabel,sub_id');

// $q=$this->db->get()->result();
// return $q;


    }

    function klasifikasi(){
        $this->db->select("tb_penduduk_pengenalan_tempat.kk,tb_penduduk_pengenalan_tempat.nama_krt,
        tb_penduduk_keterangan_rumah.status_tempat_tinggal+tb_penduduk_keterangan_rumah.status_lahan_tempat_tinggal)");
    }

    function grafik(){
        $this->db->select('nama_kecamatan,
        sum(if(klasifikasi="Hampir Miskin",1,0)) as rendah, sum(if(klasifikasi="Miskin",1,0)) as sedang,
        sum(if(klasifikasi="Sangat Miskin",1,0)) as tinggi');
        $this->db->from('tb_klasifikasi_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
        $this->db->group_by('nama_kecamatan'); 
        $query=$this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}

?>