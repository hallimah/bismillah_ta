<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Input Data <small>PMKS</small></h3>
    </div>
  </div>
  <div class="x_panel">
    <div class="x_content">
      <form action="<?php echo base_url();?>c_tabel/tambah_data" method="post" class="form-horizontal form-label-left">
      <div id="wizard" class="form_wizard wizard_horizontal">
        <ul class="wizard_steps">
          <li>
            <a href="#step-1">
            <span class="step_no">1</span>
            <span class="step_descr">Tahap 1<br />
              <small>PENGENALAN TEMPAT</small>
            </span>
            </a>
          </li>
          <li>
            <a href="#step-2">
              <span class="step_no">2</span>
              <span class="step_descr">Tahap 2<br />
                <small>KETERANGAN PERUMAHAN</small>
              </span>
            </a>
          </li>
          <li>
            <a href="#step-3">
              <span class="step_no">3</span>
              <span class="step_descr">Tahap 3<br />
                <small>KEPEMILIKAN ASET DAN KEIKUTSERTAAN PROGRAM</small>
              </span>
            </a>
          </li>
        </ul>

        <!--step 1-->
        <div id="step-1">
          <span class="section">1. PENGANALAN TEMPAT</span>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Kecamatan <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="kecamatan" id="category" >
                <option value=" ">-- PILIH --</option>
                <?php foreach ($c_tabel as $row): ?>
                <option value="<?php echo $row->kecamatan_id; ?>"><?php echo $row->nama_kecamatan; ?></option>
                <?php  endforeach ;?>
              </select>
            </div>
            <?php echo form_error('kecamatan','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Desa/Kelurahan/Nagari <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="sub_category" name="kelurahan" >
                <option value="">-- PILIH --</option>
              </select>
            </div>
            <?php echo form_error('kelurahan','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="alamat" class="form-control col-md-7 col-xs-12" name="alamat" placeholder="Alamat" type="text" />
            </div>
            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Nama KRT <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="krt" placeholder="Nama Kepala Rumah Tangga" class="form-control col-md-7 col-xs-12" />
            </div>
            <?php echo form_error('krt','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Jenis Kelamin <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="jenis_kelamin" class="form-control"><option value="L">Laki-Laki</option><option value="P">Perempuan</option></select>
            </div>
            <?php echo form_error('jenis_kelamin','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Jumlah ART <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="art" class="form-control col-md-7 col-xs-12" name="jml_art" placeholder="Jumlah Anggota Rumah Tangga" type="text" />
            </div>
            <?php echo form_error('jml_art','<div class="text-small text-danger">','</div>') ?>
          </div>
          
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">No. KK <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="kk" class="form-control col-md-7 col-xs-12" name="kk" placeholder="No. KK" type="text"/>
            </div>
            <?php echo form_error('kk','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">No. NIK <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="kk" class="form-control col-md-7 col-xs-12" name="nik" placeholder="No. NIK" type="text"/>
            </div>
            <?php echo form_error('nik','<div class="text-small text-danger">','</div>') ?>
          </div>
          
        </div>
        <!--END step 1-->

        <!--step 2-->
        <div id="step-2">
          <span class="section">2. KETERANGAN PERUMAHAN</span>
          
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kk">Status Bangunan Tempat Tinggal <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 1"); ?>
              <select class="form-control" name="status_bangunan" >
                <?php foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
                <?php } ?>    
              </select>
            </div>
              <?php echo form_error('status_bangunan','<div class="text-small text-danger">','</div>') ?>
          </div>
            
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kk">Status Lahan Tempat Tinggal <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 2"); ?>
              <select class="form-control" name="status_lahan" >
                <?php foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
                <?php } ?>    
              </select>
            </div>
              <?php echo form_error('status_lahan','<div class="text-small text-danger">','</div>') ?>
          </div>
          
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="luas_lantai">Luas Lantai <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 3"); ?>
              <select class="form-control" name="luas_lantai" >
                <?php foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
                <?php } ?>    
              </select>
              </div>
                <?php echo form_error('luas_lantai','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_kelamin">Jenis Lantai Terluas <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 4"); ?>
              <select class="form-control" name="jenis_lantai" >
                <?php foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
                <?php } ?>    
              </select>
            </div>
              <?php echo form_error('jenis_lantai','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_dinding">Jenis Dinding Terluas <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 5"); ?>
              <select class="form-control" name="jenis_dinding" >
                <?php foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
                <?php } ?>    
              </select>
            </div>
              <?php echo form_error('jenis_dinding','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Kondisi Dinding <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="kondisi_dinding" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 6");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('kondisi_dinding','<div class="text-small text-danger">','</div>') ?>
            </div>
          
            <div class="item form-group">
              <label for="alamat_asal" class="control-label col-md-3">Jenis Atap Terluas</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="jenis_atap" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 7");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('jenis_atap','<div class="text-small text-danger">','</div>') ?>
            </div>
        
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Kondisi Atap <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="kondisi_atap" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 16");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('kondisi_atap','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label for="kelurahan" class="control-label col-md-3 col-sm-3 col-xs-12">Sumber Air Minum <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="sumber_air_minum" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 8");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('sumber_air_minum','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_pmks">Cara Memperoleh Air Minum <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="cara_memperoleh_air" >
                <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 9");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('cara_memperoleh_air','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Sumber Penerangan Utama<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="sumber_penerangan" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 10");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('sumber_penerangan','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Sumber Penerangan Utama Jika PLN<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="daya" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id =11");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('daya','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Bahan Energi Utama untuk Memasak<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="bahan_memasak" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 12");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('bahan_memasak','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Fasilitas Buang Air Besar<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="fasilitas_bab" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 13");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('fasilitas_bab','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Jenis Kloset<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="jenis_kloset" >
                <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 14");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('jenis_kloset','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Tempat Pembuangan Akhir Tinja<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="tempat_pembuangan_akhir_tinja" >
              <?php $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = 15");
              foreach ($sub_variabel->result() as $k) { ?>
                <option value="<?php echo $k->skor?>"><?php echo $k->nama .'('.$k->skor.')' ?></option>
              <?php } ?>
                </select>
              </div>
              <?php echo form_error('tempat_pembuangan_akhir_tinja','<div class="text-small text-danger">','</div>') ?>
            </div>
          

        </div>
        <!--END step 2-->


        <!--step 3-->
        <div id="step-3">
          <span class="section">3. KEPEMILIKAN ASET DAN KEIKUTSERTAAN PROGRAM</span>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk"> Aset Bergerak<span class="required">*</span></label>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">a.tabung gas 5,5 kg atau lebih<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="tabung_gas" >
                <option value="1">1.ya</option>
                <option value="2">2.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">b.lemari es/kulkas<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="lemari_es" >
                    <option value="3">3.ya</option>
                    <option value="4">4.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">c.AC<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="ac" >
                    <option value="1">1.ya</option>
                    <option value="2">2.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">d.pemanas air(water heater)<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="pemanas_air" >
                    <option value="3">3.ya</option>
                    <option value="4">4.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">e.telepon rumah(PTSN)<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="telpon" >
                    <option value="1">1.ya</option>
                    <option value="2">2.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">f.televisi<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="televisi" >
                    <option value="3">3.ya</option>
                    <option value="4">4.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">g.emas/perhiasan & tabungan (senilai 10 gram emas)<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="emas" >
                    <option value="1">1.ya</option>
                    <option value="2">2.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">h.komputer/leptop<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="komputer" >
                    <option value="3">3.ya</option>
                    <option value="4">4.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">i.sepeda<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="sepeda" >
                    <option value="1">1.ya</option>
                    <option value="2">2.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">j.sepeda motor<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="sepeda_motor" >
                    <option value="3">3.ya</option>
                    <option value="4">4.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">k.mobil/motor tempel/kapal<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="monil" >
                    <option value="1">1.ya</option>
                    <option value="2">2.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">l.perahu/perahu motor<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="perahu" >
                    <option value="3">3.ya</option>
                    <option value="4">4.tidak</option>
                  </select>
            </div>
          </div>

          <!-- <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">m.<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="motor_tempel" >
                    <option value="1">1.ya</option>
                    <option value="2">2.tidak</option>
                  </select>
            </div>
          </div> -->

          <!-- <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">n.perahu motor<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="perahu_motor" >
                    <option value="3">3.ya</option>
                    <option value="4">4.tidak</option>
                  </select>
            </div>
          </div> -->

          <!-- <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">o.kapal<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="kapal" >
                    <option value="1">1.ya</option>
                    <option value="2">2.tidak</option>
                  </select>
            </div>
          </div> -->
        

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Aset Tidak Bergerak<span class="required">*</span></label>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">a.lahan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="lahan" >
                    <option value="1">1.ya</option>
                    <option value="2">2.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">rumah di tempat lain<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="rumah_ditempat_lain" >
                    <option value="3">3.ya</option>
                    <option value="4">4.tidak</option>
                  </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">pekerjaan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="pekerjaan" >
              <option value="0">0.tidak</option>
              <option value="1">1.pertanian tanaman padi & palawija</option>
              <option value="2">2.hortikultura</option>
              <option value="3">3.perkebunan</option>
              <option value="4">4.perikanan tangkap</option>
              <option value="5">5.perikanan budidaya</option>
              <option value="6">6.peternakan</option>
              <option value="7">7.kehutanan & pertanian lainnya</option>
              <option value="8">8.pertambangan/penggalian</option>
              <option value="9">9.industri pengolahan</option>
              <option value="10">10.listrik & gas</option>
              <option value="11">11.bangunan/kontruksi</option>
              <option value="12">12.perdagangan</option>
              <option value="13">13.hotel & rumah makan</option>
              <option value="14">14.transportasi & pergudangan</option>
              <option value="15">15.informasi & komunikasi</option>
              <option value="16">16.keuangan & asuransi</option>
              <option value="17">17.jasa pendidikan</option>
              <option value="18">18.jasa kesehatan</option>
              <option value="19">19.jasa kemasyarakatan, pemerintahan & perorangan</option>
              <option value="20">20.pemulung</option>
              <option value="21">21.lainnya</option>
            </select>
            </div>
          </div>
<!-- 
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Ternak<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="nama_ternak" >
                    <option value="sapi">sapi</option>
                    <option value="kerbau">kerbau</option>
                    <option value="kuda">kuda</option>
                    <option value="babi">babi</option>
                    <option value="kambing/domba">kambing/domba</option>
                  </select>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              
                  <input type="text" class="form-control col-md-3" name="jumlah_ternak" placeholder="jumlah">
              
                  
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                <label class="control-label">/ekor</label></div>
              </div>
              
            </div>
            <php echo form_error('omset_perbulan','<div class="text-small text-danger">','</div>') ?>
          </div> -->

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Penghasilan per bulan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="omset_perbulan" >
                <option value="1">1. < 1 juta</option>
                <option value="2">2. 1 -< 5 juta</option>
                <option value="3">3. 5 -< 10 juta</option>
                <option value="4">4. >= 10 juta</option>
              </select>
            </div>
            <?php echo form_error('omset_perbulan','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Rumah tangga menjadi peserta program/memiliki kartu program berikut ?<span class="required">*</span></label>
          </div>

          <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">1.Kartu Keluarga Sejahtera (KKS)/ Kartu
                Perlindungan Sosial (KPS)<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kps1" >
                    <option value="1">1.Ya</option>
                    <option value="2">2.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">b.kartu Indonesia Pintar (KIP)/ Bantuan Siswa Miskin (BSM)<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kip1" >
                    <option value="3">3.Ya</option>
                    <option value="4">4.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">c.Kartu Indonesia Sehat (KIS)/ BPJS Kesehatan/Jamkesma<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kis1" >
                    <option value="1">1.Ya</option>
                    <option value="2">2.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">d.BPJS Kesehatan peserta mandiri<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="bpjs_mandiri" >
                    <option value="3">3.Ya</option>
                    <option value="4">4.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">e.Jaminan sosial tenaga kerja (Jamsostek)/ BPJS ketenagakerjaan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="jamsostek" >
                    <option value="1">1.Ya</option>
                    <option value="2">2.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">f.Asuransi kesehatan lainnya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="asuransi_kesehatan_lainnya" >
                    <option value="3">3.Ya</option>
                    <option value="4">4.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">g.Program Keluarga Harapan (PKH)<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="pkh1" >
                    <option value="1">1.Ya</option>
                    <option value="2">2.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">h.Beras untuk orang miskin (Raskin)<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="raskin1" >
                    <option value="3">3.Ya</option>
                    <option value="4">4.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">i.Kredit Usaha Rakyat (KUR)<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kur" >
                    <option value="1">1.Ya</option>
                    <option value="2">2.Tidak</option>
                  </select>
                </div>
                <?php echo form_error('usaha_sendiri_bersama','<div class="text-small text-danger">','</div>') ?>
              </div>

        </div>
        
        <!--END step 3-->

      </div>
     
      <!-- End SmartWizard Content -->
      </form>
    </div>
  </div>
</div>