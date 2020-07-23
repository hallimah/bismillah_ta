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
                        <th>Nama</th>
                          <!-- <th>NIK</th> -->
                          <th>Kecamatan</th>
                          <th>Kelurahan</th>
                          <th>Jumlah Tangungan</th>
                          <th>Keterangan Rumah</th>
                          <th>Jumlah Aset</th>
                          <th>Program Sosial</th>
                          <th>Bobot Tanggungan</th>
                          <th>Bobot Keterangan Rumah</th>
                          <th>Bobot Jumlah Aset</th>
                          <th>Bobot Program Sosial</th>
                          <th>Total Bobot</th>
                          <th>Klasifikasi</th>
                          
                        </tr>
                      </thead>
                     
                      <tbody>
                      <?php $no=1;
                      if (!empty($klasifikasi)) { 
                        foreach ($klasifikasi as $ct) : ?>
                          <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $ct->nama_krt ?></td>
                          <td><?php echo $ct->nama_kecamatan ?></td>
                          <td><?php echo $ct->nama_desa ?></td>
                          <td><?php echo $ct->jumlah_art ?></td>
                          <td><?php echo $ct->keterangan_rumah ?></td>
                          <td><?php echo $ct->jumlah_kepemilikan_aset ?></td>
                          <td><?php echo $ct->program_sosial ?></td>
                          <td><?php echo $ct->bobot_tanggungan ?></td>
                          <td><?php echo $ct->bobot_keterangan_rumah ?></td>
                          <td><?php echo $ct->bobot_jumlah_aset ?></td>
                          <td><?php echo $ct->bobot_program_sosial ?></td>
                          <td><?php echo $ct->total_bobot ?></td>
                          <td>
                          <?php echo $ct->klasifikasi
                            // foreach($tingkat as $data){
                            //   if(($data->min <= $ct->total_bobot) && ($ct->total_bobot <= $data->max)){
                            //     echo $data->nama;
                            //     break;
                            //   }
                            // }
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


