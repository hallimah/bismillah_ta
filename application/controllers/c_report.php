<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_report extends CI_Controller{

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

$data['report']=$this->m_report->select_untuk_laporan_klasifikasi_kelurahan($id);

$data['tingkat']= $this->mamdani->klasifikasi_wilayah();
$data['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();

$data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kecamatan($id);
$data['sum_kemiskinan']=$this->m_report->count_kemiskinan_select($id);
$data['sum_ketelantaran']=$this->m_report->count_ketelantaran_select($id);
$data['sum_kecacatan']=$this->m_report->count_kecacatan_select($id);
$data['sum_kecamatan']=$this->m_report->count_kecamatan_select($id);
$data['sum_kelurahan']=$this->m_report->count_kelurahan_select_kel($id);

$data['total_penduduk']= $this->m_report->total_penduduk($id);

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
  // $this->load->library('dompdf_gen');
  $data['report']=$this->m_report->laporan_klasifikasi_kecamatan($id);

  $data['tingkat']= $this->mamdani->klasifikasi_wilayah();
	$data['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();
  
  $data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kecamatan($id);
  $data['sum_kemiskinan']=$this->m_report->count_kemiskinan_select($id);
   $data['sum_kecamatan']=$this->m_report->count_kecamatan_select($id);

  $data['total_penduduk']= $this->m_report->total_penduduk_kecamatan_tahun($id);

  // $this->load->view('admin/lihatdata/laporan_pdf_kec',$data);

  // $paper_size = 'A4';
  // $orientation = 'portrait';
  // $html = $this->output->get_output();
  // $this->dompdf->set_paper($paper_size, $orientation);

  // $this->dompdf->load_html($html);
  // $this->dompdf->render();
  // $this->dompdf->stream("LaporanKlasifikasiPMKSperKecamatan.pdf",array('Attachment'=>0));

   // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
   $this->load->library('pdfgenerator');
   
   // filename dari pdf ketika didownload
   $file_pdf = 'laporan';
   // setting paper
   $paper = 'A4';
   //orientasi paper potrait / landscape
   $orientation = "portrait";
   
   $html = $this->load->view('admin/lihatdata/laporan_pdf_kec',$data, true);	    
   
   // run dompdf
   $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

}

#EXCEL
public function excel(){
  $fuzzy['fuzzy']= $this->mamdani->fuzzy();

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
      $object->getActiveSheet()->setCellValue('D'.$baris, $key->rendah);
      $object->getActiveSheet()->setCellValue('E'.$baris, $key->sedang);
      $object->getActiveSheet()->setCellValue('F'.$baris, $key->tinggi);
      $object->getActiveSheet()->setCellValue('G'.$baris, $key->klasifikasi);

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
 // $fuzzy['fuzzy']= $this->mamdani->excel_kecamatan('tb_klasifikasi_penduduk');

// $fuzzy['fuzzy']= $this->mamdani->fuzzy('tb_klasifikasi_penduduk');
$fuzzy['fuzzy']= $this->mamdani->viewKecamatan();
$fuzzy['tingkat']= $this->mamdani->klasifikasi_wilayah();
$fuzzy['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();

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
  $object->getActiveSheet()->setCellValue('C7','Total rendah');
  $object->getActiveSheet()->setCellValue('D7','Total sedang');
  $object->getActiveSheet()->setCellValue('E7','Total berat');
 // $object->getActiveSheet()->setCellValue('F7','Tingkat Kesejahteraan');

  $baris_date=3;
  $baris_kode=4;
  $baris_kota=5;
  $baris = 7;
  $no = 1;

  date_default_timezone_set('Asia/Jakarta');
  $date= date('Y');

  // $object->getActiveSheet()->setCellValue('B'.$baris_date, $date);
  // $object->getActiveSheet()->setCellValue('B'.$baris_kode, '28');
  // $object->getActiveSheet()->setCellValue('B'.$baris_kota, 'Kabupaten Tegal');
  foreach ($fuzzy['fuzzy'] as $key) {
      $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
      $object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_kecamatan);
      $object->getActiveSheet()->setCellValue('C'.$baris, $key->rendah);
      $object->getActiveSheet()->setCellValue('D'.$baris, $key->sedang);
      $object->getActiveSheet()->setCellValue('E'.$baris, $key->tinggi);
    //  $object->getActiveSheet()->setCellValue('F'.$baris, $key->keterangan);

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
function export_pdf_select_kecamatan($id,$kecamatan){
  $this->load->library('pdfgenerator');

  $data['report']=$this->m_report->select_untuk_laporan_klasifikasi_kecamatan($id, $kecamatan);

  $data['tingkat']= $this->mamdani->klasifikasi_wilayah();
	$data['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();
  
  $data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kecamatan($id, $kecamatan);
  $data['sum_penduduk']=$this->m_report->select_laporan_klasifikasi_pertahun_perkecamatan($id, $kecamatan);
  $data['sum_kemiskinan']=$this->m_report->count_kemiskinan_select($id, $kecamatan);
  $data['sum_ketelantaran']=$this->m_report->count_ketelantaran_select($id, $kecamatan);
  $data['sum_kecacatan']=$this->m_report->count_kecacatan_select($id, $kecamatan);
  $data['sum_kecamatan']=$this->m_report->count_kecamatan_select($id, $kecamatan);


  // $this->load->view('admin/unduhdata/laporan_pdf_kec_select',$data);
  $this->load->library('pdfgenerator');
   
  // filename dari pdf ketika didownload
  $file_pdf = 'laporan';
  // setting paper
  $paper = 'A4';
  //orientasi paper potrait / landscape
  $orientation = "portrait";
  
  $html = $this->load->view('admin/lihatdata/laporan_pdf_kec_select',$data, true);	    
  
  // run dompdf
  $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

}

#PDF KELURAHAN SELECT TAHUN
function export_pdf_select_kelurahan($id, $kec, $kel){

  // $where = array('tahun_klasifikasi' => $id );
  // $data['report'] = $this->db->query("SELECT * FROM mamdani WHERE 
  // tahun_klasifikasi ='$id'")->result();

  $data['report']=$this->m_report->select_untuk_laporan_klasifikasi_kelurahan($id, $kec,$kel);

  $data['tingkat']= $this->mamdani->klasifikasi_wilayah();
	$data['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();
  
  // $data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kelurahan($id);
  // $data['sum_kemiskinan']=$this->m_report->count_kemiskinan_select_kel($id);
  // $data['sum_ketelantaran']=$this->m_report->count_ketelantaran_select_kel($id);
  // $data['sum_kecacatan']=$this->m_report->count_kecacatan_select_kel($id);
  // $data['sum_kecamatan']=$this->m_report->count_kecamatan_select_kel($id);
  // $data['sum_kelurahan']=$this->m_report->count_kelurahan_select_kel($id);

  $data['total_penduduk']=$this->m_report->get_total_penduduk_multi_where($id,$kec,$kel);
  $data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kecamatan($id);
  $data['sum_kemiskinan']=$this->m_report->count_kemiskinan_select($id);
  $data['sum_ketelantaran']=$this->m_report->count_ketelantaran_select($id);
  $data['sum_kecacatan']=$this->m_report->count_kecacatan_select($id);
  $data['sum_kecamatan']=$this->m_report->count_kecamatan_select($id);

  $data['sum_kelurahan']=$this->m_report->count_kelurahan_select_kel($id);

  // $this->load->view('admin/unduhdata/laporan_pdf_kel_select',$data);

  $this->load->library('pdfgenerator');
   
  // filename dari pdf ketika didownload
  $file_pdf = 'laporan';
  // setting paper
  $paper = 'A4';
  //orientasi paper potrait / landscape
  $orientation = "portrait";
  
  $html = $this->load->view('admin/unduhdata/laporan_pdf_kel_select',$data, true);	    
  
  // run dompdf
  $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

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
  $data['sum_penduduk']=$this->m_report->total_penduduk_kecamatan_tahun($id);
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
  $object->getActiveSheet()->setCellValue('C7','Desa');
  $object->getActiveSheet()->setCellValue('D7','KK');
  $object->getActiveSheet()->setCellValue('E7','NIK');
  $object->getActiveSheet()->setCellValue('F7','Nama Lengkap');
  $object->getActiveSheet()->setCellValue('G7','Jenis Kelamin');
  $object->getActiveSheet()->setCellValue('H7','Jumlah Tangungan');
  $object->getActiveSheet()->setCellValue('I7','Status tempat tinggal');
  $object->getActiveSheet()->setCellValue('J7','stauts lahan');
  $object->getActiveSheet()->setCellValue('K7','luas lantai');
  $object->getActiveSheet()->setCellValue('L7','jenis lantai');
  $object->getActiveSheet()->setCellValue('M7','jenis dinding');
  $object->getActiveSheet()->setCellValue('N7','kondisi dinding');
  $object->getActiveSheet()->setCellValue('O7','jenis atap');
  $object->getActiveSheet()->setCellValue('P7','kondisi atap');
  $object->getActiveSheet()->setCellValue('Q7','sumber air minum');
  $object->getActiveSheet()->setCellValue('R7','cara memperoleh air minum');
  $object->getActiveSheet()->setCellValue('S7','sumber penerangan utama');
  $object->getActiveSheet()->setCellValue('T7','daya');
  $object->getActiveSheet()->setCellValue('U7','bahan bakar memasak');
  $object->getActiveSheet()->setCellValue('V7','penggunaan fasilitas bab');
  $object->getActiveSheet()->setCellValue('W7','jenis kloset');
  $object->getActiveSheet()->setCellValue('X7','tempat pembuangan akhir tinja');
  $object->getActiveSheet()->setCellValue('Y7','total aset');
  $object->getActiveSheet()->setCellValue('Z7','pekerjaan');
  $object->getActiveSheet()->setCellValue('AA7','pendapatan');
  $object->getActiveSheet()->setCellValue('AB7','jaminan sosial');
  $object->getActiveSheet()->setCellValue('AC7','tahun masuk');


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
    // $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
    // $object->getActiveSheet()->setCellValue('B'.$baris, $key->nama_kecamatan);
    // $object->getActiveSheet()->setCellValue('C'.$baris, $key->nama_desa);
    // $object->getActiveSheet()->setCellValue('D'.$baris, $key->kk);
    // $object->getActiveSheet()->setCellValue('E'.$baris, $key->nik);
    // $object->getActiveSheet()->setCellValue('F'.$baris, $key->nama_art);
    // $object->getActiveSheet()->setCellValue('G'.$baris, $key->jenis_kelamin);
    // $object->getActiveSheet()->setCellValue('H'.$baris, $key->jumlah_art);
    // $object->getActiveSheet()->setCellValue('I'.$baris, $key->status_tempat_tinggal);
    // $object->getActiveSheet()->setCellValue('J'.$baris, $key->status_lahan_tempat_tinggal);
    // $object->getActiveSheet()->setCellValue('K'.$baris, $key->luas_lantai);
    // $object->getActiveSheet()->setCellValue('L'.$baris, $key->jenis_lantai_terluas);
    // $object->getActiveSheet()->setCellValue('M'.$baris, $key->jenis_dinding_terluas);
    // $object->getActiveSheet()->setCellValue('N'.$baris, $key->kondisi_dinding);
    // $object->getActiveSheet()->setCellValue('O'.$baris, $key->jenis_atap_terluas);
    // $object->getActiveSheet()->setCellValue('P'.$baris, $key->kondisi_atap);
    // $object->getActiveSheet()->setCellValue('Q'.$baris, $key->sumber_air_minum);
    // $object->getActiveSheet()->setCellValue('R'.$baris, $key->cara_memperoleh_air_minum);
    // $object->getActiveSheet()->setCellValue('S'.$baris, $key->sumber_penerangan_utama);
    // $object->getActiveSheet()->setCellValue('T'.$baris, $key->daya_terpasang);
    // $object->getActiveSheet()->setCellValue('U'.$baris, $key->bahan_bakar_memasak);
    // $object->getActiveSheet()->setCellValue('V'.$baris, $key->penggunaan_fasilitas_bab);
    // $object->getActiveSheet()->setCellValue('W'.$baris, $key->jenis_kloset);
    // $object->getActiveSheet()->setCellValue('X'.$baris, $key->tempat_pembuangan_akhir_tinja);
    // $object->getActiveSheet()->setCellValue('Y'.$baris, $key->total_aset);
    // $object->getActiveSheet()->setCellValue('Z'.$baris, $key->pekerjaan);
    // $object->getActiveSheet()->setCellValue('AA'.$baris, $key->omset);
    // $object->getActiveSheet()->setCellValue('AB'.$baris, $key->total_jamianan_sosial);
    // $object->getActiveSheet()->setCellValue('AC'.$baris, $key->tahun_input);


    
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

function unduh_laporan_klasifikasi_penduduk($id){
  $this->load->library('pdfgenerator');
$data['report']=$this->m_report->select_untuk_laporan_klasifikasi_penduduk($id);
$data['total_penduduk']= $this->m_report->total_penduduk($id);
$data['sum_kecamatan']=$this->m_report->count_kecamatan_select($id);
$data['sum_kelurahan']=$this->m_report->count_kelurahan_select_kel($id);
$data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kecamatan($id);

// $this->load->view('admin/lihatdata/laporan_klasifikasi_penduduk',$data);

// $paper_size = 'A4';
// $orientation = 'portrait';
// $html = $this->output->get_output();
// $this->dompdf->set_paper($paper_size, $orientation);

// $this->dompdf->load_html($html);
// $this->dompdf->render();
// $this->dompdf->stream("LaporanKlasifikasiPenduduk.pdf",array('Attachment'=>0));

// filename dari pdf ketika didownload
$file_pdf = 'laporan';
// setting paper
$paper = 'A4';
//orientasi paper potrait / landscape
$orientation = "portrait";

$html = $this->load->view('admin/lihatdata/laporan_klasifikasi_penduduk',$data, true);	    

// run dompdf
$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
}


//__________ CETAK LAPORAN DETAIL PENDUDUK____________________________________//
public function laporan_detail_penduduk($id){
  $this->load->library('dompdf_gen');

  $this->load->model('m_tabel');
  $data['detail'] = $this->m_tabel->detail_tabel($id);
  $data['rumah'] = $this->m_tabel->get_sub_variabel();
  $data['aset'] = $this->m_tabel->get_sub_variabel_aset();
  $data['program'] = $this->m_tabel->get_sub_variabel_program();

  $this->load->view('admin/lihatdata/laporan_detail_penduduk',$data);

  $paper_size = 'A4';
  $orientation = 'portrait';
  $html = $this->output->get_output();
  $this->dompdf->set_paper($paper_size, $orientation);

  $this->dompdf->load_html($html);
  $this->dompdf->render();
  $this->dompdf->stream("LaporanDetailPenduduk.pdf",array('Attachment'=>0));

  
}


function export_data_pmks_per_kecamatan_pdf($nama_kecamatan, $tahun){
  $this->load->library('pdfgenerator');
$data['report']=$this->m_report->select_laporan_pertahun_perkecamatan($nama_kecamatan, $tahun);
$data['total_penduduk']= $this->m_report->total_penduduk_pertahun_perkecamatan($nama_kecamatan, $tahun);
$data['sum_kecamatan']=$this->m_report->count_kecamatan_select_pertahun_perkecamatan($nama_kecamatan, $tahun);
$data['sum_kelurahan']=$this->m_report->count_kelurahan_select_kel_pertahun_perkecamatan($nama_kecamatan, $tahun);
$data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kecamatan_pertahun_perkecamatan($tahun);

// $this->load->view('admin/lihatdata/laporan_klasifikasi_penduduk_pertahun_perkecamatan',$data);

$file_pdf = 'laporan';
// setting paper
$paper = 'A4';
//orientasi paper potrait / landscape
$orientation = "portrait";

$html = $this->load->view('admin/lihatdata/laporan_klasifikasi_penduduk_pertahun_perkecamatan',$data, true);	    

// run dompdf
$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
}

}
    ?>