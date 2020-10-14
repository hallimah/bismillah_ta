 <!-- page content -->
 <div class="right_col" role="main">
 <!-- Tabel -->

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tingkat Kesejahteraan <small>PMKS</small></h2>
                    <div class="btn-group pull-right" >
                    <a class="btn btn-success" href="<?php echo base_url('c_report/excel_kecamatan/') ?>" title="Unduh Excel">
                    <i class="glyphicon glyphicon-download-alt" > </i> Unduh</a>
                    </div>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <!--id="datatable" -->
                    <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>No</th>
                          <th>Kecamatan</th>
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
                          <td><?php echo $ct->rendah ?></td>
                          <td><?php echo $ct->sedang ?></td>
                          <td><?php echo $ct->tinggi ?></td>
                          <td>
                          <?php 
                          //(($data->min <= $ct->rendah) && ($ct->total_bobot <= $data->max))
                            // foreach($tingkat as $data){
                            //   if(($ct->rendah && $ct->sedang && $ct->tinggi) <= $data->persen ){
                            //     echo $data->nama_variabel;
                            //     break;
                            //   }
                            // }

                            foreach ($kali_kec as $kec) {
                              if ($ct->nama_kecamatan==$kec->nama_kecamatan) {
                                // if( <= )
                                foreach ($tingkat as $data) {
                                  if (($ct->rendah + $ct->sedang + $ct->tinggi) <= ($data->persen*$kec->total_penduduk)) {
                                    echo $data->nama_variabel;
                                    // echo $data->persen*$kec->total_penduduk;
                                  break;
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


