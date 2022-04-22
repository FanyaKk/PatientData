<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawStuff() {
        var dashboard = new google.visualization.Dashboard(
          document.getElementById('programmatic_dashboard_div'));

        // We omit "var" so that programmaticSlider is visible to changeRange.
        // var programmaticSlider = new google.visualization.ControlWrapper({
        //   'controlType': 'DateRangeFilter',
        //   'containerId': 'programmatic_control_div',
        //   'options': {
        //     'filterColumnLabel': 'Donuts eaten',
        //     'ui': {'labelStacking': 'vertical'}
        //   }
        // });

        // var programmaticChart  = new google.visualization.ChartWrapper({
        //   'chartType': 'Line',
        //   'containerId': 'programmatic_chart_div',
        //   'options': {
        //     'width': 300,
        //     'height': 300,
        //     'legend': 'none',
        //     'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
        //     'pieSliceText': 'value'
        //   }
        // });
      }
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time', 'Oxygen', 'Pulse'],
          <?php
            while($row = mysqli_fetch_array($dailyrecords)) {
                $time = $row['datetime']; 
                $pulse = $row['pulse']; 
                $oxygen = $row['oxygen'];
        ?>
        ['<?php echo $time;?>', <?php echo $pulse;?>, <?php echo $oxygen;?>],
        <?php    
            }
        ?>
        ]);

        var options = {
          chart: {
            title: 'Patient Data',
            subtitle: 'Today data',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Line(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Line.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
    <div id="programmatic_dashboard_div" style="border: 1px solid #ccc"></div>
  </body>
</html>
