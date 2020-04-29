<?php
			require_once ('database.php');
			require_once ('utility.php');

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
	<title>Online Bookstore - Shopping Cart</title>
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
        <div class="ht__bradcaump__area bg-image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shopping Cart</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
																			<?php
																				$sub_total = 0.0;
																				$shipping_total = 0.0;
																				$grand_total = 0.0;
																				$ship_per_item = 1.00;
																				$total_items = count($books_array);
																				$shipping_total = $total_items * $ship_per_item;

																				foreach ($books_array as $value) {
																			     $bid = $value['book_id'];
																					 $qunatity = $qnty_arr[$bid];
																					 $book_price = $value['book_price'];
																					 $item_total = floatval($book_price)*intval($qunatity);
																					 $sub_total += $item_total;

																				?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="images/product/thumb/<?php echo $value['book_image']; ?>" alt="product img"></a></td>
                                            <td class="product-name"><a href="#"><?php echo $value['book_title']; ?></a></td>
                                            <td class="product-price"><span class="amount">$<?php echo $value['book_price']; ?></span></td>
                                            <td class="product-quantity"><input class="cart_qty" type="text" value="<?php echo $qunatity; ?>"></td>
                                            <td class="product-subtotal">$<?php echo $item_total; ?></td>
                                            <td class="product-remove"><a bid="<?php echo $bid; ?>" price="<?php echo $value['book_price']; ?>" qty="<?php echo $qunatity; ?>" class="remove_but" href="javascript:void(0)">X</a></td>
                                        </tr>

																			<?php }

																					$grand_total = $sub_total + $shipping_total;
																			?>

                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li><a href="index.php">Continue Shopping</a></li>
                                <li><a href="checkout.php">Check Out</a></li>
                            </ul>
														<div class="row">
						                    <div class="col-lg-6 offset-lg-6">
						                        <div class="cartbox__total__area">
						                            <div class="cartbox-total d-flex justify-content-between">
						                                <ul class="cart__total__list">
						                                    <li>Cart Total</li>
						                                    <li>Shipping Total</li>
						                                </ul>
						                                <ul class="cart__total__tk">
						                                    <li>$<?php echo $sub_total; ?></li>
						                                    <li>$<?php echo $shipping_total; ?></li>
						                                </ul>
						                            </div>
						                            <div class="cart__total__amount">
						                                <span>Grand Total</span>
						                                <span>$<?php echo $grand_total; ?></span>
						                            </div>
						                        </div>
						                    </div>
						                </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <!-- cart-main-area end -->
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

			$(".remove_but").click(function(){

				debugger
				var bid = $(this).attr("bid");
				var qty = $(this).attr("qty");
				var price = $(this).attr("price");


				var dataObj = {};
				dataObj['cart_action'] = 'remove';
				dataObj['book_id'] = bid;
				dataObj['qty'] = qty;
				dataObj['price'] = price;

				$.ajax({
					type:'POST',
					url: "ajax_actions.php",
					data:dataObj,
					cache: false,
					success: function(res){
						window.location = "cart.php";
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
