
<?php
	//create connection
	
	$host ="localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "myedu";
	
	$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	
	//checking the connection
	if(mysqli_connect_errno()){
		die
			('Database connection failed'.mysqli_connect_error());
	}
$qqq ="SELECT * FROM request";

?>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['id', 's_name'],
      <?php
      
          while($row = mysqli_fetch_assoc($conn,$qqq)){
            echo "['".$row['s_name']."', ".$row['id']."],";
          }
      
      ?>
    ]);
    
    var options = {
        title: 'Most Popular Programming Languages',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <!-- Display the pie chart -->
    <div id="piechart"></div>
</body>
</html>