<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Update Data <small>PMKS</small></h3>
    </div>
  </div>
<div class="x_panel">
  <div class="x_content">
  <?php foreach($penduduk as $edit) : ?>
    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url().'c_tabel/update_pmks'; ?>">
      <span class="section">Form Data</span>
      
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kk">KK <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="kk" placeholder="Kartu Keluarga" class="optional form-control col-md-7 col-xs-12" value="<?php echo $edit->kk ?>"/>
        </div>
        <?php echo form_error('kk','<div class="text-small text-danger">','</div>') ?>
      </div>
      
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="nik" placeholder="Nomor Induk Keluarga" class="form-control col-md-7 col-xs-12" value="<?php echo $edit->nik ?>"/>
        </div>
        <?php echo form_error('nik','<div class="text-small text-danger">','</div>') ?>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="hidden" name="penduduk_id" value="<?php echo $edit->penduduk_id ?>">
          <input id="nama" class="form-control col-md-7 col-xs-12" name="nama" placeholder="Nama Lengkap" type="text" value="<?php echo $edit->nama ?>"/>
        </div>
          <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_kelamin">Jenis Kelamin <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="jenis_kelamin" >
            <option value="<?php echo $edit->jenis_kelamin ?>"><?php echo $edit->jenis_kelamin?></option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <?php echo form_error('jenis_kelamin','<div class="text-small text-danger">','</div>') ?>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Tempat Lahir <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control col-md-7 col-xs-12" value="<?php echo $edit->tempat_lahir ?>"/>
        </div>
        <?php echo form_error('tempat_lahir','<div class="text-small text-danger">','</div>') ?>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <fieldset>
            <div class="control-group">
              <div class="controls">
                <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                  <input type="date" class="form-control has-feedback-left" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $edit->tanggal_lahir ?>"/>
                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <?php echo form_error('tanggal_lahir','<div class="text-small text-danger">','</div>') ?>
      </div>
    
      <div class="item form-group">
        <label for="alamat_asal" class="control-label col-md-3">Alamat Asal</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="alamat_asal" type="text" name="alamat_asal" placeholder="Alamat Asal" class="form-control col-md-7 col-xs-12" value="<?php echo $edit->alamat_asal ?>"/>
        </div>
        <?php echo form_error('alamat_asal','<div class="text-small text-danger">','</div>') ?>
      </div>
  
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Kode Kota <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="kota" class="form-control col-md-7 col-xs-12" value="28" name="kota" placeholder="Kota" type="text" value="<?php echo $edit->kota ?>" readonly/>
        </div>
        <?php echo form_error('kota','<div class="text-small text-danger">','</div>') ?>
      </div>
  
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kecamatan">Kecamatan <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="kecamatan" id="category" >
            <option value="<?php echo $edit->kecamatan ?>"><?php echo $edit->kecamatan ?></option>
            <?php foreach ($kategori as $row): ?>
            <option value="<?php echo $row->kecamatan_id; ?>"><?php echo $row->nama_kecamatan; ?></option>
            <?php  endforeach ;?>
          </select>
        </div>
        <?php echo form_error('kecamatan','<div class="text-small text-danger">','</div>') ?>
      </div>

      <div class="item form-group">
        <label for="kelurahan" class="control-label col-md-3 col-sm-3 col-xs-12">Kelurahan</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" id="sub_category" name="kelurahan" >
            <option value="<?php echo $edit->kelurahan ?>"><?php echo $edit->kelurahan ?></option>
          </select>
        </div>
        <?php echo form_error('kelurahan','<div class="text-small text-danger">','</div>') ?>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_pmks">Jenis PMKS <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="jenis_pmks" >
            <option value="<?php echo $edit->jenis_pmks ?>"><?php echo $edit->jenis_pmks ?></option>
            <?php foreach ($pmks as $ro): ?>
            <option value="<?php echo $ro->pmks_id; ?>"><?php echo $ro->jenis_pmks; ?></option>
            <?php  endforeach ;?>
          </select>
        </div>
        <?php echo form_error('jenis_pmks','<div class="text-small text-danger">','</div>') ?>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Tahun Masuk <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
         <input id="tahun_masuk" class="form-control col-md-7 col-xs-12" value="<?php echo $edit->tahun_masuk ?>" name="tahun_masuk" placeholder="Tahun Masuk" type="text" readonly="readonly"/> <!--disabled="disabled"-->
        </div>
        <?php echo form_error('tahun_masuk','<div class="text-small text-danger">','</div>') ?>
      </div>

      <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
          <?php echo $this->session->flashdata('pesan') ?>
            <a class="btn btn-danger" href="<?php echo base_url('c_tabel/tabel/') ?>">Batal</a>
            <button id="send" type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </form>
<?php endforeach; ?>
  </div>
</div>
</div>