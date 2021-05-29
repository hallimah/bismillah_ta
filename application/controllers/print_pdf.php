<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Print_pdf extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
    }

    public function lp_detail_penduduk($id){

        $this->load->model('m_tabel');
        $data['detail'] = $this->m_tabel->detail_tabel($id);
        $data['rumah'] = $this->m_tabel->get_sub_variabel();
        $data['aset'] = $this->m_tabel->get_sub_variabel_aset();
        $data['program'] = $this->m_tabel->get_sub_variabel_program();


   // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
   $this->load->library('pdfgenerator');
   
   // filename dari pdf ketika didownload
   $file_pdf = 'laporan';
   // setting paper
   $paper = 'A4';
   //orientasi paper potrait / landscape
   $orientation = "portrait";
   
   $html = $this->load->view('admin/lihatdata/laporan_detail_penduduk',$data, true);	    
   
   // run dompdf
   $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

     //   $this->load->view('admin/lihatdata/laporan_detail_penduduk',$data);


      

    }

    public function laporan_klasifikasi_desa($id){
      $data['report']=$this->m_report->laporan_klasifikasi_desa($id);

      $data['tingkat']= $this->mamdani->klasifikasi_wilayah();
      $data['kali_kec']=$this->mamdani->get_total_penduduk_kecamatan();
      
      $data['tahun']=$this->m_report->get_tahun_klasifikasi_select_kecamatan($id);
      $data['sum_kemiskinan']=$this->m_report->count_kemiskinan_select($id);
      $data['sum_ketelantaran']=$this->m_report->count_ketelantaran_select($id);
      $data['sum_kecacatan']=$this->m_report->count_kecacatan_select($id);
      $data['sum_kecamatan']=$this->m_report->count_kecamatan_select($id);
      $data['sum_kelurahan']=$this->m_report->count_kelurahan_select_kel($id);
      
      $data['total_penduduk']= $this->m_report->total_penduduk($id);
      
        // $this->load->view('admin/lihatdata/laporan_pdf',$data);

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
   $this->load->library('pdfgenerator');
   
   // filename dari pdf ketika didownload
   $file_pdf = 'laporan';
   // setting paper
   $paper = 'A4';
   //orientasi paper potrait / landscape
   $orientation = "portrait";
   
   $html = $this->load->view('admin/lihatdata/laporan_pdf',$data, true);	    
   
   // run dompdf
   $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

    }
}
