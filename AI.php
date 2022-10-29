<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
		<meta http-equiv="Content-Type"content="text/html; charset=utf-8"/>
		<meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<title>Contact Us</title>
		<link rel="shortcut icon" href="images/MY-EDU.png"/ >
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	 <?php
      if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?> 
</head>
	   
   
	<body>
    

   

    <form action="phpFile.php" method="post"  style="margin-top: 20px;" name="crop" >
				
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Get In Touch</span></p>
                <h1 class="mb-4">Contact Us For Any Query</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label col-sm-4" for="birth_certificate">birth_certificate :</label>
                                <input type="text" class="form-control" name="birth_certificate" id="name" placeholder="Birth Certificate" required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="pass_book">pass_book :</label>
                                <input type="text" class="form-control" id="email" name="pass_book" placeholder="Your pass_book" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="property_own_by_parents">property_own_by_parents :</label>
                                <input type="text" class="form-control" id="subject"  name="property_own_by_parents" placeholder="property_own_by_parents" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="own_by_anyother">own_by_anyother :</label>
                                <input type="text" class="form-control" rows="6" id="message" name="own_by_anyother" placeholder="own_by_anyother" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="electricity_or_water_bill">electricity_or_water_bill :</label>
                                <input type="text" class="form-control" rows="6" id="message" name="electricity_or_water_bill" placeholder="electricity_or_water_bill" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="electrol_register_in_5_yr">electrol_register_in_5_yr :</label>
                                <input type="text" class="form-control" rows="6" id="message" name="electrol_register_in_5_yr" placeholder="electrol_register_in_5_yr" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="residence_5_10Km">residence_5_10Km :</label>
                                <input type="text" class="form-control" rows="6" id="message" name="residence_5_10Km" placeholder="residence_5_10km" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="residence_more_than_10">residence_more_than_10 :</label>
                                <input type="text" class="form-control" rows="6" id="message" name="residence_more_than_10" placeholder="residence_more_than_10" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="past_pupil_of_school">past_pupil_of_school :</label>
                                <input type="text" class="form-control" rows="6" id="message" name="past_pupil_of_school" placeholder="past_pupil_of_school" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="brothers_sisters_in_school">brothers_sisters_in_school :</label>
                                <input type="text" class="form-control" rows="6" id="message" name="brothers_sisters_in_school" placeholder="sisters_in_school" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="child_of_school_staff">child_of_school_staff :</label>
                                <input type="text" class="form-control" rows="6" id="message" name="child_of_school_staff" placeholder="child_of_school_staff" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label class="control-label col-sm-4" for="total_mark">total_mark :</label>
                                <input class="form-control" rows="6" id="message" name="total_mark" placeholder="Total mark" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-2 px-4" name="prediction"  id="sendMessageButton">prediction</button>
                            </div>

                        </form>
                        <br>
                        <br>
                        
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <p>Labore sea amet kasd diam justo amet ut vero justo. Ipsum ut et kasd duo sit, ipsum sea et erat est dolore, magna ipsum et magna elitr. Accusam accusam lorem magna, eos et sed eirmod dolor est eirmod eirmod amet.</p>
                    <div class="d-flex">
                        <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Address</h5>
                            <p>123 Street, New York, USA</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Email</h5>
                            <p>info@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Phone</h5>
                            <p>+012 345 67890</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>Opening Hours</h5>
                            <strong>Sunday - Friday:</strong>
                            <p class="m-0">08:00 AM - 05:00 PM </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Contact End -->


	<?php include('footer2.php'); ?>

	</body>
</html>

