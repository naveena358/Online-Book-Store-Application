<?php
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testItemTotal()
	{
      $this->assertEquals(40, $this->getItemTotal (10, 4));
	  $this->assertEquals(140, $this->getItemTotal (10, 14));
	}
    public function testCartTotal()
	{
	   $this->assertEquals(80, $this->getCartTotal());
	   // @codeCoverageIgnoreStart
	}
	// @codeCoverageIgnoreEnd
	public function testItemRemovedFromCart()
	{
		    $new_cart = array(array("book_id"=>"1", "book_name"=>"The Inevitable", "book_price"=>15, "book_qty"=>4));
			$this->assertSame($new_cart, $this->removeItem(2));
			// @codeCoverageIgnoreStart
	}
	// @codeCoverageIgnoreEnd
	public function removeItem($id) {
		 $saved_cart = array(array("book_id"=>"1", "book_name"=>"The Inevitable", "book_price"=>15, "book_qty"=>4), array("book_id"=>"2", "book_name"=>"Get in shape", "book_price"=>10, "book_qty"=>2));
		 $new_arr = array();
			foreach ($saved_cart as $key => $value) {
				if($value["book_id"] != $id) {
					$new_arr[] = $value;
				}
			}
			 return $new_arr;
	}
	public function getItemTotal($price, $qnty) {
		$result = 0;
		$result = (float)$price*(float)$qnty;
			 return $result;
	}
	public function getCartTotal() {
		$saved_cart = $this->savedCart();
		
		$total = 0.0;
		 foreach ($saved_cart as $key => $value) {
			   $t = (float)$value["book_price"]*(float)$value["book_qty"];
			   $total = $t + $total;
			   
		 }
		return $total;
	}
	public function savedCart(){
		$saved_cart = array(array("book_id"=>"1", "book_name"=>"The Inevitable", "book_price"=>15, "book_qty"=>4), array("book_id"=>"2", "book_name"=>"Get in shape", "book_price"=>10, "book_qty"=>2));
		return $saved_cart;
	}
	
}
?>