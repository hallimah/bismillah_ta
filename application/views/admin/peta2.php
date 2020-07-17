<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'AIzaSyCAiDb83J0W2ybpSeYSiOuR2pjwNkvZHUI'
      }); //AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY asli
      google.charts.setOnLoadCallback(drawRegionsMap);
      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Population'],
		  <?php foreach($arr as $key=>$val){
		  ?>
          ['<?php echo $val['country']?>', <?php echo $val['population']?>],
		  <?php } ?>
        ]);
        var options = {};
        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>