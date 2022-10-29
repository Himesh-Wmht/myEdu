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
	<link rel="shortcut icon" href="uploads/logo3size1.png">
	<title>MANAGE REQUESTS</title>
</head>
	
	<?php
	include('index.php');?>
<?php
	include('navup.php');
	?>
<body>

<?php 
	include('db.php');
	
	$error_msg=isset($_GET['error']) ? $_GET['error'] : '';
	$success_msg=isset($_GET['success'])  ? $_GET['success'] : '';
//	if($_GET['error']==""){$error_msg="";}else{
//		$error_msg=$_GET['error'];
//	//echo '<script> alert('.$error_msg.')</script>';
//	}
//	if($_GET['success']==""){$success_msg="";}else{
//		$success_msg=$_GET['success'];
//	//echo '<script> alert('.$success_msg.')</script>';
//	}
$reqno="";

$student_id="";
$student_name="";
$student_age="";
$student_grade="";
$student_dob="";
$student_status="";
$student_email="";
$student_password="";
$rfile="";
$status="";
$arrType=array("jpg","jpeg","png");
$ext="";
$temp="";
$getstock="";

function clear(){
$student_id="";
$student_name="";
$student_age="";
$student_grade="";
$student_dob="";
$student_status="";
$student_email="";
$student_password="";
$rfile="";
$status="";
$sql="";

}
?>

<?php
	
if($con){

  
 	
 
 
}

//delete
if(isset($_POST['btnDeletej'])){
	 $Eid= $_POST['txtId'];
	 
    	$sql="DELETE FROM tblequipments WHERE Eid='".$Eid."'";
		
		if(mysqli_query($con,$sql)){
			$msg="<div style=color:orange;><b>Product Deleted!</b></div>";
			 echo '<script> alert("Product Deleted!")</script>';
			clear();
		}else{
		   echo '<script> alert("Please Insert Id")</script>';
		}
	}

//clear button

if(isset($_POST['btnClear'])){
		clear();	
	}

?>
<br><br><br>
	  <input type="hidden" name="errmsg" value="<?php echo $error_msg;?>" id="errmsg"/>
	  <input type="hidden" name="success" value="<?php echo $success_msg;?>" id="success"/>


	

    <!-- Form -->
    <form class="form-inline" style="color:aliceblue; text-decoration-style: solid; margin-left: 12%;"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

	
<div class="card-body">
			<div class="table-responsive" style=" height:100%; margin-left: 6%; overflow: auto; color: black;">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			<tr>
				<th scope="col">Request Id</th>
				<th scope="col">Student Id</th>
	            <th scope="col">student Name</th>
				<th scope="col">Student Email</th>
				<th scope="col">Student Grade</th>
				<th scope="col">Student Class</th>
				<th scope="col">Types</th>
				<th scope="col">Note</th>
				<th scope="col">Status</th>
				<th scope="col">File</th>
				<th scope="col">Action</th>
			</tr>
			</thead>
				<tfoot>
			<tr>
				<th scope="col">Request Id</th>
				<th scope="col">Student Id</th>
	            <th scope="col">student Name</th>
				<th scope="col">Student Email</th>
				<th scope="col">Student Grade</th>
				<th scope="col">Student Class</th>
				<th scope="col">Types</th>
				<th scope="col">Note</th>
				<th scope="col">Status</th>
				<th scope="col">File</th>
				<th scope="col">Action</th>
			</tr>
			</tfoot>
			<body>
					<tbody>
					<?php
				
						$viewall_query = "Select * from  request WHERE status='pending'";
						//$viewall_query = "SELECT tblrequests.*, tblreq_equipments.*  FROM tblrequests, tblreq_equipments WHERE tblrequests.reqno = tblreq_equipments.reqno AND tblreq_equipments.status2='pending'";
						$viewall_query_run = mysqli_query($con,$viewall_query);
						while($row = mysqli_fetch_array($viewall_query_run)){
					?>
						<tr>
						<td>
							<?php echo $row['id'] ?>
							</td>
						<td>
							<?php echo $row['s_id'] ?>
							</td>
						<td>
							<?php echo $row['s_name'] ?>
							</td>
						<td>
							<?php echo $row['s_email'] ?>
							</td>
						<td>
							<?php echo $row['s_grade'] ?>
							</td>
						<td>
							<?php echo $row['s_class'] ?>
							</td>
						<td>
							<?php echo $row['s_type'] ?>
							</td>
						<td>
							<?php echo $row['other'] ?>
							</td>
						<td>
							<?php echo $row['status'] ?>
							</td>
						
						<td>
							<?php echo $row['rfile']; ?><a href="files/<?php echo $row['rfile']?>" target=”_blank”><br>Open PDF</a>
							</td>
						<td>
				<?php if($row['status']!='pending'){echo "Not pending";}else{
				?><a href="<?php echo'http://localhost/Finale/approvereq.php?id='.$row['id'].'&&s_name=' .$row['s_name'].'&&s_grade=' .$row['s_grade'].'&&s_type=' .$row['s_type'].'&&s_class=' .$row['s_class'].'&&s_email=' .$row['s_email']?>"><i class="fa fa-check"></i></a>&nbsp;
				<a href="<?php echo'http://localhost/Finale/reject.php?id='.$row['id'].'&&s_name=' .$row['s_name'].'&&s_grade=' .$row['s_grade'].'&&s_type=' .$row['s_type'].'&&s_class=' .$row['s_class'].'&&s_email=' .$row['s_email']?>"><i class="fa fa-times " style="color: red"></i></a>
				<?php } ?>
						</td>
						 
						</tr>
			<?php } ?>		 
			</tbody>
			
		</table>
			 
	</div>		 
		</div>
	 <div class="card-body" style="margin-left: 400px; margin-top:0;" >
		<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalCenter">
 		 Requests
		</button>
	</div>	
</form>
	  
<!-- Button trigger modal -->

<!--------------------------------------- Modal ------------------------------------------------------------>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<!--<div class="modal fade displaycontent col-md-12"   id="exampleModalCenter">-->
  <div class="modal-dialog modal-xl "  role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Customer Requests</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
	<form action="" method="post" enctype="multipart/form-data" >
		
		<div class="table-responsive" style=" height:400px; overflow: auto;">
		
			<?php 
//display the view all products

$sql="SELECT * FROM   tblrequests";
 $result= mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
	 ?>
	<table align="right" style="width: 100%;" class="table table-striped table-dark" >
       		<tr style="color:#FFFFFF;" align="center" >
            	<th scope="col">Request No</th>
                <th scope="col">Sports Club</th>
                <th scope="col">Register no</th>
                <th scope="col">District</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">File</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
            </tr>
      <?php
	  //while loop to fetch to show the all the details of database 
	   while($row=mysqli_fetch_assoc($result)){
		  // $getrfile=$row['rfile'];
		?>
         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <tr style="color:#FFFFFF;" align="center">
            	<td><?php echo $row['reqno'];?></td>
                <td><?php echo $row['sportsclub'];?></td>
                <td><?php echo $row['regisno'];?></td>
				<td><?php echo $row['district'];?></td>
				<td><?php echo $row['mobno'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['rfile']; ?><a href="files/<?php echo $row['rfile']?>" target=”_blank”><br>Open PDF</a></td>
				<td><?php echo $row['status'];?></td>
				<td><?php echo $row['date'];?></td>
            </tr>
            
        </form>
		
		 <?php 
	   }
	   ?>
	   </table>
       <?php
 }

  ?>
  
				</div>
		
	</form>	
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- -->
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
</body>
	</html>


