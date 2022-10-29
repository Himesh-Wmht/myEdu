<?php include('function.php'); 
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="navi.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
</head>

<body>
	<div class="bg">
	<ul class="nav justify-content-center">
	<li class="nav"><img class="logo" src="images/logo2.png" width="90" height="80" alt=""><h1><b>Creative Jewellers</b></h1></li>
		</div>
		
	


	<li>
	<a class='btn btn-light' href='Insert_product.php'><i class='fa fa-product-hunt'></i> insert and update</a>
	</li>
	<li>
	<a class='btn btn-light' href='dlt&view.php'><i class='fa fa-product-hunt'></i> view and delete</a>
	</li>
  <li class="nav-item">
    <a class="btn btn-light" href="feedback.php"><i class="fa fa-comments" aria-hidden="true"></i> Customer Feedback</a>
  </li>
	<li class="nav-item">
		<?php 
		if(!isset($_SESSION['Ad_Email'])){
          echo "<a class='btn btn-light' href='Admin login.php'><i class='fa fa-key' aria-hidden='true'></i> Login</a>";
		}else{
			echo "<a class='btn btn-light' href='logout.php'><i class='fa fa-sign-out' aria-hidden='true'></i> Logout</a> ";
		}
		?>
  </li>

	
	
    
    </ul>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
</body>
</html>