<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
		<meta http-equiv="Content-Type"content="text/html; charset=utf-8"/>
		<meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<title>Contact Us</title>
		<link rel="shortcut icon" href="images/MY-EDU.png"/ >
		<link href="css/contact.css"rel="stylesheet"type="text/css"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	   
   
	<body>
	 <?php
      if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?> 
    
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
    $mail->addAddress($email);     
   
	
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
   
		
		<div class="contact-wrap" style="margin-top: 120px;">

			<div class="contact-in">
				<h1>MINISTRY OF EDUCATION</h1>
				<h2><i class="fa fa-phone" aria-hidden="true"></i> Phone</h2>
				<p>+94 112 697934</p>
				<h2><i class="fa fa-envelope" aria-hidden="true"></i> Email</h2>
				<p>myedusrilanka@gmail.com</p>
				<h2><i class="fa fa-map-marker" aria-hidden="true"></i> Address</h2>
				<p>No 09, Phillip Gunawardana Mawatha,
Colombo 07</p>
				<ul>
					<li><a href="https://www.facebook.com/Sportsministry2018/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="https://twitter.com/moys_srilanka?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="https://mos.gov.lk/"><i class="fa fa-google" aria-hidden="true"></i></a></li>
					<li><a href="https://www.youtube.com/channel/UCJSk35ZuPjxF-ZnQeVzDwHg?view_as=subscriber"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="contact-in">
				<h3>Send a Message</h3>
				<form  style="margin-top: 20px;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
					<div >
					<input type="text" placeholder="Full Name" class="contact-in-input" name="txtFullname" style="outline: none; background: transparent;"required>
					<input type="email" placeholder="Email" class="contact-in-input" name="txtEmail" style="outline: none; background: transparent;" required>
					<input type="text" placeholder="Subject" class="contact-in-input" name="txtSubject" style="outline: none; background: transparent;"required>
					<textarea placeholder="Message" class="contact-in-textarea" name="txtMsg" required></textarea>
					
					<input type="submit" value="SUBMIT" class="contact-in-btn" name="submit">
				</div>
				</form>
			</div>
			<div class="contact-in">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.50661168149!2d79.8606602!3d6.9053504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x80bf9ad0d2d45cac!2sMinistry%20of%20Youth%20%26%20Sports!5e0!3m2!1sen!2slk!4v1617957772889!5m2!1sen!2slk" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		</div><br><br>
		<?php include('footer2.php'); ?>

	</body>
</html>