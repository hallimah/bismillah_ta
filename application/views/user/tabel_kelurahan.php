 <!-- page content -->
 <div class="right_col" role="main">
 <!-- Tabel -->

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tingkat Kesejahteraan <small>PMKS</small></h2>
                    <div class="btn-group pull-right" >
                    <a class="btn btn-success" href="<?php echo base_url('c_report/excel/') ?>" title="Unduh Excel">
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
                      foreach ($fuzzy as $f) : ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $f->nama_kecamatan ?></td>
                          <td><?php echo $f->nama_desa ?></td> 
                           <td><?php echo $f->kemiskinan ?></td>
                           <td><?php echo $f->ketelantaran ?></td>
                          <td><?php echo $f->kecacatan ?></td>
                          <td><?php echo $f->keterangan ?></td>
                           
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<!-- /Tabel-->
 </div>
 <!-- /page content -->


