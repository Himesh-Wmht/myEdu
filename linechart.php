<?php
$servername="localhost";  
$username="root";  
$password="";   
$dbname="myedu"; 

$conn=new mysqli("$servername","$username","$password","$dbname");

if($conn){

}else{
    echo "Connection Failed";
}                          
?> 



<html>
  <head>
    <title>Line Charts</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Confirmed','Rejected','pending'],
          

          //PHP Code   

          <?php
              $query="select * from request";
			  $query1="SELECT * FROM  request WHERE status='pending'";
              $query2="SELECT * FROM  request WHERE status='Rejected'";
              $query3="SELECT * FROM  request WHERE status='Confirmed'";
            
            $result=mysqli_query($conn,$query);
            $result1=mysqli_query($conn,$query1);
            $result2=mysqli_query($conn,$query2);
            $result3=mysqli_query($conn,$query3);
			 
              $res=mysqli_query($conn,$query);
              while($data=mysqli_fetch_array($res)){
               // $date=$data['date'];
                $confrm=$data['Confirmed'];
                $pnding=$data['pending'];
                $rjct=$data['Rejected'];
				 
				
				
			
          ?>  
           ['<?php echo $date;?>','<?php echo $confrm;?>','<?php echo $pnding;?>','<?php echo $rjct;?>'], 
          <?php      
              }

          ?> 

 
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>