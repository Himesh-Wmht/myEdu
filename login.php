<?php session_start();

 ?>

<style> 
body {
  background-image: url("images/bglogin.png");
  background-color: #7FCFF9;
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
<link rel="shortcut icon" href="images/MY-EDU.png"/ >
<title>Login Page</title>

</head>

<body>


<?php 

include('db.php'); 


$email="";
$password="";

$msg="";
$sql="";

function clear(){

$email="";
$password="";	
}


if(isset($_POST['btnLogin'])){
		 $email= $_POST['Email'];
	 	 $password= $_POST['Password'];
		
		//$password = md5($password);

		$sql = "SELECT * FROM student WHERE student_email = '$email' && student_password = '$password'";
		$res = mysqli_query($con,$sql);
		$num = mysqli_num_rows($res);
		
		if($num ==1){
			
			 
			$row = $res->fetch_assoc();
			
			$email = $row['student_email'];
				
				 $_SESSION['useremail'] = $email;
			
				 ?>
			
	
            <?php
		echo '<script> alert("Sign in successful"); window.location.href="home.php";</script>';}
			 $sql1 = "SELECT * FROM admin WHERE admin_email = '$email' && admin_password = '$password'";
		 
		 $res1 = mysqli_query($con,$sql1);
		 
		 $num1 = mysqli_num_rows($res1);
		 
		 if($num1==1){
			 $_SESSION['aduseremail'] = $email;
			 echo '<script> alert("Sign in successful");window.location.href="admin.php";</script>';
			 
			 	
		 }
		
	
	      else{
			
			 echo '<script> alert("The Email or password is incorrect")</script>';
		}
			
	
		
}
	//admin user login
//
//	if(isset($_POST['btnLogin'])){
//		 $email= $_POST['Email'];
//	 	 $password= $_POST['Password'];
//		 
//		 $password = md5($password);
//		
//		 $sql = "SELECT * FROM tbladminusers WHERE email = '$email' && password = '$password'";
//		 
//		 $res = mysqli_query($con,$sql);
//		 
//		 $num = mysqli_num_rows($res);
//		 
//		 if($num==1){
//			 $_SESSION['aduseremail'] = $email;
//			 echo '<script> alert("Sign in successful");window.location.href="admin.php";</script>';
//			 
//			 	
//		 }
//		
//		 else{
//			 echo '<script> alert("Invalid Email or Password!")</script>';
//			
//		 }
//	}
//		
//		


?>
<div style="width:100%; height:auto; ">
  <div align="center"><br><br>
<!-- Material form register -->
<div align="center" class="card" style="width:30%; height:auto; margin-top: 120px;" >

    <h4  class=" badge badge-dark card-header white-text text-center py-4">

        <strong><h4> MyEdu LOGIN!</h4></strong>
    </h4>

    <!--Card content-->
    <div  class="card-body px-lg-5 pt-0" >
<br>
        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >

            <!-- E-mail -->
            <div >
                <input type="email"  class="form-control" placeholder="Email" required name="Email" id="Email" />            
                   	 <span id="emailresload"></span>
                     <span id="emailres"></span>
            </div><br>
            
            <!-- Password -->
            <div >
                
                    <input type="password" class="form-control" placeholder="Password" id="Password" name="Password"  required/>
  
            </div>
          
       
            <center>
            <?php echo $msg; ?>
            
            <br>

             </center>

            <!-- Sign up button -->
             <input class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0"
             type="submit" name="btnLogin" value="Sign in"> 
			
			  <input class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0"
             type="reset" name="btncancel" value="Cancel"> 

            <hr>
            	 <p>Still don't have an Account?
        <a href="signup.php">Sign up</a>
      </p>

            <!-- Terms of service -->
            
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

         
<?php mysqli_close($con);?>
        </form>
        <!-- Form -->
	
    </div>

</div>

	<br><br>	<br><br>	
</div>

</div>


<!-- -->

</body>
</html>