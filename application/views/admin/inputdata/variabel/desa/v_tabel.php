<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Variabel</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="">
      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel<small>Variabel</small></h2>

                    <!-- <div class="form-group pull-right">
                     <a class="btn btn-primary" href="<php echo base_url('c_variabel/tambah_var_desa/') ?>">Tambah</a>
                    </div> -->

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover" id="datatable">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Variabel</th>
                          <!-- <th>Jenis</th> -->
                          <th>Nilai Linguistik</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i=1;
                      foreach ($c_variabel as $k) { ?>
                        <tr>
                          <th><?php echo $i++ ?></th>
                          <td><?php echo $k->nama_variabel ?></td>
                          <!-- <td><php echo $k->jenis_io ?></td> -->
                          <td><?php echo $k->a ?>,<?php echo $k->b ?>,<?php echo $k->c ?></td>
                          <td>
                            <a class="btn btn-info btn-xs" title="Edit Data" href="<?php echo base_url('c_variabel/edit_variabel_desa/'.$k->variabel_id) ?>"><i class="fa fa-pencil"></i></a>
                            <!-- <a onclick="return confirm('anda yakin?')" title="Hapus Data" class="btn btn-danger btn-xs" 
                            href="<php echo base_url('c_variabel/delete/'.$k->variabel_id) ?>"><i class="fa fa-trash-o"></i></a> -->
                          </td>
                        </tr>
                      <?php } ?>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</div>