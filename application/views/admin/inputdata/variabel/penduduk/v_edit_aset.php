<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Kriteria Penduduk</h3>
      </div>
    </div>
    <div class="clearfix"></div>
      <div class="x_panel">
        <form action="<?php echo base_url();?>c_variabel/update_variabel_penduduk_aset" method="post">
        <div class="x_title">
          <h2>Edit <small>Kriteria Penduduk</small></h2>
          <div class="form-group pull-right">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a class="btn btn-danger" href="<?php echo base_url('c_variabel/bobot_Penduduk/') ?>">Batal</a>
              </div>
          <div class="clearfix"></div>
        </div>
        <!--ROW 1-->
       
        <div class="x_content">
          <div class="row">
            <?php foreach ($c_variabel as $key) { ?>
            <!--grup1-->
            <div class="col-md-6 col-xs-12 form-horizontal" id="view_varaibel">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kriteria</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="hidden" name="variabel_id" value="<?php echo $key->variabel_id ?>" placeholder="" class="form-control">
                  <input type="text" name="nama_variabel" value="<?php echo $key->nama_variabel ?>" placeholder="Nama Variabel" class="form-control">
                </div>
              </div>
              <br>
              <br>
              <br>
              
              <div class="form-group">
                <label class="control-label col-md-6 col-sm-3 col-xs-12">Nama Sub Kriteria</label>
                <!-- <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="jenis_io">
                    <option value="<php echo $key->jenis_io ?>"><php echo $key->jenis_io ?></option>
                    <option value="Input">Input</option>
                    <option value="Output">Output</option>
                  </select>  -->
                </div>
              </div> 

            </div>
            <!--END grup1 -->
            <?php } ?>
            
            <!--grup 2 tabel-->
            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
              <table class="table table-bordered" id="variabel"> <!--id="sub_view_varaibel"-->
                <thead>
                  <tr>
                    <td>Nama</td>
                    <td>Skor</td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sub_variabel as $key) { ?>
                  <tr>
                    <td>
                      <input type="hidden" class="form-control 0" value="<?php echo $key->sub_variabel_id ?>" name="sub_variabel_id[]" required>
                      <input type="hidden" class="form-control 0" value="<?php echo $key->sub_id ?>" name="sub_id[]" required>
                      <input type="text"  class="form-control 0" value="<?php echo $key->nama ?>" name="nama[]" required></td>
                    <td><input type="text" pattern="[0-9]+"  class="form-control 0" value="<?php echo $key->skor ?>" name="skor[]" required></td>
                  </tr>
                  <?php }?>
                </tbody>                
              </table>
              
              <a id="tambah_var" class="btn btn-primary" onclick="tambah_var();">+</a>
              <a id="kurang_var" class="btn btn-primary" onclick="kurang_var();">-</a>
            </div>
            <!--END grup 2 tabel-->
            

          </div>
        </div>
        <!--END ROW 1-->
        </form>
      </div>
  </div>
</div>