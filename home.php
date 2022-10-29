<style type="text/css">
.row {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create two equal columns that sits next to each other */
.column {
  flex: 50%;
  padding: 0 4px;
}

.column img {
  margin-top: -8px;
  vertical-align: middle;
  attachment: fixed;
  size: cover;
}
.column h1 {
  margin-left: -200px;
  vertical-align: left;
}
</style>

<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Home Page</title>
  <link rel="shortcut icon" href="images/MY-EDU.png"/>
  <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
  <link rel="stylesheet" href="home.css" >
  <style>
	  .reqbtn{
		  color: black;
		  text-decoration: none;
	  }
	
	</style>
  
</head>

<body>
  <?php 
  if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?>
      <br><br><br><br><br>
  <div class="row">
  <div class="column">
  <img src="images/test.jpg"/>
  <h1><br><br>WELCOME
    TO THE 
    MINISTRY OF EDUCATION</h1>
</div>

</div>
  <main>
   
    <section class="section-2 container-fluid p-0">
      
      <div class="container-fluid text-center">
        <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
          <div class="rect">
            <h1>30</h1>
            <p>SPORTS TEAMS|| </p>
            <br>
          </div>
          <div class="rect">
            <h1>520</h1>
            <p>AWARDES || </p>
          </div>
          <div class="rect">
            <h1>20</h1>
            <p>BUILDINGS ||</p>
          </div>
           <div class="rect">
            <h1>200</h1>
            <p>TEACHERS ||</p>
          </div>
          <div class="rect">
            <h1>8500</h1>
            <p>STUDENTS </p>
          </div>
        </div>
        <h1>OUR MAIN FACILITIES...</h1> 
      </div>

      
    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
        
            <div class="row">
            <div class="cover">
        <div class="overlay"></div>
        <div class="content text-lg-right">
     
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Play Ground</h4>
                            <p class="m-0">To practice skills  and successfully take on leadership roles, persevere in the face of distractions, and generate creative ideas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Music and Dance</h4>
                            <p class="m-0">To better brain development, increases human connection, improves grades, helps to socialise, and even lowers stress levels.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Arts and Crafts</h4>
                            <p class="m-0">Arts and craft activities help instil a sense of achievement and pride in children, boosting theirself-confidence</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Science and Technology</h4>
                            <p class="m-0">to understand and process a large amount of information. And knowing about the Analitical Practices</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Safe Transportation</h4>
                            <p class="m-0">The unique purpose of transportation is to overcome space, which is shaped by a variety of human and physical constraints such as distance and time</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Healthy food</h4>
                            <p class="m-0">A vast body of research shows that improved nutrition in schools leads to increased focus and attention, improved test scores and better classroom behavior. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                <iframe width="355" height="220" src="https://www.youtube.com/embed/mXdxdzroiIE?start=97" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                <div class="col-lg-4 col-md-6 pb-1">
                <iframe width="355" height="220" src="https://www.youtube.com/embed/nJhSsjL3M4s?start=5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>   
                    <div class="col-lg-4 col-md-6 pb-1">
                    <iframe width="355" height="220" src="https://www.youtube.com/embed/RU5Ht9_ysJM?start=97" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
            </div>
            
        </div>
    </div>
    <!-- Facilities Start -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="images/about-1.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">Learn About Us</span></p>
                    <h1 class="mb-4">Best School For Your Kids</h1>
                    <p>Being self-assured and confident in one’s abilities is crucial to healthy self-esteem. People who don’t have much confidence are more likely to be taken advantage of and struggle with anxiety. In a school setting, kids get the opportunity to build their confidence early on. As they learn to read, write, solve math problems, and more, their confidence in their abilities increases. A teacher plays a very important role in this. It’s their job to celebrate a student’s progress as well as their successes, as many struggle with certain subjects.</p>
                    <div class="row pt-2 pb-4">
                        <div class="col-6 col-md-4">
                            <img class="img-fluid rounded" src="images/about-2.jpg" alt="">
                        </div>
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom"><i class="fa fa-check text-primary mr-3"></i>Separate Sttention</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Solving Problems</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>External activities through technology</li>
                            </ul>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



   


    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Our Teachers</span></p>
                <h1 class="mb-4">Meet Our Teachers</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="images/team-1.jpg" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Julia Smith</h4>
                    <i>Music Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="images/team-2.jpg" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Jhon Doe</h4>
                    <i>Language Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="images/team-3.jpg" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Mollie Ross</h4>
                    <i>Dance Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="images/team-4.jpg" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Donald John</h4>
                    <i>Art Teacher</i>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Latest Blog</span></p>
                <h1 class="mb-4">Latest Articles From Blog</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="images/blog-1.jpg" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">PRACTICLES</h4>
                            <div class="d-flex justify-content-center mb-3">
                               
                            </div>
                            <p>As Mental Health is one of the key elements for individual well-being, we offer Education Programs based on our personal expertise in this area....</p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="images/blog-2.jpg" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">SELF LEARNING METHODS</h4>
                            <div class="d-flex justify-content-center mb-3">
                             
                            </div>
                            <p>Feeling authentic and open in schools leads to better performance, engagement,
and overall well-being.... </p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="images/blog-3.jpg" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">NEW LEARNING TECHNOLOGIES</h4>
                            <div class="d-flex justify-content-center mb-3">
                             
                            </div>
                            <p>Being self-assured and confident in one’s abilities is crucial to healthy self-esteem. People who don’t have....</p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

		
    </section> 
  </main>
	  
	   

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="home.js"></script>
  <?php include('footer2.php'); ?>
</body>

</html>