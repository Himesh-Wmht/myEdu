<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	//connection
	include('include/db.php');
	
		///get from db///
	
	
//get product category titles to nav
	
	$pro_cat_id = "";
	
function get_pro_cats(){
	
	global $conn;
	
	$get_pro_cats = "select * from product_category";
	
	$run_pro_cats = mysqli_query($conn,$get_pro_cats);
	
	while($row_p_cats=mysqli_fetch_array($run_pro_cats)){
	
		$pro_cat_id = $row_p_cats['Product_category_id'];
		
		$pro_cat_name = $row_p_cats['Product_Category_name'];
		
		echo "
		
		<li class='nav_item'>
		
		<a class='nav-link active' style='font-size:20px' href='home.php?product_cat=$pro_cat_id'> $pro_cat_name </a>
		
		</li>
		
		
		";
		
		}
	
	}

//view by product category (necklace earings rings bracelets)	
	
function get_pro_cat_pro(){
	
	global $conn;
	
	if(isset($_GET['product_cat'])){
		
		$pro_cat_id = $_GET['product_cat'];
		
		$get_pro_cat = "select * from product_category where Product_category_id ='$pro_cat_id'";
		
		$run_pro_cat = mysqli_query($conn,$get_pro_cat);
		
		$row_pro_cat = mysqli_fetch_array($run_pro_cat);
		
		$pro_cat_name = $row_pro_cat['Product_Category_name'];
		
		$get_products = "select * from product where Product_Category ='$pro_cat_id'";
		
		$run_products = mysqli_query($conn,$get_products);
		
		$count = mysqli_num_rows($run_products);
		
		if($count==0){
			
			echo "
			
			<div class='container'>
			
			<h1> No products </h1>
			
			</div>
			
			";
			
			}else{
				
				echo "
				
				<div class='container'>
				
				<h1> $pro_cat_name</h1>
				
				</div>
				
				";
				
				}
				
				while($row_products=mysqli_fetch_array($run_products)){
					
						   $pro_id = $row_products['Product_id'];
						   
						   $title = $row_products['Title'];
						   
						   $price = $row_products['Price'];
					   
						   $pro_img = $row_products['Product_image'];
						   
						echo "
						
						    <div class='col-md-4 col-sm-6 col-lg-4 single'>
			     <div class='product'>
				    <img class='img-responsive img-fluid' src='images/product/$pro_img'>
				     
					 <div class='text'>
					    <h3> 
						   <a href='product_details.php?pro_id=$pro_id'> $title </a>
						</h3>
						
						<p class='price'>
				            Rs.$price/-
						</p>
						
						<p class='button'>
						   <a class='btn btn-primary' href='product_details.php?pro_id=$pro_id'>
						   View Details
					   
					 </a>
					 <a class='btn btn-danger' href='product_details.php?pro_id=$pro_id'>
						 <i class='fa fa-shopping-cart'></i>  Add To Cart
					   
					 </a>
						</p>
						
					 </div>
				 </div>
			   </div>
			   
						
						";
					
					}		
		}
	
	}
	
	//get category titles to nav
	
	function getcategory(){
	
	global $conn;
	
	$get_cats = "select * from category";
	
	$run_cats = mysqli_query($conn,$get_cats);
	
	while($row_cats=mysqli_fetch_array($run_cats)){
		
		$cat_id = $row_cats['Category_id'];
		
		$cat_name = $row_cats['Category_name'];
		
		echo "
		
		<li class='nav-item'>
		
		<a class='nav-link active' style='font-size:20px' href='home.php?cat=$cat_id'> $cat_name </a>
		
		</li>
		
		
		";
		
		}
	
 }
	
//view by category (ladies gens kids)	
function getcatpro(){
	
	global $conn;
	
	$cat_id="";
 $cat_name="";

	
	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];
		
		$get_cat = "select * from category where Category_id='$cat_id'";
		
		$run_cat = mysqli_query($conn,$get_cat);
		
		$row_cat = mysqli_fetch_array($run_cat);
		
		$cat_name = $row_cat['Category_name'];
		
		$get_cat = "select * from product where Category='$cat_id' LIMIT 0,6";
		
		$run_products = mysqli_query($conn,$get_cat);
		
		$count = mysqli_num_rows($run_products);
		
		if($count==0){
			
			echo "
			
			<div class='container'>
			
			<h1> No products </h1>
			
			</div>
			
			";
			
			}else{
				
				echo "
				
				<div class='container'>
				
				<h1> $cat_name</h1>
				
				</div>
				
				";
				
				}
				
				while($row_products=mysqli_fetch_array($run_products)){
					
						   $pro_id = $row_products['Product_id'];
						   
						   $title = $row_products['Title'];
						   
						   $price = $row_products['Price'];
					   
						   $pro_img = $row_products['Product_image'];
						   
						echo "
						
						    <div class='col-md-4 col-sm-6 col-lg-4 single'>
			     <div class='product'>
				    <img class='img-responsive img-fluid' src='images/product/$pro_img'>
				     
					 <div class='text'>
					    <h3> 
						   <a href='product_display.php?pro_id=$pro_id'> $title</a>
						</h3>
		
						<p class='price'>
				            Rs.$price/-
						</p>
						
						<p class='button'>
						   <a class='btn btn-primary' href='product_details.php?pro_id=$pro_id'>
						   View Details
					   
					 </a>
					 <a class='btn btn-danger' href='product_details.php?pro_id=$pro_id'>
						 <i class='fa fa-shopping-cart'></i>  Add To Cart
					   
					 </a>
						</p>
						
					 </div>
				 </div>
			   </div>
			   
						
						";
					
					}		
		}
	
	}
	
	// get Real Ip User
	
	function getRealIpUser(){
	
	switch(true){
		
		case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
		case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
		case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
		
		default : return $_SERVER['REMOTE_ADDR'];
		
	  }
	
	}
	
	//add to cart function
	
	function add_cart(){
		
		global $conn;
		
		if(isset($_GET['add_cart'])){
			
			$ip_add = getRealIpUser();
			
			$pro_id = $_GET['add_cart'];
			
			$pro_qty = $_POST['product_qty'];
			
			$check_product = "select * from cart where Ip_add='$ip_add' AND Pro_id='$pro_id'";
			
			$run_check = mysqli_query($conn,$check_product);
			
			if(mysqli_num_rows($run_check)>0){
				
				echo "<script>alert('This product has already added in cart')</script>";
				echo "<script>window.open('product_details.php?pro_id=$pro_id','_self')</script>";
				
				}else{
					
			    $query = "insert into cart (Pro_id,Ip_add,Quantity) values ('$pro_id','$ip_add','$pro_qty')";
					
					$run_query = mysqli_query($conn,$query);
					
				    echo "<script>alert('Product has added to the cart successfully!')";
					echo "<script>window.open('product_details.php?pro_id=$pro_id','_self')</script>";
					
				}
			
			}
		
		}
	
	//Number of items

function items(){
	
	global $conn;
	
	$ip_add = getRealIpUser();
	
	$get_items = "select * from cart where Ip_add='$ip_add'";
	
	$run_items = mysqli_query($conn,$get_items);
	
	$count_items = mysqli_num_rows($run_items);
	
	echo $count_items;
	
	
	}
	//items total price
	
function totalPrice(){
	
	global $conn;
	
	$ip_add = getRealIpUser();
	
	$total = 0;
	$dis_rate = 0.1;
	$tax_rate = 0.03;
	$final_total = 0;
	$discount = 0;
	$tax = 0;
	$select_cart = "select * from cart where Ip_add='$ip_add'";
	
	$run_cart = mysqli_query($conn,$select_cart);
	
	while($record=mysqli_fetch_array($run_cart)){
		
		$pro_id = $record['Pro_id'];
		
		$pro_qty = $record['Quantity'];
		
		$get_price = "select * from product where Product_id='$pro_id'";
		
		$run_price = mysqli_query($conn,$get_price);
		
		while($row_price=mysqli_fetch_array($run_price)){
			
			$sub_total = $row_price['Price']*$pro_qty;
			
			$total = $sub_total;
			$discount = $total * $dis_rate;
			$tax = $total * $tax_rate;
			$final_total = ($total-$discount) + $tax;
			
			}
		
		}
		
		echo "Rs."  .  $final_total;
	
	}	

	
	
	?>
</body>
</html>