<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Online Bookstore - Contact</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

	
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
							  <li><a href="index.php">Home</a></li>
								<li><a href="#" class="search__active">Search Books</a></li>
								<li><a href="contact.php">Contact</a></li>

							</ul>
						</nav>
					</div>
					<div class="col-md-8 col-sm-8 col-5 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							 <li class="shopcart"><a href="cart.php"></a></li>
							<li class="setting__bar__icon"><a class="" href="my_account.php"></a>	</li>

						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.php">Home</a></li>
								<li><a href="contact.php">Contact</a></li>

							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->
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
                        	<h2 class="bradcaump-title">Contact Us</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="wn_contact_area bg--white pt--80">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8 col-12">
        				<div class="contact-form-wrap">
        					<h2 class="contact__title">contact information</h2>
        					

										<div class="wn__address">
														<div class="wn__addres__wreapper">

															<div class="single__address">
																<i class="icon-location-pin icons"></i>
																<div class="content">
																	<span>address:</span>
																	<p>652 Lakewood Avenue, Grand rapids, MI, USA</p>
																</div>
															</div>

															<div class="single__address">
																<i class="icon-phone icons"></i>
																<div class="content">
																	<span>Phone Number:</span>
																	<p>666-456-7890</p>
																</div>
															</div>

															<div class="single__address">
																<i class="icon-envelope icons"></i>
																<div class="content">
																	<span>Email address:</span>
																	<p>admin@book.store</p>
																</div>
															</div>

														</div>
													</div>

                        </div>

        			</div>

        		</div>
        	</div>

        </section>
        <!-- End Contact Area -->

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
									<div class="payment text-right">

									</div>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	

</body>
</html>
