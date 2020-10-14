<?php
class mamdani extends CI_Model{
     #fuzzifikasi
     function fuzzifikasi_kemiskinan_kecamatan(){
          $this->db->select('*');
          $this->db->from('tb_variabel_kecamatan');
          $p=$this->db->get()->result();
 
          foreach ($p as $key) {
               $n=(explode(",",$key->nama_variabel));
               print_r($n);
          }
     }

     
     /*************************************************** CONTROLLER FUZZY.PHP*************************************** */
    /**insert or update mamdani tiap Desa */
    public function insert_or_update(){
     // $this->db->limit($limit, $start);
       $this->db->select('tb_kecamatan.nama_kecamatan,tb_desa.nama_desa, 
       sum(if(tb_pmks.jenis_pmks="DISABILITAS",1,0))+sum(if(tb_pmks.jenis_pmks="ADK",1,0))  as kecacatan,
        sum(if(tb_pmks.jenis_pmks="FAKIR MISKIN",1,0))+sum(if(tb_pmks.jenis_pmks="PEREMPUAN RSE",1,0)) as kemiskinan,
        sum(if(tb_pmks.jenis_pmks="LANJUT USIA TERLANTAR",1,0)) as ketelantaran,tahun_masuk as tahun_klasifikasi'); //,tahun_masuk as tahun_klasifikasi
        $this->db->from('tb_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk.kecamatan');
           $this->db->join('tb_desa','tb_desa.id_desa=tb_penduduk.kelurahan');
         $this->db->join('tb_pmks','tb_pmks.pmks_id=tb_penduduk.jenis_pmks');
        $this->db->group_by('nama_kecamatan, nama_desa,tahun_klasifikasi'); //,tahun_klasifikasi
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
                 $data = $this->db->insert_string('mamdani',$row);
                 $data= str_replace('INSERT INTO','INSERT IGNORE INTO',$data);
                  $this->db->query($data);
 
               //nama_kecamatan,nama_desa,kemiskinan,ketelantaran,kecacatan
 
               //  $this->db->query("INSERT INTO mamdani($row)
               //  VALUES (?,?,?,?,?) ON DUPLICATE KEY UPDATE kemiskinan=kemiskinan+$row(kemiskinan),ketelantaran=ketelantaran+$row(ketelantaran),
               //  kecacatan=kecacatan+$row(kecacatan)");
 
           }
         
     } return false;
     }
 
     /**insert or update mamdani tiap Kecamatan  */  // tahun_masuk as tahun_klasifikasi (didalam select) //select year(CURDATE()) => untuk menampilkan tahun sekarang
     public function InsertorUpdateDataKecamatan(){
      // $this->db->limit($limit, $start);
       $this->db->select('tb_kecamatan.nama_kecamatan as nama_kecamatan, 
       sum(if(tb_pmks.jenis_pmks="FAKIR MISKIN",1,0))+sum(if(tb_pmks.jenis_pmks="PEREMPUAN RSE",1,0)) as kemiskinan,
       sum(if(tb_pmks.jenis_pmks="LANJUT USIA TERLANTAR",1,0)) as ketelantaran,
       sum(if(tb_pmks.jenis_pmks="ADK",1,0))+sum(if(tb_pmks.jenis_pmks="DISABILITAS",1,0)) as kecacatan,
       tahun_masuk as tahun_klasifikasi'); 
       $this->db->from('tb_penduduk');
       $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_penduduk.kecamatan');
       $this->db->join('tb_pmks','tb_pmks.pmks_id=tb_penduduk.jenis_pmks');
       $this->db->group_by('nama_kecamatan,tahun_klasifikasi'); 
       $query=$this->db->get();
       $this->db->reset_query();
   
          if ($query->num_rows() >0) {
            foreach ($query->result() as $key) {
             $data= $this->db->insert_string('mamdani_kecamatan',$key);
             $data=str_replace('INSERT INTO','INSERT IGNORE INTO',$data);
            // $data=$this->db-set('tahun_klasifikasi',date('Y'));
            $this->db->query($data);
        
            }
         }
          return false;

     }
 
    
 
//       function klasifikasi_year_kec(){
//         date_default_timezone_set('Asia/Jakarta');
//         $date= date('Y');
//         $this->db->select('tahun_klasifikasi');
//         $this->db->set('tahun_klasifikasi',$date);
//         $q=$this->db->update('mamdani_kecamatan');
        
//   return $q;
//       }
 
//       function klasifikasi_year_kel(){
//        date_default_timezone_set('Asia/Jakarta');
//        $date= date('Y');
//        $this->db->set('tahun_klasifikasi',$date);
//        $q=$this->db->update('mamdani');
//  return $q;
//      }
 
     public function viewKecamatan(){
      $this->db->select('nama_kecamatan,
      sum(if(klasifikasi="Hampir Miskin",1,0)) as rendah, sum(if(klasifikasi="Miskin",1,0)) as sedang,
      sum(if(klasifikasi="Sangat Miskin",1,0)) as tinggi'); //,tahun_masuk as tahun_klasifikasi
        $this->db->from('tb_klasifikasi_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
        $this->db->group_by('nama_kecamatan, tahun_klasifikasi'); //,tahun_klasifikasi
        return $query=$this->db->get()->result();
     }
     
     public function select_tahun(){
       $sql=$this->db->query('SELECT DISTINCT(tahun_masuk) FROM tb_penduduk');
         return $sql->result();
     }
 
     public function select_tahun_klasifikasi(){
      $sql=$this->db->query('SELECT DISTINCT(tahun_klasifikasi) FROM tb_klasifikasi_penduduk 
      WHERE tahun_klasifikasi BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
        return $sql->result();
     }
 
    //  public function select_tahun_klasifikasi_kecamatan(){
    //    $sql=$this->db->query('SELECT DISTINCT(tahun_klasifikasi) FROM mamdani_kecamatan 
    //    WHERE tahun_klasifikasi BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
    //      return $sql->result();
    //  }
 
 
     public function fuzzy(){
      // $this->db->select('*');
      // $this->db->from('mamdani');
      // $this->db->where('tahun_klasifikasi BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
      // $p=$this->db->get()->result();
      // return $p;
      $this->db->select('nama_kecamatan, nama_desa, 
      sum(if(klasifikasi="Hampir Miskin",1,0)) as rendah, sum(if(klasifikasi="Miskin",1,0)) as sedang,
      sum(if(klasifikasi="Sangat Miskin",1,0)) as tinggi'); //,tahun_masuk as tahun_klasifikasi
        $this->db->from('tb_klasifikasi_penduduk');
        $this->db->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan');
        $this->db->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan');
        $this->db->group_by('nama_kecamatan, nama_desa,tahun_klasifikasi'); //,tahun_klasifikasi
        return $query=$this->db->get()->result();

     }

 
     public function excel_kecamatan(){
       return $this->db->get('mamdani_kecamatan')->result();
       }
 
     public function proses_fuzzy_mamdani(){
       $this->db->select('*');
      // $this->db->where('nama_kecamatan,nama_desa');
         $sql = $this->db->get('mamdani');
         return $sql->result_array(); //result_array
         
         //print_r($sql->result_array());
     }
 
   /********************************************************IMPLEMENTASI FUZZY MAMDANI******************************************* */
 
   /**Fuzzy Mamdani per Kelurahan*/
   #FUZZYFICATION
   public function hasil_kemiskinan(){
     $this->db->query("UPDATE mamdani m JOIN tb_variabel_desa tv JOIN mamdani_kecamatan mk
     SET m.hasil_kemiskinan=(CASE 
     WHEN m.kemiskinan <= tv.persen_var_a * mk.kemiskinan THEN 'SEDIKIT'
     WHEN tv.persen_var_a * mk.kemiskinan <= m.kemiskinan AND m.kemiskinan <= tv.persen_var_b * mk.kemiskinan THEN 'SEDIKIT'
     WHEN tv.persen_var_b * mk.kemiskinan <= m.kemiskinan AND m.kemiskinan <= tv.persen_var_c * mk.kemiskinan THEN 'SEDANG'
     WHEN tv.persen_var_c * mk.kemiskinan <= m.kemiskinan AND m.kemiskinan <= tv.persen_var_d * mk.kemiskinan THEN 'BANYAK'
     WHEN tv.persen_var_d * mk.kemiskinan <= m.kemiskinan THEN 'BANYAK' END) WHERE tv.variabel_id = 1 AND m.nama_kecamatan=mk.nama_kecamatan");
   }
 
   public function hasil_ketelantaran(){
      $this->db->query("UPDATE mamdani m JOIN tb_variabel_desa tv JOIN mamdani_kecamatan mk
          SET m.hasil_ketelantaran=(CASE 
          WHEN m.ketelantaran<=tv.persen_var_a * mk.ketelantaran THEN 'SEDIKIT'
          WHEN tv.persen_var_a * mk.ketelantaran <= m.ketelantaran AND m.ketelantaran <= tv.persen_var_b * mk.ketelantaran THEN 'SEDIKIT'
          WHEN tv.persen_var_b * mk.ketelantaran <= m.ketelantaran AND m.ketelantaran <= tv.persen_var_c * mk.ketelantaran THEN 'SEDANG'
          WHEN tv.persen_var_c * mk.ketelantaran <=m.ketelantaran AND m.ketelantaran <= tv.persen_var_d * mk.ketelantaran THEN 'BANYAK'
          WHEN tv.persen_var_d * mk.ketelantaran <=m.ketelantaran THEN 'BANYAK' END) WHERE tv.variabel_id=2 AND m.nama_kecamatan=mk.nama_kecamatan");
   }
 
   public function hasil_kecacatan(){
      $this->db->query("UPDATE mamdani m JOIN tb_variabel_desa tv JOIN mamdani_kecamatan mk
          SET m.hasil_kecacatan=(CASE 
          WHEN m.kecacatan<=tv.persen_var_a * mk.kecacatan THEN 'SEDIKIT'
          WHEN tv.persen_var_a * mk.kecacatan <=m.kecacatan AND m.kecacatan <= tv.persen_var_b * mk.kecacatan THEN 'SEDIKIT'
          WHEN tv.persen_var_b * mk.kecacatan <=m.kecacatan AND m.kecacatan <= tv.persen_var_c * mk.kecacatan THEN 'SEDANG'
          WHEN tv.persen_var_c * mk.kecacatan <=m.kecacatan AND m.kecacatan <= tv.persen_var_d * mk.kecacatan THEN 'BANYAK'
          WHEN tv.persen_var_d * mk.kecacatan <= m.kecacatan THEN 'BANYAK' END) WHERE tv.variabel_id=3 AND m.nama_kecamatan=mk.nama_kecamatan");
   }
 
   #RULE
   public function keterangan(){
      $this->db->query("UPDATE mamdani set keterangan=(CASE 
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDANG' THEN 'SANGAT SEJAHTERA'
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan ='BANYAK' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDANG' THEN 'SANGAT SEJAHTERA'
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan ='BANYAK' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDIKIT' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDANG' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDANG' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan ='BANYAK' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDANG' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDIKIT' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDANG' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDANG' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDIKIT' THEN 'SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDANG' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDIKIT' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDANG' THEN 'KURANG SEJAHTERA'
      WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA' END)");
   }
 
   /**Fuzzy Mamdani per Kelurahan*/
 
   /**Fuzzy Mamdani per Kecamatan*/
 
   public function hasil_kemiskinan_kecamatan(){
    $this->db->query("UPDATE mamdani_kecamatan m JOIN tb_variabel_kecamatan tv JOIN tb_kecamatan tk
     SET m.hasil_kemiskinan=(CASE 
     WHEN m.kemiskinan <= tv.persen_var_a * tk.total_penduduk THEN 'SEDIKIT'
     WHEN tv.persen_var_a * tk.total_penduduk <= m.kemiskinan AND m.kemiskinan <= tv.persen_var_b * tk.total_penduduk THEN 'SEDIKIT'
     WHEN tv.persen_var_b * tk.total_penduduk <= m.kemiskinan AND m.kemiskinan <= tv.persen_var_c * tk.total_penduduk THEN 'SEDANG'
     WHEN tv.persen_var_c * tk.total_penduduk <= m.kemiskinan AND m.kemiskinan <= tv.persen_var_d * tk.total_penduduk THEN 'BANYAK'
     WHEN tv.persen_var_d * tk.total_penduduk <= m.kemiskinan THEN 'BANYAK' END) WHERE tv.variabel_id = 1 AND m.nama_kecamatan=tk.nama_kecamatan");
 }
 
 public function hasil_ketelantaran_kecamatan(){
  $this->db->query("UPDATE mamdani_kecamatan m JOIN tb_variabel_kecamatan tv JOIN tb_kecamatan tk
  SET m.hasil_ketelantaran=(CASE 
  WHEN m.ketelantaran <= tv.persen_var_a * tk.total_penduduk THEN 'SEDIKIT'
  WHEN tv.persen_var_a * tk.total_penduduk <= m.ketelantaran AND m.ketelantaran <= tv.persen_var_b * tk.total_penduduk THEN 'SEDIKIT'
  WHEN tv.persen_var_b * tk.total_penduduk <= m.ketelantaran AND m.ketelantaran <= tv.persen_var_c * tk.total_penduduk THEN 'SEDANG'
  WHEN tv.persen_var_c * tk.total_penduduk <= m.ketelantaran AND m.ketelantaran <= tv.persen_var_d * tk.total_penduduk THEN 'BANYAK'
  WHEN tv.persen_var_d * tk.total_penduduk <= m.ketelantaran THEN 'BANYAK' END) WHERE tv.variabel_id = 2 AND m.nama_kecamatan=tk.nama_kecamatan");
 }
 
 public function hasil_kecacatan_kecamatan(){
  $this->db->query("UPDATE mamdani_kecamatan m JOIN tb_variabel_kecamatan tv JOIN tb_kecamatan tk
  SET m.hasil_kecacatan=(CASE 
  WHEN m.kecacatan <= tv.persen_var_a * tk.total_penduduk THEN 'SEDIKIT'
  WHEN tv.persen_var_a * tk.total_penduduk <= m.kecacatan AND m.kecacatan <= tv.persen_var_b * tk.total_penduduk THEN 'SEDIKIT'
  WHEN tv.persen_var_b * tk.total_penduduk <= m.kecacatan AND m.kecacatan <= tv.persen_var_c * tk.total_penduduk THEN 'SEDANG'
  WHEN tv.persen_var_c * tk.total_penduduk <= m.kecacatan AND m.kecacatan <= tv.persen_var_d * tk.total_penduduk THEN 'BANYAK'
  WHEN tv.persen_var_d * tk.total_penduduk <= m.kecacatan THEN 'BANYAK' END) WHERE tv.variabel_id = 3 AND m.nama_kecamatan=tk.nama_kecamatan");
 }
 
 
 #RULE
 public function keterangan_kecamatan(){
  $this->db->query("UPDATE mamdani_kecamatan set keterangan=(CASE 
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDANG' THEN 'SANGAT SEJAHTERA'
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan ='BANYAK' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDANG' THEN 'SANGAT SEJAHTERA'
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan ='BANYAK' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDIKIT' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDANG' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='SEDIKIT' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDANG' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan ='BANYAK' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDANG' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDIKIT' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDANG' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='SEDANG' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDIKIT' THEN 'SANGAT SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan='SEDANG' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDIKIT' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDIKIT' THEN 'SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan='SEDANG' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='SEDANG' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDIKIT' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan='SEDANG' THEN 'KURANG SEJAHTERA'
  WHEN hasil_kemiskinan='BANYAK' AND hasil_ketelantaran='BANYAK' AND hasil_kecacatan ='BANYAK' THEN 'KURANG SEJAHTERA' END)");
 }
 
 /**Fuzzy Mamdani per Kecamatan*/
 
   /***********************coba select tb_penduduk then insert in mamdani_kecamatan *******************/
  
   /**get insert without dupicate key */
 //   function get_kecamatan(){
 
 //  $q=$this->db->query("INSERT INTO mamdani_kecamatan (nama_kecamatan) SELECT tk.nama_kecamatan FROM tb_kecamatan tk
 // WHERE NOT EXISTS (SELECT id FROM mamdani_kecamatan mk WHERE mk.nama_kecamatan=tk.nama_kecamatan)");
 
 // return $q;
 
 // }
 
  public function get_tb_penduduk(){
    $q=$this->db->query("INSERT INTO mamdani_kecamatan(nama_kecamatan) SELECT tk.nama_kecamatan FROM tb_penduduk p
     JOIN tb_kecamatan tk ON tk.kecamatan_id=p.kecamatan GROUP BY nama_kecamatan");
    return $q;
  }
 
  function view(){
    $this->db->select('*');
    $this->db->from('mamdani_kecamatan');
    return $this->db->get()->result();
 
    #join tanpa primary key
   // $q=$this->db->query("SELECT * FROM mamdani_kecamatan JOIN tb_variabel_kecamatan JOIN tb_sub_var_kecamatan");
   // return $q->result();
 
  }

  function getdata(){
  return $this->db->select('*')->from('tb_klasifikasi_penduduk')
  ->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan')
  ->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan')
  ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id')
  ->order_by('klasifikasi_id','desc')
  ->get()->result();
  }

  /***********************************************************************PROSES KLASIFIKASI */

  /**menghitung bobot */
  function bobot_tanggungan(){
    $this->db->query("UPDATE tb_klasifikasi_penduduk kp JOIN tb_bobot_penduduk bp SET kp.bobot_tanggungan=kp.jumlah_tanggungan*bp.persen WHERE bp.id=2");
  }
  function bobot_keterangan_rumah(){
    $this->db->query("UPDATE tb_klasifikasi_penduduk kp JOIN tb_bobot_penduduk bp SET kp.bobot_keterangan_rumah=kp.keterangan_rumah*bp.persen WHERE bp.id=1");
  }
  function bobot_jumlah_aset(){
    $this->db->query("UPDATE tb_klasifikasi_penduduk kp JOIN tb_bobot_penduduk bp SET kp.bobot_jumlah_aset=kp.jumlah_kepemilikan_aset*bp.persen WHERE bp.id=3");
  }
  function bobot_program_sosial(){
    $this->db->query("UPDATE tb_klasifikasi_penduduk kp JOIN tb_bobot_penduduk bp SET kp.bobot_program_sosial=kp.program_sosial*bp.persen WHERE bp.id=4");
  }

  function total_bobot(){
    $this->db->query("UPDATE tb_klasifikasi_penduduk kp JOIN(
			SELECT klasifikasi_id, sum(total_bobot) total_bobot FROM(
			SELECT klasifikasi_id,bobot_tanggungan total_bobot FROM tb_klasifikasi_penduduk UNION ALL
			SELECT klasifikasi_id,bobot_keterangan_rumah FROM tb_klasifikasi_penduduk UNION ALL 
			SELECT klasifikasi_id,bobot_jumlah_aset FROM tb_klasifikasi_penduduk UNION ALL
			SELECT klasifikasi_id,bobot_program_sosial FROM tb_klasifikasi_penduduk 
		)g GROUP BY klasifikasi_id)a ON kp.klasifikasi_id=a.klasifikasi_id SET kp.total_bobot=a.total_bobot");
  }



  function bobot(){
  return $this->db->select('*')->from('tb_bobot_penduduk')->get()->result();
  }

  function klasifikasi3(){
    return $this->db->select('*')->from('tb_tingkat_kesejahteraan')->get()->result();
  }

  function klasifikasi_wilayah(){
    return $this->db->select('*')->from('tb_variabel_desa')->get()->result();
  }

  function get_total_penduduk_kecamatan(){
    return $this->db->select('*')->from('tb_kecamatan')->get()->result();
  }

  function get_total_penduduk_desa(){
    return $this->db->select('*')->from('tb_desa')->get()->result();
  }

  function jumlah_aset(){
    return $this->db->select('*')->from('tb_klasifikasi_penduduk')
    ->join('tb_penduduk_kepemilikan_aset','tb_penduduk_kepemilikan_aset.id=tb_klasifikasi_penduduk.aset_id')
    ->join('tb_penduduk_keterangan_rumah','tb_penduduk_keterangan_rumah.id=tb_klasifikasi_penduduk.rumah_id')
    ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id')->get()->result();
  }

  
  /**END menghitung bobot */


  function klas(){

    $this->db->trans_start();
    $penduduk = $this->db->select('*')->from('tb_klasifikasi_penduduk')
    ->join('tb_kecamatan','tb_kecamatan.kecamatan_id=tb_klasifikasi_penduduk.kecamatan')
    ->join('tb_desa','tb_desa.id_desa=tb_klasifikasi_penduduk.kelurahan')
    ->join('tb_penduduk_pengenalan_tempat','tb_penduduk_pengenalan_tempat.id=tb_klasifikasi_penduduk.tempat_id')
    ->get()->result();
    $klasifikasi= $this->db->select('*')->from('tb_tingkat_kesejahteraan')->get()->result();
    

    foreach ($penduduk as $pend) {
      foreach ($klasifikasi as $klas) {
        if (($klas->min <= $pend->total_bobot) && ($pend->total_bobot <= $klas->max)) {
          $post= $this->db->query("UPDATE tb_klasifikasi_penduduk SET klasifikasi='$klas->nama' WHERE klasifikasi_id = '$pend->klasifikasi_id'");
        }

        // $this->db->query("UPDATE tb_klasifikasi_penduduk SET klasifikasi=(CASE 
        // WHEN '$klas->min' <= '$pend->total_bobot' AND '$pend->total_bobot'<= '$klas->max' THEN '$klas->nama' ELSE 'tidak' END) WHERE klasifikasi_id='$pend->klasifikasi_id' ");

      }
    }

    $this->db->trans_complete();
    // print_r($post);
    return $post;
  }
  
}