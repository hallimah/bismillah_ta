 <!-- page content -->
 <div class="right_col" role="main">
 <!-- Tabel -->
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Jumlah <small>PMKS</small></h2>
      <div class="pull-right">
      <div class="btn-group">
        <a class="btn btn-primary" href="<?php echo base_url().'c_report/dataklasifikasiKecamatan'; ?>">Kecamatan</a>
        <a class="btn btn-primary active" href="<?php echo base_url().'c_report/dataklasifikasiKelurahan'; ?>">Desa</a>
      
      </div>
    </div>
	
                    <div class="clearfix"></div>
                  </div>

                 <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                    
                      <thead>
                        <tr>
                        <th>No</th>
                        <th>Tahun Klasifikasi</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                          <th>Total Penduduk Kesejahteraan Rendah</th>
                          <th>Total Penduduk Kesejahteraan Sedang</th>
                          <th>Total Penduduk Kesejahteraan Tinggi</th>
                          <th>Cetak</th>
                          
                        </tr>
                      </thead>
                     
                      <tbody>
                      <?php 
                       $no = 1;
                       foreach ($klasifikasi as $row) :
                      ?>
                      <tr>
                      <td><?php  echo $no++ ?> </td>
                      <td><?php echo $row->tahun_klasifikasi ?></td>
                      <td><?php echo $row->nama_kecamatan ?></td>
                      <td><?php echo $row->nama_desa ?></td>
                       <td><?php echo $row->rendah ?></td>
                       <td><?php echo $row->sedang ?></td>
                       <td><?php echo $row->tinggi ?></td>
                       <td>
                          <a class="btn btn-danger btn-xs" title="Lihat Data" href="<?php echo base_url('c_report/export_pdf_select_kelurahan/'.$row->tahun_klasifikasi.'/'.$row->nama_kecamatan.'/'.$row->nama_desa) ?>"><i class="fa fa-file-pdf-o"></i></a>
                          <a class="btn btn-success btn-xs" title="Lihat Data" href="<?php echo base_url('c_report/export_excel_klasifikasi_kel_per_tahun/'.$row->tahun_klasifikasi) ?>"><i class="fa fa-file-excel-o"></i></a>
                        </td>
                      </tr>
                       <?php endforeach;  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<!-- /Tabel-->
 </div>
 <!-- /page content -->
