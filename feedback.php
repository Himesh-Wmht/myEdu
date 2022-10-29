

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="uploads/logo3size1.png">
<title>Customer Acoounts Details</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
	<link rel="shortcut icon" href="images/logo2size.png"/ >

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php
	include('index.php');?>
<?php
	include('navup.php');
	?>
<body>
	
<?php 

include ('db.php');


?>

       <div style="background-color:#000000; width:100%; height:auto;"><br/><br/><br/><br/>
       <h2 align="center" style="color:#92A4A4; margin-left: 14%;">Send Email For Customers From Here</h2><br/><br/>
      
<div align="center">
<!--  form  -->
<div align="center" class="card" style="width:60%; height:auto; margin-left: 15%;"  >

    <h4  class="badge badge-dark card-header white-text text-center py-4">
        <strong><h4 align="center" >Reply to the customer</h4></strong>
    </h4>
    

    <!--Card content-->
    <div  class="card-body px-lg-5 pt-0" >
<br>	
 
  
        <form class="text-center" style="color: #757575;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div><h5 style="color:#000000"></h5></div>
      
					<div>
                    	<input type="text"  class="form-control" placeholder="To..(Enter customer Email here)" name="txtTo"  required>
						
         		   </div><br>
                   <div>
                    	<input type="text"  class="form-control" placeholder="Enter Subject" name="txtSubject"  required>
						
         		   </div><br>
                    <div>
                    
						<textarea required class="form-control" placeholder="Type Your Message Here..." name="txtMessage" style="height:100px;"></textarea>
         		   </div>
    
            <div class="form-row" class="view">
                   
                <div class="col">
        
                    <div class="md-form">

                                  <input class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0"
             type="submit" name="btnSend" value="Send"> 
                     
                    </div><br>
                </div><br>
                <div class="col">
                                <input class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0"
             type="reset" name="btnCancell" value="Cancel"> 
                  
                </div>

            </div>
			
 

        </form>


            <hr>

	
    </div>

</div>
</div>



<?php
 include ('mail.php');
?>

      <?php $sql="SELECT * FROM tblcustmsg";
 $result= mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
 
	 ?>
     
       	<table style="margin-left: 17%; width: 80%; margin-top:-30px;" col="3" class="table table-striped table-dark">
       		<tr style="color:#FFFFFF;" align="center">
            	<th scope="col">Message No</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
           		<th scope="col">Message</th>
                
            </tr>
             <?php
		
          
	 while($row=mysqli_fetch_assoc($result)){
		 ?>
         <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <tr style="color:#FFFFFF;" align="center">
            	<td><?php echo $row['id'];?></td> 
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['subject'];?></td>
                <td><?php echo $row['msg'];?></td>
            </tr>
          <br><br>
        </form>
     <?php
	 }
 }?>
 </table>
       </div>
</body>
</html>