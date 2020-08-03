<?php
class m_report extends CI_Model{

  
  function data_pmks_perkecamatan($limit, $start){
    $this->db->limit($limit, $start);
    $this->db->select("tb_kecamatan.nama_kecamatan as nama_kecamatan,  tahun_input,
    COUNT(IF(tb_penduduk_pengenalan_tempat.jenis_kelamin='P',1,0)) as perempuan,
    COUNT(IF(tb_penduduk_pengenalan_tempat.jenis_kelamin='L',1,0)) as lakilaki");
    $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk_pengenalan_tempat.kecamatan','left');
    $this->db->group_by('nama_kecamatan,tahun_input');
  //  $this->db->from('tb_penduduk_pengenalan_tempat');
   $q= $this->db->get('tb_penduduk_pengenalan_tempat');

 $r=$q->result_array();
 return $r;
  }


  function laporan_data_pmks_perkecamatan($id){
  //  $this->db->limit($limit, $start);
    $this->db->select('tb_kecamatan.nama_kecamatan as nama_kecamatan, tb_desa.nama_desa as nama_desa, tahun_input,
    COUNT(IF(tb_penduduk_pengenalan_tempat.jenis_kelamin="P",1,0)) as perempuan,
    COUNT(IF(tb_penduduk_pengenalan_tempat.jenis_kelamin="L",1,0)) as lakilaki');
    $this->db->from('tb_penduduk_pengenalan_tempat');
    $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk_pengenalan_tempat.kecamatan');
    $this->db->join('tb_desa','tb_desa.id_desa=tb_penduduk_pengenalan_tempat.kelurahan');
    $this->db->group_by('nama_kecamatan,nama_desa,tahun_input');
    $this->db->where('tahun_input',$id);
//$this->db->having('perempuan=P','lakilaki=L');
   $q= $this->db->get();

 $r=$q->result();
 return $r;
  }


  function select_tahun_export($id){
    $this->db->select('tahun_masuk,tb_kecamatan.nama_kecamatan');
    $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk.kecamatan');
    $this->db->group_by('tahun_masuk');
    $this->db->from('tb_penduduk');
    $this->db->where('nama_kecamatan',$id);
    $q=$this->db->get()->result();
    return $q;
  }
  function laporan_data_pmks_excel_perkecamatan($id,$p){
   
    $this->db->select('*');
    $this->db->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id');
    $this->db->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id');
    $this->db->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id');
    $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
    $this->db->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan');
    $this->db->group_by('tb_klasifikasi_penduduk.id,nama_kecamatan,nama_desa');
    $this->db->from('tb_klasifikasi_penduduk');
    $this->db->where_in('nama_kecamatan',$id);
    $this->db->where_in('tahun_input',$p);
    $q= $this->db->get()->result();
    return $q;
    
  }

  function laporan_data_pmks_excel_pertahun($id){
    $this->db->select('*');
    $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk.kecamatan');
    $this->db->join('tb_desa','tb_desa.id_desa=tb_penduduk.kelurahan');
    $this->db->join('tb_pmks','tb_pmks.pmks_id=tb_penduduk.jenis_pmks');
    $this->db->group_by('penduduk_id,nama_kecamatan,nama_desa');
    $this->db->from('tb_penduduk');
    $this->db->where('tahun_masuk',$id);
    $q= $this->db->get()->result();
    return $q;
  }

  function select_tahun_laporan_excel($id,$p){
    $this->db->select('*');
    $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk_pengenalan_tempat.kecamatan');
    $this->db->where_in('nama_kecamatan',$id);
    $this->db->where('tahun_input',$p);
    $q=$this->db->get('tb_penduduk_pengenalan_tempat')->row();
    return $q->tahun_input;
  }

  function select_tahun_laporan_excel_pertahun($id){
    $this->db->select('tahun_masuk');
    $this->db->where('tahun_masuk',$id);
    $q=$this->db->get('tb_penduduk')->row();
    return $q->tahun_masuk;
  }


//    /**INSERT OR UPDATE KELURAHAN TIAP TAHUN */
//    public function InsertorUpdateDataKelurahan_pertahun($limit, $start){
//      $this->db->limit($limit, $start);
//      $this->db->select('tb_kecamatan.nama_kecamatan as nama_kecamatan, tb_desa.nama_desa as nama_kelurahan,
//      sum(if(tb_pmks.jenis_pmks="FAKIR MISKIN",1,0))+sum(if(tb_pmks.jenis_pmks="PEREMPUAN RSE",1,0)) as kemiskinan,
//      sum(if(tb_pmks.jenis_pmks="LANJUT USIA TERLANTAR",1,0)) as ketelantaran,
//      sum(if(tb_pmks.jenis_pmks="ADK",1,0))+sum(if(tb_pmks.jenis_pmks="DISABILITAS",1,0)) as kecacatan,
//      tahun_masuk as tahun_klasifikasi');
//      $this->db->from('tb_penduduk');
//      $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk.kecamatan');
//      $this->db->join('tb_desa','tb_desa.id_desa=tb_penduduk.kelurahan');
//      $this->db->join('tb_pmks','tb_pmks.pmks_id=tb_penduduk.jenis_pmks');
//      $this->db->group_by('nama_kecamatan,nama_kelurahan,tahun_klasifikasi');
//     // $this->db->where('tahun_masuk BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
//      $query=$this->db->get();
 
//         if ($query->num_rows() >0) {
//           foreach ($query->result() as $key) {
//            $data= $this->db->insert_string('mamdani_kelurahan',$key);
//            $data=str_replace('INSERT INTO','INSERT IGNORE INTO',$data);
//           // $data=$this->db-set('tahun_klasifikasi',date('Y'));
//           $this->db->query($data);
      
//           }
//        }
//         return false;
  
//    }
// /**END INSERT OR UPDATE KELURAHAN TIAP TAHUN */

/**INSERT OR UPDATE KECAMATAN TIAP TAHUN */
// public function InsertorUpdateDataKecamatan_pertahun($limit, $start){
//  $this->db->limit($limit, $start);
//  $this->db->select('tb_kecamatan.nama_kecamatan as nama_kecamatan, 
//  sum(if(tb_pmks.jenis_pmks="FAKIR MISKIN",1,0))+sum(if(tb_pmks.jenis_pmks="PEREMPUAN RSE",1,0)) as kemiskinan,
//  sum(if(tb_pmks.jenis_pmks="LANJUT USIA TERLANTAR",1,0)) as ketelantaran,
//  sum(if(tb_pmks.jenis_pmks="ADK",1,0))+sum(if(tb_pmks.jenis_pmks="DISABILITAS",1,0)) as kecacatan,
//  tahun_masuk as tahun_klasifikasi');
//  $this->db->from('tb_penduduk');
//  $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk.kecamatan');
//  $this->db->join('tb_pmks','tb_pmks.pmks_id=tb_penduduk.jenis_pmks');
//  $this->db->group_by('nama_kecamatan,tahun_klasifikasi');
// // $this->db->where('tahun_masuk BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
//  $query=$this->db->get();

//     if ($query->num_rows() >0) {
//       foreach ($query->result() as $key) {
//        $data= $this->db->insert_string('mamdani_kecamatan',$key);
//        $data=str_replace('INSERT INTO','INSERT IGNORE INTO',$data);
//       // $data=$this->db-set('tahun_klasifikasi',date('Y'));
//       $this->db->query($data);
  
//       }
//    }
//     return false;

// }
/**END INSERT OR UPDATE KECAMATAN TIAP TAHUN */

/**lihat data klasifikais pertahun */
public function get_data_klasifikasi_kecamatan_pertahun(){
return $this->db->get('mamdani_kecamatan')->result();
}

public function get_data_klasifikasi_kelurahan_pertahun(){
  return $this->db->get('mamdani')->result();
  }
/**end lihat data klasifikais pertahun */

    /********************************************coba */
    public function view_kota(){
      return $this->db->get('tb_tahun');
    }
 
    public function view_data($id){
             $this->db->join('tb_tahun', "tb_tahun.tahun_masuk=tb_penduduk.tahun_masuk");
      return $this->db->get_where('tb_penduduk', "tb_penduduk.tahun_masuk='$id'");
    }
    /*************************************************end coba */

/**select view export pdf */
function select_tahun_klasifikasi_kecamatan(){
  $sql=$this->db->query('SELECT DISTINCT(tahun_klasifikasi) FROM tb_klasifikasi_penduduk');
  return $sql->result();
}

function select_tahun_klasifikasi_kelurahan(){
  $sql=$this->db->query('SELECT DISTINCT(tahun_klasifikasi) FROM tb_klasifikasi_penduduk');
  return $sql->result();
}
/**end select view export pdf */


     /**jumlah pmks tiap variabel untuk export pdf*/
     /**per kelurahan */
     public function get_tahun_klasifikasi_kelurahan($id){
       $this->db->select('tahun_klasifikasi');
       $this->db->where('tahun_klasifikasi',$id);
       $q=$this->db->get('mamdani')->row();
       return $q->tahun_klasifikasi;

     }

     public function count_kecamatan($id){
      $query = $this->db->query("SELECT DISTINCT(nama_kecamatan) FROM mamdani");
          $total = $query->num_rows();
          return $total;
    }
  
    public function count_kelurahan($id){
      $query = $this->db->query("SELECT DISTINCT(nama_desa) FROM mamdani");
          $total = $query->num_rows();
          return $total;
    }

public function count_kemiskinan($id){
  $this->db->select_sum('kemiskinan');
$this->db->where('tahun_klasifikasi',$id);
$q=$this->db->get('mamdani')->row();
return $q->kemiskinan;
}

public function count_ketelantaran($id){
  $this->db->select_sum('ketelantaran');
$this->db->where('tahun_klasifikasi',$id);
$q=$this->db->get('mamdani')->row();
return $q->ketelantaran;
}
public function count_kecacatan($id){
  $this->db->select_sum('kecacatan');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani')->row();
  return $q->kecacatan;
}

/*** per kecamatan */
public function get_tahun_klasifikasi_kecamatan($id){
  $this->db->select('tahun_klasifikasi');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani_kecamatan')->row();
  return $q->tahun_klasifikasi;

}

public function count_kemiskinan_kec($id){
  $this->db->select_sum('kemiskinan');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani_kecamatan')->row();
  return $q->kemiskinan;
}

public function count_ketelantaran_kec($id){
  $this->db->select_sum('ketelantaran');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani_kecamatan')->row();
  return $q->ketelantaran;
}
public function count_kecacatan_kec($id){
  $this->db->select_sum('kecacatan');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani_kecamatan')->row();
  return $q->kecacatan;
}

public function count_kecamatan_kec($id){
  $query = $this->db->query("SELECT DISTINCT(nama_kecamatan) FROM mamdani_kecamatan");
      $total = $query->num_rows();
      return $total;
}


/**jumlah select per kecamatan */

public function get_tahun_klasifikasi_select_kecamatan($id){
  $this->db->select('tahun_klasifikasi');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('tb_klasifikasi_penduduk')->row();
  return $q->tahun_klasifikasi;
}

public function count_kecamatan_select($id){
  // $query =$this->db->query("SELECT DISTINCT(kecamatan)  FROM tb_klasifikasi_penduduk WHERE tahun_klasifikasi='$id'");
  //     $total = $query->num_rows();
  //     return $total;
  $query =$this->db->distinct()->select('nama_kecamatan')->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan')
  ->where('tahun_klasifikasi',$id)->get('tb_klasifikasi_penduduk');
  $total = $query->num_rows();
  return $total;
}

public function count_kemiskinan_select($id){
// $this->db->select_sum('klasifikasi','sedikit');
// $this->db->where('tahun_klasifikasi',$id);
// $q=$this->db->get('tb_klasifikasi_penduduk')->row();
// return $q->klasifikasi;

$q=$this->db->query("SELECT COUNT(klasifikasi) as sum_sedikit
FROM tb_klasifikasi_penduduk GROUP BY tahun_klasifikasi='$id' HAVING (sum_sedikit='sedikit')");
  $total = $q->num_rows();
return $total;
}

public function count_ketelantaran_select($id){
  $q=$this->db->query("SELECT COUNT(klasifikasi) as sum_sedang
  FROM tb_klasifikasi_penduduk GROUP BY tahun_klasifikasi='$id' HAVING (sum_sedang='sedang')");
    $total = $q->num_rows();
  return $total;
}
public function count_kecacatan_select($id){
  $q=$this->db->query("SELECT COUNT(klasifikasi) as sum_tinggi
  FROM tb_klasifikasi_penduduk GROUP BY tahun_klasifikasi='$id' HAVING (sum_tinggi='tinggi')");
    $total = $q->num_rows();
  return $total;
}


/**jumlah select per kelurahan */
public function get_tahun_klasifikasi_select_kelurahan($id){
  $this->db->select('tahun_klasifikasi');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('tb_klasifikasi_penduduk')->row();
  return $q->tahun_klasifikasi;
}

public function count_kecamatan_select_kel($id){
  $query =$this->db->query("SELECT DISTINCT(kecamatan)  FROM tb_klasifikasi_penduduk WHERE tahun_klasifikasi='$id'");
      $total = $query->num_rows();
      return $total;
}

public function count_kelurahan_select_kel($id){
  // $query =$this->db->query("SELECT DISTINCT(nama_desa)  FROM tb_klasifikasi_penduduk WHERE tahun_klasifikasi='$id'");
  //     $total = $query->num_rows();
  //     return $total;

  $query =$this->db->distinct()->select('nama_desa')->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan')
  ->where('tahun_klasifikasi',$id)->get('tb_klasifikasi_penduduk');
  $total = $query->num_rows();
  return $total;
}

public function count_kemiskinan_select_kel($id){
$this->db->select_sum('kemiskinan');
$this->db->where('tahun_klasifikasi',$id);
$q=$this->db->get('mamdani')->row();
return $q->kemiskinan;
}

public function count_ketelantaran_select_kel($id){
  $this->db->select_sum('ketelantaran');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani')->row();
  return $q->ketelantaran;
}
public function count_kecacatan_select_kel($id){
  $this->db->select_sum('kecacatan');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani')->row();
  return $q->kecacatan;
}

/**end jumlah pmks tiap variabel untuk export pdf select */

/**UNDUH LAPORAN PERTAHUN */
function unduh_laporan_pertahun_kecamatan(){
  $q=$this->db->query("SELECT tahun_klasifikasi,tb_kecamatan.nama_kecamatan, sum(if(klasifikasi='rendah',1,0)) as rendah,
  sum(if(klasifikasi='sedang',1,0)) as sedang, sum(if(klasifikasi='tinggi',1,0)) as tinggi
  FROM tb_klasifikasi_penduduk JOIN tb_kecamatan ON tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan GROUP BY nama_kecamatan,tahun_klasifikasi");

 $r=$q->result();
 return $r;
}

function unduh_laporan_pertahun_kelurahan(){
  $q=$this->db->query("SELECT tahun_klasifikasi,tb_kecamatan.nama_kecamatan,tb_desa.nama_desa, sum(if(klasifikasi='rendah',1,0)) as rendah,
  sum(if(klasifikasi='sedang',1,0)) as sedang, sum(if(klasifikasi='tinggi',1,0)) as tinggi
  FROM tb_klasifikasi_penduduk JOIN tb_kecamatan ON tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan
  JOIN tb_desa ON tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan GROUP BY nama_kecamatan,nama_desa,tahun_klasifikasi");

 $r=$q->result();
 return $r;
}
/**END UNDUH LAPORAN PERTAHUN */

/**LAPORAN PMKS PERTAHUN */
function select_tahun_pmks(){
  $sql=$this->db->query('SELECT DISTINCT(tahun_input) FROM tb_penduduk_pengenalan_tempat');
  return $sql->result();
}
public function get_tahun_pmks_select($id){
  $this->db->select('tahun_input');
  $this->db->where('tahun_input',$id);
  $q=$this->db->get('tb_penduduk_pengenalan_tempat')->row();
  return $q->tahun_input;
}

function count_laki_laki($id){
  $q=$this->db->query("SELECT COUNT(jenis_kelamin) as sum_laki_laki
  FROM tb_penduduk_pengenalan_tempat GROUP BY tahun_input='$id' HAVING (sum_laki_laki='L')");
    $total = $q->num_rows();
return $total;
}

function count_perempuan($id){
  $q=$this->db->query("SELECT COUNT(jenis_kelamin) as sum_perempuan
  FROM tb_penduduk_pengenalan_tempat GROUP BY tahun_input='$id' HAVING (sum_perempuan='P')");
    $total = $q->num_rows();
return $total;
}

function count_pmks_kecamatan_select($id){
  $query =$this->db->query("SELECT DISTINCT(kecamatan)  FROM tb_penduduk_pengenalan_tempat WHERE tahun_input='$id'");
  $total = $query->num_rows();
  return $total;
}

function count_pmks_kelurahan_select($id){
  $query =$this->db->query("SELECT DISTINCT(kelurahan)  FROM tb_penduduk_pengenalan_tempat WHERE tahun_input='$id'");
  $total = $query->num_rows();
  return $total;
}


/**LAPORAN PMKS PERTAHUN */

/**EXPORT EXCEL KLASIFIKASI UNDUH DATA KLASIFIKASI */
function laporan_data_klasifikasi_excel_kecamatan($id){
  $this->db->select('*');
  $this->db->from('mamdani_kecamatan');
  $this->db->where('tahun_klasifikasi',$id);
  $q= $this->db->get()->result();
  return $q;
}

function laporan_data_klasifikasi_excel_kelurahan($id){
  $this->db->select('*');
  $this->db->from('mamdani');
  $this->db->where('tahun_klasifikasi',$id);
  $q= $this->db->get()->result();
  return $q;
}

public function excel_klasifikasi_kecamatan($id){
  $this->db->select('tahun_klasifikasi');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani_kecamatan')->row();
  return $q->tahun_klasifikasi;

}

public function excel_klasifikasi_kelurahan($id){
  $this->db->select('tahun_klasifikasi');
  $this->db->where('tahun_klasifikasi',$id);
  $q=$this->db->get('mamdani')->row();
  return $q->tahun_klasifikasi;

}
/**EXPORT EXCEL KLASIFIKASI UNDUH DATA KLASIFIKASI */

function select_untuk_laporan_klasifikasi_kecamatan($id){
  //   $this->db->select('*');
  //   $this->db->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id');
  //   $this->db->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id');
  //   $this->db->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id');
  //   $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
  //  // $this->db->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan');
  //   $this->db->group_by('tb_klasifikasi_penduduk.id,nama_kecamatan');
  //   $this->db->from('tb_klasifikasi_penduduk');
  //   $this->db->where('nama_kecamatan',$id);
  //   $q= $this->db->get()->result();
  //   return $q;

  $this->db->select('nama_kecamatan,
      sum(if(klasifikasi="rendah",1,0)) as rendah, sum(if(klasifikasi="sedang",1,0)) as sedang,
      sum(if(klasifikasi="tinggi",1,0)) as tinggi, tahun_klasifikasi'); //,tahun_masuk as tahun_klasifikasi
        $this->db->from('tb_klasifikasi_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
        $this->db->where('tahun_klasifikasi',$id);
        $this->db->group_by('nama_kecamatan, tahun_klasifikasi'); //,tahun_klasifikasi
        return $query=$this->db->get()->result();

}

function select_untuk_laporan_klasifikasi_kelurahan($id, $kec, $kel){
  $this->db->select('nama_kecamatan, nama_desa,
  sum(if(klasifikasi="rendah",1,0)) as rendah, sum(if(klasifikasi="sedang",1,0)) as sedang,
  sum(if(klasifikasi="tinggi",1,0)) as tinggi,tahun_klasifikasi'); //,tahun_masuk as tahun_klasifikasi
    $this->db->from('tb_klasifikasi_penduduk');
    $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
    $this->db->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan');
    $this->db->where_in('tahun_klasifikasi',$id);
    $this->db->where_in('nama_kecamatan',$kec);
    $this->db->where_in('nama_desa',$kel);
    $this->db->group_by('nama_kecamatan, nama_desa,tahun_klasifikasi'); //,tahun_klasifikasi
    return $query=$this->db->get()->result();
}

function get_total_penduduk_multi_where($id,$kec,$kel){
  $this->db->select('*');
  $this->db->from('tb_klasifikasi_penduduk');
  $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
    $this->db->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan');
  $this->db->where_in('tahun_klasifikasi',$id);
    $this->db->where_in('nama_kecamatan',$kec);
    $this->db->where_in('nama_desa',$kel);
    $query=$this->db->get();
return $query->num_rows();
}

function select_untuk_laporan_klasifikasi_penduduk($id){
  $this->db->select('*')->from('tb_klasifikasi_penduduk')
  ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id')
  ->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan')
  ->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan')
  ->where('tahun_klasifikasi',$id);
  return $query = $this->db->get()->result();
}

function total_penduduk(){
  $query = $this->db->query('SELECT * FROM tb_klasifikasi_penduduk');
return $query->num_rows();
}

    }
?>