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
        $this->db->from("tb_penduduk_pengenalan_tempat");
        $this->db->join("tb_kecamatan","tb_kecamatan.kecamatan_id=tb_penduduk_pengenalan_tempat.kecamatan");
        $this->db->join("tb_desa","tb_desa.id_desa=tb_penduduk_pengenalan_tempat.kelurahan");
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
    public function input_data($data,$data2,$data4,$data_klasifikasi){
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

      $this->db->trans_complete();
      return $this->db->insert_id();
    }

    /**model hapus data */
    public function hapus_data($id){ //$where, $table
        // $this->db->where($where);
        // $this->db->delete($table);
        
        $this->db->query("DELETE tb_klasifikasi_penduduk,tb_penduduk_pengenalan_tempat, tb_penduduk_kepemilikan_aset,tb_penduduk_keterangan_rumah
        FROM tb_klasifikasi_penduduk,tb_penduduk_pengenalan_tempat, tb_penduduk_kepemilikan_aset,tb_penduduk_keterangan_rumah
        WHERE tb_penduduk_pengenalan_tempat.id,=tb_klasifikasi_penduduk.id
        AND tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.id AND tb_klasifikasi_penduduk.id=tb_penduduk_keterangan_rumah.id
        AND tb_klasifikasi_penduduk.id= '$id' ");
    }

    /**model edit data */
    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

    // /**model update data */
    // public function update_data($where,$data,$table){
    //     $this->db->where($where);
    //     $this->db->update($table,$data);
    // }

    // public function update_data($where, $data,$data2,$data3,$data4){
    //     $this->db->trans_start();
    //     $this->db->where($where);
    //     $this->db->update($data,'tb_');
    //     $this->db->trans_complete();
    // }

    public function update_data($where,$data,$data2,$data4,$data_klasifikasi){
        $this->db->trans_start();
     // $this->db->distinct();
     $this->db->where($where);
      $d=$this->db->update('tb_penduduk_pengenalan_tempat',$data);
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

      $this->db->trans_complete();
      return $this->db->insert_id();
    }


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
    function update_data4($where,$where2,$where3,$data,$table){
        $this->db->where_in($where);
        $this->db->where_in($where2);
        $this->db->where_in($where3);
        $this->db->update($table,$data);
    }

    // function update_data($id,$tabel1,$tabel2,$tabel3,$tabel4){
    //     $this->db->query();

    // }

    /**melihat data penduduk */
    function menampilkan_tabel_penduduk($id){
        return $this->db->select('*')->from('tb_klasifikasi_penduduk')
        ->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id')
        ->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id')
        ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id')
        ->where('tb_penduduk_pengenalan_tempat.id',$id)->get()->result();
      
    }

    /**model detail data */
    public function detail_tabel($id = NULL){
        // $query = $this->db->get_where('tb_klasifikasi_penduduk', array('id'=>$id))->row();
        // return $query;
        return $this->db->select('*')->from('tb_klasifikasi_penduduk')
        ->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id')
        ->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id')
        ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id')
        ->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan')
        ->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan')
        ->where(array('tb_klasifikasi_penduduk.id'=>$id))->get()->row();
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
}

?>