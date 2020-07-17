<!DOCTYPE html>
<html>
  <head>
    <title>Single layer | CARTO</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    
    <!-- Load Leaflet CSS -->
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet">
    
    <!-- Load our styles -->
    <link href="<?php echo base_url() ?>assets/visualisasi/styles.css" rel="stylesheet">
    
    <!-- Load Leaflet and Carto libraries -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://libs.cartocdn.com/carto.js/v4.2.0/carto.min.js"></script>
    
    <!-- Load our JavaScript -->
    <script defer src="<?php echo base_url() ?>assets/visualisasi/script.js"></script>
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>