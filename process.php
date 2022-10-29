
<?php session_start();
if(!isset($_SESSION['aduseremail'])){
	header('Location: login.php');
}?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="images/MY-EDU.png"/ >
<title>ADD TUTORIALS</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
<?php
	include('index.php');?>
<?php
	include('navup.php');
	?>

<?php

include('db.php');
if($con){
if(isset($_POST['submit'])){
 // Count total uploaded files
 $totalfiles = count($_FILES['file']['name']);

 // Looping over all files
 for($i=0;$i<$totalfiles;$i++){
 $filename = $_FILES['file']['name'][$i];
 $s_grade= $_POST['txtsgrade'];
 $s_class= $_POST['txtsclass']; 
 
// Upload files and store in database
if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],'files/'.$filename)){
	
		// Image db insert sql
		$insert = "INSERT into files(file_name,uploaded_on,status,grade,class) values('$filename',now(),1,'$s_grade','$s_class')";
		if(mysqli_query($con, $insert)){
		  echo 'Data inserted successfully';
		  echo '<script> alert("Uploaded successfully")</script>';
		}
		else{
		  echo 'Error: '.mysqli_error($conn);
		}
	}else{
		echo 'Error in uploading file - '.$_FILES['file']['name'][$i].'<br/>';
		echo '<script> alert("Invalid Details")</script>';
	}
 
 }
} 
}
?>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
       <div style="background-color:#000000; width:100%; height:auto;"><br/>
       <h2 align="center" style="color:#92A4A4; margin-left: 14%;">Study Packs</h2><br/><br/>
      
<div align="center">

<div align="center" class="card" style="width:60%; height:auto; margin-left: 15%;"  >
	
    <h4  class=" badge badge-dark card-header white-text text-center py-4">


	
	<form method='post'  action='#' enctype='multipart/form-data'>
	<div class="form-group">
<label><p>Select Files to Upload</p></label></td><td>
	<div class="form-group">
	 <input type="file" class="form-control" style="width:70%;color:#1DBC2F; text-align:center" name="file[]" id="file" multiple>
	</div> 
	<div class="form-group">
	 <label><p>Gade</p></label></td><td>
     <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Grade"   name="txtsgrade" required/>
	</div> 
	<div class="form-group">
	 <label><p>Class</p></label></td><td>
     <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Class"   name="txtsclass" required />
	</div> 
	<div class="form-group"> 
	 <input type='submit' name='submit' value='Upload' class="btn btn-primary">
	</div> 
	
	
	</form>
	
      
</div>	
</div>	
</body>
</html>
