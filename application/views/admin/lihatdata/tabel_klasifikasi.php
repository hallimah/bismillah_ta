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
                            <li><a href="<?php echo base_url().'fuzzy/view'; ?>"> Desa</a></li>
                            <li><a href="<?php echo base_url().'fuzzy/viewPenduduk'; ?>"> Penduduk </a></li>
                          </ul>
                        </div>
                        <div class="btn-group" aria-controls="example">
                    <button data-toggle="dropdown" aria-controls="datatable" class="btn btn-warning dropdown-toggle" id="sel_kec" type="button"> <i class="fa fa-file-pdf-o"></i> <span class="caret"></span> </button>
                          <ul class="dropdown-menu">
                          <?php foreach ($tahun as $row): ?>
          <li><a href="<?php echo base_url('print_pdf/laporan_klasifikasi_desa/'.$row->tahun_klasifikasi) ?>"> <?php echo $row->tahun_klasifikasi; ?></a></li>
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
                          <th>Kecamatan</th>
                          <th>Desa</th>
                          <th>Total Penduduk Hampir Miskin</th>
                          <th>Total Penduduk Miskin</th>
                          <th>Total Penduduk Sangat Miskin</th>
                          <th>Klasifikasi</th>
                          
                        </tr>
                      </thead>
                     
                      <tbody>
                      <?php $no=1;
                      if (!empty($fuzzy)) { 
                        foreach ($fuzzy as $ct) : ?>
                          <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $ct->nama_kecamatan ?></td>
                          <td><?php echo $ct->nama_desa ?></td>
                          <td><?php echo $ct->rendah ?></td>
                          <td><?php echo $ct->sedang ?></td>
                          <td><?php echo $ct->tinggi ?></td>
                          <td>
                          <?php 

                            foreach ($kali_kec as $kec) {
                              if ($ct->nama_kecamatan==$kec->nama_kecamatan) {
                                // if( <= )
                                foreach ($kali_desa as $desa) {
                                  if ($ct->nama_desa==$desa->nama_desa) {
                                    foreach ($tingkat as $data) {
                                      if (($ct->rendah + $ct->sedang + $ct->tinggi) <= ($data->persen*$desa->total_penduduk)) {
                                        echo $data->nama_variabel;
                                        // echo $data->persen*$kec->total_penduduk;
                                      break;
                                      }
                                    }
                                  }
                                }
                              }
                            }
                           ?>
                           </td>
                          </tr>
                          <?php endforeach;  }?>
                     
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<!-- /Tabel-->
 </div>
 <!-- /page content -->


