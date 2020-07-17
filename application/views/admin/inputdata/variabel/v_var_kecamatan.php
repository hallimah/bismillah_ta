<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Variabel</h3>
      </div>
    </div>
    <!-- <div class="clearfix"></div> -->
    <form class="form-horizontal form-label-left input_mask" action="<?php echo base_url('c_variabel/UpdateVaribaelKecamatan') ?>" method="post">
    <div class="form-group title_right">
      <div class="form-group pull-right"> <br><br>
        <button type="button" class="btn btn-danger">Batal</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
    <?php foreach ($c_variabel as $cvt) { ?>

    <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo $cvt['nama_variabel']?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
       
          <!-- <div class="col-md-4 col-sm-12 col-xs-12 form-group">
          
            <input type="text" name="a[]" value="<php echo $cvt['a'] ?>" placeholder="A" class="form-control">
            <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
          </div>
          
          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
             <input type="text" placeholder="<=" class="form-control" readonly>
            <img src="<php echo base_url() ?>assets/build/images/kurang_samadengan.png" alt="">
          </div><br><br><br> -->

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
          <input type="hidden" name="variabel_id[]" value="<?php echo $cvt['variabel_id']?>">
            <input type="text"  name="a[]" value="<?php echo $cvt['a'] ?>" placeholder="A" class="form-control" >
            <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
          </div>
          
          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <!-- <input type="text" placeholder="<=" class="form-control" readonly> -->
            <img src="<?php echo base_url() ?>assets/build/images/kurang_samadengan.png" alt="">
          </div>
          
          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <input type="text" name="b[]" value="<?php echo $cvt['b'] ?>" placeholder="B" class="form-control">
            <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
          </div><br><br><br>
          
          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <input type="text" name="b[]" value="<?php echo $cvt['b'] ?>" placeholder="B" class="form-control" readonly>
            <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
          </div>
          
          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <img src="<?php echo base_url() ?>assets/build/images/kurang_samadengan.png" alt=""> 
          </div>
          
          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <input type="text" name="c[]" value="<?php echo $cvt['c'] ?>" placeholder="C" class="form-control">
            <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
          </div><br><br><br>
          
          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <input type="text" name="c[]" value="<?php echo $cvt['c'] ?>" placeholder="C" class="form-control" readonly>
            <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
          </div>
          
          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <img src="<?php echo base_url() ?>assets/build/images/kurang_samadengan.png" alt="">
          </div>
          
          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <input type="text" name="d[]" value="<?php echo $cvt['d'] ?>" placeholder="D" class="form-control">
            <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
          </div><br><br><br>
          
          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <input type="text" name="d[]" value="<?php echo $cvt['d'] ?>" placeholder="D" class="form-control" readonly>
            <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
          </div>
          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <!-- <input type="text" placeholder="<=" class="form-control" readonly> -->
            <img src="<?php echo base_url() ?>assets/build/images/besar_samadengan.png" alt="">
          </div>
        
        </div>
      </div>
    </div>
    </div>
            <?php }?>

<!--CATATAN KAKI -->
            <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Keterangan</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
        <span class="" aria-hidden="true">*</span>
          
        
        </div>
      </div>
    </div>
    </div>
    <!--END CATATAN KAKI -->
    </form>

  </div>
  </div>
</div>