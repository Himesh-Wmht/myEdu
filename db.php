<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php
	//create connection
	
	$host ="localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "myedu";
	
	$con = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	
	//checking the connection
	if(mysqli_connect_errno()){
		die
			('Database connection failed'.mysqli_connect_error());
	}
	?>
</body>
</html>