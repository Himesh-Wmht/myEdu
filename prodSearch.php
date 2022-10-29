<?php session_start(); 

//products search
if(isset($_POST['txtSearch'])>0){
$search_a=$_POST['txtSearch'];

$ser=$search_a;
	
}else{
	?>
	<script>
        	window.location.href= "equipments.php";
        </script>	
        <?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products search</title>

  <style>
        .product{
            border: 8px solid #eaeaec;
            margin: 2px 3px 8px 2px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table,th,tr{
              text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>

</head>

<body>
<?php 



include('DB1.php'); 

//connection

$Eid="";
$Ename="";
$Cid="";
$stock="";
$Eimage="";
$msg="";
$sql="";

?>


 <?php 
  if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?>

<div  style="width:100%; height:100px; "><br>
<h1 align="center" style="color:#007310;margin-top: 120px;">Your result "<?php echo $ser; ?>"</h1>
</div>


<?php
 $sql="SELECT * FROM tblequipments WHERE Ename LIKE '%$ser%' " ;
 


$result= mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0){
	 ?>
     <?php
	 while($row=mysqli_fetch_assoc($result)){
		 ?>
         
         
            <div class="col-md-3" style="float: left;margin-top: 120px;">
                        <form method="post" action="equipments.php?action=add&id=<?php echo $row["Eid"];?>">
                            <div class="product">
                                <img src="<?php echo $row["Eimage"];?>" width="190px" height="200px" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["Ename"];?></h5>
                  
                                <input type="text" name="quantity" class="form-control" value="1" >
                                <input type="hidden" name="hidden_name" value="<?php echo $row["Ename"];?>">
                                <input type="hidden" name="hidden_image" value="<?php echo $row["Eimage"];?>">
                      
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Requst now">
                            </div>
                        </form>
                        
                    </div>
         <?php
			
			
         
	 }
 } else{
	 ?>
	 <h2 style="color: #545454;margin-top: 300px;" > No results</h2>
	 <?php
 }
 ?>


<br /><br />
<div style="margin-top: 85%; height: 100px;">
<?php include('footer2.php'); ?></div>
</body>

</html>
