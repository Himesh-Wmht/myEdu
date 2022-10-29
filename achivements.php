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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<title>Manage Achivements</title>
</head>
	
	<?php
	include('index.php');?>
<?php
	include('navup.php');
	?>
<body>

<?php 
	include('db.php');

$student_id="";
$student_No="";
$student_Name="";
$student_grade="";
$student_email="";
$year="";
$achievement="";
$status="";
$rfile="";
$simage="";
$status="";
$arrType2=array("pdf");
$ext="";
$ext2="";
$temp="";
$temp2="";
$unique="";
$sql="";
  
function clear(){
$student_id="";
$student_No="";
$student_Name="";
$student_grade="";
$student_email="";
$year="";
$achievement="";
$status="";
$rfile="";
$status="";
$simage="";
$temp="";
$temp2="";
$sql="";

}
?>

<?php
if($con){
	
	//----------------------------------------------Auto EID Generator--------------------
	
		 $queryautoEid = "SELECT MAX(id) FROM achievement";
		
	$resultEid = mysqli_query($con,$queryautoEid);
	if(mysqli_num_rows($resultEid)){
		while($row = mysqli_fetch_row($resultEid)){
$next_Eid = $row[0]+1;
			 echo '<script> alert('.$next_Eid.')</script>';
	
	}}
	// $query11=mysqli_query($queryautoEid);
    $resultEid = mysqli_query($con,$queryautoEid);
if(mysqli_num_rows($resultEid)){
    while($row=mysqli_fetch_array($resultEid))
   {
    $ids=$row[0];
	
    }}
    echo $ids;
  if($ids){
    $su=1;
    $splitedid = preg_split('/(?<=[a-zA-z])(?=[0-9]+)/',$ids); //Split in chars and numbers
    $zeros = substr_count($splitedid[1],'0'); //Count the number of zeros before the number
   
	$unique = $splitedid[0]; //Set $unique as the chars (MOB in your case)
    $num = ($splitedid[0]+$su); //Add one to the number
    for ($i=0; $i < $zeros; $i++) { //Add to $unique the zeros that were in front of the number
      $unique .= '0';
    }
    $unique .= $num; //Add the number (572 = 571 + 1) to $unique so $unique is 'MOB000572'
}
 
 //-------------------------------insert-----------------------------------------------------
 if(isset($_POST['btnInsertj'])){
	
	 $rfile=$_FILES['rfile']['name'];
   
   if(!empty($rfile)&& $_POST['txtsno'] && $_POST['txtsname'] && $_POST['txtsgrade']&& $_POST['txtsemail'] && $_POST['txtsachievement']){
	 // $student_id= $_POST['txtsid'];
	  $student_No= $_POST['txtsno'];
	 $student_Name= $_POST['txtsname'];
	 $student_grade= $_POST['txtsgrade'];
	  $student_email= $_POST['txtsemail'];
	 $year= $_POST['txtsyear'];
	 $achievement=$_POST['txtsachievement'];
	  $temp2 = $_FILES['rfile']['tmp_name'];
	 $student_status= $_POST['txtsstatus'];

	#file name with a random number so that similar dont get replaced
    $rfile = rand(1000,10000)."-".$_FILES["rfile"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["rfile"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = 'files';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$rfile);
	$status='pending';
	
	 $path ="uploads/";
	
	 $ext2 = explode(".",$rfile);
	 if(in_array($ext2[1],$arrType2)){	 
			$sql="INSERT INTO achievement(s_id, s_name, s_grade, s_email, year, achievement, rfile, status) VALUES('".$student_No."','".$student_Name."','".$student_grade."','".$student_email."','".$year."','".$achievement."','".$rfile."','".$status."')";
			if(mysqli_query($con,$sql)){
				#$msg="<div style=color:blue;><b>New Product Inserted!</b></div>";
				move_uploaded_file($tname, $uploads_dir.'/'.$rfile);
				
				 echo '<script> alert("New Achivement Inserted!")</script>';
						
			}else{
		#$msg="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
				echo '<script> alert("Error :")</script>';
			}
	 }
	 else{
		 echo '<script> alert("Invalid File Type")</script>';
		 
	 }
   }
   else{
	 
	    echo '<script> alert("Please Insert All Text Fields")</script>';
   }
	 
 } 
 
 //search
 if(isset($_POST['btnSearchpj'])){
	 
	 
 	$student_No= $_POST['txtsno'];
	$sql="SELECT * FROM student WHERE student_id='".$student_No."'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_row($result)){
	
	 $student_No=$row[0];
	 $student_Name=$row[1];
	 $student_age=$row[2];
	 $student_grade=$row[3];
	 $student_status=$row[6];
	 $student_email=$row[7];
	
			
			$simage = "<img src=$simage width=220 height=180/>";
			$rfile = "<a href=$rfile target=�_blank�><br>Open PDF</a>";
			
		    }
     }
	  else{
		  echo '<script> alert("Please Insert Id!")</script>'; 
	 }
 
  }
  
  //update
  
  if(isset($_POST['btnUpdatej'])){
   	 $student_No= $_POST['txtsno'];
	 $student_name= $_POST['txtsname'];
	 $student_grade= $_POST['txtsgrade'];;
	 $student_email= $_POST['txtsemail'];
	 $year= $_POST['txtsyear'];
	 $achievement= $_POST['txtsachievement'];
	 $student_status= $_POST['txtsstatus'];
	 $temp2 = $_FILES['rfile']['tmp_name'];

	   #file name with a random number so that similar dont get replaced
    $rfile = rand(1000,10000)."-".$_FILES["rfile"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["rfile"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = 'files';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$rfile);
	$status='pending';

	
	
	
	 $rfile=$_FILES['rfile']['name'];
	 $path ="uploads/";
	
	 $ext2 = explode(".",$rfile);

$sql="UPDATE achievement SET s_name='".$student_Name."', s_grade='".$student_grade."', s_email='".$student_email."', year='". $year."', achievement='". $achievement."', rfile='".$rfile."', status='". $status."' WHERE id=".$student_id."";
		
		if(mysqli_query($con,$sql)){
			$msg="<div style=color:green;><b>Product Updated!</b></div>";
			
			move_uploaded_file($tname, $uploads_dir.'/'.$rfile);
			echo '<script> alert("Achivement Updated!")</script>';
			clear();
			
		}else{
		     echo '<script> alert("Please Insert All Text Fields")</script>';
		}
	}		
 
}

//delete
if(isset($_POST['btnDeletej'])){
	 $student_id= $_POST['txtsid'];
	 
    	$sql="DELETE FROM achievement WHERE id=".$student_id."";
		
		if(mysqli_query($con,$sql)){
			$msg="<div style=color:orange;><b>Product Deleted!</b></div>";
			 echo '<script> alert("Achivement Deleted!")</script>';
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

       <div style="background-color:#000000; width:100%; height:auto;"><br/>
       <h2 align="center" style="color:#92A4A4; margin-left: 14%;">Student Achievement</h2><br/><br/>
      
<div align="center">

<div align="center" class="card" style="width:60%; height:auto; margin-left: 15%;"  >
	
    <h4  class=" badge badge-dark card-header white-text text-center py-4">
        <strong><h4>Manage Student Achivements</h4></strong>
    </h4>
    <!-- Form -->
    <form class="form-inline" style="background-color: #000000:" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<div class="card-body" style="margin-top: -180px;">
	 <div class="table-responsive" style=" width: 100%; margin-left: 0%; ">
	<table class="table">
   
			   <tr><td>	
      <label><p>ID</p></label></td><td>
      <input type="text"  class="form-control" style="width:70%;  color:#1DBC2F; text-align:center" 
       placeholder="Next id is: <?php echo $next_Eid ?> "  name="txtsid" value="<?php echo $student_id ?>" readonly>
			</td> 
		</tr>
				   
				  
	
      <br><tr><td>
		
		<label><p>STUDENT NO</p></label></td><td>
       	<input type="text"  class="form-control" style="width:70%; color:#1DBC2F; text-align:center" 
       placeholder="Student No"  name="txtsno" value="<?php echo $student_No?>">
  	  
		</td>
		 </tr>
		
				   
     <br><tr><td>
			
		<label style="align-content: flex-start"><p>STUDENT NAME</p></label></td><td>
       	<input type="text"  class="form-control" style="width:70%; color:#1DBC2F; text-align:center" 
       placeholder="Student Name"  name="txtsname" value="<?php echo $student_Name ?>" >
  	   
				 </td></tr>
		
     <br>
        <tr><td>
	
		 <label><p>GRADE</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Student Grade"   name="txtsgrade" value="<?php echo $student_grade ?>">
        
			</td> </tr>
	<br>
      
        <tr><td>
	
		 <label><p>EMAIL</p></label></td><td>
       <input type="email"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Student Email" id="txtsemail"  name="txtsemail" value="<?php echo $student_email ?>">
        <span id="emailresload"></span>
        <span id="emailres"></span>
			</td> </tr>
	<br>
        <tr><td>
	
		 <label><p>YEAR</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Year"   name="txtsyear" value="<?php echo $year ?>">
        
			</td> </tr>
           <br>
		  <tr><td>
	
		 <label><p>ACHIEVEMENT</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Achivements"   name="txtsachievement" value="<?php echo $achievement?>">
        
			</td> </tr>
			<br>
			<tr><td>	
         <label class="form-label" for="customFile"><p>DOCUMENTS(Only Pdf s are allowed)</p></label></td><td>
          <input type="file" class="form-control" id="customFile" name="rfile"  />
			<br>
            
         </td></tr>
           
           <br>
		<tr><td>
	
		 <label><p>STATUS</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Status"   name="txtsstatus" value="<?php echo $status?>">
        
			</td> </tr>
           <br>
    </table>
	</div>
	</div>
    <div class="form-inline" style=" margin-left: 20%;"  >
	<tr>		
	<td>
			
        <button style="width:80px;" class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="btnInsertj">
        Insert</button></td><td>&nbsp;&nbsp;
        <button style="width:80px;" class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="btnSearchpj">
        Search</button></td><td>&nbsp;&nbsp;
        <button style="width:80px;"  class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="btnUpdatej">
        Update</button></td><td>&nbsp;&nbsp;
        <button style="width:80px;" class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="btnDeletej">
        Delete</button></td><td>&nbsp;&nbsp;
        <button style="width:80px;" class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="btnClearj">
        Clear</button></td><td>&nbsp;&nbsp;
        <button style="width:80px;" class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="btnViewAllj">
         View</button></td>&nbsp;&nbsp;

		</tr>	
</div>
   </div>
</form>
	  
    
<!-- Form -->

<?php 
//display the view all products
if(isset($_POST['btnViewAllj'])){
$sql="SELECT * FROM achievement";
 $result= mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
	 ?>
	<table align="right" style="width: 83%;" cols="4" class="table table-striped table-dark">
       		<tr style="color:#FFFFFF;" align="center" >
            	<th scope="col">ID</th>
                <th scope="col">Student No</th>
                <th scope="col">Name</th>
                <th scope="col">Grade</th>
                <th scope="col">Email</th>
                <th scope="col">Year</th>
                <th scope="col">achievement</th>
				<th scope="col">rfile</th>
				<th scope="col">status</th>
              
            </tr>
      <?php
	  //while loop to fetch to show the all the details of database 
	   while($row=mysqli_fetch_assoc($result)){
		?>
         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <tr style="color:#FFFFFF;" align="center">
            	<td><?php echo $row['id'];?></td>
                <td><?php echo $row['s_id'];?></td>
                <td><?php echo $row['s_name'];?></td>
                <td><?php echo $row['s_grade'];?></td>
                <td><?php echo $row['s_email'];?></td>
				<td><?php echo $row['year'];?></td>
				<td><?php echo $row['achievement'];?></td>
				<td><?php echo $row['rfile']; ?><a href="files/<?php echo $row['rfile']?>" target=�_blank�><br>Open PDF</a></td>
				<td><?php echo $row['status'];?></td>
              </tr>
            
        </form>
		
		 <?php 
	   }
	   ?>
		</div></div>
	   </table>
       <?php
 }
}
  ?>
  
<!-- -->

</div>
</body>
</html>