 <!-- page content -->
 <div class="right_col" role="main">
 <!-- Tabel -->

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tingkat Kesejahteraan <small>Penduduk</small></h2>
                    <div class="btn-group pull-right" >
                    <div class="btn-group" aria-controls="example">
                    <button data-toggle="dropdown" aria-controls="datatable" class="btn btn-default dropdown-toggle" id="sel_kec" type="button"> Lihat <span class="caret"></span> </button>
                          <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url().'fuzzy/viewKecamatan'; ?>"> Kecamatan</a></li>
                            <li><a href="<?php echo base_url().'fuzzy/view_klasifikasi'; ?>"> Kelurahan</a></li>
                            <li><a href="<?php echo base_url().'fuzzy/viewPenduduk'; ?>"> Penduduk </a></li>
                          </ul>
                        </div>
                        <div class="btn-group" aria-controls="example">
                    <button data-toggle="dropdown" aria-controls="datatable" class="btn btn-warning dropdown-toggle" id="sel_kec" type="button"> <i class="fa fa-file-pdf-o"></i> <span class="caret"></span> </button>
                          <ul class="dropdown-menu">
                          <?php foreach ($tahun as $row): ?>
          <li><a href="<?php echo base_url('c_report/laporan_klasifikasi_kelurahan/'.$row->tahun_klasifikasi) ?>"> <?php echo $row->tahun_klasifikasi; ?></a></li>
          <?php endforeach;?>
                          </ul>
                        </div>
                    <a class="btn btn-success" href="<?php echo base_url('c_report/excel/') ?>" title="Unduh Excel">
                    <i class="fa fa-file-excel-o" ></i></a>
                     <!-- <a class="btn btn-warning" href="<php echo base_url('c_report/laporan/') ?>" title="Export PDF">
                    <i class="fa fa-file-pdf-o"></i></a> -->
                    </div>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <!--id="datatable" -->
                    <table id="example" class="table table-striped table-bordered">
                    
                      <thead>
                        <tr>
                        <th>No</th>
                          <th>Nama Kecamatan </th>
                          <th>Nama Kelurahan</th>
                           <th>Kemiskinan</th>
                         <th>Ketelantaran</th>
                          <th>Kecacatan</th>
                          <th>Tingkat Kesejahteraan</th>
                          <!-- <th>Hasil Fuzzy</th>  -->
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1;
                    //->result()
                    //   foreach ($fuzzy as $f) : ?>
                        <tr>
                          <!-- <td>php echo $no++ ?></td>
                          <td>php echo $f->nama_kecamatan ?></td>
                          <td>php echo $f->nama_desa ?></td> 
                           <td>php echo $f->kemiskinan ?></td>
                           <td>php echo $f->ketelantaran ?></td>
                          <td>php echo $f->kecacatan ?></td>
                          <td>php echo $f->keterangan ?></td> -->
                           
                        </tr>
                        <!-- <php endforeach; ?> -->
                      </tbody>
                  
                    </table>
                  </div>
                </div>
              </div>
<!-- /Tabel-->
 </div>
 <!-- /page content -->


