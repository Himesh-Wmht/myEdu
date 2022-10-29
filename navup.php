
<!doctype html>
<html>
 <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
	 <link rel="shortcut icon" href="uploads/MY-EDU.png">
        <title>MYEDU Control Unit</title>
        <link href="styles.css" rel="stylesheet" />
        <link href="js/scripts.js" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>

	
<body>
	
      <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src="uploads/MY-EDU.png" style="width: 120px; height: 65px">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars" onClick="openmenu()"></i>
		  </button>       
		  			
	
 <li class="nav-link">
    <a  href="feedback.php" style="color: white;"><i class="fa fa-comments" aria-hidden="true"></i> Customer Feedback</a>
</li>
	<li class="nav-link">
		<?php 
		if(!isset($_SESSION['aduseremail'])){
          echo "<a  href='login.php' style='color: white'><i class='fa fa-key' aria-hidden='true'></i> Login</a>";
		}else{
			echo "<a href='logoutad.php' style='color: white'><i class='fa fa-sign-out' aria-hidden='true'></i> Logout</a> ";
		}
	?>	</li>
 </nav>   

    

	
<!--
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
-->
</body>
</html>