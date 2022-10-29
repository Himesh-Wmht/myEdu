<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Shopping cart </title>

	<style type="text/css">

		@import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	*{

		margin: 0;

		padding: 0;

		color: #454545;

	}

	h1{

		width: 3%;

	    position: relative;

	    top: 60px;

	    left: 90%;

	    cursor: pointer;

	}

	h1:before{

		content: attr(data-count);

	    color: white;

	    position: absolute;

	    right: 16px;

	    font-size: 15px;

	    text-align: center;

	    top: -12px;

	    width: 20px;

	    height: 20px;

	    background: red;

	    border-radius: 50%;

	    opacity: 0;

	}

	h1.zero:before{

		opacity: 1;

	}

		section{

			margin: 100px auto;

			width: 90%;

			height: 400px;

			display: flex;

			justify-content: space-around;

		}

		section div{

			width: 22%;

			height: 93%;

			background:#f5f5f5;

			padding: 1%;

			position: relative;

		}

		img{

			width: 300px;

			height: 186px;

		}



		p{

			margin: 5px;

		}

		h6{

		    width: 50px;

		    padding: 5px;

		    margin: 10px;

		    font-size: 15px;

		}

		button{

			padding: 5px;

		    background: red;

		    border: none;

		    outline: none;

		    font-weight: bold;

		    color: #fafafa;

		    cursor: pointer;

		}

		section div span{

			position: absolute;

		    top: 14px;

		    left: 13px;

		    background: red;

		    width: 300px;

		    height: 186px;

		    display: none;

		}

		section div span img{

			width: 100%;

			height: 100%;

		}

		section div:nth-child(1)>span.active{

			animation: first 0.5s ease-in;

			z-index: 2;

			display: block;



		}

		section div:nth-child(2)>span.active{

			animation: second 0.5s ease-in;

			z-index: 2;

			display: block;



		}

		section div:nth-child(3)>span.active{

			animation: third 0.5s ease-in;

			z-index: 2;

			display: block;



		}

		section div:nth-child(4)>span.active{

			animation: four 0.5s ease-in;

			z-index: 2;

			display: block;



		}

		@keyframes first{

			to{

				width: 30px;

			    height: 20px;

			    left: 1290px;

			    top: -70px;

			}

		}

		@keyframes second{

			to{

				width: 30px;

			    height: 20px;

			    left: 948px;

			    top: -70px;

			}

		}

		@keyframes third{

			to{

				width: 30px;

			    height: 20px;

			    left: 606px;

			    top: -70px;

			}

		}

		@keyframes four{

			to{

				width: 30px;

			    height: 20px;

			    left: 265px;

			    top: -70px;

			}

		}





		

		.select{

			width: 60%;

			height: 580px;

			padding: 5%;

			background: #222;

			position: absolute;

			top: -1000px;

			left: 20%;

			transition: 0.5s;

			overflow-y: auto;

			margin: auto;

		}

		.select.display{

			top: 10px;

		}

		.select div{

			width: 100%;

			height: 200px;

			display: flex;

			padding: 5px;

			border: 1px solid white;

			position: relative;

			margin: 5px auto;

		}

		.select div img{

			width: 300px;

			height: 100%;

		}

		.select div p{

			padding: 35px;

			color: white;

		}

		.select div h6,

		.select div button{

			position: absolute;

			left: 45%;

			top: 50%;

			color: white;

		}

		.select div button{

			left: 60%;

			top: 55%;

		}

		.select div span{

			display: none;

		}



		

	

	</style>

</head>

<body>

	

	<h1><i class=" fa fa-shopping-cart"></i></h1>



	<section>

		<div class="item">

			<img src="043.jpg">

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, quo, modi ea voluptas tempora vero cumque incidunt eum animi</p>

			<h6>$345.89</h6>

			<span></span>

			<button>Add-cart</button>

			

		</div>

		<div class="item">

			<img src="044.jpg">

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, quo, modi ea voluptas tempora vero cumque incidunt eum animi</p>

			<h6>$345.89</h6>

			<span></span>

			<button>Add-cart</button>

		</div>

		<div class="item">

			<img src="045.jpg">

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, quo, modi ea voluptas tempora vero cumque incidunt eum animi</p>

			<h6>$345.89</h6>

			<span></span>

			<button>Add-cart</button>

		</div>

		<div class="item">

			<img src="046.jpg">

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, quo, modi ea voluptas tempora vero cumque incidunt eum animi</p>

			<h6>$345.89</h6>

			<span></span>

			<button>Add-cart</button>

		</div>

	</section>

	<div class="select">

		

	</div>

	

</body>

</html>



<script type="text/javascript">

	var noti = document.querySelector('h1');

	var select = document.querySelector('.select');

	var button = document.getElementsByTagName('button');

	for(var but of button){

		but.addEventListener('click', (e)=>{

			var add = Number(noti.getAttribute('data-count') || 0);

			noti.setAttribute('data-count', add +1);

			noti.classList.add('zero')



			// image --animation to cart ---//

			var image = e.target.parentNode.querySelector('img');

			var span = e.target.parentNode.querySelector('span');

			var s_image = image.cloneNode(false);

			span.appendChild(s_image);

			span.classList.add("active");

			setTimeout(()=>{

				span.classList.remove("active");

				span.removeChild(s_image);

			}, 500); 

			



			// copy and paste //

			var parent = e.target.parentNode;

			var clone = parent.cloneNode(true);

			select.appendChild(clone);

			clone.lastElementChild.innerText = "Buy-now";

			

			if (clone) {

				noti.onclick = ()=>{

					select.classList.toggle('display');

				}	

			}

		})

	}

	

	





	

	



	

</script>