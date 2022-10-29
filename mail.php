 <?php
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$to="";
$subject="";
$msg="";



if(isset($_POST['btnSend'])){
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
	 $to = $_POST['txtTo'];   
	 $subject =    $_POST['txtSubject'];    
	 $msg =    $_POST['txtMessage'];  
	  
	   //Recipients
    $mail->setFrom('myedusrilanka@gmail.com');
    $mail->addAddress($to);     
   
	
	//Content
	$mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $msg;
   
    $mail->send();
	 echo '<script> alert("Your Message Sent Successfully!")</script>';



}catch(Exception $ex){
	echo "Error : " . $mail->ErrorInfo;

}
}

if(isset($_POST['btnCancel'])){
	clear();
}
?>
