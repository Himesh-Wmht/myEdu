<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
		<meta http-equiv="Content-Type"content="text/html; charset=utf-8"/>
		<meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<title>Contact Us</title>
		<link rel="shortcut icon" href="images/MY-EDU.png"/ >
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	 <?php
      if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?> 
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

$Fullname="";
$email="";
$subject="";
$message="";

$msg="";
$sql="";

//clear function
function clear(){

$Fullname="";
$email="";
$subject="";
$message="";
}



if($con){
if(isset($_POST['submit'])){
	$Fullname= $_POST['txtFullname'];
	$email=$_POST['txtEmail'];
	$subject=$_POST['txtSubject'];
	$message=$_POST['txtMsg'];
	
	//if(!(ctype_space($Fullname) &&  ($email) && ($subject) && ($message) ) ){
		
		$sql="INSERT INTO tblcustmsg(fullname,email,subject,msg) VALUES ('".$Fullname."','".$email."','".$subject."','".$message."')";
	
	if(mysqli_query($con,$sql)){
			$msg="<div style=color:green;><b>Your Message Sent!</b></div>";
			 echo '<script> alert("Your Message has been sent Successfully!")</script>';
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
    $mail->Subject = "We Received Your Message";
    $mail->Body    = "Dear $Fullname,<br><br> Thank you for your feedback and we will respond soon!<br><br>Thank you";
   
    $mail->send();
	 
	 echo '<script> alert("Your Message Sent Successfully!")</script>';
	 



     }catch(Exception $ex){
	  echo "Error : " . $mail->ErrorInfo;

}
	
		}else{
		   $msg="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
		}	
		
	

//	else{
//			echo '<script> alert("Please Insert All Text Fields!")</script>';
//		
//		   
//	}
}
	
	
}else{
   	$msg="<div style=color:red;><b>Error :".mysqli_connect_error()."</b></div>";
}
		?>
   
   
  


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Contact Us</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Contact Us</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <form  style="margin-top: 20px;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
				
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Get In Touch</span></p>
                <h1 class="mb-4">Contact Us For Any Query</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" name="txtFullname" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" name="txtEmail" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject"  name="txtSubject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="6" id="message" name="txtMsg" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-2 px-4" name="submit" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <p>Since 1835, The Royal College has been devoted to producing gentlemen capable of spearheading change and advancement. Its multicultural environment fosters the free exchange of ideas and the celebration of diverse identities. Possessing a rich history of tradition but never limited by it, the College has always maintained adaptation as the key to excellence.</p>
                    <div class="d-flex">
                        <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Address</h5>
                            <p>123 Street, New York, USA</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Email</h5>
                            <p>info@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Phone</h5>
                            <p>+012 345 67890</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Opening Hours</h5>
                            <strong>Sunday - Friday:</strong>
                            <p class="m-0">08:00 AM - 05:00 PM </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Contact End -->


	<?php include('footer2.php'); ?>

	</body>
</html>

