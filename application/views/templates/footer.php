        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Tingkat Kesejahteraan <a href="https://colorlib.com">Kabupaten Tegal</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url() ?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url() ?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url() ?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url() ?>assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="<?php echo base_url() ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

    <!--Tambahan-->
    <!-- <script src="<php echo base_url() ?>assets/build/js/custom.js"></script>
    <script src="<php echo base_url() ?>assets/build/js/jquery-ui.js"></script> -->
    <!--end Tambahan-->

<!-- SELECT KELURAHAN BERDASARKAN KECAMATAN -->
     <script type="text/javascript">
    $(document).ready(function(){
        $('#category').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url('c_tabel/kategori_desa');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>';
                    }
                    $('#sub_category').html(html);
                     
                }
            });
            return false;
        });
    });
</script> 
<!-- END SELECT KELURAHAN BERDASARKAN KECAMATAN -->

<!--DATATABLE-->
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            $('#s_kec').change(function(){
                $('#example').show();
                var selection = $(this).val();
                var dataset=$('#example tbody').find('tr');
                dataset.show();
                dataset.filter(function(index,item){
                    return $(item).find('td:second-child').text().split(',').indexOf(selection)===-1;
                }).hide();
            });
        }
    } );
} );
</script>
<!-- END DATATABLE -->

 <!-- SELECT TAHUN VIEW -->
 <script type="text/javascript">
      function cek_data()
      {
        sel_tahun = $('[name="tahun_masuk"]');
        $.ajax({
          type : 'POST',
          data: "cari="+1+"&tahun_masuk="+sel_tahun.val(),
          url  : 'c_report/view_data_pmks_pertahun',
          cache: false,
          beforeSend: function() {
            sel_tahun.attr('disabled', true);
            $('.loading').html('Loading...');
          },
          success: function(data){
            sel_tahun.attr('disabled', false);
            $('.loading').html('');
            $('.tampilkan_data').html(data);
          }
        });
       return false;
      }
    </script>
     <!-- END SELECT TAHUN VIEW -->

<!--C_VARIABEL TABLE TAMBAH -->
<script type="text/javascript">
  var i = 0;
  function tambah(){
    i++;
    var nama = "<input type='text' class='form-control' name='nama[]' required>";
    var skor = "<input type='number' class='form-control' name='skor[]' required>";
    //  var a = "<input type='hidden' class='form-control' name='sub_variabel_id[]' required>";
    //  var b = "<input type='hidden' class='form-control' name='sub_id[]' required>";
    // var c = "<input type='text' class='form-control' name='c[]' required>";
    // var d = "<input type='text' class='form-control' name='d[]' required>";
    $("#variabel tbody").append("<tr class='"+i+"'><td>"+nama+"</td><td>"+skor+"</td></tr>")
  };
  
  function kurang() {
    if(i>0){
      $("#variabel tbody tr").remove("."+i);
      i--;
    } else {
      i = 1;
      }
  };
    </script>

<!--END C_VARIABEL TABLE TAMBAH -->

<!--C_VARIABEL TABLE TAMBAH -->
<script type="text/javascript">
  var i = 0;
  function tambah_var(){
    i++;
    var variabel_id = "<input type='hidden' class='form-control' value='' name='sub_variabel_id[]' required>";
    var sub_id = "<input type='hidden' class='form-control' name='sub_id[]' required>";
    var nama = "<input type='text' class='form-control' name='nama[]' required>";
    var skor = "<input type='number' class='form-control' name='skor[]' required>";
    $("#variabel tbody").append("<tr class='"+i+"'><td>"+variabel_id+sub_id+nama+"</td><td>"+skor+"</td></tr>")
  };
  
  function kurang_var() {
    if(i>0){
      $("#variabel tbody tr").remove("."+i);
      i--;
    } else {
      i = 1;
      }
  };
    </script>

<!--END C_VARIABEL TABLE TAMBAH -->

<!--C_TABEL INPUT DATA PENDUDUK-->
<!-- <script language="JavaScript" type="text/JavaScript">
//count =0;
// function action(){
//   countNext = count +1;
//   document.getElementById("input"+count).innerHTML = "<input id='kk' class='form-control col-md-7 col-xs-12' name='kk[]' placeholder='No. KK' type='text'/><br><br><div id=\"input"+countNext+"\"></div>";
//   count++;
// }

</script> -->

<script language="JavaScript" type="text/JavaScript">
var i = 0;
  function tambah_data(){
    i++;
    var nik = "<input class='form-control' name='nik[]' placeholder='No. NIK' type='text' required/>";
    var nama = "<input class='form-control' name='nama[]' placeholder='Nama Anggota Keluarga' type='text' required/>";
    var hubungan_dgn_anggota = "<select class='form-control' name='hubungan_dgn_anggota[]'><option value='1'>1.kepala rumah tangga</option><option value='2'>2.istri/suami</option><option value='3'>3.anak</option><option value='4'>4.menantu</option><option value='5'>5.cucu</option><option value='6'>6.orang tua/mertua</option><option value='7'>7.pembantu ruta</option><option value='8'>lainnya</option></select></td>";
    var no_urut_keluarga = "<input class='form-control' name='no_urut_keluarga[]' placeholder='No. Urut Keluarga' type='text' required/>";
    var jenis_kelamin = "<select class='form-control' name='jenis_kelamin[]'><option value='1'>1.laki-laki</option><option value='2'>2.perempuan</option></select>";
    var usia = "<input class='form-control' name='usia[]' placeholder='Usia' type='text' required/>";
    var status_nikah = "<select class='form-control' name='status_nikah[]'><option value='1'>1.belum nikah</option><option value='2'>kawin/nikah(2)</option><option value='3'>3.cerai hidup</option><option value='4'>4.cerai mati</option></select>";
    var memiliki_akta_nikah_cerai = "<select class='form-control' name='memiliki_akta_nikah_cerai[]'><option value='1'>0.tidak</option><option value='1'>1.ya,dapat ditunjukan</option><option value='2'>2.ya,tidak dapat ditunjukan</option></select>";
    var tercantum_dalam_kk = "<select class='form-control' name='tercantum_dalam_kk[]'><option value='1'>1.ya</option><option value='2'>2.tidak</option></select>";
    var kartu_identitas = "<select class='form-control' name='kartu_identitas[]'><option value='0'>tidak memiliki</option><option value='1'>1.akta kelahiran</option><option value='2'>2.kartu pelajar</option><option value='4'>4.KTP</option><option value='8'>8.SIM</option></select>";
    var status_kehamilan = "<select class='form-control' name='status_kehamilan[]'><option value='1'>1.ya</option><option value='2'>2.tidak</option></select>";
    var jenis_cacat = "<select class='form-control' name='jenis_cacat[]'><option value='0'>0.tidak cacat</option><option value='1'>1.tuna daksa/cacat tubuh</option><option value='2'>2.tuna netra/buta</option><option value='3'>3.tuna rungu</option><option value='4'>4.tuna wicara</option><option value='5'>5.tuna rungu & wicata</option><option value='6'>6.tuna netra & cacat tubuh</option><option value='7'>tuna ntra,rungu, & wicara</option><option value='8'>8.tuna rungu, wicara, & cacat tubuh</option><option value='9'>9.tuna rungu, wicara, netra, & cacat tubuh</option><option value='10'>10.cacat mental retardansi</option><option value='11'>11.mantan penderita gangguan jiwa</option><option value='12'>12.cacat fisik dan mental</option></select>";
    var penyakit_kronis_menahun = "<select class='form-control' name='penyakit_kronis_menahun[]'><option value='0'>0.tidak ada</option><option value='1'>1.hipertensi</option><option value='2'>2.rematik</option><option value='3'>3.asma</option><option value='4'>4.masalah jantung</option><option value='5'>5.diabetes(kencing manis)</option><option value='6'>6.tuberculosis(TBC)</option><option value='7'>7.stroke</option><option value='8'>8.kanker atau tumor ganas</option><option value='9'>lainnya(gagal ginjal,paru-paru,flek, dan sejenisnya)</option></select>";
    var partisipasi_sekolah = "<select class='form-control' name='partisipasi_sekolah[]'><option value='0'>0.tidak/belum</option><option value='1'>1.masih</option><option value='2'>2.tidak bersekolah lagi</option></select>";
    var jenjang_pendidikan_tertinggi = "<select class='form-control' name='jenjang_pendidikan_tertinggi[]'><option value='0'>0.tidak</option><option value='1'>1.SD/SDLB</option><option value='2'>2.paket a</option><option value='3'>3.M.Ibtidaiyah</option><option value='4'>4.SMP/SMPLB</option><option value='5'>5.paktet B</option><option value='6'>6.M.Tsanawiyah</option><option value='7'>7.SMA/SMK/SMALB</option><option value='8'>8.paket C</option><option value='9'>9.M.Aliyah</option><option value='10'>10.perguruan tinggi</option></select>";
    var kelas_tertinggi = "<select class='form-control 0' name='kelas_tertinggi[]'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='tamat'>tamat</option></select>";
    var ijazah_tertinggi = "<select class='form-control' name='ijazah_tertinggi[]'><option value='0'>0.tidak punya</option><option value='1'>1.SD/sederajat</option><option value='2'>2.SMP/sederajat</option><option value='3'>3.SMA/sederajat</option><option value='4'>4.D1/D2/D3</option><option value='5'>5.D4/S1</option><option value='6'>6.S1/S3</option></select>";
    var bekerja_atau_membantu = "<select class='form-control' name='bekerja_atau_membantu[]'><option value='1'>1.ya</option><option value='2'>2.tidak</option></select>";
    var lapangan_usaha = "<select class='form-control' name='lapangan_usaha[]'><option value='0'>0.tidak</option><option value='1'>1.pertanian tanaman padi & palawija</option><option value='2'>2.hortikultura</option><option value='3'>3.perkebunan</option><option value='4'>4.perikanan tangkap</option><option value='5'>5.perikanan budidaya</option><option value='6'>6.peternakan</option><option value='7'>7.kehutanan & pertanian lainnya</option><option value='8'>8.pertambangan/penggalian</option><option value='9'>9.industri pengolahan</option><option value='10'>10.listrik & gas</option><option value='11'>11.bangunan/kontruksi</option><option value='12'>12.perdagangan</option><option value='13'>13.hotel & rumah makan</option><option value='14'>14.transportasi & pergudangan</option><option value='15'>15.informasi & komunikasi</option><option value='16'>16.keuangan & asuransi</option><option value='17'>17.jasa pendidikan</option><option value='18'>18.jasa kesehatan</option><option value='19'>19.jasa kemasyarakatan, pemerintahan & perorangan</option><option value='20'>20.pemulung</option><option value='21'>21.lainnya</option></select>";
    var kedudukan_dalam_bekerja = "<select class='form-control' name='kedudukan_dalam_bekerja[]'><option value='1'>1.berusaha sendiri</option><option value='2'>2.berusaha dibantu buruh tidak tetap/tidak dibayar</option><option value='3'>3.berusaha dibantu buruh tetap/dibayar</option><option value='4'>4.buruh/karyawan/pegawai swasta</option><option value='5'>5.PNS/TNI/Polri/BUMN/BUMD/anggota legislatif</option><option value='6'>6.pekerja bebas pertanian</option><option value='7'>7.pekerja bebas non-pertanian</option><option value='8'>8.pekerja keluarga/tidak dibayar</option></select>";
    var keterangan_anggota_keluarga = "<select class='form-control' name='keterangan_anggota_keluarga[]'><option value='1'>1.tinggal di ruta</option><option value='2'>2.meninggal</option><option value='3'>3.tidak tinggal dirunta/pindah</option><option value='4'>4.anggota rumah tangga baru</option><option value='5'>5.kesalahan prelist</option><option value='6'>6.tidak ditemukan</option></select>";
    var kps_kks = "<select class='form-control' name='kps_kks[]'><option value='1'>1.ya</option><option value='2'>2.tidak</option></select>";
    var kis_pbijkn = "<select class='form-control' name='kis_pbijkn[]'><option value='1'>1.ya</option><option value='2'>2.tidak</option></select>";
    var kip_bsm = "<select class='form-control' name='kip_bsm[]'><option value='1'>1.ya</option><option value='2'>2.tidak</option></select>";
    var pkh = "<select class='form-control' name='pkh[]'><option value='1'>1.ya</option><option value='2'>2.tidak</option></select>";
    var raskin_rasta = "<select class='form-control' name='raskin_rasta[]'><option value='1'>1.ya</option><option value='2'>2.tidak</option></select>";
    $("#keluarga tbody").append("<tr class='"+i+"'><td>"+nik+"</td><td>"+nama+"</td><td>"+hubungan_dgn_anggota+"</td><td>"+no_urut_keluarga+"</td><td>"+jenis_kelamin+"</td><td>"+usia+"</td><td>"+status_nikah+"</td><td>"+memiliki_akta_nikah_cerai+"</td><td>"+tercantum_dalam_kk+"</td><td>"+kartu_identitas+"</td><td>"+status_kehamilan+"</td><td>"+jenis_cacat+"</td><td>"+penyakit_kronis_menahun+"</td><td>"+partisipasi_sekolah+"</td><td>"+jenjang_pendidikan_tertinggi+"</td><td>"+kelas_tertinggi+"</td><td>"+ijazah_tertinggi+"</td><td>"+bekerja_atau_membantu+"</td><td>"+lapangan_usaha+"</td><td>"+kedudukan_dalam_bekerja+"</td><td>"+keterangan_anggota_keluarga+"</td><td>"+kps_kks+"</td><td>"+kis_pbijkn+"</td><td>"+kip_bsm+"</td><td>"+pkh+"</td><td>"+raskin_rasta+"</td></tr>")
  };
  
  function kurang_data() {
    if(i>0){
      $("#keluarga tbody tr").remove("."+i);
      i--;
    } else {
      i = 1;
      }
  };
  </script>

<!--END C_TABEL INPUT DATA PENDUDUK-->

<!--C_tabel, view > input data > data pmks (menampilkan sub variabel berdasarkan variabel)-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#variabel').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url('c_tabel/kategori_desa');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].sub_id+'>'+data[i].nama+'</option>';
                    }
                    $('#sub_variabel').html(html);
                     
                }
            });
            return false;
        });
    });
</script> 
<!--END C_tabel, view > input data > data pmks (menampilkan sub variabel berdasarkan variabel)-->

      </body>
      </html>

