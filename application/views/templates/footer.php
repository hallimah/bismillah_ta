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

      </body>
      </html>

