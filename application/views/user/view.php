<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-3">
        <div class="x_panel">
          <div class="x_title">
            <h2>Total PMKS</h2>
            <div class="clearfix"></div>
          </div>
          
          <div class="media-body">
            <h3><?php echo $total_pmks; ?> <small>Jiwa</small></h3>
          </div>
        </div>
        
        <div class="x_panel scroll">
          <div class="x_title">
            <h2>Total Kecamatan</h2>
            <div class="clearfix"></div>
          </div>
          
          <div class="media-body">
            
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
          </div>
        </div>
      </div>
      
      <div class="col-md-9 col-sm-8 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          <h2>Peta<small>Kabupaten Tegal</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- <div id="echart_world_map" style="height:450px;"></div> -->
            <?php echo $map['html']; ?>
            <?php echo $map['js']; ?>
          </div>
        </div>
      </div>
      
      <!-- <div class="col-md-3">
        <div class="x_panel scroll2">
          <div class="x_title">
            <h2>Kecamatan</h2>
            <div class="clearfix"></div>
          </div>
          <ul class="list-unstyled top_profiles scroll-view">
          php foreach ($total_perdesa as $tpk) :?>
            <li class="media event">
              <a class="pull-left border-green profile_thumb">
              <i class="fa fa-group green"></i></a>
              <div class="media-body">
                <a class="title" href="#">php echo $tpk->nama_desa ?></a>
                <p><strong>php echo $tpk->total ?></strong> Jiwa</p>
              </div>
            </li>
            php endforeach; ?>
          </ul>
        </div>
      </div> -->
    </div>
  </div>
</div>
<!-- /page content -->
