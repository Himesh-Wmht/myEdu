<style>
	.form-inline{
		display: flex;
		flex-flow: row wrap;
		
	}
@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }

  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}


</style>


<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
	<title>request table</title>

</head>
	 <style>
        .product{
            border: 8px solid #eaeaec;
            margin: 2px 3px 8px 2px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table,th,tr{
              text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>

<body>
	<?php
	include('db.php');?>

	<div class="container" style="margin-left:15%; margin-top: 35px">
	<div id="cart" class="col-md-8 col-lg-12">
		
	<form class="form" action="" method="post">
			 <td>
				 <div class="form-row">
			 <div class="form-group col-lg-3">
				<label for="pro_id"><h5>Grade</h5></label>
				 <input type="text" name="grade" class="form-control-file" required>
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
		<h4 class="table-method">Customer Details</h4><br/>
		<div class="table-responsive">
		<table class="table">
			<head1>
			<tr>
				<th>Document Name</th>
	            <th>Uploaded Date</th>
				<th>Grade</th>
				<th>Class</th>
				<th>View Tutorial</th>
				
			</tr>
			</head1>
			<body>
			<?php
				if(isset($_POST['viewall'])){
				$viewall_query = "Select * from files";
				$viewall_query_run = mysqli_query($con,$viewall_query);
				while($row = mysqli_fetch_array($viewall_query_run)){
			?>
					<tbody>
						<tr>
						<td>
							<?php echo $row['file_name'] ?>
							</td>
						<td>
							<?php echo $row['uploaded_on'] ?>
							</td>
						<td>
							<?php echo $row['grade'] ?>
							</td>
						<td>
							<?php echo $row['class'] ?>
							</td>
						<td>
							<?php echo $row['file_name']; ?><a href="files/<?php echo $row['file_name']?>" target=”_blank”><br>Open PDF</a>
							</td>
						
						</tr>
							<?php
					
				    }
				}
				?>
						
						<?php
		//view
		if(isset($_POST['view'])){
			$grade = $_POST['grade'];
				$view_query = "SELECT * FROM files WHERE grade = '$grade'";
			$view_run = mysqli_query($con,$view_query);
			while($row = mysqli_fetch_array($view_run)){
				?>
		       <tr>
						<td>
							<?php echo $row['file_name'] ?>
				   </td>
						<td>
							<?php echo $row['uploaded_on'] ?>
				   </td>
						<td>
							<?php echo $row['grade'] ?>
				   </td>
					    <td>
							<?php echo $row['class'] ?>
				   </td>
				   <td>
							<?php echo $row['file_name']; ?><a href="files/<?php echo $row['file_name']?>" target=”_blank”><br>Open PDF</a>
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
	</div>	
		</div>
			</div>
	</body>
</body>
	</html>


