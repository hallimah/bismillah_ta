<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document - Tingkat Kesejahteraan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
*{
    font-family:"Tahoma",Arial, Helvetica, sans-serif;
    font-size:15px;
    
}

hr{
    border:1px solid black;
}

#table{
    font-family:"Times New Roman",Arial, Helvetica, sans-serif;
    font-size:11px;
    border-collapse:collapse;
    table-layout:fixed;
    width:100%;
}
#table td, #table th{
    border:1px,solid #ddd;
    padding:8px;
}

.th1{width:5%;}
.th2{width:15%;}
.th3{width:15%;}
.th4{width:10%;}
.th5{width:10%;}
.th6{width:10%;}
.th7{width:20%;}

#table th{
    padding-top:12px;
    padding-bottom:12px;
    text-align:left;
    align:left;
    /* background-color:#000000; */
    color:black;
}
.container-fluid {
    word-wrap:break-word;
    background:white;
    display:block;
    margin:0 auto;
   margin-bottom:0.5cm;
   margin-top:0.5cm;
}
.container-fluid[size="4A"]{
    width:21cm;
    height:21.7cm;
}
.container-fluid[size="4A"][layout="landscape"]{
    width:29.7cm;
    height:21cm;
}
.imgs{
    width:62px;
    height:70px;
    margin:-25 auto;
    top:0px;
}

.col50{
    float:left;
    width:15%;
    display:table-cell;
}

.col30{
    float:left;
    width:35%;
    display:table-cell;
}

.row {
  display: table;
  width:100%;
}
.rooo{
    display:table-row;
}

.font20{
    font-family:"Tahoma",Arial, Helvetica, sans-serif;
    font-size:15px;
}

.font30{
    font-family:"Tahoma",Arial, Helvetica, sans-serif;
    font-size:25px;
}


.kanan{
    margin-left:65%;
    text-align:left;
}

.kiri{
    margin-left:5%;
    text-align:left;
}

.center{
    font-family:"Times New Roman";
    position:fixed;
    border:0px solid;
    text-align:center;
}

#left{
    width:30%;
    float:left;
}

#splitter{
    width:5%;
    float:left;
}

#right{
    width:65%;
    float:left;
}

</style>
</head><body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
        <img src="assets/production/images/logoo.png" alt="..." class="imgs">
        </div>
        <div class="text-center">
            <div class="col-md-8">
                <h5>PEMERINTAH KABUPATEN TEGAL</h5>
                <h3>DINAS SOSIAL</h3>
                <span>Alamat: Jl.A.Yani No. 3 Slawi Kode Pos 52412 <br>Telp/Fax(0283) 491379 email: dinsos@tegalkab.go.id</span>
            </div>
        </div>
    </div>
    <!-- <div id="left">
        <img src="assets/production/images/logoo.png" alt="..." class="imgs">
    </div>
    <div id="splitter"></div>
    <div id="right">
        <div class="center">
            <span class="font20">PEMERINTAH KABUPATEN TEGAL</span><br>
            <span class="font30">DINAS SOSIAL</span><br>
            <span>Alamat: Jl.A.Yani No. 3 Slawi Kode Pos 52412</span> <br>
            <span>Telp/Fax(0283) 491379 email: dinsos@tegalkab.go.id</span>
        </div>
    </div> -->
    <?php date_default_timezone_set('Asia/Jakarta');
    // $tahun=date('Y');
        $dates=date('d  F Y');
    ?><br><hr><br>
    <label for="">Laporan Detail Penduduk Miskin</label><br><br>
    <h5>1. Keterangan Tempat</h5>

    <div class="kiri">
    <table>
        
        <tr>
            <td align="left">Kecamatan</td>
            <td>: <?php echo $detail->nama_kecamatan?></td>
        </tr>
        <tr>
            <td align="left">Desa</td>
            <td>: <?php echo $detail->nama_desa?></td>
        </tr>
        <tr>
            <td align="left">Alamat</td>
            <td>: <?php echo $detail->alamat?></td>
        </tr>
        <tr>
            <td align="left">Nama</td>
            <td>: <?php echo $detail->nama_krt?></td>
        </tr>
        <tr>
            <td align="left">Jenis Kelamin</td>
            <td>: <?php echo $detail->jenis_kelamin?></td>
        </tr>
        <tr>
            <td align="left">Jumlah Tangungan</td>
            <td>: <?php echo $detail->jumlah_art?></td>
        </tr>
        <tr>
            <td align="left">No. KK</td>
            <td>: <?php echo $detail->kk?></td>
        </tr>
        <tr>
            <td align="left">No. NIK</td>
            <td>: <?php echo $detail->nik ?></td>
        </tr>
        <tr>
            <td align="left">Tahun Masuk</td>
            <td>: <?php echo $detail->tahun_input?></td>
        </tr>
        <tr>
            <td align="left">Status Kemiskinan</td>
            <td>: <?php echo $detail->klasifikasi?></td>
        </tr>
    </table>
    </div>

    <br>
    <br>
    <br>
    <h5>2.Pengenalan Rumah</h5>
    <div class="">
        <table id="table">
            <tr>
                <th class="th1">No</th>
                <th class="th3">Rumah</th>
                <th class="th7">Keterangan Rumah</th>
                <th class="th1">No</th>
                <th class="th3">Rumah</th>
                <th class="th7">Keterangan Rumah</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Status Tempat Tinggal</td>
                
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->status_tempat_tinggal) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?></td>
                <td> 9</td>
                <td>Sumber Air Minum</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->sumber_air_minum) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Status Lahan</td>
                <td>:  <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->status_lahan_tempat_tinggal) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
                <td> 10</td>
                <td>Cara Memperoleh Air</td>
                <td>:<?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->cara_memperoleh_air_minum) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Luas Lantai</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->luas_lantai) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?></td>
                <td>11 </td>
                <td>Sumber Penerangan Utama</td>
                <td>:<?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->sumber_penerangan_utama) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Jenis Lantai</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->jenis_lantai_terluas) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
                <td>12 </td>
                <td>Daya Listrik</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->daya_terpasang) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Jenis Dinding </td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->jenis_dinding_terluas) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
                <td>13 </td>
                <td>Bahan Bakar Memasak</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->bahan_bakar_memasak) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Kondisi Dinding</td>
                <td>:<?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->kondisi_dinding) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
                <td>14 </td>
                <td>Fasilitas BAB</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->penggunaan_fasilitas_bab ) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
            </tr>
            <tr>
                <td>7</td>
                <td>Jenis Atap</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->jenis_atap_terluas ) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
                <td>15 </td>
                <td>Jenis Kloset</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->jenis_kloset ) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Kondisi Atap</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->kondisi_atap ) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
                <td>16 </td>
                <td>Tempat Pembuangan Akhir Tinja</td>
                <td>: <?php foreach ($rumah as $key) { 
                                if ($key->sub_id == $detail->tempat_pembuangan_akhir_tinja ) { ?>
                                 <?php echo $key->nama ?>
                                <?php }
                                 } ?> </td>
            </tr>
        </table>
    </div>
    <h5>3. Kepemilikan Aset & Keikutsertaan Program</h5>
    <div class="kiri">
                          <table  id="table">
                          
                              <tr>
                                <th>Aset Bergerak</th>
                                <th>Keterangan </th>
                                <th>Aset Tidak Bergerak</th>
                                <th>Keterangan </th>
                              </tr>
                              <tr>
                              <td>Tabung Gas 5,5 atau Lebih</td>
                                <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->tabung_gas) { ?>
                                  <td><?php echo $key->nama ?></td>   
                                <?php }
                                 } ?>

                                <td>Lahan</td>
                                <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->lahan) { ?>
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
                                 
                                 <td>Properti Lain</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->properti_lain) { ?>
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
                                 
                                 <td>Pekerjaan</td>
                              <?php foreach ($aset as $key) { 
                                if ($key->sub_id == $detail->pekerjaan) { ?>
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

                          </table>

    </div>

    <!-- /Tabel--><br><br>
    <div class="kanan">
        <label for="">Ditetapkan di : Slawi</label><br>
        <label for="">Pada tanggal : Tegal, <?php echo $dates ?></label><br><br>
        
        <div class="kiri">
            <label for="">KEPALA DINAS SOSIAL</label><br>
            <label for="">KABUPATEN TEGAL</label><br><br><br><br><br><br>
            <label for="">( _______________________ )</label><br>
            <label for="">Pembina Utama Muda</label><br>
            <label for="">NIP.</label><br>
        </div>
    </div>
</div>

    
</body></html>