<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Kecamatan</span>
        <div class="count green"><?php echo $total_kecamatan; ?></div><span>Kecamatan</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Kelurahan</span>
        <div class="count green"><?php echo $total_kelurahan; ?></div><span>Kelurahan</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total PMKS</span>
        <div class="count green"><?php echo $total_pmks; ?></div><span>Jiwa</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Laki-Laki</span>
        <div class="count green"><?php echo $total_laki; ?></div><span> Jiwa</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Perempuan</span>
        <div class="count green"><?php echo $total_perempuan; ?></div><span> Jiwa</span>
      </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
      <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Peta<small>Kabupaten Tegal</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- <canvas id="grafik"></canvas> -->
            <!-- <div class="grafik"></div> -->
            <!-- <div id="show_maps"  style="width:100%;height:100%;"></div> -->
            <?php echo $map['html']; ?>
            <?php echo $map['js']; ?>
          </div>
        </div>
      </div>
    </div>
           

      
   

<!-- </div> -->
        <!-- /page content -->



