<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Variabel</h3>
      </div>
    </div>
    <div class="clearfix"></div>
      <div class="x_panel">
      <?php foreach ($c_variabel as $key) { ?>
        <form action="<?php echo base_url();?>c_variabel/update_var_kecamatan1" method="post">
        <div class="x_title">
          <h2>Tambah <small>Variabel</small></h2>
          <div class="form-group pull-right">
                  <button type="submit" id="send" class="btn btn-primary">Update</button>
                  <a class="btn btn-danger" href="<?php echo base_url('c_variabel/VariabelKecamatan') ?>">Batal</a>
              </div>
          <div class="clearfix"></div>
        </div>
        <!--ROW 1-->
       
        <div class="x_content">
          <div class="row">
            

            <!--grup1-->
            <div class="col-md-6 col-xs-12 form-horizontal">
              <div class="form-group">
              <input type="hidden" name="variabel_id" value="<?php echo $key->variabel_id ?>">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Variabel</label>
                <div class="col-md-6 col-sm-9 col-xs-12">
                  <input type="text" name="nama_variabel" value="<?php echo $key->nama_variabel ?>" placeholder="Nama Variabel" class="form-control">
                </div>
              </div>
              
              <!-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Variabel</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="jenis_io">
                    <option value="<php echo $key->jenis_io ?>"><php echo $key->jenis_io ?></option>
                    <option value="Input">Input</option>
                    <option value="Output">Output</option>
                  </select> 
                </div>
              </div> -->

            </div>
            <!--END grup1 -->

            <!--grup2-->
            <div class="col-md-6 col-xs-12 form-horizontal">
              <div class="form-group">
                <div class="">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nilai Rendah</label>
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <input type="text" value="<?php echo $key->a ?>" name="a" placeholder="A" class="form-control">
                  </div>
                  
                  <!-- <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <input type="text" value="<php echo $key->b ?>" name="b" placeholder="B" class="form-control">
                  </div> -->
                </div>
              </div>

              <div class="form-group">
                <div class="">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nilai Sedang</label>
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <input type="text" value="<?php echo $key->b ?>" name="b" placeholder="C" class="form-control">
                  </div>
                  
                  <!-- <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <input type="text" value="<php echo $key->d ?>" name="d" placeholder="D" class="form-control">
                  </div> -->
                </div>
              </div>

              <div class="form-group">
                <div class="">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nilai Banyak</label>
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <input type="text" value="<?php echo $key->c ?>" name="c" placeholder="E" class="form-control">
                  </div>
                  
                  <!-- <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <input type="text" value="<php echo $key->b ?>" name="b" placeholder="F" class="form-control">
                  </div> -->
                </div>
              </div>
              
            </div>
            <!--END grup2 -->

            <div class="pull-right">
              <div class="form-group ">
                <label class="control-label">*</label> <span for="">Berdasarkan Pengelompokan Rumah Tangga dalam Basis Data Terpadu</span>
              </div>
              
              <div class="form-group">
                <label class="control-label">*</label> <span for="">Nilai A <= Total <?php echo $key->nama_variabel ?>,</span><br> 
                <label class="control-label">*</label> <span for=""><span>Nilai A <= Total <?php echo $key->nama_variabel ?> <= Total <?php echo $key->nama_variabel ?> Nilai B,</span> <br>
                <label class="control-label">*</label> <span for=""><span> Nilai B <= Total <?php echo $key->nama_variabel ?> <= Total <?php echo $key->nama_variabel ?> Nilai D, dan </span>  <br>
                <label class="control-label">*</label> <span for=""><span> Nilai D >= Total <?php echo $key->nama_variabel ?> </span> 
              </div>
            </div>
            

          </div>
        </div>
        
        <!--END ROW 1-->
        </form>
        <?php } ?>
      </div>
  </div>
</div>