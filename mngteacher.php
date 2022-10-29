
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
<title>MANAGE TEACHERS</title>
</head>

<body>
<?php include('index.php')?>
<?php include('navup.php')?>
<?php
include('db.php'); 
//-------------- Connection--------
$id="";
$empno="";
$name="";
$address="";
$contact="";
$email="";
$section="";
$class="";
$status="";


function clear(){
	
$id="";
$empno="";
$name="";
$address="";
$contact="";
$email="";
$section="";
$class="";
$status="";
	}

$msg="";
?>

<?php
if($con){
 
 //--------------------------Auto ID Generator--------------------------------------------------------
	
	
	 $queryauto = "SELECT MAX(T_id) FROM teacher";
		
	$resultid = mysqli_query($con,$queryauto);
	if(mysqli_num_rows($resultid)){
		while($row = mysqli_fetch_row($resultid)){
$next_id = $row[0]+1;
	
	}}
		
//-------------------------------------Insert-----------------------------------------------------
	
 if(isset($_POST['btnInsert'])){
	


$id=$_POST['txttid'];
$empno=$_POST['txttempno'];
$name=$_POST['txttname'];
$address=$_POST['txttaddress'];
$contact=$_POST['txttcontact'];
$email=$_POST['txttemail'];
$section=$_POST['txttsection'];
$class=$_POST['txttclass'];
$status=$_POST['txttstatus'];
	 
	// $pw=md5($pw);
		  if(!empty($_POST['txttempno'])&& $_POST['txttname'] &&$_POST['txttaddress']&& $_POST['txttcontact'] && $_POST['txttemail'] && $_POST['txttsection'] && $_POST['txttclass'] && $_POST['txttstatus']){
    	$sql="INSERT INTO teacher(T_eno, T_name, T_address, T_contact, T_email, T_section, T_class, T_status) VALUES('".$empno."','".$name."','".$address."','".$contact."','".$email."','".$section."','".$class."','".$status."')";
		 
		if(mysqli_query($con,$sql)){
			
			 echo '<script> alert("Teacher Account Created Successfully!")</script>';
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
 	$empno= $_POST['txttempno'];
	 if(!empty ($empno)){
	$sql="SELECT * FROM teacher WHERE T_eno='".$empno."'";
	$result =mysqli_query($con,$sql);
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_row($result)){
			
$id=$row[0];
$name=$row[2];
$address=$row[3];
$contact=$row[4];
$email=$row[5];
$section=$row[6];
$class=$row[7];
$status=$row[8];
    		
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
$id= $_POST['txttid'];
$empno=$_POST['txttempno'];
$name=$_POST['txttname'];
$address=$_POST['txttaddress'];
$contact=$_POST['txttcontact'];
$email=$_POST['txttemail'];
$section=$_POST['txttsection'];
$class=$_POST['txttclass'];
$status=$_POST['txttstatus'];

	 $pw=md5($pw);
    $sql="UPDATE teacher SET T_eno='".$empno."', T_name='".$name."',  T_address='".$address."',	T_contact='".$contact."',  T_email='".$email."',T_section='".$section."',  T_class='".$class."', T_status='".$status."' WHERE T_id=".$id;
		
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
	 $empno= $_POST['txttempno'];
	 
    	$sql="DELETE FROM teacher WHERE T_eno='".$empno."'";
		
		if(mysqli_query($con,$sql)){
			
			 echo '<script> alert("Account Deleted!")</script>';
			clear();
		}else{
		   $msg="<div style=color:white;><b>Error :".mysqli_error($con)."</b></div>";
		}
	}

//clear button

if(isset($_POST['btnCleara'])){
		clear();	
	}

?>

       <div style="background-color:#000000; width:100%; height:auto;"><br/><br/><br/><br/>
       <h2 align="center" style="color:#92A4A4; margin-left: 14%;">Teacher Details</h2><br/><br/>
      
<div align="center">
<!--  form  -->
<div align="center" class="card" style="width:60%; height:auto; margin-left: 15%;"  >
	
    <h4  class=" badge badge-dark card-header white-text text-center py-4">
        <strong><h4>Manage Teachers Details</h4></strong>
    </h4>
    <!-- Form -->
    <form class="form-inline" style="color: #757575;"  method="post" enctype="multipart/form-data">
	<div class="card-body" style="margin-top: -180px;">
	 <div class="table-responsive" style=" width: 100%; margin-left: 0%; ">
	<table class="table">
		<tr><td>
      <!-- Email -->  	
      
		  <label>Teacher Id</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center"
        placeholder="<?php echo "Next Teacher ID is: ".$next_id?>" name="txttid" value="<?php echo $id ?>">
         
      </td></tr><br>
	   <tr><td>
		  <label>EMP No</label></td><td>
       <input type="name"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" placeholder="Input EMP No"  
       name="txttempno" value="<?php echo $empno ?>">
         
      </td></tr><br>
	  <tr><td>
		<label>Teacher Name</label></td><td>
       <input type="name"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" placeholder="Input User Name"  
       name="txttname" value="<?php echo $name ?>">
        
      </td></tr><br>
	   <tr><td>
		  <label>Teacher Address</label></td><td>
        <input type="name"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" placeholder="Input Address"  
       name="txttaddress" value="<?php echo $address?>">
         
      </td></tr><br>
	     <tr><td>
		  <label>Teacher Contact</label></td><td>
        <input type="name"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" placeholder="Input Address"  
       name="txttcontact" value="<?php echo $contact?>">
         
     </td></tr><br>
	 <tr><td>
        
			<label>Teacher Email</label></td><td>
       <input type="email"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input Email"  name="txttemail" value="<?php echo $email ?>">
         
      </td></tr><br>
	   <tr><td>
			<label>Section</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input Section"  name="txttsection" value="<?php echo $section ?>">
         
     </td></tr><br>
	  <tr><td>
			<label>Class</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input Class"  name="txttclass" value="<?php echo $class ?>">
         
      </td></tr><br>
	   <tr><td>
			<label>Status</label></td><td>
       <input type="text"  class="form-control" style="width:80%; color:#1DBC2F; text-align:center" 
       placeholder="Input Status"  name="txttstatus" value="<?php echo $status ?>">
         
      </td></tr><br>
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
$sql="SELECT * FROM teacher";
 $result= mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
	 ?>
	  <table class="table table-striped" align="center" style="width:50%;">
      	<tr align="center" class="sticky-top">
            	<th scope="col">ID</th>
                <th scope="col">EMP No</th>
           		<th scope="col">Name</th>
				<th scope="col">Address</th>
                <th scope="col">Contact</th>
           		<th scope="col">Email</th>
				<th scope="col">Section</th>
                <th scope="col">Class</th>
           		<th scope="col">Status</th>


               
            </tr>
      <?php
	   while($row=mysqli_fetch_assoc($result)){
		?>
          <form action="" method="post">
        	  <tr align="center">
            	<td><?php echo $row['T_id'];?></td>
                <td><?php echo $row['T_eno'];?></td>
                <td><?php echo $row['T_name'];?></td>
				<td><?php echo $row['T_address'];?></td>
                <td><?php echo $row['T_contact'];?></td>
                <td><?php echo $row['T_email'];?></td>
				<td><?php echo $row['T_section'];?></td>
                <td><?php echo $row['T_class'];?></td>
                <td><?php echo $row['T_status'];?></td>
                

               
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