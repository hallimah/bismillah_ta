<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Kriteria</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_panel">
        
        <form action="<?php echo base_url();?>c_variabel/varDesa" method="post">
        <div class="x_title">
          <h2>Edit <small>Nilai Kriteria</small></h2>
          <div class="form-group pull-right">
                  <button type="submit" id="send" class="btn btn-primary">Update</button>
                  <!-- <a class="btn btn-danger" href="<php echo base_url('c_variabel/VariabelDesa') ?>">Batal</a> -->
              </div>
          <div class="clearfix"></div>
        </div>
        <!--ROW 1-->
        <?php foreach ($c_variabel as $key) { ?>
        <div class="x_content">
          <div class="row">
            <div class="form-group col-md-6 col-xs-12">
              <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $key['nama_variabel']?></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="hidden" name="variabel_id[]" value="<?php echo $key['variabel_id'] ?>" placeholder="" class="form-control">
                <input type="text" pattern="[0-9]+" name="min[]" value="<?php echo $key['min'] ?>" placeholder="nilai" class="form-control">
                <!-- <input type="hidden" name="nama_variabel[]" value="<php echo $key['nama_variabel'] ?>" placeholder="Nama Kriteria" class="form-control"> -->
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <!--END ROW 1-->
        </form>
        <?php echo $this->session->flashdata('pesan') ?>
      </div>
  </div>
</div>