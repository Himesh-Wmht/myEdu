<style type="text/css">
		
		.wrapper{
			height: 230px;
			width:300px;
			background-color: skyblue;
			margin:auto;
			text-align: center;
			border:1px solid white;
			box-shadow: 2px 2px 10px gray;
			
		}
		h1{
		    background-color: mediumseagreen;
			color: white;
			border-bottom: 2px solid white;}
     	h3{
			font-size:2em;
			
		}
		h1,h3{
			padding: 20px;
			margin: 1%;
		}
	
		body{
    margin-top:20px;
    background:#FAFAFA;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
	</style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="uploads/MY-EDU.png">
        <title>myEdu Control Unit</title>
        <link href="styles.css" rel="stylesheet" /> 
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

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

?>

<?php

$query="SELECT * FROM  student ";
$result=mysqli_query($conn,$query);

if(!$result) { 
        die("Retriving Query Error<br>".$query);
}

$total_equipments = mysqli_num_rows($result);
?>
	<?php

$query="SELECT * FROM  admin ";
$result=mysqli_query($conn,$query);

if(!$result) { 
        die("Retriving Query Error<br>".$query);
}

$total_visitors = mysqli_num_rows($result);
?>
<?php

$query="SELECT * FROM  student ";
$query1="SELECT * FROM  student WHERE student_status='Presenting'";
$query2="SELECT * FROM  request WHERE status='Confirmed'";
$query3="SELECT * FROM  request WHERE status='rejected'";
$query4="SELECT * FROM  admin";
$result=mysqli_query($conn,$query);
$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);
$result3=mysqli_query($conn,$query3);
$result4=mysqli_query($conn,$query4);

if(!$result) { 
        die("Retriving Query Error<br>".$query);
}

$total_requests = mysqli_num_rows($result);
$total_reqpending = mysqli_num_rows($result1);
$total_reqconfirm = mysqli_num_rows($result2);
$total_reqreject = mysqli_num_rows($result3);
$total_admins = mysqli_num_rows($result4);
?>
	

<body>
	<?php include('index.php')?>
	<?php include('navup.php')?>

    <body class="sb-nav-fixed">
      
        <div id="layoutSidenav">
        
            <div id="layoutSidenav_content">
                <main>
                   
<br>
<div class="row">
    <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Students</h6>
                    <h2 class="text-right"><?php echo $total_equipments; ?><i class="fa fa-cart-plus f-left"></i><span></span></h2>
                    
                </div>
            </div>
        </div>
	
	   <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-rocket f-left" style="font-size: 25px;"></i>Requests: <?php echo $total_requests; ?></h6>
                    <h6 class="text-left">Pending :<span><?php echo $total_reqpending; ?>| Confirmed :<span><?php echo $total_reqconfirm;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |Rejected :<span><?php echo $total_reqreject; ?></span></h6>
                   
                </div>
            </div>
        </div>
	  <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Registered Users</h6>
                    <h2 class="text-right"><i class="fa fa-users f-left"></i> <span><?php echo $total_visitors; ?></span></h2>
                    
                </div>
            </div>
        </div>
	  <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Admin Users</h6>
                    <h2 class="text-right"><i class="fa fa-users f-left"></i> <span><?php echo $total_admins; ?></span></h2>
                    
                </div>
            </div>
        </div>
	
		</div>
 
        </main> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAxisTickColors);


      function  drawAxisTickColors(){

        var data = google.visualization.arrayToDataTable([
          ['s_name','id'],
         <?php
         $sql = "SELECT * FROM student";
         $fire = mysqli_query($conn,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['s_name']."',".$result['id']."],";
          }

        ?>
        ]);

             var options = {
				
        title: 'Student and Count',
        chartArea: {width: '60%', height: '60%'},
        hAxis: {
          title: 'Stock',
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
          title:'Equipments',
          textStyle: {
            fontSize:1,
     
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
  <br><br>
 
				      <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Student-Request Chart
                                    </div>
                                 
   
   <div class="card-body" style="margin-left: -60px;"><?php include('chart (2).php')?></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                       Student Pie Chart
                                    </div>
                                    <div class="card-body" style="margin-left: -20px;"><?php include('pie.php')?></div>
                                </div>
                            </div>
                        </div>
				<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Spogo IMS</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
<!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
-->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
		</head>
    </body>
</html>
