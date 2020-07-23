<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Input Data <small>PMKS</small></h3>
    </div>
  </div>
  <div class="x_panel">
    <div class="x_content">
    <?php foreach ($penduduk as $key) { ?>
    <form action="<?php echo base_url();?>c_tabel/update_pmks" method="post" class="form-horizontal form-label-left">
   
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
            <input type="hidden" name="id" value="<?php echo $key->id ?>">
              <select class="form-control" name="kecamatan" id="category" >
                <option value="<?php echo $key->kecamatan ?>"><?php echo $key->kecamatan ?></option>
                <?php foreach ($kategori as $row): ?>
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
              <input id="alamat" class="form-control col-md-7 col-xs-12" name="alamat" value="<?php echo $key->alamat ?>" placeholder="Alamat" type="text" />
            </div>
            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Nama KRT <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="krt" placeholder="Nama Kepala Rumah Tangga" value="<?php echo $key->nama_krt ?>" class="form-control col-md-7 col-xs-12" />
            </div>
            <?php echo form_error('krt','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Jumlah ART <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="art" class="form-control col-md-7 col-xs-12" name="jml_art" value="<?php echo $key->jumlah_art ?>" placeholder="Jumlah Anggota Rumah Tangga" type="text" />
            </div>
            <?php echo form_error('art','<div class="text-small text-danger">','</div>') ?>
          </div>
          
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">No. KK <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="kk" class="form-control col-md-7 col-xs-12" value="<?php echo $key->kk ?>" name="kk" placeholder="No. KK" type="text"/>
            </div>
            <?php echo form_error('kk','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">No. NIK <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="kk" class="form-control col-md-7 col-xs-12" name="nik" value="<?php echo $key->nik ?>" placeholder="No. NIK" type="text"/>
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
              <input type="hidden" name="kk_rumah" value="<?php echo $key->id ?>">
              <input type="hidden" name="id_rumah" value="<?php echo $key->kk ?>">
                <select class="form-control" name="status_bangunan" >
                <option value="<?php echo $key->status_tempat_tinggal ?>"><?php echo $key->status_tempat_tinggal ?></option>
                  <option value="1">Milik Sendiri(1)</option>
                  <option value="2">Kontrak/Sewa(2)</option>
                  <option value="3">Bebas Sewa(3)</option>
                  <option value="4">Dinas(4)</option>
                  <option value="5">Lainnya(5)</option>
                </select>
              </div>
              <?php echo form_error('status_bangunan','<div class="text-small text-danger">','</div>') ?>
            </div>
            
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">Status Lahan Tempat Tinggal <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="status_lahan" >
                <option value="<?php echo $key->status_lahan_tempat_tinggal ?>"><?php echo $key->status_lahan_tempat_tinggal ?></option>
                  <option value="1">Milik Sendiri(1)</option>
                  <option value="2">Milik Orang Lain(2)</option>
                  <option value="3">Tanah Negara(3)</option>
                  <option value="4">Lainnya(4)</option>
                </select>
              </div>
              <?php echo form_error('status_lahan','<div class="text-small text-danger">','</div>') ?>
            </div>
          
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="luas_lantai">Luas Lantai <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="kk" class="form-control col-md-7 col-xs-12" value="<?php echo $key->luas_lantai ?>" name="luas_lantai" placeholder="Luas Lantai m2" type="text"/>
              </div>
                <?php echo form_error('luas_lantai','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_kelamin">Jenis Lantai Terluas <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="jenis_lantai" >
                <option value="<?php echo $key->jenis_lantai_terluas ?>"><?php echo $key->jenis_lantai_terluas ?></option>
                  <option value="1">Marmer/Granit(1)</option>
                  <option value="2">Keramik(2)</option>
                  <option value="3">Parket/Vinil/Permadani(3)</option>
                  <option value="4">Ubin/Tegel/Teraso(4)</option>
                  <option value="5">Kayu/Papan Kualitas Tinggi(5)</option>
                  <option value="6">Sementara/Bata Merah(6)</option>
                  <option value="7">Bambu(7)</option>
                  <option value="8">Kayu/Papan Kualitas Rendah(8)</option>
                  <option value="9">Tanah(9)</option>
                  <option value="10">Lainnya(10)</option>
                </select>
              </div>
              <?php echo form_error('jenis_lantai','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_dinding">Jenis Dinding Terluas <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="jenis_dinding" >
                <option value="<?php echo $key->jenis_dinding_terluas ?>"><?php echo $key->jenis_dinding_terluas ?></option>
                  <option value="1">Tembok(1)</option>
                  <option value="2">Plesteran anyaman bambu atau kawat(2)</option>
                  <option value="3">Kayu(3)</option>
                  <option value="4">Anyaman bambu(4)</option>
                  <option value="5">Batang Kayu(5)</option>
                  <option value="6">Bambu(6)</option>
                  <option value="7">Lainnya(7)</option>
                </select>
              </div>
              <?php echo form_error('jenis_dinding','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Kondisi Dinding <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="kondisi_dinding" >
                <option value="<?php echo $key->kondisi_dinding ?>"><?php echo $key->kondisi_dinding ?></option>
                  <option value="1">bagus/kualitas tinggi(1)</option>
                  <option value="2">jelek/kualitas rendah</option>
                </select>
              </div>
              <?php echo form_error('kondisi_dinding','<div class="text-small text-danger">','</div>') ?>
            </div>
          
            <div class="item form-group">
              <label for="alamat_asal" class="control-label col-md-3">Jenis Atap Terluas</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="jenis_atap" >
                <option value="<?php echo $key->jenis_atap_terluas ?>"><?php echo $key->jenis_atap_terluas ?></option>
                  <option value="1">beton/genteng beton(1)</option>
                  <option value="2">genteng keramik(2)</option>
                  <option value="3">genteng metal(3)</option>
                  <option value="4">genteng tanah liat(4)</option>
                  <option value="5">asbes(5)</option>
                  <option value="6">seng(6)</option>
                  <option value="7">sirap(7)</option>
                  <option value="8">bambu(8)</option>
                  <option value="9">jerami/ijuk/daun-daunan/rumbia(9)</option>
                  <option value="10">lainnya(10)</option>
                </select>
              </div>
              <?php echo form_error('jenis_atap','<div class="text-small text-danger">','</div>') ?>
            </div>
        
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Kondisi Atap <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="kondisi_atap" >
                <option value="<?php echo $key->kondisi_dinding ?>"><?php echo $key->kondisi_dinding ?></option>
                  <option value="1">bagus/kualitas tinggi(1)</option>
                  <option value="2">jelek/kualitas rendah(2)</option>
                </select>
              </div>
              <?php echo form_error('kondisi_atap','<div class="text-small text-danger">','</div>') ?>
            </div>
        
            <!-- <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah_kamar_tidur">Jumlah Kamar Tidur <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="kk" class="form-control col-md-7 col-xs-12" name="jumlah_kamar_tidur" placeholder="Jumlah Kamar Tidur" type="text"/>
              </div>
              <php echo form_error('jumlah_kamar_tidur','<div class="text-small text-danger">','</div>') ?>
            </div> -->

            <div class="item form-group">
              <label for="kelurahan" class="control-label col-md-3 col-sm-3 col-xs-12">Sumber Air Minum <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="sumber_air_minum" >
                <option value="<?php echo $key->sumber_air_minum ?>"><?php echo $key->sumber_air_minum ?></option>
                  <option value="1">air kemasan bermerk(1)</option>
                  <option value="2">air isi ulang(2)</option>
                  <option value="3">leding meteran(3)</option>
                  <option value="4">leding eceran(4)</option>
                  <option value="5">sumur bor/pompa(5)</option>
                  <option value="6">sumur terlindung(6)</option>
                  <option value="7">sumur tak terlindung(7)</option>
                  <option value="8">mata air terlindung(8)</option>
                  <option value="9">mata air tak terlindung(9)</option>
                  <option value="10">air sungai/danau/waduk(10)</option>
                  <option value="11">air hujan(11)</option>
                  <option value="12">lainnya(12)</option>
                </select>
              </div>
              <?php echo form_error('sumber_air_minum','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_pmks">Cara Memperoleh Air Minum <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="cara_memperoleh_air" >
                <option value="<?php echo $key->cara_memperoleh_air_minum ?>"><?php echo $key->cara_memperoleh_air_minum ?></option>
                  <option value="1">membeli ecerean(1)</option>
                  <option value="2">jelek/kuaitas rendah(2)</option>
                  <option value="3">tidak membeli(3)</option>
                </select>
              </div>
              <?php echo form_error('cara_memperoleh_air','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Sumber Penerangan Utama<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="sumber_penerangan" >
                <option value="<?php echo $key->sumber_penerangan_utama ?>"><?php echo $key->sumber_penerangan_utama ?></option>
                  <option value="1">listrik PLN(1)</option>
                  <option value="2">listrik non PLN(2)</option>
                  <option value="3">bukan listrik(3)</option>
                </select>
              </div>
              <?php echo form_error('sumber_penerangan','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Sumber Penerangan Utama Jika PLN<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="daya" >
                <option value="<?php echo $key->daya_terpasang ?>"><?php echo $key->daya_terpasang ?></option>
                  <option value="1">450 watt(1)</option>
                  <option value="2">900 watt(2)</option>
                  <option value="3">1.300 watt(3)</option>
                  <option value="4">2.200 watt(4)</option>
                  <option value="5">>2.200 watt(5)</option>
                  <option value="6">tanpa meteran(6)</option>
                </select>
              </div>
              <?php echo form_error('daya','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Bahan Energi Utama untuk Memasak<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="bahan_memasak" >
                <option value="<?php echo $key->bahan_bakar_memasak ?>"><?php echo $key->bahan_bakar_memasak ?></option>
                  <option value="1">listrik(1)</option>
                  <option value="2">gas > 3 kg(2)</option>
                  <option value="3">gas 3 kg(3)</option>
                  <option value="4">gas kota/boigas(4)</option>
                  <option value="5">minyak tanah(5)</option>
                  <option value="6">briket(6)</option>
                  <option value="7">arang(7)</option>
                  <option value="8">kayu bakar(8)</option>
                  <option value="9">tidak memasak dirumah(9)</option>
                </select>
              </div>
              <?php echo form_error('bahan_memasak','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Fasilitas Buang Air Besar<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="fasilitas_bab" >
                <option value="<?php echo $key->penggunaan_fasilitas_bab ?>"><?php echo $key->penggunaan_fasilitas_bab ?></option>
                  <option value="1">sendiri(1)</option>
                  <option value="2">bersama(2)</option>
                  <option value="3">umum(3)</option>
                  <option value="4">tidak ada(4)</option>
                </select>
              </div>
              <?php echo form_error('fasilitas_bab','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Jenis Kloset<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="jenis_kloset" >
                <option value="<?php echo $key->jenis_kloset ?>"><?php echo $key->jenis_kloset ?></option>
                  <option value="1">leher angsa(1)</option>
                  <option value="2">plengsengan(2)</option>
                  <option value="3">cemplung/cubluk(3)</option>
                  <option value="4">tidak pakai(4)</option>
                </select>
              </div>
              <?php echo form_error('jenis_kloset','<div class="text-small text-danger">','</div>') ?>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Tempat Pembuangan Akhir Tinja<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="tempat_pembuangan_akhir_tinja" >
                <option value="<?php echo $key->tempat_pembuangan_akhir_tinja ?>"><?php echo $key->tempat_pembuangan_akhir_tinja ?></option>
                  <option value="1">tangki(1)</option>
                  <option value="2">SPAL(2)</option>
                  <option value="3">lubang tanah(3)</option>
                  <option value="4">kolam/sawah/sungai/danau/laut(5)</option>
                  <option value="5">pantai/lapangan/kebun(5)</option>
                  <option value="6">lainnya(6)</option>
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
              <input type="hidden" name="kk_aset" value="<?php echo $key->id ?>">
              <input type="hidden" name="id_aset" value="<?php echo $key->kk ?>">
              <select class="form-control" name="tabung_gas" >
              <option value="<?php echo $key->tabung_gas ?>"><?php echo $key->tabung_gas ?></option>
                <option value="1">1.ya</option>
                <option value="2">2.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">b.lemari es/kulkas<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="lemari_es" >
                <option value="<?php echo $key->lemari_es ?>"><?php echo $key->lemari_es ?></option>
                <option value="3">3.ya</option>
                <option value="4">4.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">c.AC<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="ac" >
                <option value="<?php echo $key->ac ?>"><?php echo $key->ac ?></option>
                <option value="1">1.ya</option>
                <option value="2">2.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">d.pemanas air(water heater)<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="pemanas_air" >
                <option value="<?php echo $key->pemanas_air ?>"><?php echo $key->pemanas_air ?></option>
                <option value="3">3.ya</option>
                <option value="4">4.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">e.telepon rumah(PTSN)<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="telpon" >
                <option value="<?php echo $key->telepon ?>"><?php echo $key->telepon ?></option>
                <option value="1">1.ya</option>
                <option value="2">2.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">f.televisi<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="televisi" >
                <option value="<?php echo $key->televisi ?>"><?php echo $key->televisi ?></option>
                <option value="3">3.ya</option>
                <option value="4">4.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">g.emas/perhiasan & tabungan (senilai 10 gram emas)<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="emas" >
                <option value="<?php echo $key->emas ?>"><?php echo $key->emas ?></option>
                <option value="1">1.ya</option>
                <option value="2">2.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">h.komputer/leptop<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="komputer" >
                <option value="<?php echo $key->komputer ?>"><?php echo $key->komputer ?></option>
                <option value="3">3.ya</option>
                <option value="4">4.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">i.sepeda<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="sepeda" >
                <option value="<?php echo $key->sepeda ?>"><?php echo $key->sepeda ?></option>
                <option value="1">1.ya</option>
                <option value="2">2.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">j.sepeda motor<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="sepeda_motor" >
                <option value="<?php echo $key->sepeda_motor ?>"><?php echo $key->sepeda_motor ?></option>
                <option value="3">3.ya</option>
                <option value="4">4.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">k.mobil/motor tempel/kapal<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="monil" >
                <option value="<?php echo $key->monil ?>"><?php echo $key->monil ?></option>
                <option value="1">1.ya</option>
                <option value="2">2.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">l.perahu/perahu motor<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="perahu" >
                <option value="<?php echo $key->perahu ?>"><?php echo $key->perahu ?></option>
                <option value="3">3.ya</option>
                <option value="4">4.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Aset Tidak Bergerak<span class="required">*</span></label>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">a.lahan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="lahan" >
                <option value="<?php echo $key->lahan ?>"><?php echo $key->lahan ?></option>
                <option value="1">1.ya</option>
                <option value="2">2.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">rumah di tempat lain<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="rumah_ditempat_lain" >
                <option value="<?php echo $key->properti_lain ?>"><?php echo $key->properti_lain ?></option>
                <option value="3">3.ya</option>
                <option value="4">4.tidak</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">pekerjaan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="pekerjaan" >
                <option value="<?php echo $key->pekerjaan ?>"><?php echo $key->pekerjaan ?></option>
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

          <!-- <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Ternak<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="nama_ternak" >
                    <option value="<hp echo $key->nama_ternak ?>"><php echo $key->nama_ternak ?></option>
                    <option value="">tidak ada</option>
                    <option value="sapi">sapi</option>
                    <option value="kerbau">kerbau</option>
                    <option value="kuda">kuda</option>
                    <option value="babi">babi</option>
                    <option value="kambing/domba">kambing/domba</option>
                  </select>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                  <input type="text" class="form-control col-md-3" value="<php echo $key->jumlah_ternak ?>" name="jumlah_ternak" placeholder="jumlah">
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                  <label class="control-label">/ekor</label>
                </div>
              </div>
              
            </div>
            <php echo form_error('omset_perbulan','<div class="text-small text-danger">','</div>') ?>
          </div> -->

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Pendapatan per bulan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="omset_perbulan" >
              <option value="<?php echo $key->omset ?>"><?php echo $key->omset ?></option>
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
                <option value="<?php echo $key->peserta_kks_kps ?>"><?php echo $key->peserta_kks_kps ?></option>
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
                <option value="<?php echo $key->peserta_kip_bsm ?>"><?php echo $key->peserta_kip_bsm ?></option>
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
                <option value="<?php echo $key->peserta_kis ?>"><?php echo $key->peserta_kis ?></option>
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
                <option value="<?php echo $key->peserta_bpjs ?>"><?php echo $key->peserta_bpjs ?></option>
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
                <option value="<?php echo $key->peserta_jamsostek ?>"><?php echo $key->peserta_jamsostek ?></option>
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
                <option value="<?php echo $key->peserta_asuransi_lainnya ?>"><?php echo $key->peserta_asuransi_lainnya ?></option>
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
                <option value="<?php echo $key->peserta_pkh ?>"><?php echo $key->peserta_pkh ?></option>
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
                <option value="<?php echo $key->penerima_raskin ?>"><?php echo $key->penerima_raskin ?></option>
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
                <option value="<?php echo $key->kur ?>"><?php echo $key->kur ?></option>
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
      <?php } ?>
    </div>
  </div>
</div>