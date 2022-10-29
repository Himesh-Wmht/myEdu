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
$s_email="";
$student_password="";
$rfile="";
$status="";
$arrType=array("jpg","jpeg","png");
$ext="";
$temp="";
$getstock="";

?>

<?php
	
if($con){
	
	 //insert
 if(isset($_POST['btnInsertj'])){
	
	 	//$quantity= $_POST['txtqun'];
	// $valuestck="";
	 	//$Eid= $_POST['txteid'];
	 
	// echo '<script> alert('.$quantity.'   '.$Eid.')</script>';
	
	 $query="SELECT status FROM student WHERE student_id='".$student_id."'";
			$getstudent = mysqli_query($con,$query);
			if(mysqli_num_rows($getstock)){
			while($row = mysqli_fetch_array($getstock)){
				
				$valuestatus=$row['status'];
			//	if($valuestck>=$quantity){
			if($valuestck>=$quantity){
				$final=$valuestck-$quantity;
				//echo $final;
				echo '<script> alert('.$final.')</script>';
				}else{
					echo '<script> alert("Out of Stock!")</script>';
				}
 		}
     }
 }

 //search
 if(isset($_POST['btnSearchpj'])){
	 
 	$reqno= $_POST['txtreqid'];
	$sql="SELECT tblrequests.*, tblreq_equipments.*  FROM tblrequests, tblreq_equipments WHERE tblrequests.reqno = tblreq_equipments.reqno AND tblrequests.reqno ='".$reqno."'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$sprtclub = $row['sportsclub'];
			$Eid = $row['Eid'];
			$regno = $row['regisno'];	
			$district = $row['district'];	
			$email = $row['email'];
			$Edate = $row['date'];
			$rfile = $row['rfile'];
			$quantity = $row['quantity'];
			$status = $row['status'];
			

		    }
		
		}
	
     
	  else{
		  echo '<script> alert("Please Insert Id!")</script>'; 
	 }
 
  }
  
  //update
  
  if(isset($_POST['btnUpdatej'])){
   	 $Eid= $_POST['txtId'];
	 $Ename= $_POST['txtName'];
	 $Cid= $_POST['txtCid'];
	 $Estock= $_POST['txtstock'];
	 $temp = $_FILES['imageUpload']['tmp_name'];
	 $Edate= $_POST['txtdate'];
	 $Eimage=$_FILES['imageUpload']['name'];
	 $path ="uploads/";
	 $ext = explode(".",$Eimage);
	 
$sql="UPDATE tblequipments SET Ename='".$Ename."', Cid=".$Cid.", stock=".$Estock.",
Eimage='".$path.$Eimage."',Date='".$Edate."' WHERE Eid='".$Eid."'";
		
		if(mysqli_query($con,$sql)){
			$msg="<div style=color:green;><b>Product Updated!</b></div>";
			move_uploaded_file($temp,$path.$Eimage);
			echo '<script> alert("Product Updated!")</script>';
			clear();
			
		}else{
		     echo '<script> alert("Please Insert All Text Fields")</script>';
		}
	}		
 
 
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
    <form class="form-inline" style="color:aliceblue; text-decoration-style: solid; margin-left: -5%;"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

	
<div class="card-body">
			<div class="table-responsive" style=" height:100%; margin-left: 6%; overflow: auto; color: black;">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			<tr>
				<th scope="col">Student Id</th>
	            <th scope="col">student Name</th>
				<th scope="col">Email</th>
				<th scope="col">Student Grade</th>
				<th scope="col">Student Class</th>
				<th scope="col">Type</th>
				<th scope="col">Message</th>
				<th scope="col">Status</th>
				<th scope="col">File</th>
			</tr>
			</thead>
				<tfoot>
			<tr>
				<th scope="col">Student Id</th>
	            <th scope="col">student Name</th>
				<th scope="col">Email</th>
				<th scope="col">Student Grade</th>
				<th scope="col">Student Class</th>
				<th scope="col">Type</th>
				<th scope="col">Message</th>
				<th scope="col">Status</th>
				<th scope="col">File</th>
			</tr>
			</tfoot>
			<body>
					<tbody>
					


					<?php
					if (isset($_SESSION['useremail'])){
	$s_email= $_SESSION['useremail'];

				
						$viewall_query = "Select * from  request WHERE s_email='$s_email'";
						//$viewall_query = "SELECT tblrequests.*, tblreq_equipments.*  FROM tblrequests, tblreq_equipments WHERE tblrequests.reqno = tblreq_equipments.reqno AND tblreq_equipments.status2='pending'";
						$viewall_query_run = mysqli_query($con,$viewall_query);
						while($row = mysqli_fetch_array($viewall_query_run)){
					?>
						<tr>
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
							<?php echo $row['rfile'] ?>
					
							<?php echo $row['rfile']; ?><a href="files/<?php echo $row['rfile']?>" target=”_blank”><br>Open PDF</a>
							</td>
					
						 
						</tr>
			<?php }} ?>		 
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

$sql="SELECT * FROM  request";
 $result= mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
	 ?>
	<table align="right" style="width: 100%;" class="table table-striped table-dark" >
       		<tr style="color:#FFFFFF;" align="center" >
            		
				<th scope="col">Student Id</th>
	            <th scope="col">student Name</th>
				<th scope="col">Email</th>
				<th scope="col">Student Grade</th>
				<th scope="col">Student Class</th>
				<th scope="col">Type</th>
				<th scope="col">Message</th>
				<th scope="col">Status</th>
				<th scope="col">File</th>
			
            </tr>
      <?php
	  //while loop to fetch to show the all the details of database 
	   while($row=mysqli_fetch_assoc($result)){
		  // $getrfile=$row['rfile'];
		?>
         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <tr style="color:#FFFFFF;" align="center">
            	
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


