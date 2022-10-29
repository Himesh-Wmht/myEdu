<?php
$server = "localhost";
$user = "root";
$pass ="";
$database = "myedu";
$con = mysqli_connect($server,$user,$pass,$database);
  
    echo '<script> alert ("Welcome to the myEdu Control Unit")</script>';
  ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAxisTickColors);


      function  drawAxisTickColors(){

        var data = google.visualization.arrayToDataTable([
          ['s_name', 's_grade'],
         <?php
         $sql = "SELECT * FROM request";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['s_name']."',".$result['s_grade']."],";
          }

        ?>
        ]);

             var options = {
				
        title: 'Students/grades in requests',
        chartArea: {width: '50%', height: '40%'},
        hAxis: {
          title: 'Grades',
          minValue: 0,
          textStyle: {
            bold: true,
            fontSize: 9,
            color: '#00000'
          },
          titleTextStyle: {
            
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: 'Students',
          textStyle: {
            fontSize: 1,
         
            color: 'white'
          },
          titleTextStyle: {
            fontSize: 14,
           
            color: '#848484'
          }
        }
      };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
      }
    </script>
  </head>
	
  <body class="card-body">
    <div id="chart_div" style="width: 800px; height: 600px;"></div>
  </body>
</html>
