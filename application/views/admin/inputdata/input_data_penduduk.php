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
              <small>KETERANGAN SOSIAL EKONOMI ANGGOTA RUMAH TANGGA</small>
            </span>
          </a>
        </li>
        <li>
          <a href="#step-4">
            <span class="step_no">4</span>
            <span class="step_descr">Tahap 4<br />
              <small>KEPEMILIKAN ASET DAN KEIKUTSERTAAN PROGRAM</small>
            </span>
          </a>
        </li>
      </ul>

      <!--step 1-->
      <div id="step-1">
        <span class="section">1. PENGANALAN TEMPAT</span>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="provinsi">Provinsi <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="provinsi" placeholder="Nama Provinsi" class="optional form-control col-md-7 col-xs-12" />
          </div>
          <?php echo form_error('provinsi','<div class="text-small text-danger">','</div>') ?>
        </div>
        
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Kabupaten/Kota <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="kota" placeholder="Kabupaten/Kota" class="form-control col-md-7 col-xs-12" />
          </div>
          <?php echo form_error('kota','<div class="text-small text-danger">','</div>') ?>
        </div>

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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sls">Nama SLS <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="sls" class="form-control col-md-7 col-xs-12" name="sls" placeholder="Nama Satuan Lingkungan Setempat" type="text" />
          </div>
            <?php echo form_error('sls','<div class="text-small text-danger">','</div>') ?>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Jumlah ART <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="art" class="form-control col-md-7 col-xs-12" name="jml_art" placeholder="Jumlah Anggota Rumah Tangga" type="text" />
          </div>
          <?php echo form_error('art','<div class="text-small text-danger">','</div>') ?>
        </div>
      
        <div class="item form-group">
          <label for="alamat_asal" class="control-label col-md-3">Jumlah Keluarga</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="jumlah_keluarga" type="text" name="jml_keluarga" placeholder="Jumlah Keluarga" class="form-control col-md-7 col-xs-12" />
          </div>
          <?php echo form_error('jumlah_keluarga','<div class="text-small text-danger">','</div>') ?>
        </div>
        
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">No. KK <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="kk" class="form-control col-md-7 col-xs-12" name="kk" placeholder="No. KK" type="text"/>
          </div>
          <?php echo form_error('kk','<div class="text-small text-danger">','</div>') ?>
        </div>
        
      </div>
      <!--END step 1-->

      <!--step 2-->
      <div id="step-2">
        <span class="section">2. KETERANGAN PERUMAHAN</span>
      
      <?php foreach ($menu as $key) { ?>
        <div class="item form-group">
           <?php echo '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kk">'.$key->nama_variabel.'<span class="required">*</span></label>' ?> 
            <div class="col-md-6 col-sm-6 col-xs-12">
            <?php 
            $a= $key->variabel_id;
            $sub_variabel= $this->db->query("SELECT * FROM tb_sub_variabel WHERE sub_variabel_id = '$a'");
            echo '<select class="form-control" name="status_bangunan" >';
            foreach ($sub_variabel->result() as $k) {
              echo '<option value="'.$k->skor.'">'.$k->nama.'</option>  ';
            }
            echo '</select>';
            ?>

            </div>
            <?php echo form_error('status_bangunan','<div class="text-small text-danger">','</div>') ?>
          </div>
      <?php } ?>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kk">Status Bangunan Tempat Tinggal <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="status_bangunan" >
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
            <input id="kk" class="form-control col-md-7 col-xs-12" name="luas_lantai" placeholder="Luas Lantai m2" type="text"/>
            </div>
              <?php echo form_error('luas_lantai','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_kelamin">Jenis Lantai Terluas <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="jenis_lantai" >
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
                <option value="1">bagus/kualitas tinggi(1)</option>
                <option value="2">jelek/kualitas rendah(2)</option>
              </select>
            </div>
            <?php echo form_error('kondisi_atap','<div class="text-small text-danger">','</div>') ?>
          </div>
      
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah_kamar_tidur">Jumlah Kamar Tidur <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="kk" class="form-control col-md-7 col-xs-12" name="jumlah_kamar_tidur" placeholder="Jumlah Kamar Tidur" type="text"/>
            </div>
            <?php echo form_error('jumlah_kamar_tidur','<div class="text-small text-danger">','</div>') ?>
          </div>

          <div class="item form-group">
            <label for="kelurahan" class="control-label col-md-3 col-sm-3 col-xs-12">Sumber Air Minum <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="sumber_air_minum" >
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
        <span class="section">3. KETERANGAN SOSIAL EKONOMI KELUARGA</span>
          <div class="input_data_penduduk_scroll">
            <table class="tabel table-bordered" id="keluarga">
              <thead>
                <tr>
                    <td rowspan="2" class="lebar">NIK</td>
                    <td rowspan="2" class="lebar">Nama Anggota Keluarga</td>
                    <td rowspan="2" class="lebar">Hubungan dengan Kepala Keluarga</td>
                    <td rowspan="2" class="lebar">Nomor Urut Keluarga</td>
                    <td rowspan="2" class="lebar">Jenis Kelamin</td>
                    <td rowspan="2" class="lebar">Usia</td>
                    <td rowspan="2" class="lebar">Status Pernikahan</td>
                    <td rowspan="2" class="lebar">Kepemilikan Buku Akta/Nikah/Cerai</td>
                    <td rowspan="2" class="lebar">Tercantum dalam Kartu Keluarga</td>
                    <td rowspan="2" class="lebar">Kepemilikan Kartu Identitas</td>
                    <td rowspan="2" class="lebar">Status Kehamilan</td>
                    <td rowspan="2" class="lebar">Jenis Cacat</td>
                    <td rowspan="2" class="lebar">Penyakit Kronis Menahun</td>
                    <td rowspan="2" class="lebar">Partisipasi Sekolah</td>
                    <td rowspan="2" class="lebar">Jenjang Pendidikan Tertinggi</td>
                    <td rowspan="2" class="lebar">Kelas Tertinggi yang Pernah/sedang diduduki</td>
                    <td rowspan="2" class="lebar">Ijazah Tertinggi</td>
                    <td rowspan="2" class="lebar">Bekerja/Membantu</td>
                    <td rowspan="2" class="lebar">Lapangan Usaha dari Pekerjaan Utama</td>
                    <td rowspan="2" class="lebar">Status dalam Pekerjaan Utama</td>
                    <td rowspan="2" class="lebar">Keterangan Keberadaan Anggota RT</td>
                    <td colspan="5" class="lebar">Keikutsertaan Program</td>
                </tr>
                <tr>
                    <td class="lebar-sedikit">KPS/KKS</td>
                    <td class="lebar-sedikit">KIS/PBIJKN</td>
                    <td class="lebar-sedikit">KIP/BSM</td>
                    <td class="lebar-sedikit">PKH</td>
                    <td class="lebar-sedikit">Raskin/Rasta</td>
                </tr>
              </thead>
              <tbody>
                    <tr>
                      <td><input class="form-control 0" name="nik[]" placeholder="No. NIK" type="text" required/></td>
                      <td><input class="form-control 0" name="nama[]" placeholder="Nama Anggota Keluarga" type="text" required /></td>
                      <td><select class="form-control 0" name="hubungan_dgn_anggota[]"><option value="1">1.kepala rumah tangga</option><option value="2">2.istri/suami</option><option value="3">3.anak</option><option value="4">4.menantu</option><option value="5">5.cucu</option><option value="6">6.orang tua/mertua</option><option value="7">7.pembantu ruta</option><option value="8">lainnya</option></select></td>
                      <td><input class="form-control 0" name="no_urut_keluarga[]" placeholder="No. Urut Keluarga" type="text" required/></td>
                      <td><select class="form-control 0" name="jenis_kelamin[]"><option value="1">1.laki-laki</option><option value="2">2.perempuan</option></select></td>
                      <td><input class="form-control 0" name="usia[]" placeholder="Usia" type="text" required/></td>
                      <td><select class="form-control 0" name="status_nikah[]"><option value="1">1.belum nikah</option><option value="2">kawin/nikah(2)</option><option value="3">3.cerai hidup</option><option value="4">4.cerai mati</option></select></td>
                      <td><select class="form-control 0" name="memiliki_akta_nikah_cerai[]"><option value="1">0.tidak</option><option value="1">1.ya,dapat ditunjukan</option><option value="2">2.ya,tidak dapat ditunjukan</option></select></td>
                      <td><select class="form-control 0" name="tercantum_dalam_kk[]"><option value="1">1.ya</option><option value="2">2.tidak</option></select></td>
                      <td><select class="form-control 0" name="kartu_identitas[]"><option value="0">tidak memiliki</option><option value="1">1.akta kelahiran</option><option value="2">2.kartu pelajar</option><option value="4">4.KTP</option><option value="8">8.SIM</option></select></td>
                      <td><select class="form-control 0" name="status_kehamilan[]"><option value="1">1.ya</option><option value="2">2.tidak</option></select></td>
                      <td><select class="form-control 0" name="jenis_cacat[]"><option value="0">0.tidak cacat</option><option value="1">1.tuna daksa/cacat tubuh</option><option value="2">2.tuna netra/buta</option><option value="3">3.tuna rungu</option><option value="4">4.tuna wicara</option><option value="5">5.tuna rungu & wicata</option><option value="6">6.tuna netra & cacat tubuh</option><option value="7">tuna ntra,rungu, & wicara</option><option value="8">8.tuna rungu, wicara, & cacat tubuh</option><option value="9">9.tuna rungu, wicara, netra, & cacat tubuh</option><option value="10">10.cacat mental retardansi</option><option value="11">11.mantan penderita gangguan jiwa</option><option value="12">12.cacat fisik dan mental</option></select></td>
                      <td><select class="form-control 0" name="penyakit_kronis_menahun[]"><option value="0">0.tidak ada</option><option value="1">1.hipertensi</option><option value="2">2.rematik</option><option value="3">3.asma</option><option value="4">4.masalah jantung</option><option value="5">5.diabetes(kencing manis)</option><option value="6">6.tuberculosis(TBC)</option><option value="7">7.stroke</option><option value="8">8.kanker atau tumor ganas</option><option value="9">lainnya(gagal ginjal,paru-paru,flek, dan sejenisnya)</option></select></td>
                      <td><select class="form-control 0" name="partisipasi_sekolah[]"><option value="0">0.tidak/belum</option><option value="1">1.masih</option><option value="2">2.tidak bersekolah lagi</option></select></td>
                      <td><select class="form-control 0" name="jenjang_pendidikan_tertinggi[]"><option value="0">0.tidak</option><option value="1">1.SD/SDLB</option><option value="2">2.paket a</option><option value="3">3.M.Ibtidaiyah</option><option value="4">4.SMP/SMPLB</option><option value="5">5.paktet B</option><option value="6">6.M.Tsanawiyah</option><option value="7">7.SMA/SMK/SMALB</option><option value="8">8.paket C</option><option value="9">9.M.Aliyah</option><option value="10">10.perguruan tinggi</option></select></td>
                      <td><select class="form-control 0" name="kelas_tertinggi[]"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="tamat">tamat</option></select></td>
                      <td><select class="form-control 0" name="ijazah_tertinggi[]"><option value="0">0.tidak punya</option><option value="1">1.SD/sederajat</option><option value="2">2.SMP/sederajat</option><option value="3">3.SMA/sederajat</option><option value="4">4.D1/D2/D3</option><option value="5">5.D4/S1</option><option value="6">6.S1/S3</option></select></td>
                      <td><select class="form-control 0" name="bekerja_atau_membantu[]"><option value="1">1.ya</option><option value="2">2.tidak</option></select></td>
                      <td><select class="form-control 0" name="lapangan_usaha[]"><option value="0">0.tidak</option><option value="1">1.pertanian tanaman padi & palawija</option><option value="2">2.hortikultura</option><option value="3">3.perkebunan</option><option value="4">4.perikanan tangkap</option><option value="5">5.perikanan budidaya</option><option value="6">6.peternakan</option><option value="7">7.kehutanan & pertanian lainnya</option><option value="8">8.pertambangan/penggalian</option><option value="9">9.industri pengolahan</option><option value="10">10.listrik & gas</option><option value="11">11.bangunan/kontruksi</option><option value="12">12.perdagangan</option><option value="13">13.hotel & rumah makan</option><option value="14">14.transportasi & pergudangan</option><option value="15">15.informasi & komunikasi</option><option value="16">16.keuangan & asuransi</option><option value="17">17.jasa pendidikan</option><option value="18">18.jasa kesehatan</option><option value="19">19.jasa kemasyarakatan, pemerintahan & perorangan</option><option value="20">20.pemulung</option><option value="21">21.lainnya</option></select></td>
                      <td><select class="form-control 0" name="kedudukan_dalam_bekerja[]"><option value="1">1.berusaha sendiri</option><option value="2">2.berusaha dibantu buruh tidak tetap/tidak dibayar</option><option value="3">3.berusaha dibantu buruh tetap/dibayar</option><option value="4">4.buruh/karyawan/pegawai swasta</option><option value="5">5.PNS/TNI/Polri/BUMN/BUMD/anggota legislatif</option><option value="6">6.pekerja bebas pertanian</option><option value="7">7.pekerja bebas non-pertanian</option><option value="8">8.pekerja keluarga/tidak dibayar</option></select></td>
                      <td><select class="form-control 0" name="keterangan_anggota_keluarga[]"><option value="1">1.tinggal di ruta</option><option value="2">2.meninggal</option><option value="3">3.tidak tinggal dirunta/pindah</option><option value="4">4.anggota rumah tangga baru</option><option value="5">5.kesalahan prelist</option><option value="6">6.tidak ditemukan</option></select></td>
                      <td><select class="form-control 0" name="kps_kks[]"><option value="1">1.ya</option><option value="2">2.tidak</option></select></td>
                      <td><select class="form-control 0" name="kis_pbijkn[]"><option value="1">1.ya</option><option value="2">2.tidak</option></select></td>
                      <td><select class="form-control 0" name="kip_bsm[]"><option value="1">1.ya</option><option value="2">2.tidak</option></select></td>
                      <td><select class="form-control 0" name="pkh[]"><option value="1">1.ya</option><option value="2">2.tidak</option></select></td>
                      <td><select class="form-control 0" name="raskin_rasta[]"><option value="1">1.ya</option><option value="2">2.tidak</option></select></td>
                    </tr>
              </tbody>
            </table>
            <br>
            <a id="tambah_data" class="btn btn-primary" onclick="tambah_data();">+</a>
            <a id="kurang_data" class="btn btn-primary" onclick="kurang_data();">-</a>

          </div>

      </div>
      <!--END step3-->

      <!--step 4-->
      <div id="step-4">
        <span class="section">4. KEPEMILIKAN ASET DAN KEIKUTSERTAAN PROGRAM</span>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Memiliki Aset Bergerak<span class="required">*</span></label>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">k.monil<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="monil" >
                  <option value="1">1.ya</option>
                  <option value="2">2.tidak</option>
                </select>
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">l.perahu<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="perahu" >
                  <option value="3">3.ya</option>
                  <option value="4">4.tidak</option>
                </select>
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">m.motor tempel<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="motor_tempel" >
                  <option value="1">1.ya</option>
                  <option value="2">2.tidak</option>
                </select>
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">n.perahu motor<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="perahu_motor" >
                  <option value="3">3.ya</option>
                  <option value="4">4.tidak</option>
                </select>
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">o.kapal<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="kapal" >
                  <option value="1">1.ya</option>
                  <option value="2">2.tidak</option>
                </select>
          </div>
        </div>
       

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Memiliki Aset Tidak Bergerak<span class="required">*</span></label>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Jumlah Ternak yang dimiliki(ekor)<span class="required">*</span></label>
         </div>

         <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">a.sapi<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="sapi" id="" class="form-control" placeholder="jumlah per ekor">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">b.kerbau<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="kerbau" id="" class="form-control" placeholder="jumlah per ekor">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">c.kuda<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="kuda" id="" class="form-control" placeholder="jumlah per ekor">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">d.babi<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="babi" id="" class="form-control" placeholder="jumlah per ekor">
          </div>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">e.kambing/domba<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="kambing_domba" id="" class="form-control" placeholder="jumlah per ekor">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Apakah ada ART yang memiliki usaha sendiri/bersama ?<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="wirausaha_atau_bukan" >
              <option value="1">1.ya</option>
              <option value="2">2.tidak</option>
            </select>
          </div>
          <?php echo form_error('wirausaha','<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Isi Jika Memiliki Usaha<span class="required">*</span></label>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Nama<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="nama_pengusaha" id="" class="form-control" placeholder="Nama Pengusaha">
          </div>
          <?php echo form_error('nama_pengusaha','<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Lapangan Usaha<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="nama_lapangan_usaha" id="" class="form-control" placeholder="Nama Lapangan Usaha">
          </div>
          <?php echo form_error('nama_lapangan_usaha','<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Jumlah Pekerja<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="jumlah_pekerja" id="" class="form-control" placeholder="Jumlah Pekerja">
          </div>
          <?php echo form_error('jumlah_pekerja','<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Lokasi Usaha<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="lokasi_usaha" >
              <option value="1">1.Ya</option>
              <option value="2">2.Tidak</option>
            </select>
          </div>
          <?php echo form_error('lokasi_usaha','<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_masuk">Omset per bulan<span class="required">*</span></label>
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
                  <option value="1">1.Ya</option>
                  <option value="2">2.Tidak</option>
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
      
      <!--END step 4-->

    </div>
    </form>
    <!-- End SmartWizard Content -->
  </div>
</div>
</div>