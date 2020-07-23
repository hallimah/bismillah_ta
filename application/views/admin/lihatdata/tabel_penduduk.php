 <!-- page content -->
 <div class="right_col" role="main">
 <!-- Tabel -->
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jumlah <small>PMKS</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                    
                      <thead>
                        <tr>
                        <th>No</th>
                        <th>KK</th>
                          <th>NIK</th>
                          <th>Nama Lengkap</th>
                          <th>Kecamatan</th>
                          <th>Kelurahan</th>
                          
                          <th style="width: 15%">Action</th>
                          
                        </tr>
                      </thead>
                     
                      <tbody>
                      <?php $no=1;
                      if (!empty($c_tabel)) { 
                        foreach ($c_tabel as $ct) : ?>
                          <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $ct->kk ?></td>
                          <td><?php echo $ct->nik ?></td>
                          <td><?php echo $ct->nama_krt ?></td>
                          <td><?php echo $ct->nama_kecamatan ?></td>
                          <td><?php echo $ct->nama_desa ?></td>
                          
                          <td>
                          <a class="btn btn-success btn-xs" title="Lihat Data" href="<?php echo base_url('c_tabel/detail/'.$ct->id) ?>"><i class="fa fa-search-plus"></i></a>
                          <a class="btn btn-info btn-xs" title="Edit Data" href="<?php echo base_url('c_tabel/edit_pmks/'.$ct->id) ?>"><i class="fa fa-pencil"></i></a>
                          <a onclick="return confirm('anda yakin?')" title="Hapus Data" class="btn btn-danger btn-xs" href="<?php echo base_url('c_tabel/hapus/'.$ct->id) ?>"><i class="fa fa-trash-o"></i></a>
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
