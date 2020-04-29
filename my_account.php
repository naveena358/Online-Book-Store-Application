<?php
	require_once ('database.php');
	require_once ('utility.php');

	$redirect_to = (isset($_REQUEST['from'])) ? $_REQUEST['from'].'.php' : 'index.php' ;

?>

﻿<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login / Register</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	


  	<!-- Scripts -->
	<script src="js/vendor/jquery-3.4.1.min.js"></script>

</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-7 col-lg-2">
						<div class="logo">
							<a href="index.php">
								<img src="images/logo/logo.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">

							</ul>
						</nav>
					</div>
					<div class="col-md-8 col-sm-8 col-5 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">

						</ul>
					</div>
				</div>
			
			</div>
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<?php include("search.php"); ?>
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">
														<?php if(isset($_SESSION['username'])) {
																echo "MY ACCOUNT";
															} else {
																echo "LOGIN / REGISTER";
															}
															?>
													</h2>
													<?php if(isset($_SESSION['username'])) { ?>
													<nav class="bradcaump-content">
														 <a class="breadcrumb_item" href="javascript:void(0)">You logged in as: <?php echo $_SESSION['username']; ?></a>
													 </nav>
													 <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<!-- Start My Account Area -->

		<?php if(empty($_SESSION['username'])) {   ?>

		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<form action="#">
								<div class="account__form">
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" name="login_email" id="login_email">
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" name="login_pwd" id="login_pwd">

									</div>
									<div class="form__btn">
										<button type="button" id="login_but">Login</button>

									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
							<form action="#">
								<div class="account__form">
									<div class="input__box">
										<label>Your Name <span>*</span></label>
										<input type="text" name="cust_name" id="cust_name">
									</div>
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" name="cust_email" id="cust_email">
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" name="cust_pwd" id="cust_pwd">

									</div>
									<div class="form__btn">
										<button type="button" id="register_but">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php }  else { ?>
		<!-- End My Account Area -->


		<div id="accordion" class="checkout_accordion mt--30" role="tablist" style="margin:120px; 0">

	 	 <div class="payment">
	 			 <div class="che__header" role="tab" id="headingThree">
	 					 <a class="collapsed checkout__title" data-toggle="collapse" href="javascript:void(0);" onclick="window.location='my_orders.php';">
	 						 <span>My Orders</span>
	 					 </a>
	 			 </div>

	 	 </div>

		 <div class="payment">
				 <div class="che__header" role="tab" id="headingfour">
						 <a class="logout_button collapsed checkout__title" data-toggle="collapse" href="javascript:void(0);" aria-expanded="false" aria-controls="collapseThree">
							 <span>Log Out</span>
						 </a>
				 </div>

		 </div>

	  </div>

	<?php }  ?>

		<!-- Footer Area -->
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="#">BookStore.</a> All Rights Reserved</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">

						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	
	<script>

		$(document).ready(function(){

		  $("#register_but").click(function(){
			  
			    
				debugger
				
			  var name = $('#cust_name').val();
			  var email = $('#cust_email').val();;
			  var pwd = $('#cust_pwd').val();
			 
			  
			  
			  if(name.length > 0 && email.length > 0 && pwd.length > 0) {
				
				var dataObj = {};
				dataObj['register'] = 'true';
				dataObj['cust_name'] = $('#cust_name').val();
				dataObj['cust_email'] = $('#cust_email').val();;
				dataObj['cust_pwd'] = $('#cust_pwd').val();

				$.ajax({
					type:'POST',
					url: "ajax_actions.php",
					data:dataObj,
					cache: false,
					success: function(res){
						alert(res);
						alert("Your have been registered successfully.");
						window.location = '<?php echo $redirect_to; ?>';
					},
					error: function(res){
            console.log("ajax error");
					}
				
				
				});
			  } else {
				  alert("please fill in all the fields");
			  }

		  });

			$("#login_but").click(function(){

			 debugger
			 var dataObj = {};
			 dataObj['login'] = 'true';
			 dataObj['login_email'] = $('#login_email').val();;
			 dataObj['login_pwd'] = $('#login_pwd').val();
			 

			 $.ajax({
				 type:'POST',
				 url: "ajax_actions.php",
				 data:dataObj,
				 cache: false,
				 success: function(res){
					 if(res=="invalid user") {
					   alert("Invalid login.");
					 } else {
					   window.location = '<?php echo $redirect_to; ?>';
				 }
				 },
				 error: function(res){
						console.log("ajax error");
				 }
			 });


		 });

		 $(".logout_button").click(function(){

			debugger
			var dataObj = {};
			dataObj['logout'] = 'true';

			$.ajax({
				type:'POST',
				url: "ajax_actions.php",
				data:dataObj,
				cache: false,
				success: function(res){
					if(res=="invalid user") {
						alert("You have successfully logged out.");
					} else {
						window.location = "my_account.php";
				}
				},
				error: function(res){
					 console.log("ajax error");
				}
			});


		});



	});


	
	</script>


</body>
</html>
