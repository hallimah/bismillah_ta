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
        <div class="x_panel">
          <div class="x_title">
          <h2>Fungsi <small>Trapesium</small></h2>
           <div class="pull-right"><?php echo $this->session->flashdata('pesan') ?></div>
          <div class="clearfix"></div>
          </div>
          <div class="x_content"><br>
         
          
            <form class="form-horizontal form-label-left input_mask" action="<?php echo base_url('c_variabel/UpdateVariabelDesa') ?>" method="post"> 
            <?php foreach ($c_variabel as $cvt) { ?>
          <div class="col-md-4 col-xs-12">
                <h5><?php echo $cvt['nama_variabel']?></h5>
                <div class="col-md-6 col-sm-6 col xs-12 form-group has-feedback">
                  <input type="hidden" name="variabel_id[]" value="<?php echo $cvt['variabel_id']?>">
                  <input type="text" class="form-control has-feedback-left" name="a[]" id="" value="<?php echo $cvt['a'] ?>" placeholder="A" required="required" />
                  <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
                </div>
                <div class="col-md-6 col-sm-6 col xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="b[]" id="" value="<?php echo $cvt['b'] ?>" placeholder="B" required="required" />
                  <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
                </div>
                <div class="col-md-6 col-sm-6 col xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="c[]" id="" value="<?php echo $cvt['c'] ?>" placeholder="C" required="required" />
                  <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
                </div>
                <div class="col-md-6 col-sm-6 col xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="d[]" id="" value="<?php echo $cvt['d'] ?>" placeholder="D" required="required" />
                  <span class="form-control-feedback right" aria-hidden="true">Jiwa</span>
                </div>
              </div>

              <?php } ?>

              <div class="in_solid">
              <div class="form-group title_right">
                <div class="form-group pull-right"> <br><br>
                  <button type="button" class="btn btn-danger">Batal</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>

         </form> 

          </div>
        </div>
      </div>
    </div>
  </div>
</div>