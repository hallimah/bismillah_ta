<!-- page content -->
<div class="right_col" role="main">
          <div class="">
          

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
              
                  <div class="x_title">
                    <h2>Detail <small>Penduduk Miskin</small></h2>

                    <div class="pull-right">
                    <a class="btn btn-danger" href="<?php echo base_url('c_report/laporan_detail_penduduk/'.$detail->id) ?>">
                    <i class="fa fa-file-pdf-o" ></i></a>
                    <a class="btn btn-primary" href="<?php echo base_url('c_tabel/tabel') ?>">Kembali</a>
                    </div>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h3>1. Keterangan Tempat</h3>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-8 invoice-col">
                          <table class="table table-striped projects">
                            <tr>
                              <th style="width:25%">Kecamatan</th>
                              <td><?php echo $detail->nama_kecamatan?></td>
                            </tr>
                            
                            <tr>
                              <th>Desa</th>
                              <td><?php echo $detail->nama_desa?></td>
                            </tr>
                            
                            <tr>
                              <th>Alamat</th>
                              <td><?php echo $detail->alamat?></td>
                            </tr>
                            
                            <tr>
                              <th>Nama</th>
                              <td><?php echo $detail->nama_krt?></td>
                            </tr>
                            
                            <tr>
                              <th>Jenis Kelamin</th>
                              <td><?php echo $detail->jenis_kelamin?></td>
                            </tr>
                            
                            <tr>
                              <th>Jumlah Tangungan</th>
                              <td><?php echo $detail->jumlah_art?></td>
                            </tr>
                            
                            <tr>
                              <th>No. KK</th>
                              <td><?php echo $detail->kk?></td>
                              </tr>
                            
                            <tr>
                              <th>No. NIK</th>
                              <td><?php echo $detail->nik ?></td>
                            </tr>
                            
                            <tr>
                              <th>Tahun Masuk</th>
                              <td><?php echo $detail->tahun_input?></td>
                            </tr>
                          </table>
                        </div>
                        <!-- /.col -->
                    
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h3>2. Keterangan Rumah</h3>
                        </div>
                        <div class="col-xs-12 table">

                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Rumah</th>
                                <th>Keterangan Rumah</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Status Tempat Tinggal</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->status_tempat_tinggal) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Status Lahan</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->status_lahan_tempat_tinggal) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                                            
                              </tr>
                              <tr>
                                <td>Luas Lantai</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->luas_lantai) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Jenis Lantai</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->jenis_lantai_terluas) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Jenis Dinding </td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->jenis_dinding_terluas) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                                
                              </tr>
                              <tr>
                                <td>Kondisi Dinding</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->kondisi_dinding) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Jenis Atap</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->jenis_atap_terluas) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Kondisi Atap</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->kondisi_atap) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Sumber Air Minum</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->sumber_air_minum) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Cara Memperoleh Air</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->cara_memperoleh_air_minum) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Sumber Penerangan Utama</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->sumber_penerangan_utama) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Daya Listrik</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->daya_terpasang) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Bahan Bakar Memasak</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->bahan_bakar_memasak) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Fasilitas BAB</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->penggunaan_fasilitas_bab) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Jenis Kloset</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->jenis_kloset) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                                <td>Tempat Pembuangan Akhir Tinja</td>
                                <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->tempat_pembuangan_akhir_tinja) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      
                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h3>3. Kepemilikan Aset & Program Sosial</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <table  class="table">
                            <thead>
                              <tr>
                                <th>Aset Bergerak</th>
                                <th>Keterangan </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              <td>Tabung Gas 5,5 atau Lebih</td>
                                <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->tabung_gas) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>

                              <tr>
                              <td>Lemari Es/Kulkas</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->lemari_es) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>

                              <tr>
                              <td>Pemanas Air</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->pemanas_air) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>

                              <tr>
                              <td>Televisi</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->televisi) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              
                              <tr>
                              <td>Emas</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->emas) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>

                              <tr>
                              <td>Komputer</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->komputer) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              
                              <tr>
                              <td>Sepeda</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->sepeda) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>

                              <tr>
                              <td>Sepeda Motor</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->sepeda_motor) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>

                            </tbody>
                          </table>

                          <table class="table">
                            <thead>
                              <tr>
                                <th>Aset Tidak Bergerak</th>
                                <th>Keterangan </th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td>Lahan</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->lahan) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>

                              <tr>
                              <td>Properti Lain</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->properti_lain) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>

                              <tr>
                              <td>Pekerjaan</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->pekerjaan) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                            </tbody>
                          </table>

                        </div>

                       
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Program Pemerintah</th>
                                <th>Keterangan </th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td>Kartu Keluarga Sejahtera (KKS)/ Kartu Perlindungan Sosial (KPS)</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->peserta_kks_kps) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                              <td>kartu Indonesia Pintar (KIP)/ Bantuan Siswa Miskin (BSM)</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->peserta_kip_bsm) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                              <td>Kartu Indonesia Sehat (KIS)/ BPJS Kesehatan/Jamkesdma</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->peserta_kis) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                              <td>BPJS Kesehatan peserta mandiri</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->peserta_bpjs) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                              <td>aminan sosial tenaga kerja (Jamsostek)/ BPJS ketenagakerjaan</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->peserta_jamsostek) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                              <td>Asuransi kesehatan lainnya</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->peserta_asuransi_lainnya) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                              <td>Program Keluarga Harapan (PKH)</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->peserta_pkh) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                              <td>Beras untuk orang miskin (Raskin)</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->penerima_raskin) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                              <tr>
                              <td>Kredit Usaha Rakyat (KUR)</td>
                              <?php foreach ($program as $key) { 
                                if ($key->sub_id == $detail->kur) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->