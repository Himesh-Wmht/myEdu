
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link href="CSS.css" rel="stylesheet"/>
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="shortcut icon" href="images/MY-EDU.png"/ >
<title>MANAGE ADMIN</title>
</head>

<body>
<?php include('index.php')?>
<?php include('navup.php')?>
<?php
include('db.php'); 
//-------------- Connection--------
$id="";
$name="";
$email="";
$contact="";
$nic="";
$address="";
$section="";
$password="";
$repassword="";

function clear(){
	
$id="";
$name="";
$email="";
$contact="";
$nic="";
$address="";
$section="";
$password="";
$repassword="";
}
	

$msg="";
?>

<?php
if($con){
 
 //--------------------------Auto ID Generator--------------------------------------------------------
	
	
	 $queryauto = "SELECT MAX(admin_id) FROM admin";
		
	$resultid = mysqli_query($con,$queryauto);
	if(mysqli_num_rows($resultid)){
		while($row = mysqli_fetch_row($resultid)){
$next_id = $row[0]+1;
	
	}}
		
//-------------------------------------Insert-----------------------------------------------------
	
 if(isset($_POST['btnInsert'])){
	

$id=$_POST['txtaid'];
$name=$_POST['txtaname'];
$email=$_POST['txtaemail'];
$contact=$_POST['txtacontact'];
$nic=$_POST['txtanic'];
$address=$_POST['txtaaddress'];
$section=$_POST['txtasection'];
$password=$_POST['txtapassword'];
$repassword=$_POST['txtarepassword'];
	 
	// $pw=md5($pw);
		  if(!empty($_POST['txtaname'])&& $_POST['txtaemail'] && $_POST['txtacontact'] && $_POST['txtanic'] && $_POST['txtaaddress'] && $_POST['txtasection'] && $_POST['txtapassword'] && $_POST['txtarepassword']){
    	$sql="INSERT INTO admin(admin_name, admin_email, admin_contact, admin_nic, admin_address, admin_section, admin_password, admin_repassword) VALUES('".$name."','".$email."','".$contact."','".$nic."','".$address."','".$section."','".$password."','".$repassword."')";
		 
		if(mysqli_query($con,$sql)){
			
			 echo '<script> alert("Admin Account Created Successfully!")</script>';
			 clear();
		}else{
		   $msg="<div style=color:white;><b>Error :".mysqli_error($con)."</b></div>";
		}
		  }else{
			   //$msg="<div style=color:red;><b>Please input All Text Fields</b></div>"; 
			  	echo '<script> alert("Please input All Text Fields!")</script>';
			  clear();
		  }
	 
	}
 
 //---------------------Search--------------------------------------------------

	 if(isset($_POST['btnSearchadm'])){
 	$id= $_POST['txtaid'];
	 if(!empty ($id)){
	$sql="SELECT * FROM admin WHERE admin_id=".$id;
	$result =mysqli_query($con,$sql);
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_row($result)){
			
$name=$row[1];
$email=$row[2];
$contact=$row[3];
$nic=$row[4];
$address=$row[5];
$section=$row[6];
$password=$row[7];
$repassword=$row[8];
    		
		    }
     }else{
				echo '<script> alert("Invalid ID!")</script>';

		  }
		
	}else{
			 echo '<script> alert("Please Input ID!")</script>'; 

		 	
		  }
  }

  //-----------------------------update----------------------------------------------
  
 if(isset($_POST['btnUpdate'])){
	 $id= $_POST['txtaid'];
	 $name=$_POST['txtaname'];
$email=$_POST['txtaemail'];
$contact=$_POST['txtacontact'];
$nic=$_POST['txtanic'];
$address=$_POST['txtaaddress'];
$section=$_POST['txtasection'];
$password=$_POST['txtapassword'];
$repassword=$_POST['txtarepassword'];
	 $pw=md5($pw);
    $sql="UPDATE admin SET admin_name='".$name."',	admin_email='".$email."',  admin_name='".$name."',	admin_email='".$email."',  admin_contact='".$contact."',	admin_nic='".$nic."',  admin_address='".$address."',	admin_section='".$section."',  admin_password='".$password."',	admin_repassword='".$repassword."' WHERE admin_id=".$id;
		
		if(mysqli_query($con,$sql)){
			$msg="<div style=color:blue;><b>Account Updated!</b></div>";
			echo '<script> alert("Admin Account Updated Successfully!")</script>';
			clear();
		}else{
			
		   $msg="<div style=color:white;><b>Error :".mysqli_error($con)."</b></div>";
		}
 }}

//-----------------------------delete-------------------------------------------------------
if(isset($_POST['btnDelete'])){
	 $id= $_POST['txtaid'];
	 
    	$sql="DELETE FROM admin WHERE admin_id=".$id;
		
		if(mysqli_query($con,$sql)){
			
			 echo '<script> alert("Account Deleted!")</script>';
			clear();
		}else{
		   $msg="<div style=color:white;><b>Error :".mysqli_error($con)."</b></div>";
		}
	}

//clear button

if(isset($_POST['btnClear'])){
		clear();	
	}

?>

       <div style="background-color:#000000; width:100%; height:auto;"><br/><br/><br/><br/>
       <h2 align="center" style="color:#92A4A4; margin-left: 14%;">Admins Details</h2><br/><br/>
      
<div align="center">
<!--  form  -->
<div align="center" class="card" style="width:60%; height:auto; margin-left: 15%;"  >
	
    <h4  class=" badge badge-dark card-header white-text text-center py-4">
        <strong><h4>Manage Admins Details</h4></strong>
    </h4>
    <!-- Form -->
    <form class="form-inline" style="color: #757575;"  method="post" enctype="multipart/form-data">
	<div class="card-body" style="margin-top: -180px;">
	 <div class="table-responsive" style=" width: 100%; margin-left: 0%; ">
	<table class="table">
	<tr><td>
		
      <!-- Email -->  
      	
		  <label>Admin Id</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center"
        placeholder="<?php echo "Next User ID is: ".$next_id?>" name="txtaid" value="<?php echo $id ?>">
         
      </td></tr><br>

   	<tr><td>
		<label>Admin name</label></td><td>
       <input type="name"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" placeholder="Input User Name"  
       name="txtaname" value="<?php echo $name ?>">
        
    </td></tr><br>
      
        	<tr><td>
			<label>Admin Email</label></td><td>
       <input type="email"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input User Email"  name="txtaemail" value="<?php echo $email ?>">
         
     </td></tr><br>
	   <tr><td>
			<label>Admin Contact</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input User contact"  name="txtacontact" value="<?php echo $contact ?>">
         
      </td></tr><br>
	  <tr><td>
			<label>Admin Nic</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input User Nic"  name="txtanic" value="<?php echo $nic ?>">
         
      </td></tr><br>
	   <tr><td>
			<label>Admin Address</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input User Address"  name="txtaaddress" value="<?php echo $address ?>">
         
      </td></tr><br>
	  <tr><td>
			<label>Admin section</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input User Section"  name="txtasection" value="<?php echo $section ?>">
         
      </td></tr><br>
	<tr><td>
			<label>Admin Password</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input User Password"  name="txtapassword" value="<?php echo $password ?>">
         
     </td></tr><br>
	 <tr><td>
			<label>Admin Repassword</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Re-Enter Password"  name="txtarepassword" value="<?php echo $repassword ?>">
         
      </div><br>
      </div>
	   </table>
	</div>
	

<div>
        <button  class="btn btn-outline-dark btn-rounded btn-md  my-4 waves-effect z-depth-0" type="submit" name="btnInsert" >
        Insert</button>
        <button class="btn btn-outline-dark btn-rounded btn-md   my-4 waves-effect z-depth-0" type="submit" name="btnSearchadm">
        Search</button>
        <button class="btn btn-outline-dark btn-rounded btn-md   my-4 waves-effect z-depth-0" type="submit" name="btnUpdate">
        Update</button>
        <button class="btn btn-outline-dark btn-rounded btn-md   my-4 waves-effect z-depth-0" type="submit" name="btnDelete">
        Delete</button>
        <button class="btn btn-outline-dark btn-rounded btn-md   my-4 waves-effect z-depth-0" type="submit" name="btnCleara">
        Clear</button>
        <button class="btn btn-outline-dark btn-rounded btn-md  my-4 waves-effect z-depth-0" type="submit" name="btnViewAlla">
         View All</button>

    </div>

    <div align="center" style="width:200px;"><?php echo $msg;?></div>
    </form>


<?php 

if(isset($_POST['btnViewAlla'])){
$sql="SELECT * FROM admin";
 $result= mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
	 ?>
	  <table class="table table-striped" align="center" style="width:50%;">
      	<tr align="center" class="sticky-top">
            	<th scope="col">ID</th>
                <th scope="col">Name</th>
           		<th scope="col">Email</th>
				<th scope="col">Contact</th>
                <th scope="col">NIC</th>
           		<th scope="col">Address</th>
				<th scope="col">Section</th>
                <th scope="col">Password</th>
           		<th scope="col">Re-Password</th>


               
            </tr>
      <?php
	   while($row=mysqli_fetch_assoc($result)){
		?>
          <form action="" method="post">
        	  <tr align="center">
            	<td><?php echo $row['admin_id'];?></td>
                <td><?php echo $row['admin_name'];?></td>
                <td><?php echo $row['admin_email'];?></td>
				<td><?php echo $row['admin_contact'];?></td>
                <td><?php echo $row['admin_nic'];?></td>
                <td><?php echo $row['admin_address'];?></td>
				<td><?php echo $row['admin_section'];?></td>
                <td><?php echo $row['admin_password'];?></td>
                <td><?php echo $row['admin_repassword'];?></td>
                

               
            </tr>

		</form>
		
		 <?php 
	   }
	   ?> </table>
	 </div>
    </div>
   </div>
	  
       <?php
 }
}
  ?>

<br><br><br>
</body>
</html>