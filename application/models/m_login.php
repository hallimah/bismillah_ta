<?php

class m_login extends CI_Model{
    
    function cek_login($table,$where){
        $username = $this->input->post('user_nama');
        $password = $this->input->post('user_password');
        $where = array(
            'user_nama' => $username,
            'user_password' => md5($password)
        );
        return $this->db->get_where($table,$where);
    }

    /**c_user hasil  klasifikasi */
    public function klasifikasi(){
        $this->db->select("*");
        $q=$this->db->get("tb_klasifikasi_penduduk");
        return $q;
    }
    public function klasifikasi_desa(){
        $this->db->select("*");
        $q=$this->db->get("tb_klasifikasi_penduduk");
        return $q;
    }

    /**coba peta */

    public function m_peta(){
        $this->db->query("SELECT country,population FROM geo");
//        $dt= $this->db->from("geo");
        // $dt= $this->db->get();
        // return $dt;
    }

    public function m_visualisasi(){
       // $this->db->query("SELECT nama_kecamatan FROM mamdani");
       $data = $this->db->get('tb_kecamatan')->result();
		return $data;
    }
}

?>