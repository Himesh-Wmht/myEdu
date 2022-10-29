<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="shortcut icon" href="images/MY-EDU.png"/ >
<title>Achievements</title>
	
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
</head>
<?php 
  if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?>
<body>
	<?php
	include('db.php');?>

	<div class="container" style="margin-left:10%; margin-top: 0px">
	<div id="cart" class="col-md-8 col-lg-12">
		<br><br><br><br><br><br><br>
	<form class="form" action="" method="post">
			 <td>
				 <div class="form-row">
			 <div class="form-group col-lg-3">
				<label for="pro_id"><h5>Student ID</h5></label>
				 <input type="text" name="pro_id" class="form-control-file" required>
				</div>
			 </td>
				 <div class="button" style="margin-top: 12px">
					 <br>
		<input type="submit" name="view" value="View" class="btn btn-outline-dark">
		<input type="button" name="btnClear" value="Clear" class="btn btn-outline-dark">
	
				 </div>
		</div>
		</form><br>
	<div class="box11">
	<form action="" method="post" enctype="multipart/form-data">
		<h4 class="table-method">Student Achievements</h4><br/>
		<div class="table-responsive">
		<table class="table">
			<head1>
			<tr>
				<th>Student id</th>
	            <th>Student Name</th>
	            <th>Student Grade</th>
	            <th>Student Email</th>           
	            <th>Year</th>
				 <th>Achievement</th>
	            <th>Status</th>
				
			</tr>
			</head1>
			<body>
			<?php
				if(isset($_POST['viewall'])){
				
				$viewall_query = "Select * from achievement";
				$viewall_query_run = mysqli_query($con,$viewall_query);
				while($row = mysqli_fetch_array($viewall_query_run)){
			?>
					<tbody>
						<tr>
						<td>
							<?php echo $row['s_id'] ?>
							</td>
						<td>
							<?php echo $row['s_name'] ?>
							</td>
						<td>
							<?php echo $row['s_grade'] ?>
							</td>
						<td>
							<?php echo $row['s_email'] ?>
							</td>
						<td>
							<?php echo $row['year'] ?>
							</td>
						<td>
							<?php echo $row['achievement'] ?>
							</td>
						<td>
							<?php echo $row['status'] ?>
							</td>
						
						</tr>
							<?php
					
				    }
				}
				?>
						
						<?php
		//view
		if(isset($_POST['view'])){
			$s_id = $_POST['s_id'];
				$view_query = "SELECT * FROM achievement WHERE s_id = '$s_id'";
			$view_run = mysqli_query($con,$view_query);
			while($row = mysqli_fetch_array($view_run)){
				?>
		       <tr>
						<td>
							<?php echo $row['s_id'] ?>
							</td>
						<td>
							<?php echo $row['s_name'] ?>
							</td>
						<td>
							<?php echo $row['s_grade'] ?>
							</td>
						<td>
							<?php echo $row['s_email'] ?>
							</td>
						<td>
							<?php echo $row['year'] ?>
							</td>
						<td>
							<?php echo $row['achievement'] ?>
							</td>
						<td>
							<?php echo $row['status'] ?>
							</td>
						
						
						
		</tr>
		<?php
			
			}
		}if(isset($_POST['btnClear'])){
		clear();	
	}

		?>
						<?php if(isset($_POST['btnClear'])){
		clear();	
	}

?>
			</body>
				</table>
				</div>
		<input type="submit" class="btn btn-outline-dark" name="viewall" value="View all">
	</form>	
	<br><br><br>
	</div>	
		</div>

			</div>
			
    </div>
  </div>
</div>
<script type="text/javascript">var check=document.getElementById('errmsg').value;if(check!=""){alert(check)}</script>
<script type="text/javascript">var check=document.getElementById('success').value;if(check!=""){alert(check)}</script>
	

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>-->
<!--<script src="assets/demo/chart-area-demo.js"></script>-->
<!--<script src="assets/demo/chart-bar-demo.js"></script>-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <?php include('footer2.php'); ?>	
</body>
</html>
