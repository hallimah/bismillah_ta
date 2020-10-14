<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Kriteria Penduduk</h3>
      </div>
    </div>
    <div class="clearfix"></div>
      <div class="x_panel">
        <!-- <form action="<php echo base_url();?>c_variabel/update_bobot_penduduk" method="post"> -->
       
        <!--ROW 1-->
       
        <div class="x_content">
          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Nilai Kriteria</a>
              </li>
              <!-- <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Nilai Kriteria Aset</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Nilai Kriteria Program Sosial</a>
              </li> -->
              <li role="presentation" class=""><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Bobot Kriteria</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Klasifikasi</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">

              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <table class="table table-hover" id="datatable">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Kriteria</th>
                          <!-- <th>Skor</th> -->
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i=1;
                      foreach ($kriteria as $k) { ?>
                        <tr>
                          <th><?php echo $i++ ?></th>
                          <td><input type='hidden' name='check[]' value='{$k->variabel_id}'>
                          <?php echo $k->nama_variabel ?></td>
                          <!-- <td><php echo $k->skor ?></td> -->
                          <td>
                            <a class="btn btn-info btn-xs" title="Edit Data" href="<?php echo base_url('c_variabel/edit_variabel/'.$k->variabel_id) ?>"><i class="fa fa-pencil"></i></a>
                            <!-- <a onclick="return confirm('anda yakin?')" title="Hapus Data" class="btn btn-danger btn-xs" 
                            href="<php echo base_url('c_variabel/hapus/'.$k->variabel_id) ?>"><i class="fa fa-trash-o"></i></a> -->
                          </td>
                        </tr>
                      <?php } ?>

                      <?php $i=17;
                      foreach ($aset as $k) { ?>
                        <tr>
                          <th><?php echo $i++ ?></th>
                          <td><input type='hidden' name='check[]' value='{$k->variabel_id}'>
                          <?php echo $k->nama_variabel ?></td>
                          <!-- <td><php echo $k->skor ?></td> -->
                          <td>
                            <a class="btn btn-info btn-xs" title="Edit Data" href="<?php echo base_url('c_variabel/edit_variabel_aset/'.$k->variabel_id) ?>"><i class="fa fa-pencil"></i></a>
                            <!-- <a onclick="return confirm('anda yakin?')" title="Hapus Data" class="btn btn-danger btn-xs" 
                            href="<php echo base_url('c_variabel/hapus/'.$k->variabel_id) ?>"><i class="fa fa-trash-o"></i></a> -->
                          </td>
                        </tr>
                      <?php } ?>

                      <?php $i=33;
                      foreach ($program as $k) { ?>
                        <tr>
                          <th><?php echo $i++ ?></th>
                          <td><input type='hidden' name='check[]' value='{$k->variabel_id}'>
                          <?php echo $k->nama_variabel ?></td>
                          <!-- <td><php echo $k->skor ?></td> -->
                          <td>
                            <a class="btn btn-info btn-xs" title="Edit Data" href="<?php echo base_url('c_variabel/edit_variabel_program/'.$k->variabel_id) ?>"><i class="fa fa-pencil"></i></a>
                            <!-- <a onclick="return confirm('anda yakin?')" title="Hapus Data" class="btn btn-danger btn-xs" 
                            href="<php echo base_url('c_variabel/hapus/'.$k->variabel_id) ?>"><i class="fa fa-trash-o"></i></a> -->
                          </td>
                        </tr>
                      <?php } ?>
                        
                      </tbody>
                    </table>
              </div>

              <!-- <div role="tabpanel" class="tab-pane fade active in" id="tab_content4" aria-labelledby="home-tab">
                <table class="table table-hover" id="datatable">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Kriteria</th>
                          <-- <th>Skor</th> -->
                          <!-- <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody> -->
                      <!-- <php $i=1;
                      foreach ($aset as $k) { ?>
                        <tr>
                          <th><php echo $i++ ?></th>
                          <td><input type='hidden' name='check[]' value='{$k->variabel_id}'>
                          <php echo $k->nama_variabel ?></td> -->
                          <!-- <td><php echo $k->skor ?></td> -->
                          <!-- <td>
                            <a class="btn btn-info btn-xs" title="Edit Data" href="<php echo base_url('c_variabel/edit_variabel_aset/'.$k->variabel_id) ?>"><i class="fa fa-pencil"></i></a> -->
                            <!-- <a onclick="return confirm('anda yakin?')" title="Hapus Data" class="btn btn-danger btn-xs" 
                            href="<php echo base_url('c_variabel/hapus/'.$k->variabel_id) ?>"><i class="fa fa-trash-o"></i></a> -->
                    <!--      </td>
                        </tr>
                      <php } ?>
                        
                      </tbody>
                    </table>
              </div> -->

              <!-- <div role="tabpanel" class="tab-pane fade active in" id="tab_content5" aria-labelledby="home-tab">
                <table class="table table-hover" id="datatable">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Kriteria</th>
                          <-- <th>Skor</th> -->
                          <!-- <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <php $i=1;
                      foreach ($program as $k) { ?>
                        <tr>
                          <th><php echo $i++ ?></th>
                          <td><input type='hidden' name='check[]' value='{$k->variabel_id}'>
                          <php echo $k->nama_variabel ?></td> -->
                          <!-- <td><php echo $k->skor ?></td> -->
                          <!-- <td>
                            <a class="btn btn-info btn-xs" title="Edit Data" href="<php echo base_url('c_variabel/edit_variabel_program/'.$k->variabel_id) ?>"><i class="fa fa-pencil"></i></a> -->
                            <!-- <a onclick="return confirm('anda yakin?')" title="Hapus Data" class="btn btn-danger btn-xs" 
                            href="<php echo base_url('c_variabel/hapus/'.$k->variabel_id) ?>"><i class="fa fa-trash-o"></i></a> -->
                      <!--    </td>
                        </tr>
                      <php } ?>
                        
                      </tbody>
                    </table>
              </div> -->

              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
              <form action="<?php echo base_url();?>c_variabel/update_bobot_penduduk" method="post">
                  <div class="row">
                    <?php foreach ($c_variabel as $key) { ?>
                    <!--grup1-->
                    <div class="col-md-6 col-xs-12 form-horizontal" id="view_varaibel">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $key['nama']?></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="hidden" name="id[]" value="<?php echo $key['id'] ?>" placeholder="" class="form-control">
                        <input type="text" pattern="[0-9]+" name="bobot[]" value="<?php echo $key['bobot'] ?>" placeholder="Bobot" class="form-control">
                          <!-- <input type="hidden" name="nama[]" value="<php echo $key['nama'] ?>" placeholder="Nama Kriteria" class="form-control"> -->
                        </div>
                      </div>

                    </div>
                    <!--END grup1 -->
                    <?php } ?>
                   
                      <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                  </div>
                </form>
                <?php echo $this->session->flashdata('pesan') ?>
              </div>

              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th class="lebar">Tingkat Kesejahteraan</th>
                          <th class="lebar" colspan="3">Nilai</th>
                        </tr>
                        
                      </thead>
                      <tbody>
                        <form action="<?php echo base_url();?>c_variabel/varPenduduk" method="post" >
                        <?php $no=1; foreach ($kesejahteraan as $k) { ?>
                        <tr>
                          <th><?php echo $no++ ?> <input type="hidden" value="<?php echo $k['id'] ?>" name="id[]" class="form-control" /></th>
                          <td><input type="text" value="<?php echo $k['nama'] ?>" name="nama[]" class="form-control" readonly /></td>
                          <td><input type="text" value="<?php echo $k['min'] ?>" name="min[]" class="form-control col-md-3" /></td>
                          <td align="center">-</td>
                          <td><input type="text" value="<?php echo $k['max'] ?>" name="max[]" class="form-control col-md-3" /></td>
                        </tr>
                      <?php } ?>
                      <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                        </form>
                      </tbody>
                    </table>
                    <span>*</span><label for="">Berdasarkan Data Terpadu Kesejahteraan Sosial</label>
                    <div class="pull-right">
                    <?php echo $this->session->flashdata('pesan') ?>
                    </div>
                      
              </div>

            </div>
          </div>
        </div>
        <!--END ROW 1-->
        <!-- </form>
        -->
      </div>
  </div>
</div>