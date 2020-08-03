<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document - Tingkat Kesejahteraan</title>
    <style>
body{
    font-family:"Times New Roman"Arial, Helvetica, sans-serif;
    font-size:11px;
    
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

#table tr:nth-child(even){
    background-color:#f2f2f2;
}
#table tr:hover{
    background-color:#ddd;
}
#table th{
    padding-top:12px;
    padding-bottom:12px;
    text-align:left;
    background-color:#b0c4de;
    color:white;
}
.container {
    word-wrap:break-word;
    background:white;
    display:block;
    margin:0 auto;
   margin-bottom:0.5cm;
   margin-top:0.5cm;
}
.container[size="4A"]{
    width:21cm;
    height:21.7cm;
}
.container[size="4A"][layout="landscape"]{
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
    margin-left:10%;
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
<div class="container">
    <div id="left">
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
    </div>
    <?php date_default_timezone_set('Asia/Jakarta');
    // $tahun=date('Y');
        $dates=date('d  F Y');
    ?><br><hr><br>
    <label for="">PMKS Non-Panti</label><br><br>
    <div class="row">
            <div class="rooo">
                <div class="col50">
                    <label for="">Kode Kota </label><br>
                    <label for="">Kota </label><br>
                    <label for="">Total Kecamatan </label><br>
                </div>
                <div class="col30">
                <label>: 28</label><br>
                <label>: Kabupaten Tegal</label><br>
                <label>: <?php echo $sum_kecamatan ?></label><br>
                </div>
                <div class="col50">
                    <label for="">Tahun </label><br>
                    <label for="">Total Penduduk </label><br>
                </div>
                <div class="col30">
                <label>: <?php echo $tahun ?></label><br>
                <label>: <?php echo $total_penduduk ?> Jiwa</label>
                </div>
            </div>  
        </div>
            
        <table id="table">
            <tr>
                <th class="th1">No</th>
                <th class="th2">Nama Kecamatan </th>
                <th class="th4">Kemiskinan</th>
                <th class="th5">Ketelantaran</th>
                <th class="th6">Kecacatan</th>
                <th class="th7">Tingkat Kesejahteraan</th>
            </tr>
            <?php $no=1;
            foreach ($report as $f) : ?>
            <tr>
            <td class="th1"><?php echo $no++ ?></td>
                <td class="th2"><?php echo $f->nama_kecamatan ?></td>
                <td><?php echo $f->rendah ?></td>
                <td><?php echo $f->sedang ?></td>
                <td><?php echo $f->tinggi ?></td>
                <td class="th7">
                <?php foreach ($kali_kec as $kec) {
                    if ($f->nama_kecamatan==$kec->nama_kecamatan) {
                        // if( <= )
                        foreach ($tingkat as $data) {
                            if (($f->rendah + $f->sedang + $f->tinggi) <= ($data->persen*$kec->total_penduduk)) {
                                echo $data->nama_variabel;
                                // echo $data->persen*$kec->total_penduduk;
                            break;
                        }
                    }
                }
            } ?></td>
            </tr>
            <?php endforeach; ?>
        </table>        
    <!-- /Tabel--><br><br>
    <div class="kanan">
        <label for="">Ditetapkan di : Slawi</label><br>
        <label for="">Pada tanggal : Tegal, <?php echo $dates ?></label><br><br>
        
        <div class="kiri">
            <label for="">KEPALA DINAS SOSIAL</label><br>
            <label for="">KABUPATEN TEGAL</label><br><br><br><br><br><br>
            <label for="">( _________________________ )</label><br>
            <label for="">Pembina Utama Muda</label><br>
            <label for="">NIP.</label><br>
        </div>
    </div>
</div>

    
</body></html>