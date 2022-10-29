<?php session_start() ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Signup Page</title>
<link rel="shortcut icon" href="images/logo2size.png"/ >
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>

<?php
include('DB1.php');
//variables
$regisno= "";
$namespclub="";
$email="";
$password="";
$password2="";

$msg="";
$sql="";

//clear function
function clear(){

$regisno= "";
$namespclub="";
$email="";
$password="";
$password2="";
}

//signup button
if(isset($_POST['submit'])){
	 $regisno= $_POST['txtregno'];
	 $namespclub= $_POST['txtCname'];
     $email= $_POST['txtEmail'];
	 $password= $_POST['txtPassword'];
	 $password2= $_POST['password2'];
	
	if(!empty($regisno) &&  ($namespclub) && ($email)&& ($password) && ($password2)){
		
		
		
$sqla="SELECT * FROM tbllogin where (regno='$regisno')";
$res1 = mysqli_query($con,$sqla);

	if(strlen($password) < 8){
		
		
			
		 echo '<script> alert("Your password must be at least 8 characters!")</script>';
		 
	}

		//matching the password
	elseif($password2 != $password){
		
		 echo '<script> alert("Your Password do not match")</script>';
	}

    elseif (mysqli_num_rows($res1) > 0) {
			$row = mysqli_fetch_assoc($res1);
			  if($regisno==$row['regno']){
				 echo '<script> alert("Your registered number already exists")</script>'; 
			  }
		}
	

	else{

		$password = md5($password);
		
			$sql = "INSERT INTO tbllogin(regno, Cname, email, password) VALUES('$regisno','$namespclub','$email','$password')";
			
		      $res = mysqli_query($con,$sql);
		 
		 	echo '<script> alert("Your Account Created Successfully!")</script>';

	}
	}else{
			echo '<script> alert("Please Insert All Text Fields!")</script>';
		
		
	}

}


?>

  <?php 
  if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?>

<div style="width:100%; height:auto;">
<div align="center"><br><br>
<!-- Material form register -->
<div align="center" class="card" style="width:50%; height:auto; margin-top: 100px;" >

    <h4  class=" badge badge-dark card-header white-text text-center py-4">
        <strong><h4>SIGN-UP TO REQUEST YOUR EQUIPMENTS !</h4></strong>
    </h4>

    <!--Card content-->
    <div  class="card-body px-lg-5 pt-0" >
<br>
        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
   <center>
            <?php echo $msg; ?><br>

            </center>
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text"  class="form-control" placeholder="Registered No. Of The Sports Club"  name="txtregno"/>
                        
                    </div><br>
                </div><br>
                <div class="col">
                    <!-- Last name -->
                    <div >
                        <input type="text"  class="form-control" placeholder="Sports Club Name"  name="txtCname"/>
                        
                    </div><br>
                </div><br>
            </div>

            
          
            
             <br>
            
            <!-- E-mail -->
            <div >
                <input type="email"  class="form-control" placeholder="Email"  name="txtEmail" id="txtEmail" />            
                   	 <span id="emailresload"></span>
                    <span id="emailres"></span>
            </div><br>
            
            <!-- Password -->
            <div >
                
                    <input type="password" class="form-control" placeholder="Password" id="password1" name="txtPassword"  />
  
            </div>
          
            <br>
       
              <div>
              
              </div>
		
             <div >
                <input type="password" id="password2"  class="form-control" placeholder="Re-Enter your Password"  name="password2"/>
  				
            </div><br>
	
    		
         

            <!-- Sign up button -->
             <input class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0"
             type="submit" name="submit" value="Sign up"> 

			 <p>Already have an Account?
        <a href="login.php">Sign in</a>
      </p>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

<?php mysqli_close($con);?>
        </form>
        <!-- Form -->
	
    </div>

</div>
<br><br>
<!-- Material form register -->

</div>

</div>

<?php include('footer2.php'); ?>

</body>
</html>