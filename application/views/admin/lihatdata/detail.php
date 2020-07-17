<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Detail <small> Data PMKS</small></h3>
    </div>
  </div>
  
  <div class="x_panel">
    <div class="x_content">
      <table class="table table-striped projects">
        <tr>
          <th style="width:25%">Nama Lengkap</th>
          <td><?php echo $detail->nama?></td>
        </tr>
        
        <tr>
          <th>Jenis Kelamin</th>
          <td><?php echo $detail->jenis_kelamin?></td>
        </tr>
        
        <tr>
          <th>Tempat lahir</th>
          <td><?php echo $detail->tempat_lahir?></td>
        </tr>
        
        <tr>
          <th>Tanggal Lahir</th>
          <td><?php echo $detail->tanggal_lahir?></td>
        </tr>
        
        <tr>
          <th>Nomor Induk Keluarga</th>
          <td><?php echo $detail->nik?></td>
        </tr>
        
        <tr>
          <th>Kartu Keluarga</th>
          <td><?php echo $detail->kk?></td>
        </tr>
        
        <tr>
          <th>Alamat Asal</th>
          <td><?php echo $detail->alamat_asal?></td>
          </tr>
        
        <tr>
          <th>Kelurahan</th>
          <td><?php echo $detail->kelurahan?></td>
        </tr>
        
        <tr>
          <th>Kecamatan</th>
          <td><?php echo $detail->kecamatan?></td>
        </tr>
        
        <tr>
          <th>Kota</th>
          <td><?php echo $detail->kota?></td>
        </tr>
        
        <tr>
          <th>Jenis PMKS</th>
          <td><?php echo $detail->jenis_pmks?></td>
        </tr>
        
        <tr>
          <th>Tahun Masuk</th>
          <td><?php echo $detail->tahun_masuk?></td>
        </tr>
      </table>
      
      <tr>
        <th>
          <a class="btn btn-primary pull-right" href="<?php echo base_url('c_tabel/tabel/') ?>">Kembali</a>
        </th>
      </tr>
    </div>
  </div>