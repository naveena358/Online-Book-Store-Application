<?php
			require_once ('database.php');
			require_once ('utility.php');

			$count = 0;
			$order_array = array();
			$books_array = array();

			$db = getDBConnection();

			$query = "SELECT * FROM orders WHERE customerid=".$_SESSION['CUSTOMER_ID'];
			//echo  $query; exit;
			$rs = $db->query($query);
			if($rs->num_rows > 0)
			{
				while($row = $rs->fetch_array())
				{
					$order_array[] = $row;
					$orderid = $row['orderid'];
					$query_oi = "SELECT b.book_title, o.item_price, o.quantity FROM order_items o inner join books b on b.book_id=o.book_id WHERE o.orderid=".$orderid;
					$rs_oi = $db->query($query_oi);
					$order_items_array = array();

					while($row_oi = $rs_oi->fetch_array())
					{
						$order_items_array[] = $row_oi;
					}
					$books_array[$orderid] = $order_items_array;
					$rs_oi->close();

				}
					$rs->close();
			}
			$db->close();

    //print_r($books_array[8]); exit;
 ?>

﻿<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Online Bookstore - My Orders</title>
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
                        	<h2 class="bradcaump-title">My Orders</h2>

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
							<?php if(count($order_array)) { ?>
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-name">Order ID</th>
                                            <th class="product-name">Order Details</th>
                                            <th class="product-subtotal">Order Total</th>
                                            <th class="product-name">Order Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
																			<?php
 																				$tmp_arr = array();
																				foreach ($order_array as $value) {
																			     $orderid = $value['orderid'];
																					 $amount = $value['amount'];
																					 $order_date = $value['order_date'];
																					 $tmp_arr = $books_array[$orderid];
																					 $book_str = "";
																					 foreach ($tmp_arr as $arr) {

																						 $book_str .= $arr['book_title']. " (". $arr['quantity']." x $".$arr['item_price'].")<br/>";

																					 }


																				?>
                                        <tr>
                                            <td class="product-name"><?php echo $orderid; ?></td>
                                            <td class="product-name"><?php echo $book_str; ?></td>
                                            <td class="product-price"><span class="amount">$<?php echo $amount; ?></span></td>
																						<td class="product-name"><?php echo $order_date; ?></td>

                                        </tr>

																			<?php }

																			?>

                                    </tbody>
                                </table>
							<?php } else { echo "You do not have any orders yet"; } ?>
                            </div>
                        </form>


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
								
								</div>
							</div>
						</div>
					</div>
				</footer>
				<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<!-- <script src="js/popper.min.js"></script> -->
	

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
						window.location = "my_orders.php";
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
