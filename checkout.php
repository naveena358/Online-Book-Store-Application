<?php
			require_once ('database.php');
			require_once ('utility.php');

			//check user logged in or not
			if(!isset($_SESSION['CUSTOMER_ID'])) {

				echo "<script>window.location='my_account.php?from=checkout';</script>";
				exit;

			}

			$count = 0;
			$books_array = array();

			if(isset($_SESSION['SESSION_CART'])) {

				 $qnty_arr = $_SESSION['SESSION_CART']['qnty_arr'];

         $book_id_arr = $_SESSION['SESSION_CART']['book_id_arr'];

				 $count = count($book_id_arr);

			}

			if($count) {

					$db = getDBConnection();
					$str = implode(",",$book_id_arr);

					$query = "SELECT * FROM books WHERE book_id IN (". $str . ")";
					//echo  $query; exit;
					$rs = $db->query($query);
					if($rs->num_rows > 0)
					{
						while($row = $rs->fetch_array())
						{
							$books_array[] = $row;
						}
							$rs->close();
					}
					$db->close();
		}

 ?>
﻿<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Checkout</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
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
                        	<h2 class="bradcaump-title">Checkout</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">

        		<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<h3>Shipping Information</h3>
        					<div class="customar__field">
        						<div class="margin_between">
	        						<div class="input_box space_between">
	        							<label>First name <span>*</span></label>
	        							<input type="text" name="ship_first_name" id="ship_first_name" value="<?php echo $_SESSION['username']; ?>">
	        						</div>
	        						<div class="input_box space_between">
	        							<label>Last name <span>*</span></label>
	        							<input type="text" name="ship_last_name" id="ship_last_name">
	        						</div>
        						</div>

										<div class="margin_between">
											<div class="input_box space_between">
												<label>Phone <span>*</span></label>
												<input type="text" name="ship_phone" id="ship_phone">
											</div>
											<div class="input_box space_between">
												<label>Address <span>*</span></label>
	        							<input type="text" name="ship_address" id="ship_address">
											</div>
										</div>

										<div class="margin_between">
											<div class="input_box space_between">
												<label>State<span>*</span></label>
												<input type="text" name="ship_state" id="ship_state" value="MI" readonly>
											</div>
											<div class="input_box space_between">
												<label>Country<span>*</span></label>
												<input type="text" name="ship_country" id="ship_country" value="USA" readonly>
											</div>
										</div>


        					</div>

        				</div>

        			</div>
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__order__box">
        					<h3 class="onder__title">Your Order</h3>
        					<ul class="order__total">
        						<li>Book Name</li>
        						<li>Total</li>
        					</ul>
        					<ul class="order_product">
										<?php
											$sub_total = 0.0;
											$shipping_total = 0.0;
											$grand_total = 0.0;
											$ship_per_item = 1.00;
											$total_items = count($books_array);
											$shipping_total = $total_items * $ship_per_item;
											$order_items = array();
											foreach ($books_array as $value) {
												 $bid = $value['book_id'];
												 $qunatity = $qnty_arr[$bid];
												 $book_price = $value['book_price'];
												 $item_total = floatval($book_price)*intval($qunatity);
												 $sub_total += $item_total;
												 $order_items[] = array("book_id"=>$bid, "book_price"=>$book_price, "book_qty"=>$qunatity);

											?>
        						<li><?php echo $value['book_title']." x ".$qunatity;?><span>$<?php echo $item_total; ?></span></li>

									<?php
												}

												$grand_total = $sub_total + $shipping_total;
												$_SESSION['ORDER_TOTAL'] = $grand_total;
												$_SESSION['ORDER_ITEMS'] = $order_items;


									?>
        					</ul>
        					<ul class="shipping__method">
        						<li>Cart Subtotal <span>$<?php echo $sub_total; ?></span></li>
										<li>Shipping <span>$<?php echo $shipping_total; ?></span></li>

        					</ul>
        					<ul class="total__amount">
        						<li>Order Total <span>$<?php echo $grand_total; ?></span></li>
        					</ul>
        				</div>

								<div style="padding:20px 2px 0px 1px; padding: 20px 2px 0px 1px; color:#e59285; font-size: 1.5em;">
									Payment
								</div>
					    <div id="accordion" class="checkout_accordion mt--30" role="tablist">


						    <div class="payment">
						        <div class="che__header" role="tab" id="headingThree">
						          	<a class="pay_button collapsed checkout__title" data-toggle="collapse" href="javascript:void(0);" aria-expanded="false" aria-controls="collapseThree">
							            <span>Cash on Delivery</span>
						          	</a>
						        </div>

						    </div>
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingFour">
						          	<a class="pay_button collapsed checkout__title" data-toggle="collapse" href="javascript:void(0);" aria-expanded="false" aria-controls="collapseFour">
							            <span>Card Payment Debit/Credit</span>
						          	</a>
						        </div>

						    </div>
					    </div>

        			</div>
        		</div>
        	</div>
        </section>
        <!-- End Checkout Area -->
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

					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	

<script>

		$(document).ready(function(){

		  $(".pay_button").click(function(){

				var fn = $('#ship_first_name').val();
				var ln = $('#ship_last_name').val();
				var adr = $('#ship_address').val();
				var ph = $('#ship_phone').val();

				if(fn.length && ln.length && adr.length && ph.length)
				{
						var dataObj = {};
						dataObj['cart_action'] = 'payment';
						dataObj['ship_name'] = $('#ship_first_name').val() + " " + $('#ship_last_name').val();
						dataObj['ship_address'] = $('#ship_address').val();;
						dataObj['ship_phone'] = $('#ship_phone').val();

						$.ajax({
							type:'POST',
							url: "ajax_actions.php",
							data:dataObj,
							cache: false,
							success: function(res){
								debugger
								alert("Click OK to conform your order.");
								window.location = "index.php";
							},
							error: function(res){
		            console.log("ajax error");
							}
						});
			  } else {
					alert("Please fill required fills");
					return false;
				}

		  });

	});

</script>

</body>
</html>
