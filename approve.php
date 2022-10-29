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
include('db.php');
if($con){
	$msg="";
$Eid=$_GET['id'];
	$quantity=$_GET['qty'];
	$reqqno=$_GET['reqqno'];
	$emailcnfrm=$_GET['email'];
	echo $Eid.' '.$quantity.' '.$emailcnfrm;
 $query="SELECT stock FROM tblequipments WHERE Eid='".$Eid."'";
 $query2="SELECT * FROM tblreq_equipments WHERE reqno='".$reqqno."' AND status2='pending'";
	
			$getstock= mysqli_query($con,$query);
			if(mysqli_num_rows($getstock)){
			while($row = mysqli_fetch_array($getstock)){
				
				$valuestck=$row['stock'];
				if($valuestck>=$quantity){
				$final=$valuestck-$quantity;
				//echo $final;
				echo '<script> alert('.$final.')</script>';
					//query update
					$sql="UPDATE tblequipments SET stock='$final' WHERE Eid='".$Eid."'";
					$sql1="UPDATE  tblrequests SET status='confirm' WHERE reqno='".$reqqno."'";
					$sql2="UPDATE tblreq_equipments SET status2='confirm' WHERE Eid='".$Eid."' AND reqno='".$reqqno."'";
					$updatetock= mysqli_query($con,$sql);
					$status1= mysqli_query($con,$sql2);
					
					$getreqno= mysqli_query($con,$query2);
					$resultreq=mysqli_num_rows($getreqno);
					if($resultreq>=1){
						
						//echo '<script> alert("Confirmed Request and Updated Stock!")</script>';
							$msg="Updated Stock!";
							header('location:http://localhost/Finale/test.php?success='.$msg);
					}elseif($resultreq<1){
						$status2= mysqli_query($con,$sql1);
						//sent email
						try{

$mail = new PHPMailer(true);

//Server settings
	$mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                   
	$mail->Username   = 'spogosm@gmail.com';                     
	$mail->Password   = 'spogo@123';                           
    $mail->SMTPSecure = 'tls';        
    $mail->Port       = 587;       
	 $mail->Mailer       = 'smtp';   
	 //---

	  
	   //Recipients
    $mail->setFrom('spogosm@gmail.com');
    $mail->addAddress($emailcnfrm);     
   
	
	//Content
	$mail->isHTML(true);                                  
    $mail->Subject = "Request Confirmation";
    $mail->Body    = "Dear Sir/Madam,<br> Your request $reqqno has been confirmed!";
   
    $mail->send();
	 
	 echo '<script> alert("Your Request Message Sent Successfully!")</script>';
	 



     }catch(Exception $ex){
	  echo "Error : " . $mail->ErrorInfo;

}
						$msg="Confirmed Requests!";
						header('location:http://localhost/Finale/test.php?success='.$msg);
						
					}else{
						$msg="Error";
						header('location:http://localhost/Finale/test.php?error='.$msg);
					}
					
					//if(mysqli_num_rows($updatetock)){
			//while($row = mysqli_fetch_array($updatetock)){
				//status confirm
	
			//}
					//}
				}else{
					//echo '<script> alert("Out of Stock!")</script>';
					$msg="Out of Stock!";
					header('location:http://localhost/Finale/test.php?error='.$msg);
				}
 		}
	}
}

?>