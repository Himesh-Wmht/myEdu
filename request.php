<?php session_start(); ?>
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
<title>Requests</title>


</head>

<body>

<?php 
include('DB1.php'); 
?>


  <?php 
  if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?>

<div style="width:100%; height:auto; background-color:#F0F8FF;">
<h2 align="center" style="padding-top:120px;"> Request Details</h2>

<?php


//variables
$id="";
$name="";
$price="";
$image="";
$sql="";

 if(!empty($_SESSION['cart'])){
	 
	 if(isset($_POST['btnCheck'])){
	if(!empty($_SESSION['useremail'])){
    
	?>
    
    	<script>
        	window.location.href= "Inquiry.php";
        </script>
    <?php
	}
	else{
		?>
	
    
	<script>
        	window.location.href= "login.php";
        </script>
	<?php
     }
	}
}
	

//remove items
  if(isset($_GET['action'])){
	  if($_GET['action']=='delete'){
		  foreach($_SESSION['cart'] as $k=>$value){
			 if($value['id']==$_GET['id']){
				 unset($_SESSION['cart'][$k]);
			 }
		  }
	  }
  }
  
  //Clear
if(isset($_POST['btnCancel'])){
  foreach($_SESSION['cart'] as $k=>$value){
	unset($_SESSION['cart'][$k]);
  }	
}


//interface
if(!empty($_SESSION['cart'])){
	
	 $total=0;
	 ?>
     <form method="post">
     <table align="center"  width="800px" cols="3" class="table table table-dark">
      <tr style="color:#FFFFFF;" align="center">
        <th >#</th>
        <th >Name</th>
        <th >Quantity</th>
        <th></th>
      </tr>
     <?php
	 foreach($_SESSION['cart'] as $b=>$value){
		
		 ?>
         <tr style="color:#FFFFFF;" align="center"> 
         
         	<td><img src="<?php echo $value['image'] ?>" height="50" width="50"/></td>
         	<td><?php echo $value['name'] ?></td>
            <td><?php echo $value['qty'] ?></td>
           
            
            <td><a href="request.php?action=delete&id=<?php echo $value['id']?>" onClick="return confirm('Are you sure you want to remove this item ?');">
            		<img src="uploads/delete-bin-icon-png-6.png" height="20" width="20"/>
            	</a>
            </td>
         </tr>
         <?php
			
	 }
	 ?>

      
        <tr>
        	<td colspan="4" align="right"> 
             <input type="submit" value="Request Now" class="btn btn-outline-primary" name="btnCheck" /> </td>
            <td colspan="4">
              <input type="submit" value="Cancel" class="btn btn-outline-danger" name="btnCancel" onClick="return confirm('Are you sure you want to cancel ?');"/>
            </td>
        </tr>
      </table>
      </form>
     <?php
 }
 
 elseif(empty($session['cart'])){
	echo "<center><div style='margin:100px ; width:60%;' ><h3 style=color:#2D6B66;>Your requests are currently empty</h3></div></center>";
	
 }


?>
</div><br>

<?php include('footer2.php'); ?>
</body>
</html>