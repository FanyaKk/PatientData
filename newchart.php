<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'controls']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var dashboard = new google.visualization.Dashboard(
          document.getElementById('programmatic_dashboard_div'));

        // We omit "var" so that programmaticSlider is visible to changeRange.
        var programmaticSlider = new google.visualization.ControlWrapper({
          'controlType': 'ChartRangeFilter',
          'containerId': 'programmatic_control_div',
          'options': {
            'filterColumnLabel': 'Time',
            'ui': {chartType: 'LineChart', 
              chartOptions: {pointSize: 10}
            }
          }
        });

        var programmaticChart  = new google.visualization.ChartWrapper({
          'chartType': 'Line',
          'containerId': 'programmatic_chart_div',
          'options': {
            'legend': 'none',
            'pieSliceText': 'value',
            'colors': ['red', 'blue']
          }
        });
        var data = google.visualization.arrayToDataTable([
          ['Time', 'Pulse', 'Oxygen'],
          <?php
            while($row = mysqli_fetch_array($dailyrecords)) {
                $time = $row['datetime']; 
                $pulse = $row['pulse']; 
                $oxygen = $row['oxygen'];
                $formatedDate = date_create($time);
        ?>
        [{v: new Date('<?php echo $time;?>')}, <?php echo $pulse;?>, <?php echo $oxygen;?>],
        <?php    
            }
        ?>
        ]);

        dashboard.bind(programmaticSlider, programmaticChart);
        dashboard.draw(data);

      }

    </script>
  </head>
  <body>
    <div id="programmatic_dashboard_div" style="border: 1px solid #ccc">
      <table class="columns">
        <tr>
        <div id="programmatic_chart_div"></div>    
        <div id="programmatic_control_div"></div>  
        </tr>
      </table>
    </div>
  </body>
</html>