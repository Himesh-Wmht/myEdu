<?php 

if(isset($_POST['name']) && isset($_POST['email'])){
$name= $_POST['name'];
$email= $_POST['email'];
$subject= $_POST['subject'];
$body= $_POST['body'];

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";


$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host= "smpt.gmail.com";
$mail->SMTPAuth =true;
$mail->Username ="spogosm@gmail.com";
$mail->Password ='spogo@123';
$mail->port='465';
$mail->SMTPSecure = "ssl";

$mail->isHTML(true);
$mail->setForm($email, $name);
$mail->addAddress("spogosm@gmail.com");
$mail->Subject = ("email ($subject)");
$mail->Body= $body;

 if($mail->send()){
    $status = "success";
    $response ="Email is sent";
}
else{    $status = "failed";
	     $response = "Something is worng: <br>".$mail->ErrorInfo;
}

exit(json_encode(array("status" => $status,"response" => $response)));

}


?>