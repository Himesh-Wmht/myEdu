<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap');

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
.ab{
    font-family: 'Playfair Display', serif;
    display: grid;
    background-color: aliceblue;
    align-content: center;
    min-height: 100vh;

}
section{
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 90vh;
    width: 100vw;
    margin: 0 auto;
}
.abt{
   background: url("images/history.jpg") center/cover no-repeat;
   padding: 1%;
   margin: 2%;
	width: 100%;
	height: 80%;
	
	
}

.image{
	
    background: url("images/About.jpg") center/cover no-repeat;
    width: 800px;
	height:100%;
	margin-top:154px; 

	
}


}
.area {
    background:   #daedec ;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
 background: url() center/cover no-repeat;
}

.content{
    background:  white ;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
	width: 600px;
	height: 700px;
	
	
}
.area h3{
    text-transform: uppercase;
    font-size: 36px;
    letter-spacing: 5px;
    opacity: 0.8;
    color:  #0e3432 ;
}
.content h2{
    text-transform: uppercase;
    font-size: 36px;
    letter-spacing: 5px;
    opacity: 0.8;
    color:  #0e3432 ;


}
.content h3{
    text-transform: uppercase;
    font-size: 20px;
    letter-spacing: 5px;
    opacity: 0.8;
    color:  #0e3432 ;
    

}
.area h2{
 text-transform: uppercase;
    font-size: 24px;
    letter-spacing: 5px;
    opacity: 0.8;
    color:  #0e3432 ;
}
.area h1{
    font-size: 36px;
    color:  #dcd31c;

}
.content p{
    padding-bottom: 15px;
    font-weight: 300;
    opacity: 0.7;
    width: 60%;
    text-align: center;
    margin: 0 auto;
    line-height: 1.7;
}


.icons{
    display: flex;
    padding: 15px 0;
}
.icons li{
    display: block;
    padding: 5px;
    margin: 5px;
}
.icons li i{
    font-size: 26px;
    opacity: 0.8;
}
.icons li i:hover{
    color: #06d6a0;
}


/*****************/

@media(max-width: 992px){
    section{
        grid-template-columns: 1fr;
        width: 120%;
    }

 
    .content p{
        font-size: 14px;
    }
    .links li a{
        font-size: 14px;
    }
    .links{
        margin: 5px 0;
    }
    .links li{
        padding: 6px 10px;
    }
    .icons li i{
        font-size: 15px;
    }
}
		</style>
    </head>
	
    <body class="ab">
	<?php include('Navigation Bar.php')?>	
       <?php 
  if (!isset($_SESSION['useremail'])){
	include('Navigation Bar.php');
}
	else{
		include('loggedinnav.php');
	}
    ?>

        <section>
            <div class="image" style="width:50%;">
             
            </div>

            <div class="content" style="margin-left:350px; margin-top: 130px; height: 600px">
                <h2>About Us</h2>
                <span></span>

                 <marquee behavior="scroll" direction="up"scrollamount="2">
<h3 align="center" style="color: #666a6c" style="font:Verdana, Arial, Helvetica, sans-serif" align="justify" style="text-align:center" ><b> VISION</b></h3>


  <p align="center" style="color:#006600" align="justify"> <b>
Vision

To be the leader in sports in Asia
.</b>
  </p>
  
  
<br />
<br />

  <h3 align="center" style="color:#666a6c" style="font-size:16px"><b>MISSION</b></h3>
  
  <p align="center" style="color:#006600"><b>To build a consolidated and prosperous land by grooming every citizen to be an energetic, healthy disciplined and dignified person through formulation of National policies and implementing same.</b>
  </p>
  
  
<br />
<br />
  
  <h3 align="center" style="color:#666a6c" style="font:Verdana, Arial, Helvetica, sans-serif" align="justify" style="text-align:center"><b>OUR VALUES</b></h3> 
  
  <p align="center" style="color:#006600">
  

    To make Sports an integral part of Sri Lankan Culture and Society.
    <br>
    To utilize Sports to enrich the quality of life, physical wellbeing and health of all Sri Lankans.
     <br>
    To provide knowledge, access and the opportunity for everyone to participate in Sports and enjoy its benefits.
     <br>
    To make available resources and appropriate infrastructure for the overall development of Sport.
     <br>
    To assist every Sri Lankan to achieve optimum potential in Sport and ensure that Sri Lanka’s international image as a successful sporting nation is both viable and sustainable.
     <br>
    To develop a Sports Industry in Sri Lanka, create new employment and contribute to the promotion of economic growth.
     <br>To utilize the field of sports as one of the main foreign exchange earner of Sri Lanka. <br>
    To bring peace and communal harmony through the sports. <br>

</p>
  

  </marquee>

<br><br>
                <ul class = "icons">
                    <li>
                        <i class = "fa fa-twitter"></i>
                    </li>
                    <li>
                        <i class = "fa fa-facebook"></i>
                    </li>
                    <li>
                        <i class = "fa fa-github"></i>
                    </li>
                    <li>
                        <i class = "fa fa-pinterest"></i>
                    </li>
                </ul>
            </div>
        </section>
        <br><br><br><br><br><br><br><br>
        <a class="abt">
        <section>

      
            <div class=" area"> 
                <br><br>
                <h1 align="center"> OUR HISTORY</h1>

<marquee behavior="scroll" direction="up"scrollamount="2" style="text-align: center; margin-bottom: 300px;">
    <div class ="container">
<p style="color: white "  >
    <br><br>
    If we trace back the history of sports in Sri Lanka, the year 1948 can be termed as a golden year as it was in that year that a Silver Medal was won by Sri Lanka at the International Olympic Games.
<br><br><br>
Duncan White won a Silver Medal in 400m hurdles in that year and thereafter, Sri Lankan sports have marched forward with many ups and downs on its way during the last 63 years. The highest award that Sri Lanka could win during the recent past was the winning of a Silver Medal by Susanthika Jayashinge at Sydney Olympics in the year 2000, In between, Sri Lanka has won many awards at the Commonwealth Games, World Championship, Asian games and South Asian Games bringing credit to the country.
<br><br><br>
Winning the Cricket World Cup in 1996 and being runners up twice thereafter have taken Sri Lanka to greater heights as a world leader in Cricket.
<br><br><br>
But during the last decade or so, there had been some setbacks in Sri Lankan sports due to unavoidable reasons. Due to the war situation which prevailed in the country for over 3 decades and up-rising among the youths have prevented the Sri Lankan younger generation from drawing towards sports. But with the dawn of the long awaited peace in the country, the time has come to use sports for the greater good of the peace, unity and prosperity of the nation. In this regard ,there are ample opportunities of using Sports for the good health of the younger generation by sharpening their sports talents to make them an active and a disciplined lot who could march ahead with team spirit .Similarly , in our attempts to make Sri Lanka the “ Wonder of Asia ” it is necessary to provide infra-structure facilities required by the sports field in order to build it up to make Sri Lanka an attractive venue in sports which could contribute for the economic development of the country creating, in turn, a new sports culture.
<br><br><br>
With these broad objectives in view, and to develop the sports field in Sri Lanka on a systematic and a scientific footing, it is proposed to announce a national policy on sports. It is hoped that all concerned parties will abide by this policy.
<br><br><br>
It is proposed to develop many varieties of sports in Sri Lanka to make sports an active contributor to the economic development of the country. Sports could also be used for the development of tourism as especially the international fame and recognition achieved in cricket can be used for this purpose. Similarly golf, surfing, and water sports have ideal opportunities and possibilities in Sri Lanka. In addition, motor racing, hill climbing, beach games and horse racing could be promoted in a big way and developed to attract tourists.
<br><br><br>
Another aspect is the development of sports-related industries with the use of our raw material and talented craftsmanship Sports equipment which are in great demand and tools which have a ready market could be easily manufactured in Sri Lanka, having encouraged prospective investors to undertake their production.
<br><br><br>
We also can develop the human resources relating to sports so that they can work as in international trainers and sports instructors. There are ample opportunities in Sri Lanka to develop those activities.
<br><br><br>
The favourable climatic conditions prevailing in Sri Lanka could be used to make the country an International Training Center in sports for overseas sports persons throughout the year.
<br><br><br>
In this task, sports should be treated as a beneficial economic activity which requires analysis and provision of related support.
<br><br><br>
With these broad concepts in view and in consideration of all the above factors, it is proposed to declare Sports Policy for Sri Lanka to develop the field of sports on a systematic and a scientific footing. Accordingly, it is hoped that all parties connected to sports will act in terms of proposed sports policy. 
</p></div>
</marquee>
<div class="imag">
 
    </div>
        </section>
</a>
  

<?php include('footer2.php'); ?>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; © 2021 
All Rights Reserved Sports Ministry 
  </body>
</html>