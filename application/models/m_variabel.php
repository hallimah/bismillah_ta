<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Variabel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
      }
    public function select_miskin(){
        $hasil = $this->db->query("SELECT * FROM tb_variabel WHERE nama_variabel='kemiskinan' order by variabel_id DESC");
        return $hasil;
    }

    public function tabel_variabel(){
        $this->db->select('*');
        $this->db->from('tb_variabel');
       // $this->db->join('tb_variabel','tb_variabel.variabel_id=tb_sub_variabel.sub_id');
        $q= $this->db->get();
        return $q;

    }

    #input 2 tabel sekaligus
    function input_variabel($array1,$array2){
      $this->db->trans_start();
     // $this->db->distinct();
      $this->db->insert('tb_variabel',$array1);
      $variabel_id=$this->db->insert_id();

      $array2['variabel_id']=$variabel_id;
      $this->db->update('tb_sub_variabel',$array2);

      $this->db->trans_complete();
      return $this->db->insert_id();

    }

    /**edit penduduk */
    public function edit_variabel($id){
      $this->db->select('*');
      $this->db->from('tb_variabel');
      // $this->db->join('tb_variabel','tb_variabel.variabel_id=tb_sub_variabel.sub_variabel_id');
      $this->db->where('variabel_id',$id);
      // $this->db->where('sub_variabel_id',$id);
      $q= $this->db->get()->result();
      return $q;
      // print_r($q);
    }

    function edit_sub_variabel($id){
      $hasil = $this->db->select('*')->from('tb_sub_variabel')->where('sub_variabel_id',$id)->get()->result();
      return $hasil;
    }

    function update_variabel_penduduk($where,$array,$table){ //$variabel_id,$nama_variabel,$jenis_io
      // $query= $this->db->query("UPDATE `tb_variabel` SET nama_variabel='$nama_variabel', jenis_io='$jenis_io' WHERE variabel_id='$variabel_id' ");
      // if ($query) {
      //   $max=$this->db->query("SELECT variabel_id as variabel_id FROM tb_variabel");
     
      // }
      // return $max->row_array();
      $this->db->where($where);
      $this->db->update($table,$array);

    }

    function update_sub_variabel_penduduk($sub_id,$sub_variabel_id,$nama,$skor){
       $query = $this->db->query("UPDATE `tb_sub_variabel` SET nama='$nama', skor='$skor' WHERE sub_id='$sub_id' AND sub_variabel_id='$sub_variabel_id'");
      
    }

    public function varKecamatan(){
      // $this->db->select('*');
      // $this->db->from('tb_sub_var_kecamatan');
      // $this->db->join('tb_variabel_kecamatan','tb_variabel_kecamatan.variabel_id=tb_sub_var_kecamatan.sub_id');
      // $q= $this->db->get();
      // return $q;

      $this->db->select('*');
      $this->db->from('tb_variabel_kecamatan');
      $q= $this->db->get();
      return $q;
  }

  public function varDesa(){
    $this->db->select('*');
        $this->db->from('tb_variabel_desa'); //tb_sub_var_desa
        // $this->db->join('tb_variabel_desa','tb_variabel_desa.variabel_id=tb_sub_var_desa.sub_id');
        $q= $this->db->get();
        return $q;;
}

/**tambah variabel penduduk c_variabel */
function insert($nama_variabel, $jenis_io){
 $query= $this->db->query("INSERT INTO `tb_variabel` VALUES (NULL,'$nama_variabel','$jenis_io') ");
 if ($query) {
   $max=$this->db->query("SELECT MAX(variabel_id) as max FROM tb_variabel");

 }
 return $max->row_array();
}

/**tambah sub variabel penduduk c_variabel */
function insert_sub_variabel($variabel_id, $nama, $skor){
  $query = $this->db->query("INSERT INTO `tb_sub_variabel` VALUES (NULL, '$variabel_id','$nama','$skor') ");
}

/**tambah variabel kecamatan c_variabel */
function insert_var_kecamatan($nama_variabel, $jenis_io){
  $query= $this->db->query("INSERT INTO `tb_variabel_kecamatan` VALUES (NULL,'$nama_variabel','$jenis_io') ");
  if ($query) {
    $max=$this->db->query("SELECT MAX(variabel_id) as max FROM tb_variabel_kecamatan");
 
  }
  return $max->row_array();
 }
 
 /**tambah sub variabel kecamatan c_variabel */
 function insert_sub_variabel_kecamatan($variabel_id, $nama, $urutan,$a,$b,$c,$d){
   $query = $this->db->query("INSERT INTO `tb_sub_var_kecamatan` VALUES (NULL, '$variabel_id','$nama','$urutan','$a','$b','$c','$d') ");
 }

 /**sama dengan variabel kecamatan c_variabel hanya insert */
 function insert_var_kecamatan1($array){
  return $this->db->insert('tb_variabel_kecamatan',$array);
  
 }

 /**update variabel kecamatan */
 function update_var_kecamatan1($where,$array,$table){
$this->db->where($where);
$this->db->update($table,$array);

 }

 /**edit variabel kecamatan */
 public function edit_variabel_kecamatan($id){
  $this->db->select('*');
  $this->db->from('tb_variabel_kecamatan');
 // $this->db->join('tb_variabel','tb_variabel.variabel_id=tb_sub_variabel.sub_id');
  $this->db->where('variabel_id',$id);
  $q= $this->db->get();
  return $q;
}

 /**tambah variabel desa c_variabel */
function insert_var_desa($nama_variabel, $jenis_io){
  $query= $this->db->query("INSERT INTO `tb_variabel_desa` VALUES (NULL,'$nama_variabel','$jenis_io') ");
  if ($query) {
    $max=$this->db->query("SELECT MAX(variabel_id) as max FROM tb_variabel_desa");
 
  }
  return $max->row_array();
 }
 
 /**tambah sub variabel desa c_variabel */
 function insert_sub_variabel_desa($variabel_id, $nama, $skor){
   $query = $this->db->query("INSERT INTO `tb_sub_var_desa` VALUES (NULL, '$variabel_id','$nama','$skor') ");
 }

 /**edit variabel desa */
 function edit_variabel_desa(){
  $this->db->select('*');
  $this->db->from('tb_variabel_kecamatan');
  // $this->db->where('variabel_id',$id);
  $q= $this->db->get();
  return $q;
 }

 /**update variabel desa */
 function update_var_desa1($where,$array,$table){
  $this->db->where($where);
  $this->db->update($table,$array);
  
 }

function update($data, $id)
{
  $this->db->where('sub_id', $id);
  $this->db->update('tb_sub_variabel', $data);
}

function delete($id)
{
  $this->db->where('sub_id', $id);
  $this->db->delete('tb_sub_var_desa');
}


#mengubah nilai variabel kecamatan kedalam persen-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
function variabel_kemiskinan_kecamatan(){
  $this->db->trans_start();
  // $miskin = $this->db->select_sum('kemiskinan')->get('mamdani_kecamatan')->row();
  // $q_miskin = $miskin->kemiskinan;

  $p= $this->db->query("UPDATE tb_variabel_kecamatan tv
  SET tv.persen_var_a = tv.a / 100 , 
  tv.persen_var_b = tv.b / 100 ,  tv.persen_var_c = tv.c / 100 ,  tv.persen_var_d = tv.d / 100 
  WHERE tv.variabel_id=1");
  
  $this->db->trans_complete();
 return $p;
  // print_r($p);
}

function variabel_kesejahteraan_kecamatan(){
  $this->db->trans_start();
  // $miskin = $this->db->select_sum('kemiskinan')->get('mamdani_kecamatan')->row();
  // $q_miskin = $miskin->kemiskinan;

  $p= $this->db->query("UPDATE tb_variabel_kecamatan tv
  SET tv.persen_var_a = tv.a / 100 , 
  tv.persen_var_b = tv.b / 100 ,  tv.persen_var_c = tv.c / 100 ,  tv.persen_var_d = tv.d / 100 
  WHERE tv.variabel_id=4");
  
  $this->db->trans_complete();
 return $p;
  
}

function variabel_kecacatan_kecamatan(){
  $this->db->trans_start();
  // $cacat = $this->db->select_sum('kecacatan')->get('mamdani_kecamatan')->row();
  // $q_cacat = $cacat->kecacatan;
  
  $p= $this->db->query("UPDATE tb_variabel_kecamatan tv SET tv.persen_var_a = a / 100, 
  tv.persen_var_b = b / 100,  tv.persen_var_c = c / 100,  tv.persen_var_d = d / 100
  WHERE variabel_id=3");

  $this->db->trans_complete();
  return $p;
  // print_r($q_cacat);
}

function variabel_ketelantaran_kecamatan(){
  $this->db->trans_start();
  // $terlantar = $this->db->select_sum('ketelantaran')->get('mamdani_kecamatan')->row();
  // $q_terlantar = $terlantar->ketelantaran;

  $p= $this->db->query("UPDATE tb_variabel_kecamatan tv SET tv.persen_var_a = tv.a / 100, 
  tv.persen_var_b = tv.b / 100,  tv.persen_var_c = tv.c / 100,  tv.persen_var_d = tv.d / 100
  WHERE variabel_id=2");

  $this->db->trans_complete();
   return $p;
  // print_r($p);
}

#END mengubah nilai variabel kecamatan kedalam persen-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

#mengubah nilai variabel desa kedalam persen-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
function variabel_kemiskinan_desa(){
  $this->db->trans_start();
  // $miskin = $this->db->select_sum('kemiskinan')->get('mamdani')->row();
  // $q_miskin = $miskin->kemiskinan;

  $p= $this->db->query("UPDATE tb_variabel_desa tv SET tv.persen_var_a = a / 100, 
  tv.persen_var_b = b / 100,  tv.persen_var_c = c / 100,  tv.persen_var_d = d / 100
  WHERE variabel_id=1");
  
  $this->db->trans_complete();
 return $p;
  // print_r($p);
}

function variabel_kecacatan_desa(){
  $this->db->trans_start();
  // $cacat = $this->db->select_sum('kecacatan')->get('mamdani')->row();
  // $q_cacat = $cacat->kecacatan;
  
  $p= $this->db->query("UPDATE tb_variabel_desa tv SET tv.persen_var_a = a / 100, 
  tv.persen_var_b = b / 100,  tv.persen_var_c = c / 100,  tv.persen_var_d = d / 100
  WHERE variabel_id=3");

  $this->db->trans_complete();
  return $p;
  // print_r($q_cacat);
}

function variabel_ketelantaran_desa(){
  $this->db->trans_start();
  // $terlantar = $this->db->select_sum('ketelantaran')->get('mamdani')->row();
  // $q_terlantar = $terlantar->ketelantaran;

  $p= $this->db->query("UPDATE tb_variabel_desa tv SET tv.persen_var_a = tv.a / 100, 
  tv.persen_var_b = tv.b / 100,  tv.persen_var_c = tv.c / 100,  tv.persen_var_d = tv.d / 100
  WHERE variabel_id=2");

  $this->db->trans_complete();
   return $p;
  // print_r($p);
}

#END mengubah nilai variabel desa kedalam persen-----------------------------------------------------------------------------------------------------------------------------------------------------------------------


/**tambah variabel penduduk c_variabel*/


 function multi_query(){
   $this->db->trans_start();
$this->db->select_sum('kemiskinan');
$p=$this->db->get('mamdani_kecamatan')->row();
$t= $p->kemiskinan;


$q=$this->db->query("UPDATE mamdani_kecamatan m JOIN tb_variabel_kecamatan tk ON m.id
 JOIN tb_sub_var_kecamatan sv ON tk.variabel_id=sv.sub_variabel_id
    SET m.hasil_kemiskinan=(CASE 
    WHEN (m.kemiskinan / '$t' * 100) <= (sv.a /100 * '$t') THEN 0

   )");
    
 $this->db->trans_complete();


 }



  /***********************end coba select tb_penduduk then insert in mamdani_kecamatan *******************/

/**-------------------------------------------PEMBOBOTAN */
function pembobotan_penduduk(){
  return $this->db->select('*')->from('tb_bobot_penduduk')->get()->result_array();
}

function update_bobot_penduduk($id,$nama,$bobot){
  $query = $this->db->query("UPDATE `tb_bobot_penduduk` SET nama='$nama', bobot='$bobot' WHERE id='$id'");
 
}

function update_persen(){
  return $this->db->query("UPDATE tb_bobot_penduduk tb SET tb.persen=tb.bobot/100 WHERE id");
}

function update_persen_kelurahan(){
  return $this->db->query("UPDATE tb_variabel_desa tb SET tb.persen=tb.min/100 WHERE variabel_id");
}


function tb_tingkat_kesejahteraan(){
  return $this->db->select('*')->get('tb_tingkat_kesejahteraan')->result_array();
}
/**--------------------------------------------------END PEMBOBOTAN */


}

?>