<?php
//session_start();
require_once ('database.php');
require_once ('utility.php');

if(!empty($_POST['cart_action']) && $_POST['cart_action']=="add") {
  $book_id_arr = array();
  $book_id = $_POST['book_id'];
  $qty = $_POST['qty'];
  $price = $_POST['price'];
  $ret_count = 0;

  $book_matrix = array();

  if(isset($_SESSION['SESSION_CART'])) {
    $book_id_arr = $_SESSION['SESSION_CART']['book_id_arr'];
    array_push($book_id_arr, $book_id);
    $new_book_id_arr = array_unique($book_id_arr);
    $_SESSION['SESSION_CART']['book_id_arr'] = $new_book_id_arr;

    $old_value = $_SESSION['SESSION_CART']['qty'];
    $new_value = $qty + $old_value;
    $_SESSION['SESSION_CART']['qty'] = $new_value;
    $ret_count = $new_value;

    $old_price = $_SESSION['SESSION_CART']['price'];
    $new_price = floatval($price) + floatval($old_price);
    $_SESSION['SESSION_CART']['price'] = $new_price;

     $old_qarr = $_SESSION['SESSION_CART']['qnty_arr'];
     foreach($old_qarr as $id=>$q) {
       if($id == $book_id) {
         $new_qty = $q + $qty;
         $old_qarr[$id] = $new_qty;
         $_SESSION['SESSION_CART']['qnty_arr'] = $old_qarr;
          break;
       } else {
         $old_qarr[$book_id] = $qty;
         $_SESSION['SESSION_CART']['qnty_arr'] = $old_qarr;

       }
     }


 } else {
    array_push($book_id_arr, $book_id);
    $_SESSION['SESSION_CART']['book_id_arr'] = $book_id_arr;

    $_SESSION['SESSION_CART']['qty'] = $qty;
    $_SESSION['SESSION_CART']['price'] = $price;
    $ret_count = $qty;
    $tmp_arr =array();
    $tmp_arr = array($book_id=>$qty);
    $_SESSION['SESSION_CART']['qnty_arr'] = $tmp_arr;


 }


}


if(!empty($_POST['cart_action']) && $_POST['cart_action']=="remove") {
  $book_id_arr = array();
  $book_id = $_POST['book_id'];
  // $qty = $_POST['qty'];
  // $price = $_POST['price'];
  $ret_count = 0;

  $book_matrix = array();

  if(isset($_SESSION['SESSION_CART'])) {
    $book_id_arr = $_SESSION['SESSION_CART']['book_id_arr'];

    foreach (array_keys($book_id_arr, $book_id) as $key) {
      unset($book_id_arr[$key]);
    }

    $_SESSION['SESSION_CART']['book_id_arr'] = $book_id_arr;

    $old_value = $_SESSION['SESSION_CART']['qty'];
    $new_value = $old_value - $qty;

    $_SESSION['SESSION_CART']['qty'] = $new_value;

    $old_price = $_SESSION['SESSION_CART']['price'];
    $new_price = floatval($old_price)-floatval($price);
    $_SESSION['SESSION_CART']['price'] = $new_price;

     $old_qarr = $_SESSION['SESSION_CART']['qnty_arr'];
     foreach (array_keys($old_qarr, $book_id) as $key) {
       unset($old_qarr[$key]);
     }
     $_SESSION['SESSION_CART']['qnty_arr'] = $old_qarr;


 }

  //print_r( $_SESSION['SESSION_CART']['qnty_arr'] );

}

if(!empty($_POST['cart_action']) && $_POST['cart_action']=="payment") {

  $ship_name = $_POST['ship_name'];
  $ship_address = $_POST['ship_address'];
  $ship_phone = $_POST['ship_phone'];
  $customerid = $_SESSION['CUSTOMER_ID'];
  $order_total = $_SESSION['ORDER_TOTAL'];

  $db = getDBConnection();
  $query = "INSERT INTO orders (customerid,amount,ship_name,ship_address,ship_phone,order_date) VALUES('$customerid', '$order_total', '$ship_name', '$ship_address', '$ship_phone', now())";
  //echo $query;
  $rs = $db->query($query);
  $orderid = $db->insert_id;

  //insert items now
  $order_items = $_SESSION['ORDER_ITEMS'];
  foreach ($order_items as $arr) {

    $bid = $arr['book_id'];
    $price = $arr['book_price'];
    $qty = $arr['book_qty'];

    $items_query = "INSERT INTO order_items (orderid, book_id, item_price, quantity) VALUES('$orderid','$bid','$price','$qty')";
    $rs = $db->query($items_query);

  }

  $db->close();

  //close cart sessions
  //unset all cart sessions
  
  
  if(isset($_SESSION['SESSION_CART'])) {
  	unset($_SESSION['SESSION_CART']);
  }
  if(isset($_SESSION['ORDER_TOTAL'])) {
  	unset($_SESSION['ORDER_TOTAL']);
  }
  if(isset($_SESSION['ORDER_ITEMS'])) {
  	unset($_SESSION['ORDER_ITEMS']);
  }
  


}

if(!empty($_POST['register'])) {  //save user registration
  $cust_name = $_POST['cust_name'];
  $cust_email = $_POST['cust_email'];
  $cust_pwd = $_POST['cust_pwd'];

  $db = getDBConnection();
  $query = "INSERT INTO customers (customer_name, password, email_id, creation_date) VALUES('$cust_name', AES_ENCRYPT('$cust_pwd', 'bookz'), '$cust_email', now())";
  //echo $query;
  $rs = $db->query($query);
  $cust_id = $db->insert_id;

  $_SESSION['username'] = $cust_name;
  $_SESSION['CUSTOMER_ID'] = $cust_id;

  echo "success";
  exit;

}

if(!empty($_POST['login'])) {  //handle user login
  $login_email = $_POST['login_email'];
  $login_pwd = $_POST['login_pwd'];

  $db = getDBConnection();
  $query = "SELECT * FROM customers WHERE CAST(AES_DECRYPT(password,'bookz') as char) = '$login_pwd' AND email_id = '$login_email'";
  //echo $query; exit;
  $rs = $db->query($query);
  $customer_name = "";
  if($rs->num_rows > 0)
  {
      while($row = $rs->fetch_array())
      {
        $customer_name = $row['customer_name'];
        $_SESSION['username'] = $customer_name;
        $_SESSION['CUSTOMER_ID'] = $row['customer_id'];

      }
      $rs->close();

      echo $customer_name;

  } else {
    echo "invalid user";
  }
  $db->close();


  exit;

}


if(!empty($_POST['logout'])) {
   session_destroy();
   echo "success";
}



?>
