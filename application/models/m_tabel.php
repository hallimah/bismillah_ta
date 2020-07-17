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
    public function tampil_data($limit, $start){
        $this->db->limit($limit, $start);
        $res=array();
        $this->db->select("*");
        $this->db->from("tb_penduduk");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // foreach ($query->result() as $row) {
            //     $data[] = $row;
            // }
            // return $data;
            $res=$query->result();
        }
        return $res;
    }
    
    /**model input data */
    public function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    /**model hapus data */
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    /**model edit data */
    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

    /**model update data */
    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    /**model detail data */
    public function detail_tabel($id = NULL){
        $query = $this->db->get_where('tb_penduduk', array('penduduk_id'=>$id))->row();
        return $query;
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
        $query = $this->db->query("SELECT * FROM tb_penduduk");
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
        $query = $this->db->query("SELECT * FROM tb_penduduk WHERE jenis_kelamin='L' order by penduduk_id DESC");
        $total = $query->num_rows();
        return $total;
    }

    public function total_perempuan(){
        $query = $this->db->query("SELECT * FROM tb_penduduk WHERE jenis_kelamin='P' order by penduduk_id DESC");
        $total = $query->num_rows();
        return $total;
    }

    /**end total data */

    /**total pmks */
    public function total_jenis(){
        $this->db->select('tb_pmks.jenis_pmks, count(tb_pmks.jenis_pmks) as total');
        $this->db->from('tb_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk.kecamatan');
        $this->db->join('tb_desa','tb_desa.id_desa=tb_penduduk.kelurahan');
       $this->db->join('tb_pmks','tb_pmks.pmks_id=tb_penduduk.jenis_pmks');
       $this->db->group_by('jenis_pmks');
        $query = $this->db->get();
        return $query->result();
    }

    /**end total pmks */

    /**total tiap kecamatan */
    
    public function total_perkecamatan(){
        $this->db->select('tb_kecamatan.nama_kecamatan, count(tb_kecamatan.nama_kecamatan) as total');
        $this->db->from('tb_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk.kecamatan');
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




}

?>