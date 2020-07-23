<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Variabel</h3>
      </div>
    </div>
    <div class="clearfix"></div>
      <div class="x_panel">
        <!-- <form action="<php echo base_url();?>c_variabel/update_bobot_penduduk" method="post"> -->
       
        <!--ROW 1-->
       
        <div class="x_content">
          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Bobot Kriteria</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Kesejahteraan</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <form action="<?php echo base_url();?>c_variabel/update_bobot_penduduk" method="post">
                  <div class="row">
                    <?php foreach ($c_variabel as $key) { ?>
                    <!--grup1-->
                    <div class="col-md-6 col-xs-12 form-horizontal" id="view_varaibel">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $key['nama']?></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="hidden" name="id[]" value="<?php echo $key['id'] ?>" placeholder="" class="form-control">
                        <input type="text" name="bobot[]" value="<?php echo $key['bobot'] ?>" placeholder="Bobot" class="form-control">
                          <!-- <input type="hidden" name="nama[]" value="<?php echo $key['nama'] ?>" placeholder="Nama Kriteria" class="form-control"> -->
                        </div>
                      </div>
                      
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bobot</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="bobot[]" value="<php echo $key['bobot'] ?>" placeholder="Bobot" class="form-control">
                        </div>
                      </div> -->

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

              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
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
                          <th><?php echo $no++ ?> <input type="hidden" value="<?php echo $k['id'] ?>" name="id[]" class="form-control"></th>
                          <td><input type="text" value="<?php echo $k['nama'] ?>" name="nama[]" class="form-control"></td>
                          <td><input type="text" value="<?php echo $k['min'] ?>" name="min[]" class="form-control col-md-3"></td>
                          <td align="center">-</td>
                          <td><input type="text" value="<?php echo $k['max'] ?>" name="max[]" class="form-control col-md-3"></td>
                        </tr>
                      <?php } ?>
                      <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                        </form>
                      </tbody>
                    </table>
                    
                      <?php echo $this->session->flashdata('pesan') ?>
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