<?php
  $con = mysqli_connect("localhost","root","","myedu");
  if($con){
   
  }
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['student_name', 'student_grade'],
         <?php
         $sql = "SELECT * FROM student";
         $eqipmt = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($eqipmt)) {
            echo"['".$result['student_name']."',".$result['student_grade']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Student and Grades'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 540px; height: 500px;"></div>
  </body>
</html>