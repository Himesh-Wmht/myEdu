<?php session_start();
if(!isset($_SESSION['aduseremail'])){
	header('Location: login.php');
}?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
		<link rel="shortcut icon" href="MY-EDU.png">
        <title>MYEDU Control Unit</title>
<!--        <link href="styles.css" rel="stylesheet" />-->
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        
       
    </head>
    <body class="sb-nav-fixed">
      
        <div id="layoutSidenav" >
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
					
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Admin 
                            </a>
                            <div class="sb-sidenav-menu-heading">Function</div>
                           <a class="nav-link" href="test2.php" >
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                 Manage Student
                            </a>
							 <a class="nav-link" href="process.php" >
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                 Uploads study Packs
                            </a>
                           
                             <a class="nav-link" href="mngadmin.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                 Manage Admin
                            </a>
                           
							 <a class="nav-link" href="test.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                 Manage Requests
                            </a>
							 <a class="nav-link" href="mngteacher.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                 Manage Teachers
                            </a>
                           
                           
							 <a class="nav-link" href="achivements.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                 Manage Achievement
                            </a>
							  
                            <a class="nav-link" href="feedback.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-comments"></i></div>
                                Student Feedback or Request 
                            </a>
							 <a class="nav-link" href="pdf/index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                 Genarate Student Report
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['aduseremail']; ?>
                    </div>
                </nav>
            </div>
           
        </div>
		
		
<!--
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
-->
    </body>
</html>
