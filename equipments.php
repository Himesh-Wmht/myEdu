<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="shortcut icon" href="images/MY-EDU.png"/ >
<title style="padding-top:120px;">Informations</title>


</head>

<body>
<?php 



include('DB1.php'); 



//add cart

if(isset($_POST['add'])){
	 if(isset($_SESSION['cart'])){
		 
		 
	   $EID = array_column($_SESSION['cart'],'id'); 
		
		if(!in_array($_GET['id'],$EID)){
			
			$count = count($_SESSION['cart']);
			
			$E_Array =array('id'=>$_GET['id'],'image'=>$_POST['hidden_image'],'name'=>$_POST['hidden_name'], 'qty'=>$_POST['quantity']);
			
			$_SESSION['cart'][$count]=$E_Array;
			
		}	 
	 }
	 else{
		 		
			$E_Array =array('id'=>$_GET['id'],'image'=>$_POST['hidden_image'],'name'=>$_POST['hidden_name'], 'qty'=>$_POST['quantity']);
			
		  $_SESSION['cart'][0]=$E_Array;
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
<script>
$(document).ready(function(){
	var index = "<?php echo $_GET['tabIndex']; ?> ";
 		if(index==1)
    		$('.nav-tabs a[href="#Results"]').tab('show')
		if(index==2)
    		$('.nav-tabs a[href="#Schedules"]').tab('show')
		if(index==3)
    		$('.nav-tabs a[href="#Feedback"]').tab('show')
	
 
});
</script>
<div  style="width:100%; height:100px; background-size:cover;"><br>
<h1 align="center" style="color:#007310; ">Equipments</h1>
</div>

<br>
<ul style="background-color:#93A9B9;" class="nav nav-tabs nav-pills " id="pills-tab" role="tablist">
  <li class="nav-item " style="width:33.3%;">
    <a class="nav-link active" id="cricket-tab" data-toggle="tab" href="#cricket" role="tab" aria-controls="cricket"
      aria-selected="false"  style="color:#000000;"><center>Make Request</center></a>
  </li>
  <li class="nav-item " style="width:33.3%; ">
    <a class="nav-link " id="indoor-tab" data-toggle="tab" href="#indoor" role="tab" aria-controls="indoor"
      aria-selected="true" style="color:#000000;" class="btn-success"><center>Check Request</center></a>
  </li>
  
  <li class="nav-item " style="width:33.3%;">
    <a class="nav-link" id="athletic-tab" data-toggle="tab" href="#athletic" role="tab" aria-controls="athletic"
      aria-selected="false"  style="color:#000000;"><center>Study Packs</center></a>
 
  
</ul><br>
<div class="tab-content" id="myTabContent">

 <div class="tab-pane fade show active" id="cricket" role="tabpanel" aria-labelledby="cricket-tab">
<?php include('inquiry.php'); ?>
 </div>
 <div class="tab-pane fade" id="indoor" role="tabpanel" aria-labelledby="indoor-tab">

<?php include('indoor.php'); ?>
</div>
   
  <div class="tab-pane fade" id="athletic" role="tabpanel" aria-labelledby="athletic-tab">
 <?php include('athletic.php'); ?>
 
 </div>
 </div>

<!-- </div>-->


<?php include('footer2.php'); ?>
</body>
</html>