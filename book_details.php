<?php
session_start();
require_once ('database.php');
require_once ('utility.php');

//print_r($_SESSION['SESSION_CART']); exit;

$id = $_REQUEST['id'];

$db = getDBConnection();
$query = "SELECT * FROM books WHERE book_id=".$id;
$rs = $db->query($query);
if($rs->num_rows > 0)
{
		$row = $rs->fetch_array();
		$rs->close();
}
$db->close();


?>
﻿<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Online Bookstore - Book Details</title>
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
							<li class="shopcart"><a class="cartbox_active" href="cart.php" id="anchor_cart"></a>
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
        <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Book Details</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start main Content -->
        <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
		        							  <a href="1.jpg"><img src="images/product/<?php echo $row['book_image'] ; ?>" alt=""></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1><?php echo $row['book_title']; ?></h1>
        								<div class="product-info-stock-sku">
        									<p class="d-flex">Author:&nbsp;&nbsp;<span><?php echo $row['book_author'] ; ?></span></p>
													<p class="d-flex">Publisher:&nbsp;&nbsp;<span><?php echo $row['book_publisher']; ?></span></p>
													<p class="d-flex">ISBN:&nbsp;&nbsp;<span><?php echo $row['book_isbn']; ?></span></p>
        								</div>

        								<div class="price-box">
        									<span>$<?php echo $row['book_price']; ?></span>
        								</div>

        								<div class="box-tocart d-flex">
        									<span>Qty</span>
        									<input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
        								</div>

												<div class="box-tocart d-flex">
        									<div class="addtocart__actions">

														<input type="hidden" name="hid_book_id" id="hid_book_id" value="<?php echo $row['book_id']; ?>">
														<input type="hidden" name="hid_price" id="hid_price" value="<?php echo $row['book_price']; ?>">

        										<button id="btn_add_to_cart" class="tocart" type="button" title="Add to Cart">Add to Cart</button>
														<button id="btn_buy_now" class="tocart" type="button" title="Add to Cart">Buy Now</button>

        									</div>
        								</div>
												<div style="height:70px;">

												</div>

        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Description</a>
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										<p> <?php echo $row['book_desc']; ?> </p>
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->

	                        </div>
        				</div>


        			</div>

        		</div>
        	</div>
        </div>
        <!-- End main Content -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form--2" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->

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

		  $("#btn_add_to_cart, #btn_buy_now").click(function(){

				//debugger

				var book_id = $('#hid_book_id').val();
				var qty = $('#qty').val();
				var price = $('#hid_price').val();

				var dataObj = {};
				dataObj['book_id'] = book_id;
				dataObj['qty'] = qty;
				dataObj['price'] = price;
				dataObj['cart_action'] = 'add';

				$.ajax({
					type:'POST',
					url: "ajax_actions.php",
					data:dataObj,
					cache: false,
					success: function(res){
						$("#anchor_cart").html('<span class="product_qun">'+ res + '</span>');
						alert("Book added to your shopping cart." + res);
						window.location = "cart.php";
					}
				});


		  });

	});


	</script>

</body>
</html>
