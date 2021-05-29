<?php

class Excel extends CI_Controller
{
    public function index(){
        $excel['excel'] = $this->excel_model->index();

        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getPorperties()->setCreator("DINAS SOSIAL KABUPATEN TEGAL");
        $object->getProperties()->setLastModifiedby("DINAS SOSIAL KABUPATEN TEGAL");
        $object->getPorperties()->setTitle("Laporan");

        $object->setActiveSeetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'Data Klasifikasi');

        $baris_date=3;
        $baris_kode=4;
        $baris = 8;
        $no = 1;

        $object->getActiveSheet()->setCellValue('B'.$baris_date, $date);
        
        foreach ($excel['excel'] as $key) {
            $object->getActiveSheet()->setCellValue('B'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('C',$baris, $key->nama_kecamatan);

            $baris++;

        }

        $file_name = "Laporan.xlsx";
        $object->getActiveSheet()->setTitle("Laporan");

        header('COntent-Type:application/vnd-ms-excel');
        header('Content-Disposition:attachment;filename="'.$file_name.'" ');
        header('Chache-Control:max-age=0');

        $writer=PHPExcel_IOFactory::createwriter($object,'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function view_excel(){
        $this->load->view('coba_export_excel');
    }
}
