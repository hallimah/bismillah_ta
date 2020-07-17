<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_report extends CI_Controller{

public function __construct(){
  parent::__construct();
  $this->load->model('mamdani','m_report');
  $this->load->helper('tgl_indo');
  $this->load->library('form_validation');
}

/**LIHAT TABEL UNDUH DATA PMKS */
public function data_pmks_perwilayah_Kecamatan(){
  $config = array();
  $config["base_url"] = base_url() . "c_report/data_pmks_perwilayah_Kecamatan";
  $config["per_page"] = 10000;
  $config["uri_segment"] = 3;
  
  $this->pagination->initialize($config);
  
  $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
  $data["data_pmks"] = $this->m_report->
  data_pmks_perkecamatan($config["per_page"], $page);
  
  $data['tahun']=$this->m_report->select_tahun_pmks();
  
  $this->load->view('templates/header');
  $this->load->view('admin/unduhdata/unduh_data_pmks_perwilayah_Kecamatan',$data);
  $this->load->view('templates/footer');

}
/**END LIHAT TABEL UNDUH DATA PMKS */

/**LIHAT TABEL UNDUH DATA KLASIFIKASI */
#VIEW KECAMATAN
public function dataklasifikasiKecamatan(){
  $config = array();
  $config["base_url"] = base_url() . "c_report/dataklasifikasiKecamatan";
  $config["per_page"] = 10000;
  $config["uri_segment"] = 3;
  
  $this->pagination->initialize($config);
  
  $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
  $data["klasifikasi"] = $this->m_report->
  unduh_laporan_pertahun_kecamatan($config["per_page"], $page);
  
  $data['tahun']=$this->m_report->select_tahun_klasifikasi_kecamatan();

  $this->load->view('templates/header');
  $this->load->view('admin/unduhdata/unduh_data_klasifikasi_kecamatan',$data);
  $this->load->view('templates/footer');
}


#VIEW KELURAHAN
public function dataklasifikasiKelurahan(){
  $config = array();
  $config["base_url"] = base_url() . "c_report/dataklasifikasiKelurahan";
  $config["per_page"] = 10000;
  $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

  $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
  $data["klasifikasi"] = $this->m_report->
  unduh_laporan_pertahun_kelurahan($config["per_page"], $page);
  
  $data['tahun']=$this->m_report->select_tahun_klasifikasi_kelurahan();

  $this->load->view('templates/header');
  $this->load->view('admin/unduhdata/unduh_data_klasifikasi_kelurahan',$data);
  $this->load->view('templates/footer');
}

/**END LIHAT TABEL UNDUH DATA KLASIFIKASI*/

/**LAPORAN PDF DAN EXCEL LIHAT DATA HASIL KLASIFIKASI */
#PDF
public function laporan_klasifikasi_kelurahan($id){
  $this->load->library('dompdf_gen');
  $where = array('tahun_klasifikasi' => $id );
  $data['report'] = $this->db->query("SELECT * FROM mamdani WHERE 
  tahun_klasifikasi ='$id'")->result();
 
 // $data['tahun']=$this->m_report->get_tahun_klasifikasi_kelurahan($id);
  $data['sum_kemiskinan']=$this->m_report->count_kemiskinan($id);
  $data['sum_ketelantaran']=$this->m_report->count_ketelantaran($id);
  $data['sum_kecacatan']=$this->m_report->count_kecacatan($id);
  $data['sum_kecamatan']=$this->m_report->count_kecamatan($id);
  $data['sum_kelurahan']=$this->m_report->count_kelurahan($id);

  $this->load->view('admin/lihatdata/laporan_pdf',$data);

  $paper_size = 'A4';
  $orientation = 'portrait';
  $html = $this->output->get_output();
  $this->dompdf->set_paper($paper_size, $orientation);

  $this->dompdf->load_html($html);
  $this->dompdf->render();
  $this->dompdf->stream("LaporanKlasifikasiPMKSperKelurahan.pdf",array('Attachment'=>0));
}

public function laporan_klasifikasi_kecamatan($id){
  $this->load->library('dompdf_gen');
 
  $where = array('tahun_klasifikasi' => $id );
  $data['report'] = $this->db->query("SELECT * FROM mamdani_kecamatan WHERE 
  tahun_klasifikasi ='$id'")->result();
  
  //$data['tahun']=$this->m_report->get_tahun_klasifikasi_kecamatan($id);
  $data['sum_kemiskinan']=$this->m_report->count_kemiskinan_kec($id);
  $data['sum_ketelantaran']=$this->m_report->count_ketelantaran_kec($id);
  $data['sum_kecacatan']=$this->m_report->count_kecacatan_kec($id);
  $data['sum_kecamatan']=$this->m_report->count_kecamatan_kec($id);

  $this->load->view('admin/lihatdata/laporan_pdf_kec',$data);

  $paper_size = 'A4';
  $orientation = 'portrait';
  $html = $this->output->get_output();
  $this->dompdf->set_paper($paper_size, $orientation);

  $this->dompdf->load_html($html);
  $this->dompdf->render();
  $this->dompdf->stream("LaporanKlasifikasiPMKSperKecamatan.pdf",array('Attachment'=>0));

}

#EXCEL
public function excel(){
  $fuzzy['fuzzy']= $this->mamdani->fuzzy('mamdani');

  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

  $object = new PHPExcel();
  $object->getProperties()->setCreator("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setLastModifiedBy("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setTitle("Laporan");

  $object->setActiveSheetIndex(0);

  $object->getActiveSheet()->setCellValue('A1','Data Hasil Klasifikasi Tingkat Kesejahteraan Wilayah Kabupaten Tegal');
  $object->getActiveSheet()->setCellValue('A2','PMKS Non-Panti');
  $object->getActiveSheet()->setCellValue('A3','Tahun');
  $object->getActiveSheet()->setCellValue('A4','Kode Kota');
  $object->getActiveSheet()->setCellValue('A5','Kota');
  $object->getActiveSheet()->setCellValue('A7','NO');
  $object->getActiveSheet()->setCellValue('B7','Kecamatan');
  $object->getActiveSheet()->setCellValue('C7','Kelurahan');
  $object->getActiveSheet()->setCellValue('D7','Total Kemiskinan');
  $object->getActiveSheet()->setCellValue('E7','Total Ketelantaran');
  $object->getActiveSheet()->setCellValue('F7','Total Kecacatan');
  $object->getActiveSheet()->setCellValue('G7','Tingkat Kesejahteraan');

  $baris_date=3;
  $baris_kode=4;
  $baris_kota=5;
  $baris = 8;
  $no = 1;

  date_default_timezone_set('Asia/Jakarta');
  $date= date('Y');

  $object->getActiveSheet()->setCellValue('B'.$baris_date, $date);
  $object->getActiveSheet()->setCellValue('B'.$baris_kode, '28');
  $object->getActiveSheet()->setCellValue('B'.$baris_kota, 'Kabupaten Tegal');
  foreach ($fuzzy['fuzzy'] as $key) {
      $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
      $object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_kecamatan);
      $object->getActiveSheet()->setCellValue('C'.$baris, $key->nama_desa);
      $object->getActiveSheet()->setCellValue('D'.$baris, $key->kemiskinan);
      $object->getActiveSheet()->setCellValue('E'.$baris, $key->ketelantaran);
      $object->getActiveSheet()->setCellValue('F'.$baris, $key->kecacatan);
      $object->getActiveSheet()->setCellValue('G'.$baris, $key->keterangan);

      $baris++;
  }

  $filename="Laporan_PMKS_Kelurahan_non_Panti".'.xlsx';
  $object->getActiveSheet()->setTitle("Laporan");
  // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Type: application/vnd-ms-excel');
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control:max-age=0');

  $writer=PHPExcel_IOFactory::createwriter($object,'Excel2007');
  $writer->save('php://output');

  exit;
}

public function excel_kecamatan(){
  $fuzzy['fuzzy']= $this->mamdani->excel_kecamatan('mamdani_kecamatan');

  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

  $object = new PHPExcel();
  $object->getProperties()->setCreator("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setLastModifiedBy("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setTitle("Laporan");

  $object->setActiveSheetIndex(0);

  $object->getActiveSheet()->setCellValue('A1','Data Hasil Klasifikasi Tingkat Kesejahteraan Wilayah Kabupaten Tegal');
  $object->getActiveSheet()->setCellValue('A2','PMKS Non-Panti');
  $object->getActiveSheet()->setCellValue('A3','Tahun');
  $object->getActiveSheet()->setCellValue('A4','Kode Kota');
  $object->getActiveSheet()->setCellValue('A5','Kota');
  $object->getActiveSheet()->setCellValue('A7','NO');
  $object->getActiveSheet()->setCellValue('B7','Kecamatan');
  $object->getActiveSheet()->setCellValue('C7','Total Kemiskinan');
  $object->getActiveSheet()->setCellValue('D7','Total Ketelantaran');
  $object->getActiveSheet()->setCellValue('E7','Total Kecacatan');
  $object->getActiveSheet()->setCellValue('F7','Tingkat Kesejahteraan');

  $baris_date=3;
  $baris_kode=4;
  $baris_kota=5;
  $baris = 8;
  $no = 1;

  date_default_timezone_set('Asia/Jakarta');
  $date= date('Y');

  $object->getActiveSheet()->setCellValue('B'.$baris_date, $date);
  $object->getActiveSheet()->setCellValue('B'.$baris_kode, '28');
  $object->getActiveSheet()->setCellValue('B'.$baris_kota, 'Kabupaten Tegal');
  foreach ($fuzzy['fuzzy'] as $key) {
      $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
      $object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_kecamatan);
      $object->getActiveSheet()->setCellValue('C'.$baris, $key->kemiskinan);
      $object->getActiveSheet()->setCellValue('D'.$baris, $key->ketelantaran);
      $object->getActiveSheet()->setCellValue('E'.$baris, $key->kecacatan);
      $object->getActiveSheet()->setCellValue('F'.$baris, $key->keterangan);

      $baris++;
  }

  $filename="Laporan_PMKS_Kecamatan_non_Panti".'.xlsx';
  $object->getActiveSheet()->setTitle("Laporan");
  // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Type: application/vnd-ms-excel');
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control:max-age=0');

  $writer=PHPExcel_IOFactory::createwriter($object,'Excel2007');
  $writer->save('php://output');

  exit;
}
/**END LAPORAN PDF DAN EXCEL LIHAT DATA HASIL KLASIFIKASI */


/**PDF DAN EXCEL UNDUH DATA, UNDUH DATA KLASIFIKASI SELECT TAHUN */
#PDF KECAMATAN SELECT TAHUN
function export_pdf_select_kecamatan($id){
  $this->load->library('dompdf_gen');

  $where = array('tahun_klasifikasi' => $id );
  $data['report'] = $this->db->query("SELECT * FROM mamdani_kecamatan WHERE 
  tahun_klasifikasi ='$id'")->result();
  
  $data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kecamatan($id);
  $data['sum_kemiskinan']=$this->m_report->count_kemiskinan_select($id);
  $data['sum_ketelantaran']=$this->m_report->count_ketelantaran_select($id);
  $data['sum_kecacatan']=$this->m_report->count_kecacatan_select($id);
  $data['sum_kecamatan']=$this->m_report->count_kecamatan_select($id);
  
  $this->load->view('admin/unduhdata/laporan_pdf_kec_select',$data);

  $paper_size = 'A4';
  $orientation = 'portrait';
  $html = $this->output->get_output();
  $this->dompdf->set_paper($paper_size, $orientation);

  $this->dompdf->load_html($html);
  $this->dompdf->render();
  $this->dompdf->stream("LaporanKlasifikasiPMKStiapKecamatan$id.pdf",array('Attachment'=>0));

}

#PDF KELURAHAN SELECT TAHUN
function export_pdf_select_kelurahan($id){
  $this->load->library('dompdf_gen');

  $where = array('tahun_klasifikasi' => $id );
  $data['report'] = $this->db->query("SELECT * FROM mamdani WHERE 
  tahun_klasifikasi ='$id'")->result();
  
  $data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kelurahan($id);
  $data['sum_kemiskinan']=$this->m_report->count_kemiskinan_select_kel($id);
  $data['sum_ketelantaran']=$this->m_report->count_ketelantaran_select_kel($id);
  $data['sum_kecacatan']=$this->m_report->count_kecacatan_select_kel($id);
  $data['sum_kecamatan']=$this->m_report->count_kecamatan_select_kel($id);
  $data['sum_kelurahan']=$this->m_report->count_kelurahan_select_kel($id);
  
  $this->load->view('admin/unduhdata/laporan_pdf_kel_select',$data);

  $paper_size = 'A4';
  $orientation = 'portrait';
  $html = $this->output->get_output();
  $this->dompdf->set_paper($paper_size, $orientation);

  $this->dompdf->load_html($html);
  $this->dompdf->render();
  $this->dompdf->stream("LaporanKlasifikasiPMKStiapKelurahan$id.pdf",array('Attachment'=>0));

}

#EXCEL KECAMATAN SELECT TAHUN
public function export_excel_klasifikasi_kec_per_tahun($id){
 
  $fuzzy['fuzzy']= $this->m_report->laporan_data_klasifikasi_excel_kecamatan($id);

  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

  $object = new PHPExcel();
  $object->getProperties()->setCreator("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setLastModifiedBy("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setTitle("Laporan");

  $object->setActiveSheetIndex(0);

  $object->getActiveSheet()->setCellValue('A1','Data Hasil Klasifikasi Tingkat Kesejahteraan Wilayah Kabupaten Tegal');
  $object->getActiveSheet()->setCellValue('A2','PMKS Non-Panti');
  $object->getActiveSheet()->setCellValue('A3','Tahun');
  $object->getActiveSheet()->setCellValue('A4','Kode Kota');
  $object->getActiveSheet()->setCellValue('A5','Kota');
  $object->getActiveSheet()->setCellValue('A7','NO');
  $object->getActiveSheet()->setCellValue('B7','Kecamatan');
  $object->getActiveSheet()->setCellValue('C7','Total Kemiskinan');
  $object->getActiveSheet()->setCellValue('D7','Total Ketelantaran');
  $object->getActiveSheet()->setCellValue('E7','Total Kecacatan');
  $object->getActiveSheet()->setCellValue('F7','Tingkat Kesejahteraan');

  $baris_date=3;
  $baris_kode=4;
  $baris_kota=5;
  $baris = 8;
  $no = 1;

  $date= $this->m_report->excel_klasifikasi_kecamatan($id);

  $object->getActiveSheet()->setCellValue('B'.$baris_date, $date);
  $object->getActiveSheet()->setCellValue('B'.$baris_kode, '28');
  $object->getActiveSheet()->setCellValue('B'.$baris_kota, 'Kabupaten Tegal');
  foreach ($fuzzy['fuzzy'] as $key) {
    $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
    $object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_kecamatan);
    $object->getActiveSheet()->setCellValue('C'.$baris, $key->kemiskinan);
    $object->getActiveSheet()->setCellValue('D'.$baris, $key->ketelantaran);
    $object->getActiveSheet()->setCellValue('E'.$baris, $key->kecacatan);
    $object->getActiveSheet()->setCellValue('F'.$baris, $key->keterangan);
    $baris++;
  }

  $filename="Laporan_PMKS_Kecamatan_non_Panti".$id.'.xlsx';
  $object->getActiveSheet()->setTitle("Laporan");
  // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Type: application/vnd-ms-excel');
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control:max-age=0');

  $writer=PHPExcel_IOFactory::createwriter($object,'Excel2007');
  $writer->save('php://output');

  exit;
}

#EXCEL KELURAHAN SELECT TAHUN
public function export_excel_klasifikasi_kel_per_tahun($id){
 
  $fuzzy['fuzzy']= $this->m_report->laporan_data_klasifikasi_excel_kelurahan($id);

  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

  $object = new PHPExcel();
  $object->getProperties()->setCreator("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setLastModifiedBy("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setTitle("Laporan");

  $object->setActiveSheetIndex(0);

  $object->getActiveSheet()->setCellValue('A1','Data Hasil Klasifikasi Tingkat Kesejahteraan Wilayah Kabupaten Tegal');
  $object->getActiveSheet()->setCellValue('A2','PMKS Non-Panti');
  $object->getActiveSheet()->setCellValue('A3','Tahun');
  $object->getActiveSheet()->setCellValue('A4','Kode Kota');
  $object->getActiveSheet()->setCellValue('A5','Kota');
  $object->getActiveSheet()->setCellValue('A7','NO');
  $object->getActiveSheet()->setCellValue('B7','Kecamatan');
  $object->getActiveSheet()->setCellValue('C7','Kelurahan');
  $object->getActiveSheet()->setCellValue('D7','Total Kemiskinan');
  $object->getActiveSheet()->setCellValue('F7','Total Kecacatan');
  $object->getActiveSheet()->setCellValue('G7','Tingkat Kesejahteraan');

  $baris_date=3;
  $baris_kode=4;
  $baris_kota=5;
  $baris = 8;
  $no = 1;

  $date= $this->m_report->excel_klasifikasi_kelurahan($id);

  $object->getActiveSheet()->setCellValue('B'.$baris_date, $date);
  $object->getActiveSheet()->setCellValue('B'.$baris_kode, '28');
  $object->getActiveSheet()->setCellValue('B'.$baris_kota, 'Kabupaten Tegal');
  foreach ($fuzzy['fuzzy'] as $key) {
    $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
    $object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_kecamatan);
    $object->getActiveSheet()->setCellValue('C'.$baris, $key->nama_desa);
    $object->getActiveSheet()->setCellValue('D'.$baris, $key->kemiskinan);
    $object->getActiveSheet()->setCellValue('E'.$baris, $key->ketelantaran);
    $object->getActiveSheet()->setCellValue('F'.$baris, $key->kecacatan);
    $object->getActiveSheet()->setCellValue('G'.$baris, $key->keterangan);
    $baris++;
  }

  $filename="Laporan_PMKS_Kelurahan_non_Panti".$id.'.xlsx';
  $object->getActiveSheet()->setTitle("Laporan");
  // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Type: application/vnd-ms-excel');
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control:max-age=0');

  $writer=PHPExcel_IOFactory::createwriter($object,'Excel2007');
  $writer->save('php://output');

  exit;
}

/**END PDF DAN EXCEL UNDUH DATA, UNDUH DATA KLASIFIKASI SELECT TAHUN */

/**UNDUH DATA-> DATA PMKS-> LAPORAN DATA PMKS PERTAHUN */
#EXPOERT PDF SELECT TAHUN
function export_pdf_pmks_kec_pertahun($id){
  $this->load->library('dompdf_gen');
  $data['report']=$this->m_report->laporan_data_pmks_perkecamatan($id);

  $data['tahun']=$this->m_report->get_tahun_pmks_select($id);
  $data['sum_laki_laki']=$this->m_report->count_laki_laki($id);
  $data['sum_perempuan']=$this->m_report->count_perempuan($id);
  $data['sum_kecamatan']=$this->m_report->count_pmks_kecamatan_select($id);
  $data['sum_kelurahan']=$this->m_report->count_pmks_kelurahan_select($id);
  
  $this->load->view('admin/unduhdata/laporan_pmks_kec_select',$data);

  $paper_size = 'A4';
  $orientation = 'portrait';
  $html = $this->output->get_output();
  $this->dompdf->set_paper($paper_size, $orientation);

  $this->dompdf->load_html($html);
  $this->dompdf->render();
  $this->dompdf->stream("laporanTotalPMKS.pdf",array('Attachment'=>0));
}

#EXPORT EXCEL SELECT TAHUN
public function export_excel_pmks_per_tahun($id){
 
  $fuzzy['fuzzy']= $this->m_report->laporan_data_pmks_excel_pertahun($id);

  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

  $object = new PHPExcel();
  $object->getProperties()->setCreator("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setLastModifiedBy("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setTitle("Laporan");

  $object->setActiveSheetIndex(0);

  $object->getActiveSheet()->setCellValue('A1','Data PMKS Wilayah Kabupaten Tegal');
  $object->getActiveSheet()->setCellValue('A2','PMKS Non-Panti');
  $object->getActiveSheet()->setCellValue('A3','Tahun');
  $object->getActiveSheet()->setCellValue('A4','Kode Kota');
  $object->getActiveSheet()->setCellValue('A5','Kota');
  $object->getActiveSheet()->setCellValue('A7','NO');
  $object->getActiveSheet()->setCellValue('B7','Kecamatan');
  $object->getActiveSheet()->setCellValue('C7','Kelurahan');
  $object->getActiveSheet()->setCellValue('D7','KK');
  $object->getActiveSheet()->setCellValue('E7','NIK');
  $object->getActiveSheet()->setCellValue('F7','Nama Lengkap');
  $object->getActiveSheet()->setCellValue('G7','Jenis Kelamin');
  $object->getActiveSheet()->setCellValue('H7','Tempat Lahir');
  $object->getActiveSheet()->setCellValue('I7','Tanggal Lahir');
  $object->getActiveSheet()->setCellValue('J7','Alamat Asal');
  $object->getActiveSheet()->setCellValue('K7','Kota');
  $object->getActiveSheet()->setCellValue('L7','Jenis PMKS');

  $baris_date=3;
  $baris_kode=4;
  $baris_kota=5;
  $baris = 8;
  $no = 1;

  $date= $this->m_report->select_tahun_laporan_excel_pertahun($id);

  $object->getActiveSheet()->setCellValue('B'.$baris_date,$date);
  $object->getActiveSheet()->setCellValue('B'.$baris_kode, '28');
  $object->getActiveSheet()->setCellValue('B'.$baris_kota, 'Kabupaten Tegal');
  foreach ($fuzzy['fuzzy'] as $key) {
    $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
    $object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_kecamatan);
    $object->getActiveSheet()->setCellValue('C'.$baris, $key->nama_desa);
    $object->getActiveSheet()->setCellValue('D'.$baris, $key->kk);
    $object->getActiveSheet()->setCellValue('E'.$baris, $key->nik);
    $object->getActiveSheet()->setCellValue('F'.$baris, $key->nama);
    $object->getActiveSheet()->setCellValue('G'.$baris, $key->jenis_kelamin);
    $object->getActiveSheet()->setCellValue('H'.$baris, $key->tempat_lahir);
    $object->getActiveSheet()->setCellValue('I'.$baris, $key->tanggal_lahir);
    $object->getActiveSheet()->setCellValue('J'.$baris, $key->alamat_asal);
    $object->getActiveSheet()->setCellValue('K'.$baris, $key->kota);
    $object->getActiveSheet()->setCellValue('L'.$baris, $key->jenis_pmks);
    
    $baris++;
  }

  $filename="Laporan_PMKS_non_Panti_".$id.'.xlsx';
  $object->getActiveSheet()->setTitle("Laporan");
  // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Type: application/vnd-ms-excel');
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control:max-age=0');

  $writer=PHPExcel_IOFactory::createwriter($object,'Excel2007');
  $writer->save('php://output');

  exit;
}

#EXPORT EXCEL SELECT TAHUN DAN KECAMATAN
public function export_data_pmks_per_kecamatan($id, $p){
 
  $fuzzy['fuzzy']= $this->m_report->laporan_data_pmks_excel_perkecamatan($id,$p);

  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
  require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

  $object = new PHPExcel();
  $object->getProperties()->setCreator("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setLastModifiedBy("Dinas Sosial Kabupaten Tegal");
  $object->getProperties()->setTitle("Laporan");

  $object->setActiveSheetIndex(0);

  $object->getActiveSheet()->setCellValue('A1','Data PMKS Wilayah Kabupaten Tegal');
  $object->getActiveSheet()->setCellValue('A2','PMKS Non-Panti');
  $object->getActiveSheet()->setCellValue('A3','Tahun');
  $object->getActiveSheet()->setCellValue('A4','Kode Kota');
  $object->getActiveSheet()->setCellValue('A5','Kota');
  $object->getActiveSheet()->setCellValue('A7','NO');
  $object->getActiveSheet()->setCellValue('B7','Kecamatan');
  $object->getActiveSheet()->setCellValue('C7','Kelurahan');
  $object->getActiveSheet()->setCellValue('D7','KK');
  $object->getActiveSheet()->setCellValue('E7','NIK');
  $object->getActiveSheet()->setCellValue('F7','Nama Lengkap');
  $object->getActiveSheet()->setCellValue('G7','Jenis Kelamin');
  $object->getActiveSheet()->setCellValue('H7','Tempat Lahir');
  $object->getActiveSheet()->setCellValue('I7','Tanggal Lahir');
  $object->getActiveSheet()->setCellValue('J7','Alamat Asal');
  $object->getActiveSheet()->setCellValue('K7','Kota');
  $object->getActiveSheet()->setCellValue('L7','Jenis PMKS');

  $baris_date=3;
  $baris_kode=4;
  $baris_kota=5;
  $baris = 8;
  $no = 1;

  $date= $this->m_report->select_tahun_laporan_excel($id,$p);

  $object->getActiveSheet()->setCellValue('B'.$baris_date,$date);
  $object->getActiveSheet()->setCellValue('B'.$baris_kode, '28');
  $object->getActiveSheet()->setCellValue('B'.$baris_kota, 'Kabupaten Tegal');
  foreach ($fuzzy['fuzzy'] as $key) {
    $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
    $object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_kecamatan);
    $object->getActiveSheet()->setCellValue('C'.$baris, $key->nama_desa);
    $object->getActiveSheet()->setCellValue('D'.$baris, $key->kk);
    $object->getActiveSheet()->setCellValue('E'.$baris, $key->nik);
    $object->getActiveSheet()->setCellValue('F'.$baris, $key->nama);
    $object->getActiveSheet()->setCellValue('G'.$baris, $key->jenis_kelamin);
    $object->getActiveSheet()->setCellValue('H'.$baris, $key->tempat_lahir);
    $object->getActiveSheet()->setCellValue('I'.$baris, $key->tanggal_lahir);
    $object->getActiveSheet()->setCellValue('J'.$baris, $key->alamat_asal);
    $object->getActiveSheet()->setCellValue('K'.$baris, $key->kota);
    $object->getActiveSheet()->setCellValue('L'.$baris, $key->jenis_pmks);
    
    $baris++;
  }

  $filename="Laporan_PMKS_non_Panti_".$id.$p.'.xlsx';
  $object->getActiveSheet()->setTitle("Laporan");
  // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Type: application/vnd-ms-excel');
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control:max-age=0');

  $writer=PHPExcel_IOFactory::createwriter($object,'Excel2007');
  $writer->save('php://output');

  exit;
}

/**UNDUH DATA-> DATA PMKS-> LAPORAN DATA PMKS PERTAHUN */
}
    ?>