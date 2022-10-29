<?php session_start(); ?>
<style>
    body {
 background-image: url('C:/xampp/xampp/htdocs/Finale/images/bglogin.png');
 background-color: #cccccc;
}
    </style>
<html><body> 
 
<?php 
  if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?>

<h1>WELCOME TO THE MYEDU AI PREDICTION</h1>
	   
   
	<?php
    
$birth_certificate = $_POST['birth_certificate'];
$pass_book= $_POST['pass_book'];
$property_own_by_parents= $_POST['property_own_by_parents'];
$own_by_anyother= $_POST['own_by_anyother'];
$electricity_or_water_bill= $_POST['electricity_or_water_bill'];
$electrol_register_in_5_yr= $_POST['electrol_register_in_5_yr'];
$residence_5_10Km= $_POST['residence_5_10Km'];
$residence_more_than_10= $_POST['residence_more_than_10'];
$past_pupil_of_school= $_POST['past_pupil_of_school'];
$brothers_sisters_in_school= $_POST['brothers_sisters_in_school'];
$child_of_school_staff= $_POST['child_of_school_staff'];
$total_mark= $_POST['total_mark'];

$command = escapeshellcmd('C:/xampp/xampp/htdocs/Finale/myEdu.py');
$output = shell_exec($command);
echo $output;

    ?></body></html>