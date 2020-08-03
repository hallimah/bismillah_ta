<!-- page content -->
<div class="right_col" role="main">
          <div class="">
          

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail <small>Penduduk Miskin</small></h2>
                  
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
                                <td><?php echo $detail->status_tempat_tinggal ?></td>
                              </tr>
                              <tr>
                                <td>Status Lahan</td>
                                <td><?php echo $detail->status_lahan_tempat_tinggal ?></td>
                              </tr>
                              <tr>
                                <td>Luas Lantai</td>
                                <td><?php echo $detail->luas_lantai ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Lantai</td>
                                <td><?php echo $detail->jenis_lantai_terluas ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Dinding </td>
                                <td><?php echo $detail->jenis_dinding_terluas ?></td>
                              </tr>
                              <tr>
                                <td>Kondisi Dinding</td>
                                <td><?php echo $detail->kondisi_dinding ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Atap</td>
                                <td><?php echo $detail->jenis_atap_terluas ?></td>
                              </tr>
                              <tr>
                                <td>Kondisi Atap</td>
                                <td><?php echo $detail->kondisi_atap ?></td>
                              </tr>
                              <tr>
                                <td>Sumber Air Minum</td>
                                <td><?php echo $detail->sumber_air_minum ?></td>
                              </tr>
                              <tr>
                                <td>Cara Memperoleh Air</td>
                                <td><?php echo $detail->cara_memperoleh_air_minum ?></td>
                              </tr>
                              <tr>
                                <td>Sumber Penerangan Utama</td>
                                <td><?php echo $detail->sumber_penerangan_utama ?></td>
                              </tr>
                              <tr>
                                <td>Daya Listrik</td>
                                <td><?php echo $detail->daya_terpasang ?></td>
                              </tr>
                              <tr>
                                <td>Bahan Bakar Memasak</td>
                                <td><?php echo $detail->bahan_bakar_memasak ?></td>
                              </tr>
                              <tr>
                                <td>Fasilitas BAB</td>
                                <td><?php echo $detail->penggunaan_fasilitas_bab ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Kloset</td>
                                <td><?php echo $detail->jenis_kloset ?></td>
                              </tr>
                              <tr>
                                <td>Tempat Pembuangan Akhir Tinja</td>
                                <td><?php echo $detail->tempat_pembuangan_akhir_tinja ?></td>
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
                        <div class="col-xs-12 table">

                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Aset Bergerak</th>
                                <th>Keterangan </th>
                                <th> </th>
                                <th>Aset Tidak Bergerak</th>
                                <th>Keterangan </th>
                                <th> </th>
                                <th>Program Pemerintah</th>
                                <th>Keterangan </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Status Tempat Tinggal</td>
                                <td><?php echo $detail->status_tempat_tinggal ?></td>
                                <td></td>
                                <td>Status Tempat Tinggal</td>
                                <td><?php echo $detail->status_tempat_tinggal ?></td>
                                <td></td>
                                <td>Status Tempat Tinggal</td>
                                <td><?php echo $detail->status_tempat_tinggal ?></td>
                              </tr>
                              <tr>
                                <td>Status Lahan</td>
                                <td><?php echo $detail->status_lahan_tempat_tinggal ?></td>
                              </tr>
                              <tr>
                                <td>Luas Lantai</td>
                                <td><?php echo $detail->luas_lantai ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Lantai</td>
                                <td><?php echo $detail->jenis_lantai_terluas ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Dinding </td>
                                <td><?php echo $detail->jenis_dinding_terluas ?></td>
                              </tr>
                              <tr>
                                <td>Kondisi Dinding</td>
                                <td><?php echo $detail->kondisi_dinding ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Atap</td>
                                <td><?php echo $detail->jenis_atap_terluas ?></td>
                              </tr>
                              <tr>
                                <td>Kondisi Atap</td>
                                <td><?php echo $detail->kondisi_atap ?></td>
                              </tr>
                              <tr>
                                <td>Sumber Air Minum</td>
                                <td><?php echo $detail->sumber_air_minum ?></td>
                              </tr>
                              <tr>
                                <td>Cara Memperoleh Air</td>
                                <td><?php echo $detail->cara_memperoleh_air_minum ?></td>
                              </tr>
                              <tr>
                                <td>Sumber Penerangan Utama</td>
                                <td><?php echo $detail->sumber_penerangan_utama ?></td>
                              </tr>
                              <tr>
                                <td>Daya Listrik</td>
                                <td><?php echo $detail->daya_terpasang ?></td>
                              </tr>
                              <tr>
                                <td>Bahan Bakar Memasak</td>
                                <td><?php echo $detail->bahan_bakar_memasak ?></td>
                              </tr>
                              <tr>
                                <td>Fasilitas BAB</td>
                                <td><?php echo $detail->penggunaan_fasilitas_bab ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Kloset</td>
                                <td><?php echo $detail->jenis_kloset ?></td>
                              </tr>
                              <tr>
                                <td>Tempat Pembuangan Akhir Tinja</td>
                                <td><?php echo $detail->tempat_pembuangan_akhir_tinja ?></td>
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