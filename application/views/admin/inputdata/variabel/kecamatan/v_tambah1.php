<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Variabel</h3>
      </div>
    </div>
    <div class="clearfix"></div>
      <div class="x_panel">
        <form action="<?php echo base_url();?>c_variabel/insert_var_kecamatan1" method="post">
        <div class="x_title">
          <h2>Tambah <small>Variabel</small></h2>
          <div class="form-group pull-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Variabel</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="nama_variabel" value="" placeholder="Nama Variabel" class="form-control">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Variabel</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="jenis_io">
                    <option value="Input">Input</option>
                    <option value="Output">Output</option>
                  </select> 
                </div>
              </div>

            </div>
            <!--END grup1 -->

            <!--grup2-->
            <div class="col-md-6 col-xs-12 form-horizontal">
              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nilai Linguistik</label>
                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <input type="text" name="a" placeholder="A" class="form-control"><br>
                    <input type="text" name="b" placeholder="B" class="form-control">
                  </div>
                  
                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <input type="text" name="c" placeholder="C" class="form-control"><br>
                    <input type="text" name="d" placeholder="D" class="form-control">
                  </div>

                </div>
                
              </div>
              
            </div>
            <!--END grup2 -->

          </div>
        </div>
        <!--END ROW 1-->
        </form>
      </div>
  </div>
</div>