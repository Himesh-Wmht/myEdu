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

<title>Manage Request</title>
</head>
	
	<?php
	include('index.php');?>
<?php
	include('navup.php');
	?>
<body>

</style>
<?php require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$to="";
$subject="";


?>

<?php
	$msg="";
	$id="";
$s_id="";
$s_name="";
$s_email="";
$s_grade="";
$s_class="";
$sreq_type="";
$sreq_msg="";
$sreq_status="";
$rfileresult="";
$rfileschedule="";
$rfiletutorial="";
$rfile="";

$arrType=array("jpg","jpeg","png");
$arrType2=array("pdf");
$ext="";
$ext2="";
$temp="";
$temp2="";
$unique="";
$sql="";
  

function clear(){
$s_id="";
$id="";
$s_name="";
$s_email="";
$s_grade="";
$s_class="";
$sreq_type="";
$sreq_msg="";
$rfileresult="";
$rfileschedule="";
$rfiletutorial="";
$rfile="";
$temp="";
$temp2="";
$sql="";


}
include('db.php');
$id=$_GET['id'];


	

	
 $query="SELECT * FROM request WHERE id='$id'";
 $res1 = mysqli_query($con,$query);
 
	if(mysqli_num_rows($res1)){
		while($row = mysqli_fetch_row($res1)){
			
			$id= $row[0];	
			$s_id= $row[1];	
			$s_name= $row[2];
			$s_email= $row[3];
    		$s_grade= $row[4];
			$s_class= $row[5];
			$sreq_type=$row[6];
			$sreq_msg=$row[7];
			$sreq_statuse=$row[8];


		    }
	}
 
if($con){

	
		 //update
  
  if(isset($_POST['btnUpdatej'])){
 
   	 $id= $_POST['txtsid'];
	 $s_id= $_POST['txts_id'];
	 $s_name= $_POST['txtsname'];
	 $s_email= $_POST['txtsemail'];
	 $s_grade= $_POST['txtsgrade'];
	 $s_class= $_POST['txtsclass'];
	 $s_type= $_POST['txtstype'];
	 $sreq_msg= $_POST['txtsmsg'];
	 $sreq_statuse= $_POST['txtsstatus'];
	// $temp2 = $_FILES['rfile']['tmp_name'];
	   #file name with a random number so that similar dont get replaced
   // $rfile = rand(1000,10000)."-".$_FILES["rfile"]["name"];
 
    #temporary file name to store file
   // $tname = $_FILES["rfile"]["tmp_name"];
   
     #upload directory path
   // $uploads_dir = 'files';
    #TO move the uploaded file to specific location
  //  move_uploaded_file($tname, $uploads_dir.'/'.$rfile);
	
	
	// $rfile=$_FILES['rfile']['name'];
	 $path ="uploads/";
	
	 $ext2 = explode(".",$rfile);
	 $sreq_status= 'Rejected';

$sql="UPDATE request SET s_id='".$s_id."', s_name='".$s_name."', s_email='".$s_email."', s_grade='".$s_grade."', s_class='".$s_class."', other='".$sreq_msg."', status='".$sreq_status."' WHERE id=".$id."";
		
		if(mysqli_query($con,$sql)){
		
		//	move_uploaded_file($tname, $uploads_dir.'/'.$rfile);
			echo '<script> alert("Request Updated!")</script>';
			clear();
			try{

$mail = new PHPMailer(true);

//Server settings
	$mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                   
	$mail->Username   = 'myedusrilanka@gmail.com';                     
	$mail->Password   = 'dpcqvtzeynhmdqsd';                           
    $mail->SMTPSecure = 'tls';        
    $mail->Port       = 587;       
	 $mail->Mailer       = 'smtp';  
    
	 //---

	  
	   //Recipients
    $mail->setFrom('myedusrilanka@gmail.com');
    $mail->addAddress($s_email);     
   
	
	//Content
	$mail->isHTML(true);                                  
    $mail->Subject = "We Rejected Your Request";
    $mail->Body    = "Dear $s_name, (ID: $s_id),<br> We've Rejected Your Request and Please retry! Your request Student number is $s_id . ";
   
    $mail->send();
	 
	 echo '<script> alert("Your Request Message Sent Successfully!")</script>';
	 
	if(isset($_POST['submit'])){
    foreach($_SESSION['cart'] as $k=>$value){
	unset($_SESSION['cart'][$k]);


	}
?>
<script>
  window.location.href= "home.php";
</script>
<?php
}
?>


<?php

     }catch(Exception $ex){
	  echo "Error : " . $mail->ErrorInfo;

}
			
		}else{
		     echo '<script> alert("Please Insert All Text Fields")</script>';
		}
	}		
 }

if(isset($_POST['btnClear'])){
		clear();	
	}

?>

       <div style="background-color:#000000; width:100%; height:auto;"><br/>
       <h2 align="center" style="color:#92A4A4; margin-left: 14%;">Student Details</h2><br/><br/>
      
<div align="center">

<div align="center" class="card" style="width:60%; height:auto; margin-left: 15%;"  >
	
    <h4  class=" badge badge-dark card-header white-text text-center py-4">
        <strong><h4>Manage Request Details</h4></strong>
    </h4>
    <!-- Form -->
    <form class="form-inline" style="background-color: #000000:" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<div class="card-body" style="margin-top: -180px;">
	 <div class="table-responsive" style=" width: 100%; margin-left: 0%; ">
	<table class="table">
   
			   <tr><td>	
      <label><p>Request ID</p></label></td><td>
      <input type="text"  class="form-control" style="width:70%;  color:#1DBC2F; text-align:center" 
       placeholder="Next id is: <?php echo $id ?> "  name="txtsid" value="<?php echo $id ?>" readonly/>
			</td> 
		</tr>
			   <tr><td>	
      <label><p>Student ID</p></label></td><td>
      <input type="text"  class="form-control" style="width:70%;  color:#1DBC2F; text-align:center" 
       placeholder="Student ID"  name="txts_id" value="<?php echo $s_id ?>" readonly/>
			</td> 
		</tr>
				   	  
      <br><tr><td>
		
		<label><p>STUDENT NAME</p></label></td><td>
       	<input type="text"  class="form-control" style="width:70%; color:#1DBC2F; text-align:center" 
       placeholder="Student Name"  name="txtsname" value="<?php echo $s_name ?>"readonly/>
  	  
		</td>
		 </tr>
	<br>
        <tr><td>
	
		 <label><p>EMAIL</p></label></td><td>
       <input type="email"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Student Email" id="txtsemail"  name="txtsemail" value="<?php echo $s_email ?>">
        <span id="emailresload"></span>
        <span id="emailres"></span>
			</td> </tr>
     <br>
        <tr><td>
	
		 <label><p>GRADE</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Student Grade"   name="txtsgrade" value="<?php echo $s_grade ?>" readonly/>
        
			</td> </tr>
	<br>
        <tr><td>
	
		 <label><p>Class</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Student Class"   name="txtsclass" value="<?php echo $s_class ?>" readonly/>
        
			</td> </tr>
	<br>
        <tr><td>
	
		 <label><p>Type</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Request Type"   name="txtstype" value="<?php echo $sreq_type ?>" readonly/>
        
			</td> </tr>
	
	<br>
        <tr><td>
	
		 <label><p>Message</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Requested Message"   name="txtsmsg" value="<?php echo $sreq_msg ?>" />
        
			</td> </tr>
    
	 
			 <tr><td>
	
		 <label><p>Status</p></label></td><td>
       <input type="text"  class="form-control" style="width:70%;color:#1DBC2F; text-align:center" placeholder="Status"   name="txtsstatus" value="Rejected" readonly/>
        
			</td> </tr>
			 <br>

		<tr><td>	
         <label class="form-label" for="customFile"><p>DOCUMENTS(Only Pdf s are allowed)</p></label></td><td>
          <input type="file" class="form-control" id="customFile" name="rfile"  />
			<br>
            
         </td></tr>
           <br>
    
    </table>
	</div>
	</div>
    <div class="form-inline" style=" margin-left: 20%;"  >
	<tr>		
	<td>
			
     
        <button style="width:80px;"  class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="btnUpdatej">
        Update</button></td><td>&nbsp;&nbsp;
        <button style="width:80px;" class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="btnClearj">
        Clear</button></td><td>&nbsp;&nbsp;
       

		</tr>	
</div>
   </div>
</form>
	  
   
</div>
</body>
</html>