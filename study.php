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
		<link rel="shortcut icon" href="logo2.png">
        <title>Spogo Control Unit</title>
<!--        <link href="styles.css" rel="stylesheet" />-->
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        
    <title>Upload Study Packs</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <body class="sb-nav-fixed">
      
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card m-auto w-75">
                    <div class="card-header text-center text-white bg-primary">
                        <h4>PHP MySQLi How to Upload Multiple Files with Ajax</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible" id="success" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            File uploaded successfully
                        </div>
                        <form id="submitForm">
                            <div class="form-group">
                                <label><strong>Select Files : </strong><span class="text-danger"> *</span></label>
                                <input type="file" class="form-control" name="multipleFile[]" id="multipleFile" multiple>
                                <span id="error" class="text-danger"></span><br>
                            </div>
                            <div class="form-group d-flex">
                                <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>

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
