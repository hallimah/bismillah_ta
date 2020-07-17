<div class="right_col" role="main">
<div class="x_content">
<?php foreach ($profil as $pro) :  ?>
<form class="form-horizontal form-label-left" action="<?php echo base_url().'admin/update';?>" 
    method="post" novalidate>

<span class="section">Admin - Profil</span>

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
  </label>
  <input type="hidden" name="user_id" value="<?php echo $pro->user_id ?>">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="username" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="user_nama" value="<?php echo $pro->user_nama; ?>" placeholder="Username" required="required" type="text">
  </div>
</div>

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="email" id="email" name="user_email" value="<?php echo $pro->user_email; ?>" required="required" placeholder="E-Mail" class="form-control col-md-7 col-xs-12">
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="password" type="password" name="user_password" value="<?php echo $pro->user_password; ?>" placeholder="Password" class="optional form-control col-md-7 col-xs-12">
  </div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
  <div class="col-md-6 col-md-offset-3">
    <button type="submit" class="btn btn-danger">Batal</button>
    <button id="send" type="submit" class="btn btn-primary">Ubah</button>
  </div>
</div>
</form>
<?php endforeach; ?>

</div>

</div>