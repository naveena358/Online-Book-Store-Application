<?php
require_once ('database.php');
require_once ('utility.php');

$id = $_REQUEST['id'];
$cat_id = (isset($id)) ? $id : -1;
$books_array = getBooksList($cat_id);

?>

﻿<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Online Bookstore</title>
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
								<li><a href="#" class="search__active">Search Books</a></li>
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
                        	<h2 class="bradcaump-title">Buy Books Online at Best Prices</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Book Categories</h3>
										<?php echo getCategoryList(); ?>
        						<!-- <ul>
											<li><a href="#">Action &amp; Adventure <span>(5)</span></a></li>
        							<li><a href="#">Science &amp; Technology<span>(5)</span></a></li>
        							<li><a href="#">Sports<span>(5)</span></a></li>
        						</ul> -->
        					</aside>

        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
									<div class="col-lg-12"> &nbsp; </div>

        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">

											<?php foreach ($books_array as $value) { ?>

			        						<!-- Start Single Product -->
		        					<div class="col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product">
			        						<div class="product__thumb">
			        							<a class="first__img" href="single-product.html"><img src="images/product/<?php echo $value['book_image']; ?>" alt="book image"></a>
			        							<a class="second__img animation1" href="book_details.php?id=<?php echo $value['book_id']; ?>"><img src="images/product/<?php echo $value['book_image']; ?>" alt="book image"></a>
			        							<ul class="prize position__right__bottom d-flex">
			        								<li>$<?php echo $value['book_price']; ?></li>
			        							</ul>
			        						</div>
			        						<div class="product__content">
			        							<h4><a href="single-product.html"><?php echo $value['book_title']; ?></a></h4>
			        						</div>
			        					</div>
		        					</div>
		        					<!-- End Single Product -->
										<?php } ?>


	        					</div>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Shop Page -->
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
		
		<script>
			$(document).ready(function(){
				<?php if(isset($_REQUEST['id'])) {    echo 'var eid = "'.$_REQUEST['id'].'";'; ?>
			   $("a#cat_anchor" + eid).css({ color: '#e59285' });
				<?php } ?>
			});
   </script>

		


	</body>
	</html>
