
        <!-- page content -->
        <!-- <div class="right_col" role="main">
          <div class="">
 

            <div class="row">
            

              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>World Map</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_world_map" style="height:500px;"></div>

                  </div>
                </div>
              </div>

            
            </div>
          </div> -->
      
        <!-- /page content -->


<html>
  <head>
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />	
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
 
  </head>
  <body>
  <?php echo $map['html']; ?>
 <?php echo $map['js']; ?>
  </body>
</html>