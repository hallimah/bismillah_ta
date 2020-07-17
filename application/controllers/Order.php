<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Order extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        
        $this->load->helper('tgl_indo');
    }
 
    public function index()
    {
        $data['orders'] = $this->order_model->get_all();
        $this->load->view('list_order', $data);
    }
     
    public function create()
    {
        $this->load->view('add_order');
    }
    public function store()
    {
        $product = $this->input->post('product');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $total = $this->input->post('total');
        $data = [
            'product' => $product,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'total' => $total
        ];
        $simpan = $this->order_model->insert("orders", $data);
        if($simpan){
            echo '<script>alert("Berhasil menambah data order");window.location.href="'.base_url('index.php/order').'";</script>';
        }
    }
 
    public function form_export()
    {
        $this->load->view('form_export');
    }
 
    public function export() {
        $tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
        $orders = $this->order_model->get_all_with_date($tgl_awal, $tgl_akhir);
        $tanggal = date('d-m-Y');
 
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan Order - ".$tanggal, 0, 1, 'L');
        $pdf->Cell(115, 0, "Tanggal Awal: ".date('d-m-Y', strtotime($this->input->post('tanggal_awal'))), 0, 1, 'L');
        $pdf->Cell(115, 0, "Tanggal Akhir: ".date('d-m-Y', strtotime($this->input->post('tanggal_akhir'))), 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);
         
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(55, 8, "Produk", 1, 0, 'C');
        $pdf->Cell(35, 8, "Tanggal", 1, 0, 'C');
        $pdf->Cell(35, 8, "Jumlah", 1, 0, 'C');
        $pdf->Cell(50, 8, "Total", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
 
        foreach($orders->result_array() as $k => $order) {
            $this->addRow($pdf, $k+1, $order);
        }
 
        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan Order - '.$tanggal.'.pdf'); 
    }
 
    private function addRow($pdf, $no, $order) {
 
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(55, 8, $order['product'], 1, 0, '');
        $pdf->Cell(35, 8, date('d-m-Y', strtotime($order['tanggal'])), 1, 0, 'C');
        $pdf->Cell(35, 8, $order['jumlah'], 1, 0, 'C');
        $pdf->Cell(50, 8, "Rp. ".number_format($order['total'], 2, ',' , '.'), 1, 1, 'L');
    }
 
    public function macam_date(){
        echo shortdate_indo('2017-09-5');
        echo "<br/>";
        echo date_indo('2017-09-5');
        echo "<br/>";
        echo mediumdate_indo('2017-09-5');
        echo "<br/>";
        echo longdate_indo('2017-09-5');
    }
}