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
       $this->db->select('*');
       $this->db->from('mamdani_kecamatan');
       $this->db->where('tahun_klasifikasi BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
       $p=$this->db->get()->result();
       return $p;
      // return $this->db->get('mamdani_kecamatan')->result();
     }
     
     public function select_tahun(){
       $sql=$this->db->query('SELECT DISTINCT(tahun_masuk) FROM tb_penduduk');
         return $sql->result();
     }
 
     public function select_tahun_klasifikasi_kelurahan(){
      $sql=$this->db->query('SELECT DISTINCT(tahun_klasifikasi) FROM mamdani 
      WHERE tahun_klasifikasi BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
        return $sql->result();
     }
 
     public function select_tahun_klasifikasi_kecamatan(){
       $sql=$this->db->query('SELECT DISTINCT(tahun_klasifikasi) FROM mamdani_kecamatan 
       WHERE tahun_klasifikasi BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
         return $sql->result();
     }
 
 
     public function fuzzy(){
      $this->db->select('*');
      $this->db->from('mamdani');
      $this->db->where('tahun_klasifikasi BETWEEN DATE_SUB(NOW(),INTERVAL 1 YEAR)AND NOW()');
      $p=$this->db->get()->result();
      return $p;
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

  
}