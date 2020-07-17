
     <!-- page content -->
     <div class="right_col" role="main">
 <!-- Tabel -->
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
    <h1>fuzzy</h1>
	<form action="<?php echo base_url('c_rumusfuzzy/klasifikasi2') ?>" method="post" class="form-horizontal form-label-left">
    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kk">Jumlah Kemiskinan <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="kemiskinan" placeholder="Input Kemiskinan" class="optional form-control col-md-7 col-xs-12" />
        </div>
      </div>
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kk">Jumlah Ketelantaran <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="ketelantaran" placeholder="Input Ketelantaran" class="optional form-control col-md-7 col-xs-12" />
        </div>
      </div>
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kk">Jumlah Kecacatan <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="kecacatan" placeholder="Input Kecacatan" class="optional form-control col-md-7 col-xs-12" />
        </div>
      </div>
	
      <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button id="send" type="submit" class="btn btn-primary">CEK</button>
          </div>
        </div>
      </div>
</form>
	
</div>
</div>
</div>