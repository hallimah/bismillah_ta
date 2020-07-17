<?php
class M_Rumusfuzzy extends CI_Model{

	/************************************FUZZY KOMPLIT************************************************ */

	public function fuzzytambah($data){
       
		$sql = $this->db->insert('mamdani3',$data);
		return$sql;
	}
	public function fuzzytambah2($data){
       
		$sql = $this->db->insert('mamdani4',$data);
		return$sql;
	}
	
	public function fuzzytabel(){
		$data = $this->db->get('mamdani3')->result();
		return $data;
	}
	public function fuzzytabel2(){
		$data = $this->db->get('mamdani4')->result();
		return $data;
	}

	function pecah($id)
	{
		$sql = $this->db->query("SELECT * FROM mamdani3 WHERE mamdani_id='$id'");
		return $sql->result();
	}
	function pecah2($id)
	{
		$sql = $this->db->query("SELECT * FROM mamdani4 WHERE mamdani_id='$id'");
		return $sql->result();
	}

	function update_hasil($data,$where)
	{
		$sql = $this->db->update('mamdani3',$data,$where);
		return $sql;
	}
	function update_hasil2($data,$where)
	{
		$sql = $this->db->update('mamdani4',$data,$where);
		return $sql;
	}

	function pecahpunya($id)
	{
		$sql = $this->db->query("SELECT * FROM mamdani3 WHERE mamdani_id='$id'");
		return $sql->result();
	}
	function pecahpunya2($id)
	{
		$sql = $this->db->query("SELECT * FROM mamdani4 WHERE mamdani_id='$id'");
		return $sql->result();
	}

	function update_hasil_nilai($data,$where)
	{
		$sql = $this->db->update('mamdani3',$data,$where);
		return $sql;
	}
	function update_hasil_nilai2($data,$where)
	{
		$sql = $this->db->update('mamdani4',$data,$where);
		return $sql;
	}

	/**------------------------------------------ */
	public function nilai_inferensi(){
		$this->db->query("UPDATE mamdani3 m JOIN(
			SELECT mamdani_id, MAX(rule_nilai) rule_nilai FROM(
			SELECT mamdani_id,m_sedikit rule_nilai FROM mamdani3 UNION ALL
			SELECT mamdani_id,m_sedang FROM mamdani3 UNION ALL 
			SELECT mamdani_id,m_banyak FROM mamdani3 UNION ALL
			SELECT mamdani_id,t_sedikit FROM mamdani3 UNION ALL
			SELECT mamdani_id,t_sedang FROM mamdani3 UNION ALL 
			SELECT mamdani_id,t_banyak FROM mamdani3 UNION ALL
			SELECT mamdani_id,c_sedikit FROM mamdani3 UNION ALL
			SELECT mamdani_id,c_sedang FROM mamdani3 UNION ALL 
			SELECT mamdani_id,c_banyak FROM mamdani3
		)g GROUP BY mamdani_id)a ON m.mamdani_id=a.mamdani_id SET m.rule_nilai=a.rule_nilai");
	}

	public function fungsi_keanggotaan_output(){
		$this->db->query("UPDATE mamdani3 set nilai_fuzzy=(CASE
		WHEN keterangan='SANGAT SEJAHTERA' AND 10 <=20 THEN rule_nilai*(20-10)+10
		WHEN keterangan='SANGAT SEJAHTERA' AND 20 <=30 THEN rule_nilai*(20-10)+10 END )");
		
	}


}
?>