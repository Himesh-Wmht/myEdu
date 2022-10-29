
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
     
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

   </head>
	<style>
	@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  user-select: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  background: #f2f2f2;
}
nav{
  background:#00121b;
  z-index: 1;
  position: fixed;
  width: 100%;
}
nav:after{
  content: '';
  clear: both;
  display: table;
}
nav .logo{
  float: left;
  color: white;
  font-size: 40px;
  font-weight: 600;
  line-height: 100px;
  padding-left: 10px;

}
nav ul{
  float: right;
  margin-top: 12px;
  margin-right: 40px;
  list-style: none;
  position: relative;
}
nav ul li{
  float: left;
  display: inline-block;
  background: #00121b;
  margin: 0 5px;
	
}
nav ul li a{
  color: white;
  line-height: 70px;
  text-decoration: none;
  font-size: 18px;
  padding: 8px 15px;
}
nav ul li a:hover{
  color: cyan;
  border-radius: 5px;
  box-shadow:  0 0 5px #33ffff,
               0 0 10px #66ffff;
}
nav ul ul li a:hover{
  box-shadow: none;
}
nav ul ul{
  position: absolute;
  top: 90px;
  border-top: 3px solid cyan;
  opacity: 0;
  visibility: hidden;
  transition: top .5s;
}
nav ul ul ul{
  border-top: none;
}
nav ul li:hover > ul{
  top: 70px;
  opacity: 1;
  visibility: visible;
}
nav ul ul li{
  position: relative;
  margin: 0px;
  width: 150px;
  float: none;
  display: list-item;
  border-bottom: 1px solid rgba(0,0,0,0.3);
}
nav ul ul li a{
  line-height: 50px;
/*margin-top: 1%;*/
	
}
nav ul ul ul li{
  position: relative;
  top: -60px;
  left: 150px;
	
}
.show,.icon,.nb{
  display: none;
}
.fa-plus{
  font-size: 15px;
  margin-left: 40px;
}
@media all and (max-width: 968px) {
  nav ul{
    margin-right: 0px;
    float: left;
  }
 
  .show + a, ul{
    display: none;
  }
  nav ul li,nav ul ul li{
    display: block;
    width: 100%;
  }
  nav ul li a:hover{
    box-shadow: none;
  }
  .show{
    display: block;
    color: white;
    font-size: 18px;
    padding: 0 20px;
    line-height: 70px;
    cursor: pointer;
  }
  .show:hover{
    color: cyan;
  }
  .icon{
    display: block;
    color: white;
    position: absolute;
    top: 0;
    right: 40px;
    line-height: 70px;
    cursor: pointer;
    font-size: 25px;
  }
  nav ul ul{
    top: 70px;
    border-top: 0px;
    float: none;
    position: static;
    display: none;
    opacity: 1;
    visibility: visible;
  }
  nav ul ul a{
    padding-left: 40px;
	  
  }
  nav ul ul ul a{
    padding-left: 80px;
	  
  }
  nav ul ul ul li{
    position: static;
  }
  [id^=btn]:checked + ul{
    display: block;
  }
  nav ul ul li{
    border-bottom: 0px;
	margin-top: 0px;
  }
  span.cancel:before{
    content: '\f00d';
  }
}
.content{
  z-index: -1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  text-align: center;
}


		nav login{
			
			color: blue;
		}
		
		nav img {
			margin: 0.5%;
		   text-align: left;
			
		}
	
	</style>
   <body>
     <?php 
	   $search_a="";
        if(isset($_POST['btnSearch'])){
	
	       $_SESSION['txtSearch'] = $search_a;
	}else{

		}

	   
	   ?>
      <nav>
		 
         <div class="logo">
         <img src="MY-EDU.png" style= height="120px" width="150px"> 
         </div>
		 
         <label for="btn" class="icon">
         <span class="fa fa-bars"></span>
         </label>
         <input type="checkbox" id="btn" class="nb">
         <ul>
            <li><a href="home.php">Home</a></li>
          
            <li>
               <label for="btn-2" class="show">INFOR</label>
               <a href="#">INFOR</a>
               <input type="checkbox" id="btn-2" class="nb">
               <ul style="margin-top: 0px;">
               
				 <li>
                     <label for="btn-3" class="show" >INFOR</label>
                     <a href="#">INFOR <span class="fa fa-plus"></span></a>
                     <input type="checkbox" id="btn-3" class="nb">
                     <ul>
                        <li><a href="equipments.php">RESULTS</a></li>
                        <li><a href="equipments.php?indoor.php">SCHEDULE</a></li>
                        <li><a href="inquiry.php?athletic.php">FEEDBACK</a></li>
                     </ul>
                  </li>
               </ul>
            </li>

            <li><a href="AI.php">AI</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="contactus1.php">CONTACT</a></li>
            
	
    
		<li>
		<form method="post" action="prodSearch.php" >
			
					
		<a href="signup.php" style="font-size: 22px";"margin-right:50px;"> <i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
			
			 <li>  <a class="book" href="request.php"> <i class="fa fa-book" aria-hidden="true" style="font-size: 25px";></i></a> 
				 
			 
			 </li>
			 
			 
		 <div class="form-inline" style="margin-top: 15px;">
      <input class="form-control mr-sm-2" type="search" value="<?php echo $search_a; ?>" placeholder="Search" aria-label="Search" name="txtSearch">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnSearch">Search</button>
    </div>
			 </form> 
      </nav>
      
      
   </body>
</html>
