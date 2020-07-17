 <!-- page content -->
 <div class="right_col" role="main">
 <!-- Tabel -->
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>1 <small>PMKS</small></h2>
                    <div class="pull-right">
                    <div class="btn-group" aria-controls="example">
                    <button data-toggle="dropdown" aria-controls="datatable" class="btn btn-default dropdown-toggle" id="sel_kec" type="button"> Lihat <span class="caret"></span> </button>
                          <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url().'c_rumusfuzzy/tabel'; ?>"> Kelurahan</a></li>
                            <li><a href="<?php echo base_url().'c_rumusfuzzy/tabel2'; ?>"> Kecamatan</a></li>
                          </ul>
                        </div>
                    <a class="btn btn-primary" href="<?php echo base_url('c_tabel/tabel2/') ?>">
                    <i class="glyphicon glyphicon-download-alt"></i></a>
                    <a class="btn btn-primary" href="<?php echo base_url('c_rumusfuzzy/view/') ?>">
                    <i class="glyphicon glyphicon-plus"></i></a>
                    <a class="btn btn-primary" href="<?php echo base_url('c_rumusfuzzy/nilai_fuzzy_inferensi/') ?>">
                    <i class="glyphicon glyphicon-refresh"></i></a>
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                    
                      <thead>
                        <tr>
                        <th>No</th>
                          <!-- <th>Nama Kecamatan </th>
                          <th>Nama Kelurahan</th> -->
                           <th>Kemiskinan</th>
                           <th>Ketelantaran</th>
                          <th>Kecacatan</th>
                          <th>Hasil Kemiskinan</th>
                           <th>Hasil Ketelantaran</th>
                          <th>Hasil Kecacatan</th>
                          <th>Nilai Kemiskinan Sedikit</th>
                           <th>Nilai Kemiskinan Sedang</th>
                          <th>Nilai Kemiskinan Banyak</th>
                           <th>Nilai Ketelantaran Sedikit</th>
                           <th>Nilai Ketelantaran Sedang</th>
                          <th>Nilai Ketelantaran Banyak</th>
                          <th>Nilai Kecacatan Sedikit</th>
                           <th>Nilai Kecacatan Sedang</th>
                          <th>Nilai Kecacatan Banyak</th> 
                          <th>Rule Nilai Fuzzy</th>
                          <th>Nilai Fuzzy</th>
                          <th>Hasil Klasifikasi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php $no=1;
                    
                      foreach ($fuzzy as $f) : ?>
                        <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $f->kemiskinan ?></td>
                                <td><?php echo $f->ketelantaran ?></td>
                                <td><?php echo $f->kecacatan ?></td>
                                <td><?php echo $f->rule_kemiskinan ?></td>
                                <td><?php echo $f->rule_ketelantaran ?></td>
                                <td><?php echo $f->rule_kecacatan ?></td>
                                <td><?php echo $f->m_sedikit ?></td>
                                <td><?php echo $f->m_sedang ?></td>
                                <td><?php echo $f->m_banyak ?></td>
                                <td> <?php echo $f->t_sedikit ?></td>
                                <td> <?php echo $f->t_sedang ?></td>
                                <td> <?php echo $f->t_banyak ?></td>
                                <td> <?php echo $f->c_sedikit ?></td>
                                <td> <?php echo $f->c_sedang ?></td>
                                <td> <?php echo $f->c_banyak ?></td> 
                                <td><?php echo $f->rule_nilai ?></td>
                                <td><?php echo $f->nilai_fuzzy ?></td>
                                <td><?php echo $f->keterangan ?></td>
                                <td>
                                <a href="<?php echo base_url('c_rumusfuzzy/proses'.'/'.$f->mamdani_id);?>">Rule</a>
                                <a href="<?php echo base_url('c_rumusfuzzy/rumus_nilai'.'/'.$f->mamdani_id);?>">Nilai</a>
                               
                                </td>
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
