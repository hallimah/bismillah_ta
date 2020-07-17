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
        <div class="count green"><?php echo $total_laki; ?></div> Jiwa</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Perempuan</span>
        <div class="count green"><?php echo $total_perempuan; ?></div> Jiwa</span>
      </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
      <div class="col-md-3">
        <div class="x_panel scroll">
          <div class="x_title">
            <h2>Jenis PMKS</h2>
            <div class="clearfix"></div>
          </div>

          <div class="media-body">
            <?php foreach ($total_jenis as $tpk) :?>
            <li class="media event">
              <a class="pull-left border-green profile_thumb">
              <i class="fa fa-group green"></i></a>
              <div class="media-body">
                <a class="title" href="#"><?php echo $tpk->jenis_pmks?></a>
                <p><strong><?php echo $tpk->total ?></strong> Jiwa</p>
              </div>
            </li>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>World Map</h2>
            <div class="clearfix"></div>
          </div>
          
          <div class="x_content">
            <div id="world-map-gdp" style="height:320px;"></div>
          </div>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="x_panel scroll">
          <div class="x_title">
            <h2>Kecamatan</h2>
            <div class="clearfix"></div>
          </div>
          
          <ul class="list-unstyled top_profiles scroll-view">
            <?php foreach ($total_perkecamatan as $tp) :?>
            <li class="media event">
              <a class="pull-left border-aero profile_thumb">
              <i class="fa fa-map-marker aero"></i></a>
              <div class="media-body">
                <a class="title" href="#"><?php echo $tp->nama_kecamatan?></a>
                <p> <?php echo $tp->total ?> <small>Jiwa</small></p>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

</div>
        <!-- /page content -->



