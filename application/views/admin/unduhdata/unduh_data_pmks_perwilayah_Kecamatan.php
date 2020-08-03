 <!-- page content -->
 <div class="right_col" role="main">
 <!-- Tabel -->
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Jumlah <small>PMKS</small></h2>
      <div class="pull-right btn-group">
      <div class="btn-group" aria-controls="example">
                    <button data-toggle="dropdown" aria-controls="datatable" class="btn btn-warning dropdown-toggle" id="sel_kec" type="button">
                     <i class="fa fa-file-pdf-o"></i> Pilih<span class="caret"></span> </button>
                          <ul class="dropdown-menu">
                          <?php foreach ($tahun as $row): ?>
          <li><a href="<?php echo base_url('c_report/export_pdf_pmks_kec_pertahun/'.$row->tahun_input) ?>"> <?php echo $row->tahun_input; ?></a></li>
          <?php endforeach;?>
                          </ul>
                        </div>
                        <div class="btn-group" aria-controls="example">
                        <button data-toggle="dropdown" aria-controls="datatable" class="btn btn-success dropdown-toggle" id="sel_kel" type="button">
                     <i class="fa fa-file-excel-o"></i> Pilih<span class="caret"></span> </button>
                          <ul class="dropdown-menu">
                          <?php foreach ($tahun as $row): ?>
          <li><a href="<?php echo base_url('c_report/export_excel_pmks_per_tahun/'.$row->tahun_input) ?>"> <?php echo $row->tahun_input; ?></a></li>
          <?php endforeach;?>
                          </ul>
                        </div>
    </div>
	
                    <div class="clearfix"></div>
                  </div>

                 <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                    
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tahun Masuk</th>
                          <th>Nama Kecamatan</th>
                          <th>Total Perempuan</th>
                          <th>Total Laki-Laki</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                     
                      <tbody>
                      <?php 
                       $no = 1;
                       foreach ($data_pmks as $row) :
                      ?>
                      <tr>
                       <td><?php  echo $no++ ?> </td>
                       <td><?php echo $row['tahun_input'] ?></td>
                       <td><?php echo $row['nama_kecamatan'] ?></td>
                       <td><?php echo $row['perempuan'] ?></td>
                       <td><?php echo $row['lakilaki'] ?></td>
                       <td>
                          <a class="btn btn-success btn-xs" title="Lihat Data" href="<?php echo base_url('c_report/export_data_pmks_per_kecamatan/'.$row['nama_kecamatan'].'/'.$row['tahun_input']) ?>"><i class="fa fa-file-excel-o"></i></a>
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
