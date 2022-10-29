
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="images/logo2size.png"/ >
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<title>Request Page</title>


</head>

<body>

<?php
	
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include('db.php');
//variables
$id="";
$s_id="";
$s_name= "";
$s_email="";
$s_grade="";
$s_class="";
$s_types="";
$other="";
$status="";
$email="";
$rfile="";
$arrType=array("pdf");

$msg="";
$sql="";

//clear function
function clear(){

$s_id="";
$s_name= "";
$s_age="";
$s_grade="";
$s_dob="";
$s_status="";
$s_email="";
$email="";
$rfile="";
}

if (isset($_SESSION['useremail'])){
	$s_email= $_SESSION['useremail'];
    
	
	$sqlsp="SELECT student_id,student_email,student_grade,student_class FROM student WHERE student_email='$s_email' " ;
	$res1 = mysqli_query($con,$sqlsp);
 
	if(mysqli_num_rows($res1)){
		while($row = mysqli_fetch_row($res1)){
			
			$s_id = $row[0];	
			$s_email = $row[1];
            $s_grade = $row[2];
            $s_class = $row[3];
            

    		
		    }
	}
}

//submit button
if($con){
	
if(isset($_POST['submit'])){
	
//$id=$_POST['txtsid'];
$s_id=$_POST['txtsid'];
$s_name= $_POST['txtsname'];
$s_email=$_POST['txtsemail'];
$s_grade=$_POST['txtsgrade'];
$s_class=$_POST['txtsclass'];
$s_types=$_POST['type'];
$other=$_POST['txtsmsg'];



	// $Fullname= $Fname." ".$Lname;
	 
	#file name with a random number so that similar dont get replaced
    $rfile = rand(1000,10000)."-".$_FILES["rfile"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["rfile"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = 'files';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$rfile);
	$status='pending';
	
	
	if(!empty($s_grade)&& ($s_types) &&  ($s_class) && ($other) && ($s_id)){
	 
	$ext = explode(".",$rfile);
	 if(in_array($ext[1],$arrType)){
			$reqNo = rand(10,1000);
			$sql = "INSERT INTO request(s_id, s_name, s_email, s_grade, s_class, s_type, other, status, rfile) 
			VALUES('$s_id','$s_name','$s_email','$s_grade','$s_class','$s_types','$other','$status', '$rfile')";
			$res = mysqli_query($con,$sql);
		$_SESSION['sidd'] = $reqNo;
		
		
		 	echo '<script> alert("Your requst sent Successfully!")</script>';
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
    $mail->Subject = "We Received Your Request";
    $mail->Body    = "Dear $s_name, (ID: $s_id),<br> We've Recieved Your Request and we will respond soon! Your request number is $reqNo . ";
   
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

	} else{
		 echo '<script> alert("Invalid File Type")</script>';
		  
	 }
	
	}
	
	else{
			echo '<script> alert("Please Insert All Text Fields!")</script>';
		
		   
	}

}
	
}else{
	$msg="<div style=color:red;><b>Error :".mysqli_connect_error()."</b></div>";
}

	
	
	?>
	


<!--....................................................................................................................-->
 

<div style="width:100%; height:auto ">
<div align="center"><br><br><br><br><br><br>
<!-- Material form register -->
<div align="center" class="card" style="width:50%; height:auto;" >

    <h4  class=" badge badge-dark card-header white-text text-center py-4">
        <strong><h4>REQUEST ONLINE FOR A BETTER SERVICE!</h4></strong>
    </h4>

    <!--Card content-->
    <div  class="card-body px-lg-5 pt-0" >
<br>
        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
             <div class="form-row">
               
                <div class="col">
                    <!-- Sports club name -->
                    <div class="md-form">
                        <input type="text"  class="form-control"  required name="txtsemail" value="<?php echo $s_email;?>" readonly/>
                        
                    </div><br>
                </div><br>
                <div class="col">
                    <!-- Registered number -->
                    <div >
                        <input type="text"  class="form-control"  required name="txtsid" value="<?php echo $s_id;?>" readonly/>
                        
                    </div><br>
                </div><br>
            </div>

            <div class="form-row">
               
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text"  class="form-control" placeholder="First Name" required name="txtsname"/>
                        
                    </div><br>
                </div><br>
                
                <div class="col">
                 
                    <div >
                        <input type="text"  class="form-control" placeholder="Grade" required name="txtsgrade" value="<?php echo $s_grade;?>" readonly/>
                    </div><br>
                </div><br>

                <div class="col">

                        <input type="text"  class="form-control" placeholder="Class" required name="txtsclass"  value="<?php echo $s_class;?>" readonly/>
                    </div><br>
                <br>
                <div class="col">
                    <!-- Last name -->
                    <div >
                        <input type="text"  class="form-control" placeholder="Message" required name="txtsmsg"/>
                    </div><br>
                </div><br>
            </div>
         
             

<select name="type" class="form-control">  
  <option  value="Type">Requesting Types :  </option>}  
  <option value="Results">Results</option>  
  <option value="Schedule">Schedule</option>  
  <option value="Tutorials">Tutorials</option>  
 
</select> 
 <br>
             
                <input type="email"  class="form-control" placeholder="Email" required name="txtsemail" id="txtEmail" />            
                   	 <span id="emailresload"></span>
                    <span id="emailres"></span>
            <br>
            //<label class="form-label" for="customFile">Choose your request letter(Only Pdf s are allowed)</label>
            <input type="file" class="form-control" id="customFile" name="rfile"  />
            
          
            <br>
      
    		
            <center>
<br>

</center>

            <!-- Sign up button -->
             <input class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0"
             type="submit" name="submit" value="Request Now"> 

			 
            <hr>

           
           

        </form>
        <!-- Form -->
	
    </div>

</div>


</div>

</div>


<?php include('footer2.php'); ?>

</body>
</html>